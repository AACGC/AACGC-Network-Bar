<?php


/*
##########################
# AACGC Network Bar      #
# M@CH!N3                #
# www.aacgc.com          #
# admin@aacgc.com        #
##########################
*/



require_once("../../class2.php");
if (!defined('e107_INIT'))
{exit;}
if (!getperms("P"))
{header("location:" . e_HTTP . "index.php");
exit;}
require_once(e_ADMIN . "auth.php");
if (!defined('ADMIN_WIDTH'))
{define(ADMIN_WIDTH, "width:100%;");}

if (e_QUERY == "update")
{
    $pref['nwb_title'] = $_POST['nwb_title'];
    $pref['nwb_titlefsize'] = $_POST['nwb_titlefsize'];
    $pref['nwb_titlefcolor'] = $_POST['nwb_titlefcolor'];
    $pref['nwb_linkfsize'] = $_POST['nwb_linkfsize'];
    $pref['nwb_linkfcolor'] = $_POST['nwb_linkfcolor'];
    $pref['nwb_linkcols'] = $_POST['nwb_linkcols'];
    $pref['nwb_linkordertype'] = $_POST['nwb_linkordertype'];
    $pref['nwb_linkorder'] = $_POST['nwb_linkorder'];
    $pref['nwb_linkspace'] = $_POST['nwb_linkspace'];
    $pref['netbar_location'] = $_POST['netbar_location'];
    $pref['netbar_menutitle'] = $_POST['netbar_menutitle'];
    $pref['netbar_style'] = $_POST['netbar_style'];




    save_prefs();
    $led_msgtext = "Settings Saved";
}

$admin_title = "AACGC Network Bar (settings)";
//--------------------------------------------------------------------


$text .= "
<form method='post' action='" . e_SELF . "?update' id='confnwb'>
	<table style='" . ADMIN_WIDTH . "' class='fborder'>

		<tr>
			<td colspan='3' class='fcaption'><b>Settings:</b></td>
		</tr>

                <tr>
                <td style='width:30%' class='forumheader3'>Network Bar Style:</td>
                <td colspan='2' style='width:70%' class='forumheader3'>
		<select name='netbar_style' size='1' class='tbox' style='width:25%'>
		<option name='netbar_style' value='".$pref['netbar_style']."'>".$pref['netbar_style']."</option>
		<option name='netbar_style' value='none'>none</option>
		<option name='netbar_style' value='1'>1</option>
		<option name='netbar_style' value='2'>2</option>
		<option name='netbar_style' value='3'>3</option>
		<option name='netbar_style' value='4'>4</option>

                </td>
                </tr>


		<tr>
			<td style='width:30%' class='forumheader3'>Network Bar Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='nwb_title' value='" . $tp->toFORM($pref['nwb_title' ]) . "' /></td>
		</tr>
                <tr>
                <td style='width:30%' class='forumheader3'>Network Bar Location:</td>
                <td colspan='2' style='width:70%' class='forumheader3'>
		<select name='netbar_location' size='1' class='tbox' style='width:25%'>
		<option name='netbar_location' value='".$pref['netbar_location']."'>".$pref['netbar_location']."</option>
		<option name='netbar_location' value='theme'>Theme</option>
		<option name='netbar_location' value='menu'>Menu</option>
                </td>
                </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Network Bar Title Font Size:</td>
			<td colspan='2' class='forumheader3'><input class='tbox' type='text' size='25' name='nwb_titlefsize' value='" . $tp->toFORM($pref['nwb_titlefsize' ]) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Network Bar Title Font Color:</td>
			<td colspan='2' class='forumheader3'><input class='tbox' type='text' size='25' name='nwb_titlefcolor' value='" . $tp->toFORM($pref['nwb_titlefcolor' ]) . "' /></td>
		</tr>

		<tr>
			<td style='width:30%' class='forumheader3'>Network Links Font Size:</td>
			<td colspan='2' class='forumheader3'><input class='tbox' type='text' size='25' name='nwb_linkfsize' value='" . $tp->toFORM($pref['nwb_linkfsize' ]) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Network Links Font Color:</td>
			<td colspan='2' class='forumheader3'><input class='tbox' type='text' size='25' name='nwb_linkfcolor' value='" . $tp->toFORM($pref['nwb_linkfcolor' ]) . "' /></td>
		</tr>

		<tr>
			<td style='width:30%' class='forumheader3'>Links before next row:</td>
			<td colspan='2' class='forumheader3'><input class='tbox' type='text' size='25' name='nwb_linkcols' value='" . $tp->toFORM($pref['nwb_linkcols' ]) . "' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Order Link By:</td>
			<td class='forumheader3'>
		        <select name='nwb_linkordertype' size='1' class='tbox' style='width:50%'>
		        <option name='nwb_linkordertype' value='net_id'>Link ID</option>
		        <option name='nwb_linkordertype' value='net_name'>Link Name</option>
                        </td>
			<td class='forumheader3'>
		        <select name='nwb_linkorder' size='1' class='tbox' style='width:50%'>
		        <option name='nwb_linkorder' value='ASC'>ASC</option>
		        <option name='nwb_linkorder' value='DESC'>DESC</option>
                        </td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Space Between Links:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='25' name='nwb_linkspace' value='" . $tp->toFORM($pref['nwb_linkspace' ]) . "' /></td>
		</tr>










                <tr>
			<td colspan='3' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' /></td>
		</tr>





</table>
</form>";


$text .= "<center><br><br><br>
<font color='#FF0000' size='2'><b><u>*NOTE*<br>You Need To Add The Shortcode {NETBAR} To Your Theme.php File For It To Appear If Location Option Set To Theme!</b></u></font>
</center>";

$ns->tablerender($admin_title, $text);
require_once(e_ADMIN . "footer.php");
?>
