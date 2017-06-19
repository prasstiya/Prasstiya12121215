<?php

$month=date("m");
$year=date("Y");
$day=date("d");
$endDate=date("t",mktime(1,0,0,$month,$day,$year));

echo '
<style>
td {
font-size:12;
font-family:verdana;
}
</style>
';

echo '<b><table align="center" border="0" width="100%"  cellpadding=2 cellspacing=1 style=""><tr><td align=center>';
echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year));
echo '</td></tr></table></b>';

echo '<table align="center" border="0"  width="250px" cellpadding=2 cellspacing=1 style="border:1px solid #CCCCCC">
<tr bgcolor="lightblue">
<td align=center><font color=red>Sun</font></td>
<td align=center><font color=black>Mon</font></td>
<td align=center><font color=black>Tue</font></td>
<td align=center><font color=black>Wen</font></td>
<td align=center><font color=black>Thu</font></td>
<td align=center><font color=black>Fri</font></td>
<td align=center><font color=blue>Sat</font></td>
</tr>
';

$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" width=\"15%\" align=center valign=middle bgcolor=\"#FFFFFF\" >
</td>";
}
for ($d=1;$d<=$endDate;$d++) {

if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; } { $fontColor="black"; }
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }

if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="blue"; }

echo "<td style=\"font-family:arial;color:#333333\" width=\"15%\" align=center valign=middle > <span style=\"color:$fontColor\">$d</span></td>";
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}

echo '</table>';
?>
