<?php //VALIDATIONS OTOURIX WEB ?>


<?php /* +++++++++++++++++++++++++++++++++++++++++++++++++ VALIDATIONS COMMON +++++++++++++++++++++++++++++++++++++++++++++++++ 
 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ ?>
<?php
	//Password Update	
	if(isset($_POST['btn_passwordUpdate'])){
		$txt_oldPassword	=	$_POST['txt_oldPassword'];
		$txt_newPassword1	=	$_POST['txt_newPassword1'];
		$txt_newPassword2	=	$_POST['txt_newPassword2'];

		if(empty($txt_oldPassword) or empty($txt_newPassword1) or empty($txt_newPassword2))
			$msgDisplay		=	"<div class=\"boxErr\">Erreur!<br />Votre mot de passe ne peut &ecirc;tre vide...</div>";
		elseif(sha1($txt_oldPassword) != $_SESSION['mPassword'])
			$msgDisplay		=	"<div class=\"boxErr\">Erreur!<br />L'ancien mot de passe n'est pas correct. Bien vouloir r&eacute;essayer.</div>";
		elseif($txt_newPassword1 != $txt_newPassword2)
			$msgDisplay		=	"<div class=\"boxErr\">Erreur!<br />Les nouveaux mots de passe ne concordent pas.</div>";
		elseif($myMember->update_member_element($myMember->fld_memberPass, sha1($txt_newPassword1), $_SESSION['mId'])){
			$_SESSION['mPassword']	=	sha1($txt_newPassword1);
			$msgDisplay		=	"<div class=\"boxCfrm\">Bravo!Vous avez pu bel et bien modifier votre mot de passe.<br />Vous pouvez d&egrave;s &agrave; pr&eacute;sent naviguer en toute securit&eacute; dans votre espace membre.</div>";
		}
	}

	//Request submission
	if(isset($_POST['btn_reqInsert'])){
		$sel_reqCatId	=	$_POST['sel_reqCatId'];
		$txt_reqTitle	=	addslashes($_POST['txt_reqTitle']);
		$ta_reqMessage	=	addslashes($_POST['ta_reqMessage']);

		if(empty($txt_reqTitle) or empty($ta_reqMessage)){
			$err_reqInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Le titre et/ou le message ne doivent pas &ecirc;tre vides!</div>";
		}
		elseif($sel_reqCatId == '0'){
			$err_reqInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Vous devez choisir une categorie avant de continuer.</div>";
		}
		elseif($myMember->chk_entry_twice($myMember->tbl_request, $myMember->fld_requestTitle, $myMember->fld_memberId, $txt_reqTitle, $_SESSION['mId'])){
			$err_reqInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Cette requ&ecirc;te a d&eacute;j&agrave; &eacute;t&eacute; envoy&eacute;e.</div>";
		}
		elseif($myMember->set_request($sel_reqCatId, $txt_reqTitle, $ta_reqMessage, $_SESSION['mId'])){
			$err_reqInsert	=	false;
			$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!<br />Votre requ&ecirc;te a bien &eacute;t&eacute; soumise &agrave; la hierarchie.<br />Merci pour votre contribution.</div>";
		}
	}

	//Deleting
	switch($_REQUEST['action']){
		case 'reqDelete'	: 	if($myMember->delete_request($_REQUEST['Id'], $_SESSION['mId']))			$msgDelete	=	"<div class=\"boxCfrm\">Requ&ecirc;te supprim&eacute;e avec succ&egrave;s!</div>";
		break;
		case 'assDelete'	:	if($myMember->delete_assignment($_REQUEST['Id'], $_SESSION['mId'])) 		$msgDelete	=	"<div class=\"boxCfrm\">Devoir supprim&eacute; avec succ&egrave;s!</div>";
		break;
		case 'testDelete'	: 	if($myMember->delete_test($_REQUEST['Id'], $_SESSION['mId'])) 			$msgDelete	=	"<div class=\"boxCfrm\">&Eacute;preuve supprim&eacute;e avec succ&egrave;s!</div>";
		break;
		case 'orDelete' 	:	if(in_array($_REQUEST['Id'], $myMember->get_user_orientations($_SESSION['mId'])) && ($myMember->delete_orientation($_REQUEST['Id'], $_SESSION['mId']))) $msgDelete	=	"<div class=\"boxCfrm\">Article supprim&eacute; avec succ&egrave;s!</div>";
		break;
	}
?>

<?php /* +++++++++++++++++++++++++++++++++++++++++++++++++ VALIDATIONS STUDENTS +++++++++++++++++++++++++++++++++++++++++++++++++ 
 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ ?>
<?php 
	//Nothing to showcase here
?>

<?php /* +++++++++++++++++++++++++++++++++++++++++++++++++ VALIDATIONS TEACHERS +++++++++++++++++++++++++++++++++++++++++++++++++ 
 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ ?>
<?php 	
	//Assignation insert
	if(isset($_POST['btn_assInsert'])){
		$txt_assLib			=	$_POST['txt_assLib'];
		$ta_assDescription	=	$_POST['ta_assDescription']; //Objectifs
		$sel_assClasses		=	$_POST['sel_assClasses']; 
		$sel_assCourses		=	$_POST['sel_assCourses']; //Matiere
		$sel_assPeriods		=	$_POST['sel_assPeriods'];
		$ta_assContent		=	$_POST['ta_assContent'];
		$assFile_name		=	$_FILES['assFile']['name'];
		$assFile_size		=	$_FILES['assFile']['size'];
		$ass_dateReturn		=	$_POST['cmbYear']."-".$_POST['cmbMonth']."-".$_POST['cmbDay']." ".$_POST['cmbHour'].":".$_POST['cmbMin'].":".$_POST['cmbSec'];
		$assDir				=	'files/assignments/';
		
		//Extensions acceptees
		$tab_assExt			=	array("doc", "docx", "txt", "pdf", "jpeg", "png");

		if(empty($txt_assLib) or empty($ta_assDescription) or !isset($sel_assClasses) or !isset($sel_assCourses) or !isset($sel_assPeriods) or !isset($ta_assContent)){
			$err_assInsert	=	true;
			$msgDisplay		=	"<div class=\"boxErr\">Erreur :<br />Les champs avec ast&eacute;risques sont obligatoires...</div>";
		}
		elseif($myMember->chk_entry_twice($myMember->tbl_assignment, $myMember->fld_assLib, $myMember->fld_assDescr, addslashes($txt_assLib), addslashes($ta_assDescription))){
			$err_assInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Erreur :<br />Ce devoir existe d&eacute;j&agrave; dans la base de donne&eacute;es!</div>";
		}
		elseif($assNum = $myMember->set_assignment(addslashes($txt_assLib), addslashes($ta_assDescription), addslashes($ta_assContent), '', $_SESSION['mId'], $sel_assCourses, $sel_assClasses, $sel_assPeriods, $ass_dateReturn)){
			/*** Envoyer le fichier si selectionne et Mettre la table à jour ***/
			if(isset($_FILES['assFile'])){
				// 1 -Renommage du fichier avec le string "TEST suivi du numero d'insertion ds la table (<"TEST">_<insertId>.<EXT>)
				$ass_fileExt 		= 	$myMember->get_file_ext($assFile_name);
				$assFile_name 		= 	"ASS-".$assNum.".".$ass_fileExt;
				
				if(!in_array($myMember->get_file_ext($assFile_name), $tab_assExt)){
					$err_assInsert	=	true;
					$msgDisplay		=	"<div class=\"boxErr\">Erreur :<br />Format de fichier incorrect. Veuillez r&eacute;essayer svp!</div>";
				}				
				elseif(move_uploaded_file($_FILES['assFile']['tmp_name'], $assDir . $assFile_name) && ($myMember->update_assignment_by_field($myMember->fld_assAttachment, $assFile_name, $assNum)))
					$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!<br />Devoir enregistr&eacute; avec succ&egrave;s accompagn&eacute; d'une pi&egrave;ce-jointe.</div>";
			}
			else{
				$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!<br />Devoir enregistr&eacute;e avec succ&egrave;s</div>";
			}
		}
	}
	
	//Tests insert
	if(isset($_POST['btn_testInsert'])){
		$txt_testLib			=	$_POST['txt_testLib'];
		$ta_testDescription		=	$_POST['ta_testDescription'];
		$sel_testCourses		=	$_POST['sel_testCourses'];
		$sel_testLevels			=	$_POST['sel_testLevels'];
		$testFile_name			=	$_FILES['testFile']['name'];
		$testFile_size			=	$_FILES['testFile']['size'];
		$testDir				=	'files/tests/';
		//$test_dateInsert		=	$_POST[cmbYear1]."-".$_POST[cmbMonth1]."-".$_POST[cmbDay1]." ".$_POST[cmbHour1].":".$_POST[cmbMin1].":".$_POST[cmbSec1];
		
		//Extensions acceptees
		$tab_testExt 			= 	array("doc", "docx", "txt", "pdf", "jpeg", "png");


		if(empty($txt_testLib) || empty($ta_testDescription) || empty($sel_testCourses) || empty($sel_testLevels) || empty($testFile_name)){
			$err_testInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Les champs avec ast&eacute;risques sont obligatoires...</div>";
		}
		elseif($myMember->chk_entry_twice($myMember->tbl_test, $myMember->fld_testLib, $myMember->fld_testDescr, addslashes($txt_testLib), addslashes($ta_testDescription))){
			$err_testInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Erreur :<br />Cette &eacute;preuve existe d&eacute;j&agrave; dans la banque d'&eacute;preuves</div>";
		}
		elseif(!in_array($myMember->get_file_ext($testFile_name), $tab_testExt)){
			$err_testInsert	=	true;
			$msgDisplay	=	"<div class=\"boxErr\">Erreur :<br />Format de fichier incorrect. Veuillez r&eacute;essayer svp!</div>";
		}	
		elseif($testNum = $myMember->set_test(addslashes($txt_testLib), addslashes($ta_testDescription), $sel_testCourses, $sel_testLevels, $_SESSION['mId'], 'NO FILE', $myMember->get_datetime())){
			/*** Envoyer le fichier et Mettre la table à jour ***/
			// 1 -Renommage du fichier avec le string "TEST suivi du numero d'insertion ds la table (<"TEST">_<insertId>.<EXT>)
			
			$test_fileExt 		= 	$myMember->get_file_ext($testFile_name);
			$testFile_name 		= 	"TEST-".$testNum.".".$test_fileExt;
			if(move_uploaded_file($_FILES['testFile']['tmp_name'], $testDir . $testFile_name) && ($myMember->update_test_by_field($myMember->fld_testAttachment, $testFile_name, $testNum)))
				$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!<br />Epreuve enregistr&eacute;e avec succ&egrave;s</div>";
		}
	}
