<?php
	ob_start();
	ob_implicit_flush();
?>
<?php
	session_save_path("../_sessions/");
	session_start();
?>
<?php
	require_once('../scripts/incfiles/config.inc.php');
	require_once('library/member.inc.php');
	require_once('menu.php');
	$system->user_session_checker($_SESSION['CONNECTED_STUDENT']);
	
	$myMember		=	new cwd_member();
	$currentPage	=	'print.php';
	$tabAssignment	=	$myMember->get_assignment($_REQUEST['assId']);
	$course			=	$myMember->get_field_by_id($myMember->tbl_course, $myMember->fld_courseId, $myMember->fld_courseName, $tabAssignment['ass_COURSEID']);
?>
<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="../img/dzine/icons/favicon.png" type="image/x-png" />
		<link rel="stylesheet" href="../scripts/cssfiles/csao_print.css" type="text/css" />
		<title>CSAO :: Espace membre - Imprimer une &eacute;preuve</title>
	</head>
	<body>

	<div id="print_page">
		<div id="print_header"><div id="logo_csao"><img src="../img/logos/logo_csao.png" /></div></div>
		<div id="print_header_left">
			<p><strong>Nom de l'&eacute;l&egrave;ve :</strong>&nbsp;<?php print $_SESSION['mName'];?></p>
			<p style="text-align:left;"><a href="javascript:print()"><img style="margin-right:5px;" src="img/icons/print.png" />Imprimer</a></p>
		</div>
		<div id="print_header_right">
			<p><strong>Mati&egrave;re :</strong>&nbsp;<?php print $course; ?> <br />
			<strong>Classe :</strong>&nbsp;<?php print $myMember->get_class_by_student($_SESSION['mId']); ?><br />
			<strong>Enseignant :</strong>&nbsp;<?php print $myMember->get_member_name_by_id($tabAssignment['ass_USRID'])?><br />
			<strong>Date limite de remise du devoir :</strong>&nbsp;<?php print $myMember->date_fr2($tabAssignment['ass_DATERETURN']); ?></p>
		</div>
		<div style="clear:both;"></div>
		<div>
			<hr />
			<div id="print_title"><strong>Devoir :</strong> <?php print $tabAssignment['ass_NAME'] ?></div>
			<div id="print_descr"><strong>Objectifs :</strong><?php print $tabAssignment['ass_DESCR'] ?></div>
			<div id="print_content"><?php print $tabAssignment['ass_CONTENT'] ?></div>
		</div>
	</div>
	
	</body>
</html>
<?php 
	ob_end_flush();
?>