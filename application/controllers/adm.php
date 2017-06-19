<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {
	function __construct() {
		parent::__construct();
		
	}
	
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		$a['page']		= "v_main";
	
		$this->load->view('adm/template', $a);
	}
	
	public function post() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$tipe_u			= $this->uri->segment(3);
		$mau_ke			= $this->uri->segment(4);
		$idu1			= $this->uri->segment(5);
		
		//config_upload 
		$config['upload_path'] 		= 'upload/posting';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '50000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$this->load->library('upload', $config);
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT halaman.*, pengelola.nama AS nama_admin FROM halaman INNER JOIN pengelola ON pengelola.id = halaman.admin WHERE halaman.jenis = '$tipe_u' ORDER BY halaman.id DESC")->num_rows();
		$per_page		= 5;
		
		$awal	= $this->uri->segment(5); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 5, base_url()."adm/post/".$tipe_u."/p");


		$a['data']		= $this->db->query("SELECT halaman.*, pengelola.nama AS nama_admin FROM halaman INNER JOIN pengelola ON pengelola.id = halaman.admin WHERE halaman.jenis = '$tipe_u' ORDER BY halaman.id DESC LIMIT $awal, $akhir")->result();
			
		
		//post_var
		$judul			= addslashes($this->input->post('judul'));
		//topik
		$topik			= addslashes($this->input->post('topik'));
		
		$tipe			= addslashes($this->input->post('tipe'));
		$idp			= addslashes($this->input->post('idp'));
		$jenis			= addslashes($this->input->post('jenis'));
		$isi			= empty($_POST['isi']) ? "" : mysql_real_escape_string(addslashes($_POST['isi']));
		$komen			= addslashes($this->input->post('komen'));
		$tampil			= addslashes($this->input->post('tampil'));
		
		if ($mau_ke == "del") {
			$a['data_edit']	= $this->db->query("DELETE FROM halaman WHERE jenis = '$tipe_u' AND id = '$idu1'");
			redirect('adm/post/'.$tipe_u);
		} else if ($mau_ke == "add") {
			$a['page']		= "f_berita";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM halaman WHERE jenis = '$tipe_u' AND id = $idu1 ORDER BY id DESC")->row();
			$a['page']		= "f_berita";
		} else if ($mau_ke == "act_add") {
			if ($this->upload->do_upload('gambar_posting')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("INSERT INTO halaman VALUES (NULL, '".$up_data['file_name']."', '$judul', '$topik', '$tipe', '$isi', NOW(), '', $id_admin, 0, 'Tidak', '$tampil')");
			} else {
				$this->db->query("INSERT INTO halaman VALUES (NULL, '', '$judul', '$topik', '$tipe', '$isi', NOW(), '', $id_admin, 0, 'Tidak', '$tampil')");
			}
			redirect('adm/post/'.$tipe_u);
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('gambar_posting')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("UPDATE halaman SET gambar = '".$up_data['file_name']."', judul = '$judul', topik = '$topik', isi = '$isi', tampil = '$tampil', tgl_edit = NOW() WHERE jenis = '$tipe_u' AND id = '$idp'");
			} else {
				$this->db->query("UPDATE halaman SET judul = '$judul', topik = '$topik', isi = '$isi', tampil = '$tampil', tgl_edit = NOW() WHERE jenis = '$tipe_u' AND id = '$idp'");
			}
			redirect('adm/post/'.$tipe_u);
		} else {
			$a['page']		= "v_berita";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function topik() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu1			= $this->uri->segment(4);
		
		
		$a['data']		= $this->db->query("SELECT * FROM ref_topik ORDER BY id DESC")->result();
			
		
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$nama			= addslashes($this->input->post('nama'));
		
		if ($mau_ke == "del") {
			$a['data_edit']	= $this->db->query("DELETE FROM ref_topik WHERE id = '$idu1'");
			redirect('adm/topik/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_topik";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM ref_topik WHERE id = $idu1")->row();
			$a['page']		= "f_topik";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO ref_topik VALUES (NULL, '$nama')");
			redirect('adm/topik/');
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE ref_topik SET nama = '$nama' WHERE id = '$idp'");
			redirect('adm/topik/');
		} else {
			$a['page']		= "v_topik";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function agenda() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu1			= $this->uri->segment(4);
		
		
		$a['data']		= $this->db->query("SELECT * FROM agenda ORDER BY id DESC")->result();
			
		
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$tgl_mulai		= addslashes($this->input->post('tgl_mulai'));
		$tgl_selesai	= addslashes($this->input->post('tgl_selesai'));
		$tempat			= addslashes($this->input->post('tempat'));
		$acara			= addslashes($this->input->post('acara'));
		$deskripsi		= addslashes($this->input->post('deskripsi'));
		
		if ($mau_ke == "del") {
			$a['data_edit']	= $this->db->query("DELETE FROM agenda WHERE id = '$idu1'");
			redirect('adm/agenda/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_agenda";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM agenda WHERE id = $idu1")->row();
			$a['page']		= "f_agenda";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO agenda VALUES (NULL, '$tgl_mulai', '$tgl_selesai', '$tempat', '$acara', '$deskripsi')");
			redirect('adm/agenda/');
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE agenda SET tgl_mulai = '$tgl_mulai', tgl_selesai = '$tgl_selesai', tempat = '$tempat', acara = '$acara', deskripsi ='$deskripsi' WHERE id = '$idp'");
			redirect('adm/agenda/');
		} else {
			$a['page']		= "v_agenda";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function galeri_album() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu1			= $this->uri->segment(4);
		
		
		$a['data']		= $this->db->query("SELECT * FROM galeri_album ORDER BY id DESC")->result();
			
		
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$nama			= addslashes($this->input->post('nama'));
		$jenis			= addslashes($this->input->post('jenis'));
		$tampil			= addslashes($this->input->post('tampil'));
		
		if ($mau_ke == "del") {
			$a['data_edit']	= $this->db->query("DELETE FROM galeri_album WHERE id = '$idu1'");
			redirect('adm/galeri_album/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_galeri_album";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM galeri_album WHERE id = $idu1")->row();
			$a['page']		= "f_galeri_album";
		} else if ($mau_ke == "act_add") {
			$this->db->query("INSERT INTO galeri_album VALUES (NULL, '$nama', '$jenis', '$id_admin', '$tampil', NOW())");
			redirect('adm/galeri_album/');
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE galeri_album SET nama = '$nama', jenis = '$jenis', tampil = '$tampil' WHERE id = '$idp'");
			redirect('adm/galeri_album/');
		} else {
			$a['page']		= "v_galeri_album";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function galeri_manage() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//config_upload 
		$config['upload_path'] 		= 'upload/galeri';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '50000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$this->load->library('upload', $config);
		//page
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$idu1			= $this->uri->segment(3);
		$mau_ke			= $this->uri->segment(4);
		$idu2			= $this->uri->segment(5);
		
		$q_tipe_galeri	= $this->db->query("SELECT jenis FROM galeri_album WHERE id = '$idu1'")->row();
		$a['tipe_glr']	= $q_tipe_galeri->jenis;
		$a['data']		= $this->db->query("SELECT * FROM galeri_file WHERE id_album = '$idu1' ORDER BY id DESC")->result();
			
		//paging
		/* pagination 
		$total_row		= $this->db->query("SELECT jenis FROM galeri_album WHERE id = '$idu1'")->row();;
		$per_page		= 2;
		
		$awal	= $this->uri->segment(5); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;
		
		//if (empty($awal) || $awal == 1) { $awal = 0; } { $awal = $awal; }
		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 2, base_url()."adm/galeri_manage/".$idu1."/p");*/
		
		//post_var
		$idp1			= addslashes($this->input->post('idp1'));
		$idp2			= addslashes($this->input->post('idp2'));
		$url			= addslashes($this->input->post('url'));
		$ket			= addslashes($this->input->post('ket'));
		
		if ($mau_ke == "del") {
			$filenya	= GVAL("galeri_file", "id", "file_url", $idu2);
			@unlink("./upload/galeri/".$filenya);
			
			$this->db->query("DELETE FROM galeri_file WHERE id = '$idu2'");
			redirect('adm/galeri_manage/'.$idu1);
		} else if ($mau_ke == "add") {
			$a['page']		= "f_galeri_manage";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM galeri_file WHERE id = $idu2")->row();
			$a['page']		= "f_galeri_manage";
		} else if ($mau_ke == "act_add") {
			if ($a['tipe_glr'] == "file") {
				if ($this->upload->do_upload('gambar_galeri')) {
					$up_data	 	= $this->upload->data();
					$this->db->query("INSERT INTO galeri_file VALUES (NULL, '$idp1', '".$up_data['file_name']."', '$ket', NOW())");
				}
			} else if ($a['tipe_glr'] == "url") {
				$this->db->query("INSERT INTO galeri_file VALUES (NULL, '$idp1', '$url', '$ket', NOW())");
			}
			$this->session->set_flashdata("k", "<span>".$this->upload->display_errors()."</span>");
			redirect('adm/galeri_manage/'.$idp1);
		} else if ($mau_ke == "act_edt") {
			if ($a['tipe_glr'] == "file") {
				if ($this->upload->do_upload('gambar_galeri')) {
					$filenya	= GVAL("galeri_file", "id", "file_url", $idp2);
					@unlink("./upload/galeri/".$filenya);
					$up_data	 	= $this->upload->data();
					$this->db->query("UPDATE galeri_file SET file_url = '".$up_data['file_name']."', ket = '$ket' WHERE id = '$idp2'");
				}
			} else if ($a['tipe_glr'] == "url") {
				$this->db->query("UPDATE galeri_file SET file_url = '$url', ket = '$ket' WHERE id = '$idp2'");
			}
			redirect('adm/galeri_manage/'.$idp1);
			
			//$this->db->query("UPDATE galeri_file SET nama = '$nama', jenis = '$jenis', tampil = '$tampil' WHERE id = '$idp2'");
			//redirect('adm/galeri_album/');
		} else {
			$a['page']		= "v_galeri_manage";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function download() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//config_upload 
		$config['upload_path'] 		= 'upload/download';
		$config['allowed_types'] 	= 'gif|jpg|png|pdf|xls|xlsx|doc||docx|ppt|pptx';
		$config['max_size']			= '50000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$this->load->library('upload', $config);
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
		
		$a['data']		= $this->db->query("SELECT * FROM download ORDER BY id DESC")->result();
			
		
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$nama			= addslashes($this->input->post('nama'));
		$deskripsi		= addslashes($this->input->post('deskripsi'));
		
		if ($mau_ke == "hapus") {
			$filenya	= GVAL("download", "id", "file", $idu);
			@unlink("./upload/download/".$filenya);
			
			$this->db->query("DELETE FROM download WHERE id = '$idu'");
			redirect('adm/download/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_download";
		} else if ($mau_ke == "edit") {
			$a['data_edit']	= $this->db->query("SELECT * FROM download WHERE id = $idu")->row();
			$a['page']		= "f_download";
		} else if ($mau_ke == "act_add") {
			if ($this->upload->do_upload('gambar_galeri')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("INSERT INTO download VALUES (NULL, '$nama', '".$up_data['file_name']."', '$deskripsi', 0, NOW())");
			} else {
				$this->session->set_flashdata("k", "<span>".$this->upload->display_errors()."</span>");
			}
			redirect('adm/download/');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('gambar_galeri')) {
				$filenya	= GVAL("download", "id", "file", $idp);
				@unlink("./upload/download/".$filenya);
				$up_data	 	= $this->upload->data();
				$this->db->query("UPDATE download SET nama = '$nama', file = '".$up_data['file_name']."', deskripsi = '$deskripsi' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE download SET nama = '$nama', deskripsi = '$deskripsi' WHERE id = '$idp'");
			}
			redirect('adm/download/');
		} else {
			$a['page']		= "v_download";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	/*public function slideshow() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//config_upload 
		$config['upload_path'] 		= 'upload/ss';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '50000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$this->load->library('upload', $config);
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
		
		$a['data']		= $this->db->query("SELECT * FROM slideshow ORDER BY id DESC")->result();
			
		
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$nama			= addslashes($this->input->post('nama'));
		$deskripsi		= addslashes($this->input->post('deskripsi'));
		
		if ($mau_ke == "hapus") {
			$filenya	= GVAL("slideshow", "id", "file", $idu);
			@unlink("./upload/ss/".$filenya);
			
			$this->db->query("DELETE FROM slideshow WHERE id = '$idu'");
			redirect('adm/slideshow/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_slideshow";
		} else if ($mau_ke == "edit") {
			$a['data_edit']	= $this->db->query("SELECT * FROM slideshow WHERE id = $idu")->row();
			$a['page']		= "f_slideshow";
		} else if ($mau_ke == "act_add") {
			if ($this->upload->do_upload('gambar_galeri')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("INSERT INTO slideshow VALUES (NULL, '$nama', '".$up_data['file_name']."', '$deskripsi', 0, NOW())");
			} else {
				$this->session->set_flashdata("k", "<span>".$this->upload->display_errors()."</span>");
			}
			redirect('adm/slideshow/');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('gambar_galeri')) {
				$filenya	= GVAL("slideshow", "id", "file", $idp);
				@unlink("./upload/ss/".$filenya);
				$up_data	 	= $this->upload->data();
				$this->db->query("UPDATE slideshow SET nama = '$nama', file = '".$up_data['file_name']."', deskripsi = '$deskripsi' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE slideshow SET nama = '$nama', deskripsi = '$deskripsi' WHERE id = '$idp'");
			}
			redirect('adm/slideshow/');
		} else {
			$a['page']		= "v_slideshow";
		}
		
		$this->load->view('adm/template', $a);
	}*/
	
	public function data_ptk() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$nip			= addslashes($this->input->post('nip'));
		
		$nama			= addslashes($this->input->post('nama'));
		$tmp_lahir		= addslashes($this->input->post('tmp_lahir'));
		$tgl_lahir		= addslashes($this->input->post('tgl_lahir'));
		$email			= addslashes($this->input->post('email'));
		$blog			= addslashes($this->input->post('blog'));
		$tugas			= addslashes($this->input->post('tugas'));
		$tugas_detil	= addslashes($this->input->post('tugas_detil'));
		
		
		//config_upload 
		$config['upload_path'] 		= 'upload/ptk';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '50000';
		$config['max_width']  		= '10000';
		$config['max_height']  		= '10000';
		$this->load->library('upload', $config);
				
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
			
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_ptk ORDER BY id DESC")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."adm/data_ptk/p");

		$a['data']		= $this->db->query("SELECT * FROM t_ptk ORDER BY id DESC LIMIT $awal, $akhir")->result();


		if ($mau_ke == "hapus") {
			$filenya	= GVAL("t_ptk", "id", "foto", $idu);
			@unlink("./upload/ptk/".$filenya);
			
			$this->db->query("DELETE FROM t_ptk WHERE id = '$idu'");
			redirect('adm/data_ptk/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_ptk";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM t_ptk WHERE id = $idu")->row();
			$a['page']		= "f_ptk";
		} else if ($mau_ke == "act_add") {
			if ($this->upload->do_upload('foto_ptk')) {
				$up_data	 	= $this->upload->data();
				$this->db->query("INSERT INTO t_ptk VALUES (NULL, '$nip', '$nama', '$tmp_lahir', '$tgl_lahir', '$email', '$blog', '$tugas', '$tugas_detil', '".$up_data['file_name']."')");
			} else {
				$this->db->query("INSERT INTO t_ptk VALUES (NULL, '$nip', '$nama', '$tmp_lahir', '$tgl_lahir', '$email', '$blog', '$tugas', '$tugas_detil', '')");
				$this->session->set_flashdata("k", "<span>".$this->upload->display_errors()."</span>");
			}
			redirect('adm/data_ptk/');
		} else if ($mau_ke == "act_edt") {
			if ($this->upload->do_upload('foto_ptk')) {
				$filenya	= GVAL("t_ptk", "id", "foto", $idu);
			@unlink("./upload/ptk/".$filenya);
				$up_data	 	= $this->upload->data();
				$this->db->query("UPDATE t_ptk SET nip = '$nip', nama = '$nama', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir', email = '$email', blog = '$blog', tugas = '$tugas', tugas_detil = '$tugas_detil', foto = '".$up_data['file_name']."' WHERE id = '$idp'");
			} else {
				$this->db->query("UPDATE t_ptk SET nip = '$nip', nama = '$nama', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir', email = '$email', blog = '$blog', tugas = '$tugas', tugas_detil = '$tugas_detil' WHERE id = '$idp'");
			}
			redirect('adm/data_ptk/');
		} 
		
		
		else {
			$a['page']		= "v_ptk";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function data_siswa() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
				
		//post_var
		$idp			= addslashes($this->input->post('idp'));
		$nis			= addslashes($this->input->post('nis'));
		
		$nama			= addslashes($this->input->post('nama'));
		$tmp_lahir		= addslashes($this->input->post('tmp_lahir'));
		$tgl_lahir		= addslashes($this->input->post('tgl_lahir'));
		$jk				= addslashes($this->input->post('jk'));
		$agama			= addslashes($this->input->post('agama'));
		$kelas			= addslashes($this->input->post('kelas'));

		$cari			= addslashes($this->input->post('cari'));
		
						
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
		
		/* pagination */	
		$total_row		= $this->db->query("SELECT * FROM t_siswa ORDER BY id DESC")->num_rows();
		$per_page		= 10;
		
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."adm/data_siswa/p");

		$a['data']		= $this->db->query("SELECT * FROM t_siswa ORDER BY id DESC LIMIT $awal, $akhir")->result();
		

		if ($mau_ke == "hapus") {
			$this->db->query("DELETE FROM t_siswa WHERE id = '$idu'");
			redirect('adm/data_siswa/');
		} else if ($mau_ke == "add") {
			$a['page']		= "f_siswa";
		} else if ($mau_ke == "edt") {
			$a['data_edit']	= $this->db->query("SELECT * FROM t_siswa WHERE id = $idu")->row();
			$a['page']		= "f_siswa";
		} else if ($mau_ke == "act_add") {
			$cek_nis = $this->db->query("SELECT nis FROM t_siswa WHERE nis = '$nis'")->num_rows();

			if ($cek_nis < 1) {
				$this->db->query("INSERT INTO t_siswa VALUES (NULL, '$nis', '$nama', '$tmp_lahir', '$tgl_lahir', '$jk', '$agama', '$kelas')");
				
			} else {
				$this->session->set_flashdata('k', '<div class="alert alert-danger">NIS Sudah dipakai</div>');
			}
			redirect('adm/data_siswa/');
		} else if ($mau_ke == "act_edt") {
			$this->db->query("UPDATE t_siswa SET nis = '$nis', nama = '$nama', tmp_lahir = '$tmp_lahir', tgl_lahir = '$tgl_lahir', jk = '$jk', agama = '$agama', kelas = '$kelas' WHERE id = '$idp'");
			redirect('adm/data_siswa/');
		} else if ($mau_ke == "cari") {
			$a['data']		= $this->db->query("SELECT * FROM t_siswa WHERE nama LIKE '%$cari%' OR nis = '$cari' OR kelas = '$cari' ORDER BY id DESC")->result();
			$a['page']		= "v_siswa";
		} else {
			$a['page']		= "v_siswa";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function data_absensi() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		// paging
		$total_row		= $this->db->query("select a.*, b.nama nmsiswa, b.kelas from t_absen a inner join t_siswa b on a.id_siswa = b.id where a.tgl = date(now())")->num_rows();
		$per_page		= 3;
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."adm/data_absensi/p");
		//
		$a['data']		= $this->db->query("select a.*, b.nama nmsiswa, b.kelas from t_absen a inner join t_siswa b on a.id_siswa = b.id where a.tgl = date(now()) order by id DESC LIMIT $awal, $akhir")->result();
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
			
		if ($mau_ke == "hapus") {
			$this->db->query("DELETE FROM t_absen WHERE id = '$idu'");
			redirect('adm/data_absensi/');
		} else if ($mau_ke == "add") {
			$a['kelas'] = $this->db->query("SELECT kelas FROM t_siswa GROUP BY kelas ORDER BY kelas ASC")->result();

			$a['page']		= "f_absensi";
		} else if ($mau_ke == "simpan") {
			$p = $this->input->post();

			for ($i = 1; $i <= 10; $i++) {
				$id_siswa = $p['id_siswa_'.$i];
				$ket = $p['ket_'.$i];

				if (!empty($id_siswa) && !empty($ket)) {
					$cek_sudah = $this->db->query("SELECT id FROM t_absen WHERE id_siswa = '$id_siswa' AND tgl = '".$p['tgl_absen']."'")->num_rows();

					if ($cek_sudah < 1) {
						$this->db->query("INSERT INTO t_absen VALUES (null, '$id_siswa', '".$p['tgl_absen']."', '$ket');");
					}
				}
			}
			redirect('adm/data_absensi/');
		} else if ($mau_ke == "cari_siswa") {
			$kk = $_GET['q'];
			
			$query = $this->db->query("SELECT id, nis, nama, kelas FROM t_siswa WHERE kelas = '$kk' OR nis = '$kk' OR nama LIKE '%".$kk."%'")->result_array();

			if (empty($query)) {
				$a['status'] = null;
				$a['data'] = null;
			} else {
				$a['status'] = "ok";
				$a['data'] = $query;
			}

			$this->j($a);
			exit();
		} else {
			$a['page']		= "v_absensi";
		}
		
		$this->load->view('adm/template', $a);
	}
	
	public function tampil_absen() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		//pag
		$total_row		= $this->db->query("select a.*, b.nama nmsiswa, b.kelas from t_absen a inner join t_siswa b on a.id_siswa = b.id ")->num_rows();
		$per_page		= 10;
		$awal	= $this->uri->segment(4); 
		$awal	= (empty($awal) || $awal == 1) ? 0 : $awal;

		$akhir	= $per_page;
		
		$a['pagi']	= _page($total_row, $per_page, 4, base_url()."adm/tampil_absen/p");
		
		$a['data']		= $this->db->query("select a.*, b.nama nmsiswa, b.kelas from t_absen a inner join t_siswa b on a.id_siswa = b.id order by id DESC LIMIT $awal, $akhir")->result();
		
		//$a['data']		= $this->db->query("SELECT * FROM t_siswa ORDER BY id DESC LIMIT $awal, $akhir")->result();//
		
		
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
			
		if ($mau_ke == "hapus") {
			$this->db->query("DELETE FROM t_absen WHERE id='$idu'");
			redirect('adm/tampil_absen/');
			$a['page']		= "v_sem_absen";
		}else {
			$a['page']		= "v_sem_absen";
		}
			
		
		
		$this->load->view('adm/template', $a);
	}
	public function saran()
	{			if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("adm/login");
		}
		
		//session_var	
		$id_admin		= $this->session->userdata('admin_id');
		
		
		$a['data']		= $this->db->query("SELECT * FROM kritik_saran ORDER BY id DESC")->result();
			
		
		
						
		//uri_var
		$mau_ke			= $this->uri->segment(3);
		$idu			= $this->uri->segment(4);
			if ($mau_ke == "hapus") {
			
			
			$this->db->query("DELETE FROM kritik_saran WHERE id ='$idu'");
			redirect('adm/saran/');
		}
		
			$a['page']		= "f_saran";
		
		
		$this->load->view('adm/template', $a);
	}
	public function login() {
		$this->load->view('adm/login');
	}
	
	public function login_process() {
		$u 		= $this->security->xss_clean($this->input->post('username'));
        $p 		= md5($this->security->xss_clean($this->input->post('password')));
         
		$q_cek	= $this->db->query("SELECT * FROM pengelola WHERE username = '".$u."' AND password = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		
        if($j_cek == 1) {
            $data = array(
                    'admin_id' => $d_cek->id,
                    'admin_user' => $d_cek->username,
                    'admin_nama' => $d_cek->nama,
                    'admin_level' => $d_cek->level,
					'admin_valid' => true
                    );
            $this->session->set_userdata($data);
            redirect('adm');
        } else {	
			$this->session->set_flashdata("k", "username or password is not valid");
			redirect('adm/login');
		}	
	}
	
	public function logout(){
        $this->session->sess_destroy();
		redirect('adm/login');
    }	

    public function j($data) {
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}