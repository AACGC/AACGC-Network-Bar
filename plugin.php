<?php
if (!defined('e107_INIT'))
{
    exit;
}
// Plugin info -------------------------------------------------------------------------------------------------------

$eplug_name = "AACGC Network Bar";
$eplug_version = "2.5";
$eplug_author = "M@CHIN3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Link bar with links and names to other website of your choice! *NOTE* Must add the {NETBAR} code to our theme.php file were you want it to show.";
$eplug_compatible = "e107v7";
$eplug_readme = ""; // leave blank if no readme file
$eplug_compliant = true;
$eplug_status = false;
$eplug_latest = false;

// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "aacgc_network_bar";

// Mane of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "";

// Name of the admin configuration file --------------------------------------------------------------------------
$eplug_conffile = "admin_main.php";

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder . "/images/netbar_32.png";
$eplug_icon_small = $eplug_folder . "/images/netbar_16.png";
$eplug_caption = "AACGC Network Bar";

//--------------------------------------------------------------

$eplug_prefs = array(
"nwb_title" => "Network Bar",
"nwb_titlefsize" => "3",
"nwb_titlefcolor" => "ffffff",
"nwb_linkfsize" => "2",
"nwb_linkfcolor" => "999900",
"nwb_linkcols" => "5",
"nwb_linkordertype" => "net_id",
"nwb_linkorder" => "ASC",
"nwb_linkspace" => "5",
"netbar_location" => "menu",
"netbar_menutitle" => "Network Bar",
"netbar_style" => "1",
);
//--------------------------------------------------------------

$eplug_table_names = array("network_bar");

$eplug_tables = array(

"CREATE TABLE ".MPREFIX."network_bar(net_id int(11) NOT NULL auto_increment,net_name varchar(50) NOT NULL,net_link text NOT NULL,net_icon varchar(120) NOT NULL,PRIMARY KEY  (net_id)) TYPE=MyISAM;");


// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = false;
$eplug_link_name = "";
$eplug_link_url = "";

// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = "Install Complete";

// upgrading ... //
$upgrade_add_prefs = array(
"nwb_title" => "Network Bar",
"nwb_titlefsize" => "3",
"nwb_titlefcolor" => "ffffff",
"nwb_linkfsize" => "2",
"nwb_linkfcolor" => "999900",
"nwb_linkcols" => "5",
"nwb_linkordertype" => "net_id",
"nwb_linkorder" => "ASC",
"nwb_linkspace" => "5",
"netbar_location" => "menu",
"netbar_menutitle" => "Network Bar",
"netbar_style" => "1",
);

$upgrade_remove_prefs = "";

$upgrade_alter_tables = array (
"ALTER TABLE " . MPREFIX . "network_bar ADD COLUMN net_icon varchar(120) NOT NULL AFTER net_link;"
);

$eplug_upgrade_done = "Upgrade Complete!";

?>
