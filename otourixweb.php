<?php
	ob_start();
	ob_implicit_flush();
?>
<?php
	session_save_path("../../_sessions/");
	session_start();
?>
<?php
	require_once('../../scripts/incfiles/config.inc.php');
	require_once('library/otourix.inc.php');
		
	$myMember		=	new cwd_otourix();
	$mId			=	$_SESSION['mId'];

	require_once('inc/otourixweb_menu.php');
	require_once('inc/otourixweb_validations.php');
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
		<link rel="stylesheet" href="../scripts/cssfiles/font-awesome.css" type="text/css" media="all" />
		<link rel="stylesheet" href="../scripts/cssfiles/csao_member.css" type="text/css" />
		<link rel="stylesheet" href="../scripts/cssfiles/csao_modal_dialog.css"  type="text/css" media="screen" />
		<script type="text/javascript" src="../plugins/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">tinymce.init({selector:"textarea.csao_editor"});</script>
		<title>CSAO :: Espace membre Otourix - <?php print ucfirst($member); ?></title>
		
		<script src="../scripts/jsfiles/csao.js"></script>
	</head>
	<body>
		<div id="page_wrapper">
			<div id="page_header">
				<div class="pageGrid">
					<div class="section group transp">
						<div class="col span_1_of_4 csao_logo">
							<a href="<?php print $pageHome; ?>"><img src="../img/logos/logo_csao.png" style="border:0; width:23.5em; text-align:center;" /></a>
						</div>
						<div class="col span_2_of_4"></div>
						<div class="col span_1_of_4">
						</div>
					</div>			
				</div>
			</div>
			<div id="page_body" style="background : transparent url(../img/bg/content_top_member.png) top repeat-x;">
				<div class="pageGrid">
					<div class="section group">
						<div class="col span_1_of_4">
							<div id="page_nav">
								<?php print $main_menu; ?>
							</div>
						</div>
						<div class="col span_3_of_4">
                            
                            <!-- include the appropriate member file -->
							<?php include('otourixweb_'.$_SESSION['member'].'.php'); ?>
							
							<div id="right_col">
								<?php print $account_menu; ?>
								<?php if($member == 'parent') { print '<br />'.$children_menu; } ?>
							</div>
								
						</div>
					</div>
				</div>
			</div>
			<div id="page_footer">
				<!--  -->
				<div class="pageBottom">
					<div class="pageGrid">
					<div class="section group">				
						<div class="col span_1_of_4">
							<div class="csao_copyright"><p style="text-align:center; fornt-weight:bold; height:100%; padding-bottom:10px;">&copy; Complexe Scolaire Adventiste d'Odza</p></div>
						</div>
						<div class="col span_3_of_4">
							<div class="bottom_txt">Responsabilit&eacute; - M&eacute;rite - Excellence</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php 
	ob_end_flush();
?>