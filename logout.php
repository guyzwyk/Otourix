<?php
	ob_start();
	ob_implicit_flush();
?>
<?php
	session_save_path("_sessions/");
	session_start();
	require("../../scripts/incfiles/config.inc.php");
	require_once("library/otourix.inc.php");
	
	$myMember	=	new cwd_otourix();
?>
<?php
	//Connecting to DB...
	$myPage->db_connect($thewu32_host, $thewu32_db, $thewu32_user, $thewu32_pass);
	
	//Disconnect the user in DB
	$my_users->set_connected_user($_SESSION['uId'], 0);

    //Log
    $myPage->set_log('USER LOGGED OFF OK', 'log/log.gzk');
	
	//Disconnecting otourix members a enlever pour mettre dans le module otourix
	$myMember->otourix_update_connection_parent($_SESSION['PARENT_LOGIN'], '0', '0');
	$myMember->otourix_update_connection_member($_SESSION['mId'], '0', '0');
	
	
	unset($_SESSION["CONNECTED"]);
	//session_unregister("CONNECTED");
	
	unset($_SESSION["connected_admin"]);
	//session_unregister("connected_admin");
	
	unset($_SESSION["cId"]);
	//session_unregister("cId");

	unset($_SESSION['LANG']);
	//session_unregister("LANG");
	
	//session_unregister();
	session_destroy();
	session_unset();
	
	header("location:../../index.php");
?>
<?php 
	ob_end_flush();
?>