<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Network Bar               #
#     by Reid Baughman                #
#     http://www.aacgc.com            #
#######################################
*/
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
if (e_QUERY) {
        $tmp = explode('.', e_QUERY);
        $action = $tmp[0];
        $id = $tmp[1];
        unset($tmp);
}
//-----------------------------------------------------------------------------------------------------------+
if (isset($_POST['update_link'])) {
        $message = ($sql->db_Update("network_bar", "net_name='".$_POST['net_name']."', net_link='".$_POST['net_link']."', net_icon='".$_POST['net_icon']."' WHERE net_id='".$_POST['id']."' ")) ? "Successful upddated" : "Update failed";
}

if (isset($_POST['main_delete'])) {
        $delete_id = array_keys($_POST['main_delete']);
	$sql2 = new db;
    $sql2->db_Delete("network_bar", "net_id='".$delete_id[0]."'");
	
}

if (isset($message)) {
        $ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}
//-----------------------------------------------------------------------------------------------------------+
if ($action == "") {
        $text .= $rs->form_open("post", e_SELF, "myform_".$row['net_id']."", "", "");
        $text .= "
        <div style='text-align:center'>
        <table style='width:95%' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:' class='forumheader3'>Network ID</td>
        <td style='width:0%' class='forumheader3'>Netwok Icon</td>
        <td style='width:25%' class='forumheader3'>Netwok Name</td>
        <td style='width:25%' class='forumheader3'>Network Link</td>
        <td style='width:' class='forumheader3'>Options</td>
       </tr>";
        $sql->db_Select("network_bar", "*", "ORDER BY net_id ASC","");
        while($row = $sql->db_Fetch()){

if ($row['net_icon'] == ""){$icon = "<i>no icon selected</i>";}
else
{$icon = "<img src='".e_PLUGIN."aacgc_network_bar/images/".$row['net_icon']."'</img>";}

        $text .= "
        <tr>
        <td style='width:' class='forumheader3'>".$row['net_id']."</td>
        <td style='width:25%' class='forumheader3'>".$icon."</td>
        <td style='width:25%' class='forumheader3'>".$row['net_name']."</td>
        <td style='width:25%' class='forumheader3'>".$row['net_link']."</td>
        <td style='width:' class='forumheader3'>
        
		<a href='".e_SELF."?edit.{$row['net_id']}'>".ADMIN_EDIT_ICON."</a>
		<input type='image' title='".LAN_DELETE."' name='main_delete[".$row['net_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['net_id']} ]')\"/>
		</td>
        </tr>";
		}
        $text .= "
        </table>
        </div>";
        $text .= $rs->form_close();
	      $ns -> tablerender("", $text);
	      require_once(e_ADMIN."footer.php");
}
//-----------------------------------------------------------------------------------------------------------+

//-----------------------------------------------------------------------------------------------------------+

if ($action == "edit")
{
                $sql->db_Select("network_bar", "net_id, net_name, net_link", "net_id = $id");
                $row = $sql->db_Fetch();
        $width = "width:100%";
        $text = "
        <div style='text-align:center'>
        ".$rs -> form_open("post", e_SELF, "MyForm", "", "enctype='multipart/form-data'", "")."
        <table style='".$width."' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:30%; text-align:right' class='forumheader3'>Network Name:</td>
        <td style='width:70%' class='forumheader3'>
            ".$rs -> form_text("net_name", 100, $row['net_name'], 500)."
        </td>
        </tr>
        <tr>
        <td style='width:30%; text-align:right' class='forumheader3'>Network Link:</td>
        <td style='width:70%' class='forumheader3'>
            ".$rs -> form_textarea("net_link", '59', '3', $row['net_link'], "", "", "", "", "")."
        </td>
        </tr>";

        $rejectlist = array('$.','$..','/','CVS','thumbs.db','Thumbs.db','*._$', 'index', 'null*', 'blank*');
        $iconpath = e_PLUGIN."aacgc_network_bar/images/";
        $iconlist = $fl->get_files($iconpath,"",$rejectlist);

        $text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Network Icon:</td>
        <td style='width:60%' class='forumheader3'>
        ".$rs -> form_text("net_icon", 50, $row['net_icon'], 100)."
        ".$rs -> form_button("button", '', "Show Icons", "onclick=\"expandit('plcico')\"")."
            <div id='plcico' style='{head}; display:none'>";
            foreach($iconlist as $icon){
            $text .= "<a href=\"javascript:insertext('".$icon['fname']."','net_icon','plcico')\"><img src='".$icon['path'].$icon['fname']."' style='border:0' alt='' /></a> ";
            }

        $text .= "</div>
        </td></tr>
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
        ".$rs->form_hidden("id", "".$row['net_id']."")."
        ".$rs -> form_button("submit", "update_link", "Update")."
        </td>
        </tr>
        </table>
        ".$rs -> form_close()."
        </div>";
	      $ns -> tablerender("", $text);
	      require_once(e_ADMIN."footer.php");
}



?>