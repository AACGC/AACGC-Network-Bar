global $sql, $tp, $ns, $menu_pref;

if ($pref['netbar_style'] == "none"){
$themea = "";
$themeb = "";}
if ($pref['netbar_style'] == "1"){
$themea = "forumheader3";
$themeb = "indent";}
if ($pref['netbar_style'] == "2"){
$themea = "forumheader3";
$themeb = "forumheader3";}
if ($pref['netbar_style'] == "3"){
$themea = "indent";
$themeb = "indent";}
if ($pref['netbar_style'] == "4"){
$themea = "indent";
$themeb = "forumheader3";}


if ($pref['netbar_location'] == "theme"){

$nwb .= "
<center>
<table style='' class='".$themea."' cellspacing='".$pref['nwb_linkspace']."' cellpadding='".$pref['nwb_linkspace']."'>
<tr>
<td colspan=".$pref['nwb_linkcols']." class='".$themeb."'><center><font size='".$pref['nwb_titlefsize']."' color='".$pref['nwb_titlefcolor']."'><b>".$pref['nwb_title']."</b></font></center></td>
</tr><tr>";


$sql->mySQLresult = @mysql_query("SELECT * FROM ".MPREFIX."network_bar ORDER BY ".$pref['nwb_linkordertype']." ".$pref['nwb_linkorder']."");
$rows = $sql->db_Rows();
$pcol = 1;
for ($i = 0; $i < $rows; $i++){
$row = $sql->db_Fetch();

if ($row['net_icon'] == ""){$icon = "";}
else
{$icon = "<img src='".e_PLUGIN."aacgc_network_bar/images/".$row['net_icon']."'</img>";}

$nwb .= "<td class='".$themeb."'>".$icon." <a href='".$row['net_link']."' target='_blank'><font size='".$pref['nwb_linkfsize']."' color='".$pref['nwb_linkfcolor']."'>".$row['net_name']."</font></a></td>";


if ($pcol == $pref['nwb_linkcols']) 
{$nwb .= "</tr><tr>";
$pcol = 1;}
else
{$pcol++;}}





$nwb .= "</tr></table></center>";



echo $nwb;}



if ($pref['netbar_location'] == "menu"){
$nwb .= "
<center>
<table style='' class='".$themea."' cellspacing='".$pref['nwb_linkspace']."' cellpadding='".$pref['nwb_linkspace']."'>
<tr>
<td colspan=".$pref['nwb_linkcols']." class='".$themeb."'><center><font size='".$pref['nwb_titlefsize']."' color='".$pref['nwb_titlefcolor']."'><b>".$pref['nwb_title']."</b></font></center></td>
</tr><tr>";


$sql->mySQLresult = @mysql_query("SELECT * FROM ".MPREFIX."network_bar ORDER BY ".$pref['nwb_linkordertype']." ".$pref['nwb_linkorder']."");
$rows = $sql->db_Rows();
$pcol = 1;
for ($i = 0; $i < $rows; $i++){
$row = $sql->db_Fetch();

if ($row['net_icon'] == ""){$icon = "";}
else
{$icon = "<img src='".e_PLUGIN."aacgc_network_bar/images/".$row['net_icon']."'</img>";}

$nwb .= "<td class='".$themeb."'>".$icon." <a href='".$row['net_link']."' target='_blank'><font size='".$pref['nwb_linkfsize']."' color='".$pref['nwb_linkfcolor']."'>".$row['net_name']."</font></a></td>";


if ($pcol == $pref['nwb_linkcols']) 
{$nwb .= "</tr><tr>";
$pcol = 1;}
else
{$pcol++;}}





$nwb .= "</tr></table></center>";


$ns -> tablerender("", $nwb);}