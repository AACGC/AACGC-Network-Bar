<?php
require_once("../../class2.php");
if(!getperms("P")) {
echo "";
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;

//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_net'] == '1') {
$newnetname = $_POST['net_name'];
$newnetlink = $_POST['net_link'];
$newneticon = $_POST['net_icon'];

$reason = "";
$newok = "";
if (($newnetname == "") OR ($newnetlink == "")){
	$newok = "0";
	$reason = "No Name or Link";
} else {
	$newok = "1";
}

If ($newok == "0"){
 	$newtext = "
 	<center>
	<b><br><br> ".$reason."
	</center>
 	</b>
	";
	$ns->tablerender("", $newtext);
}
If ($newok == "1"){
$sql->db_Insert("network_bar", "NULL, '".$newnetname."', '".$newnetlink."', '".$newneticon."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Link Added to Network Bar!</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_new.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";
$text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Network Name:</td>
        <td style='width:60%' class='forumheader3'>
        <input class='tbox' type='text' name='net_name' size='50'>
        </td>
        </tr>
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Network Link:</td>
        <td style='width:60%' class='forumheader3'>
	        <textarea class='tbox' rows='3' cols='50' name='net_link'></textarea>
        </td>
        </tr>";

        $rejectlist = array('$.','$..','/','CVS','thumbs.db','Thumbs.db','*._$', 'index', 'null*', 'blank*');
        $iconpath = e_PLUGIN."aacgc_network_bar/images";
        $iconlist = $fl->get_files($iconpath,"",$rejectlist);

        $text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Link Icon:</td>
        <td style='width:60%' class='forumheader3'>
        ".$rs -> form_text("net_icon", 50, $row['net_icon'], 100)."
        ".$rs -> form_button("button", '', "Show Icons", "onclick=\"expandit('plcico')\"")."
            <div id='plcico' style='{head}; display:none'>";
            foreach($iconlist as $icon){
            $text .= "<a href=\"javascript:insertext('".$icon['fname']."','net_icon','plcico')\"><img src='".$icon['path'].$icon['fname']."' style='border:0' alt='' /></a> ";
            }

 
        $text .= "</div>
        </td>
		</tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_net' value='1'>
		<input class='button' type='submit' value='Add Network Link'>
		</td>
        </tr>
</table>
</div>
<br>
</form>


";
	      $ns -> tablerender("AACGC Network Bar (create link)", $text);
	      require_once(e_ADMIN."footer.php");







?>


