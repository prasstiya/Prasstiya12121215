<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct() {
		parent::__construct();
		 $this->load->model('web_model');
	}
	
	public function index() {
		$meta = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'description', 'content' => $this->config->item('nama_sekolah')),
			array('name' => 'keywords', 'content' => $this->config->item('keyword')),
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		);

		$a['titel']		= $this->config->item('nama_sekolah');
		$a['meta']		= $meta;
		
		$a['page1']		= "v_main";
		$a['page2']		= "v_menu1";
		$a['page3']		= "menu2";
		$a['ss']		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE (jenis = 'berita' OR jenis = 'pengumuman' OR jenis = 'artikel') AND tampil = 'Ya' AND gambar != '' ORDER BY id DESC LIMIT 10")->result();
		$a['berita1']	= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'berita' AND tampil = 'Ya' ORDER BY id DESC LIMIT 0, 4")->result();
		$a['berita2']	= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'pengumuman' AND tampil = 'Ya' ORDER BY id DESC LIMIT 0, 1")->result();
		$a['berita3']	= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'artikel' AND tampil = 'Ya' ORDER BY id DESC LIMIT 0, 4")->result();
		$a['berita4']	= $this->db->query("SELECT * FROM agenda ORDER BY id LIMIT 0, 3")->result();
		
		$this->load->view('template', $a);
	}
	
	public function read() {
		$id_berita		= $this->uri->segment(3);
		
		// buat nambahin hits
		//asli
		//$this->db->query("UPDATE halaman SET hits = hits + 1 WHERE id = $id_berita");
		
		// pake model
		$this->web_model->rq("UPDATE halaman SET hits = hits + 1 WHERE id = $id_berita");
		
		//
		
		$a['berita']	= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE halaman.tampil = 'Ya' AND halaman.id = $id_berita")->row();
		
		if (!empty($a['berita'])) {
			$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => strip_tags(substr($a['berita']->isi, 0, 300))),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
			$a['titel']		= $this->config->item('nama_sekolah')." - ".$a['berita']->judul;
			$a['meta']		= $meta;
		} 
		
		$a['page1']		= "v_read";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}
	
	public function berita() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'berita' AND halaman.tampil = 'Ya'")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/berita/p");
		
		
		$a['data']		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'berita' AND halaman.tampil = 'Ya' ORDER BY id DESC LIMIT $awal, $akhir ")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Daftar Berita'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Daftar Berita";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_berita";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}

	public function pengumuman() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'pengumuman' AND  halaman.tampil = 'Ya'")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 2) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/pengumuman/p");
		
		
		$a['data']		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'pengumuman' AND halaman.tampil = 'Ya' ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Daftar Berita'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Daftar Berita";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_pengumuman";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}
	
	public function artikel() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'artikel' AND  halaman.tampil = 'Ya'")->num_rows();
		$per_page		= 5;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/artikel/p");
		
		
		$a['data']		= $this->db->query("SELECT pengelola.nama AS nama_admin, ref_topik.nama, halaman.* FROM halaman INNER JOIN pengelola ON halaman.admin = pengelola.id LEFT JOIN ref_topik ON halaman.topik = ref_topik.id WHERE jenis = 'artikel' AND halaman.tampil = 'Ya' ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Daftar Berita'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Daftar Artikel";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_artikel";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}
	
	public function agenda() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM agenda")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/pengumuman/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM agenda ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Daftar Agenda'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Daftar Agenda";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_agenda";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}
	
	public function galeri() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM galeri_album")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/galeri/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM galeri_album ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Galeri Foto'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Galeri Foto";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_galeri";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}

	public function galeri_lihat() {
	
		$url_3			= $this->uri->segment(3);
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM galeri_file WHERE id_album = '$url_3'")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/galeri_lihat/p");
		
		
		$a['data']		= $this->db->query("SELECT galeri_file.*, galeri_album.nama AS nama_album, galeri_album.jenis AS jenis_ FROM galeri_file INNER JOIN galeri_album ON galeri_file.id_album = galeri_album.id WHERE galeri_file.id_album = '$url_3' ORDER BY galeri_file.id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => $desk = empty($a['data']->nama_album) ? "" : $a['data']->nama_album),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Lihat galeri ".$title = empty($a['data']->nama_album) ? "" : $a['data']->nama_album."";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_galeri_detil";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}

	public function kritik_saran() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM kritik_saran")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/kritik_saran/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM kritik_saran  ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Tanya Jawab'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Tanya Jawab";
		$a['meta']		= $meta;
		
		//echo $this->session->userdata('capedeh');
		
		if ($this->uri->segment(3) == "simpan") {
			$nama		 	= $this->input->post('nama');
			$email		 	= $this->input->post('email');
			$telp_hp	 	= $this->input->post('telp_hp');
			$alamat		 	= $this->input->post('alamat');
			$pesan		 	= $this->input->post('pesan');
			$kode		 	= $this->input->post('kode');
			
			if ($kode != $this->session->userdata('capedeh')) {
				$arr_isikan	= array($nama, $email, $telp_hp, $alamat, $pesan);
				$this->session->set_flashdata("value", $arr_isikan);
				$this->session->set_flashdata("error", "<div class='alert alert-danger'>Kode captcha SALAH</div>");
				redirect('web/kritik_saran');
			} else if ($nama == "" || $alamat == "" || $pesan == "" || $email == "") {
				$this->session->set_flashdata("error", "<div class='alert alert-danger'>Isian wajib diisi</div>");
				redirect('web/kritik_saran');
			} else {
				$this->db->query("INSERT INTO kritik_saran VALUES ('', '$nama', '$email', '$telp_hp', '$alamat', '$pesan', NOW())");
				$this->session->set_flashdata("error", "<div class='alert alert-success'>Data telah dimasukkan, dan menunggu moderasi dari Admin </div>");
				redirect('web/kritik_saran');
			}
		} else {
			$this->load->helper('captcha'); 
			$vals = array(
				'img_path'	 => './capedeh/',
				'img_url'	 => base_url().'capedeh/',
				'font_path'	 => './aset/web_/fonts/verdanab.ttf',
				'img_width'	 => '200',
				'img_height' => 43,
				'border' => 0, 
				'expiration' => 7200
			);
			
			$cap 				= create_captcha($vals);
			$a['img_kaptcha'] 	= $cap['image'];
			$this->session->set_userdata('capedeh', $cap['word']);
			
			$a['page1']		= "v_kontak";
			$a['page2']		= "v_menu1";
			$a['page3']		= "";
		}
		
		$this->load->view('template', $a);
	}
	
	
	
	
	
	/*public function kritik_saran()
	{
		
		$total_row		= $this->db->query("SELECT * FROM kritik_saran")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/kritik_saran/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM kritik_saran WHERE is_view = 'Y' ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Tanya Jawab'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Tanya Jawab";
		$a['meta']		= $meta;
		
		//echo $this->session->userdata('capedeh');
		
		if ($this->uri->segment(3) == "simpan") {
			$nama		 	= $this->input->post('nama');
			$email		 	= $this->input->post('email');
			$telp_hp	 	= $this->input->post('telp_hp');
			$alamat		 	= $this->input->post('alamat');
			$pesan		 	= $this->input->post('pesan');
			$kode		 	= $this->input->post('kode');
			
			if ($kode != $this->session->userdata('capedeh')) {
				$arr_isikan	= array($nama, $email, $telp_hp, $alamat, $pesan);
				$this->session->set_flashdata("value", $arr_isikan);
				$this->session->set_flashdata("error", "<div class='alert alert-danger'>Kode captcha SALAH</div>");
				redirect('web/kritik_saran');
			} else if ($nama == "" || $alamat == "" || $pesan == "") {
				$this->session->set_flashdata("error", "<div class='alert alert-danger'>Isian wajib diisi</div>");
				redirect('web/kritik_saran');
			} else {
				$this->db->query("INSERT INTO kritik_saran VALUES ('', '$nama', '$email', '$telp_hp', '$alamat', '$pesan', '', NOW(), '', 'N')");
				$this->session->set_flashdata("error", "<div class='alert alert-success'>Data telah dimasukkan, dan menunggu moderasi dari Admin </div>");
				redirect('web/kritik_saran');
			}
		} else {
			$this->load->helper('captcha'); 
			$vals = array(
				'img_path'	 => './capedeh/',
				'img_url'	 => base_url().'capedeh/',
				'font_path'	 => './aset/web_/fonts/verdanab.ttf',
				'img_width'	 => '200',
				'img_height' => 43,
				'border' => 0, 
				'expiration' => 7200
			);
			
			$cap 				= create_captcha($vals);
			$a['img_kaptcha'] 	= $cap['image'];
			$this->session->set_userdata('capedeh', $cap['word']);
			
			$a['page1']		= "v_kontak";
			$a['page2']		= "v_menu1";
			$a['page3']		= "";
		}
		
		$this->load->view('template', $a);
	}
		
		
	}*/
	
	
	

	public function download() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM download")->num_rows();
		$per_page		= 6;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/download/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM download ORDER BY id DESC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Download Content'),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')." - Download content";
		$a['meta']		= $meta;
		
		$a['page1']		= "v_download";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}

	public function data_guru() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_ptk WHERE tugas = 'guru'")->num_rows();
		$per_page		= 5;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/data_guru/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM t_ptk WHERE tugas = 'guru' ORDER BY id ASC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Data Guru '),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')."";
		$a['meta']		= $meta;
		
		//echo $this->session->userdata('capedeh');
		
		$a['page1']		= "v_ptk";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}
	
	public function data_siswa() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_siswa")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/data_siswa/p");
		
		$a['data']		= $this->db->query("SELECT * FROM t_siswa ORDER BY id ASC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Data Siswa '),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')."";
		$a['meta']		= $meta;
		
		//echo $this->session->userdata('capedeh');
		
		$a['page1']		= "v_siswa";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}
	
	public function data_tatausaha() {
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_ptk WHERE tugas = 'tu'")->num_rows();
		$per_page		= 5;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/data_tatausaha/p");
		
		
		$a['data']		= $this->db->query("SELECT * FROM t_ptk WHERE tugas = 'tu' ORDER BY id ASC LIMIT $awal, $akhir")->result();
		
		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Data Tata Usaha '),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')."";
		$a['meta']		= $meta;
		
		//echo $this->session->userdata('capedeh');
		
		$a['page1']		= "v_ptk";
		$a['page2']		= "v_menu1";
		$a['page3']		= "";
		
		$this->load->view('template', $a);
	}

	public function data_absensi() {
		$total_row		= $this->db->query("SELECT * FROM t_siswa WHERE nis ")->num_rows();
		$per_page		= 30;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."web/data_absensi/p");

		$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => 'Data Absensi '),
				array('name' => 'keywords', 'content' => $this->config->item('keyword')),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
		$a['titel']		= $this->config->item('nama_sekolah')."";
		$a['meta']		= $meta;
		$cari			= addslashes($this->input->post('cari'));
		$p = $this->input->post();

		$uri2 = $this->uri->segment(2);
		$uri3 = $this->uri->segment(3);

		$a['data'] = "";

		if ($uri3 == "cari") {
			$cari = $this->db->query("select b.nis, b.nama, b.kelas, a.tgl, a.ket from t_absen a join t_siswa b on a.id_siswa = b.id where b.nis  ='$cari'   and a.tgl  LIMIT $awal, $akhir" )->result_array();

			if (empty($cari)) {
				$siswa = $this->db->query("select b.nis, b.nama, b.kelas, a.tgl, a.ket from t_absen a join t_siswa b on a.id_siswa = b.id where b.nis ='$cari' and a.tgl = date(now()) LIMIT $awal, $akhir  ")->row();
				if (empty($siswa)) {
					$a['data'] = null;
				} else {
					$a['data'][] = array("nis"=>$siswa->nis, "nama"=>$siswa->nama, "kelas"=>$siswa->kelas, "tgl"=>date('Y-m-d'), "ket"=>"Hadir");
				} 
			} else {
				$a['data'] = $cari;
			}

			$a['page1']		= "v_absensi";
			$a['page2']		= "v_menu1";
			$a['page3']		= "";
		} else {
			$a['page1']		= "v_absensi";
			$a['page2']		= "v_menu1";
			$a['page3']		= "";
		}
		
		$this->load->view('template', $a);
	}

	public function data_nilai(){
		$a['form_action']	= site_url('siswa/data_nilai');
			$a['title'] = 'Data Nilai';
		$a['page1']		= "v_nilai";
		$a['page2']		= "v_menu1";
		$this->load->view('template', $a);
	}
	
	
}