?>

<?php /* +++++++++++++++++++++++++++++++++++++++++++++++++ VALIDATIONS PARENTS +++++++++++++++++++++++++++++++++++++++++++++++++ 
 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ ?>
<?php
//Parent Password Update	
	if(isset($_POST['btn_passwordUpdateParent'])){	
		
		$txt_oldPassword	=	trim($_POST['txt_oldPassword']);
		$txt_newPassword1	=	trim($_POST['txt_newPassword1']);
		$txt_newPassword2	=	trim($_POST['txt_newPassword2']);
		
		if(empty($txt_oldPassword) or empty($txt_newPassword1) or empty($txt_newPassword2))
			$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Votre mot de passe ne peut &ecirc;tre vide...</div>";
		elseif($txt_newPassword1 != $txt_newPassword2)
			$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Les nouveaux mots de passe ne concordent pas.</div>";
		elseif(sha1($txt_oldPassword) != $_SESSION['mPassword'])
			$msgDisplay		=	"<div class=\"boxErr\">Erreur!<br />L'ancien mot de passe n'est pas correct. Bien vouloir r&eacute;essayer.</div>";
		elseif($myMember->update_parent_password($_SESSION['mLogin'], sha1($txt_newPassword1))){ //$new_parentPassword)update_member_element($myMember->fld_memberParentPassword, sha1($txt_newPassword1), $_SESSION['mId'])){
			$_SESSION['mPassword']			=	sha1($txt_newPassword1);
			$_SESSION['PARENT_PASSWORD']	=	sha1($txt_newPassword1);
			$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!Vous avez pu bel et bien modifier votre mot de passe.<br />Vous pouvez d&egrave;s &agrave; pr&eacute;sent naviguer en toute securit&eacute; dans votre espace membre.</div>";
		}
	}

//Parent Request submission
if(isset($_POST['btn_reqInsertParent'])){
	
	$sel_reqCatId	=	$_POST['sel_reqCatId'];
	$txt_reqTitle	=	addslashes($_POST['txt_reqTitle']);
	$ta_reqMessage	=	addslashes($_POST['ta_reqMessage']);
	
	if(empty($txt_reqTitle) or empty($ta_reqMessage)){
		$err_reqInsert	=	true;
		$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Le titre et/ou le message ne doivent pas &ecirc;tre vides!</div>";
	}
	elseif($sel_reqCatId == '0'){
		$err_reqInsert	=	true;
		$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Vous devez choisir une categorie avant de continuer.</div>";
	}
	elseif($myMember->chk_entry_twice($myMember->tbl_request, $myMember->fld_requestTitle, $myMember->fld_memberId, $txt_reqTitle, $_SESSION['mId'])){
		$err_reqInsert	=	true;
		$msgDisplay	=	"<div class=\"boxErr\">Erreur!<br />Cette requ&ecirc;te a d&eacute;j&agrave; &eacute;t&eacute; envoy&eacute;e.</div>";
	}							  
	elseif($myMember->set_request($sel_reqCatId, $txt_reqTitle, $ta_reqMessage, '0', $_SESSION['PARENT_LOGIN'])){
		$err_reqInsert	=	false;
		$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!<br />Votre requ&ecirc;te a bien &eacute;t&eacute; soumise &agrave; la hierarchie.<br />Merci pour votre contribution.</div>";
	}
}
?>

<?php /* +++++++++++++++++++++++++++++++++++++++++++++++++ VALIDATIONS COUNCILORS +++++++++++++++++++++++++++++++++++++++++++++++++ 
 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */ ?>
