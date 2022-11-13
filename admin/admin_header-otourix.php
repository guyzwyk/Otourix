<?php
    //Libraries Import
	//require_once("../scripts/incfiles/config.inc.php");
	require_once("../modules/user/library/user.inc.php");
	require_once("../modules/otourix/library/otourix.inc.php");
	require_once('../plugins/chartphp/lib/inc/chartphp_dist.php');
	//$system		= 	new cwd_system();
	//$system->session_checker($_SESSION["CONNECTED_ADMIN"], $_SESSION["CONNECTED_EDIT"]);
	$myMember	= 	new cwd_otourix();
	$myOtourix	=	new cwd_otourix();
	$p			=	new chartphp();


	//Data for stats
	$nb_membersTotal	=	$myMember->count_members('ALL');
	$nbStudents			=	(int)$myMember->count_members('STUDENTS');
	$nbParents			=	(int)$myMember->count_members('PARENTS');
	$nbTeachers			=	(int)$myMember->count_members('TEACHERS');
	$nbCouncilors		=	(int)$myMember->count_members('COUNCILORS');
	
	$p->data 			= 	array(array(array('El&egrave;ves ('.$nbStudents.')', $nbStudents),
							array('Parents ('.$nbParents.')', $nbParents),
							array('Conseillers d\'orientation ('.$nbCouncilors.')', $nbCouncilors),
							array('Enseignants ('.$nbTeachers.')', $nbTeachers)));
	
	$p->chart_type 		= 	'pie';
	
	// Common Options
	$p->title	= 	"Utilisateurs OTOURIX : $nb_membersTotal";	
	$chartOut	= 	$p->render('c1');

	//Page name
	$admin_pageTitle	=	$mod_lang_output['MODULE_DESCR'];
	
	//Member Categories
	$arr_accountType 	= 	$myMember->arr_assoc_load_field($myMember->tbl_memberType, $myMember->fld_memberTypeId, $myMember->fld_memberTypeLib);

	//Webmarks settings
	$wmSettings         =   $myOtourix->get_otourix_webmarks_settings();

    //Connecting to Otourix Module Settings
    $otourix_jsonData           =   file_get_contents("../modules/otourix/inc/settings.json");
    $otourix_jsonSettings   	=   json_decode($otourix_jsonData, true);

    //Enabling or disabling some form inputs
    $inputDisable               =   ($otourix_jsonSettings['forms'][0]['code-update-enabling'] == "0") ? ("disabled style=\"background:#eee;\"") : ("") ;
    //print "Settings : ".$inputDisable;