<?php
if(isset($_POST['btn_orientationInsert'])){
		//Orientation Insert
		$sel_orientationCat			=	$_POST['sel_orientationCat'];
		$txt_orientationTitre		=	addslashes($_POST['txt_orientationTitre']);
		$ta_orientationDescription	=	addslashes($_POST['ta_orientationDescription']);
		$ta_orientationContent		=	addslashes($_POST['ta_orientationContent']);
		if(empty($txt_orientationTitre) || empty($ta_orientationDescription) || empty($ta_orientationContent)){
			$err_orientationInsert	=	true;
			$msgDisplay				=	"<div class=\"boxErr\">Erreur!<br />Les champs avec ast&eacute;rix sont obligatoires.</div>";
		}
		elseif($sel_orientationCat == ""){
			$err_orientationInsert	=	true;
			$msgDisplay				=	"<div class=\"boxErr\">Erreur!<br />Veuillez choisir une cat&eacute;gories.</div>";
		}
		elseif($myMember->chk_entry_trice($myMember->tbl_orientation, $myMember->fld_orientationLib, $myMember->fld_orientationDescription, $myMember->fld_orientationCatId, $txt_orientationTitre, $ta_orientationDescription, $sel_orientationCat)){
			$err_orientationInsert	=	true;
			$msgDisplay				=	"<div class=\"boxErr\">Erreur!<br />Article d&eacute;j&agrave; existant!</div>";
		}
		elseif($myMember->set_orientation($_SESSION['mId'], $sel_orientationCat, $txt_orientationTitre, $ta_orientationDescription, $ta_orientationContent)){
			$msgDisplay	=	"<div class=\"boxCfrm\">Bravo!<br />Article d'orientation enregistr&eacute; avec succ&egrave;s!</div>";
		}
	}
?>