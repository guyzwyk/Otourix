<?php
	$my_memberValidate		=	new cwd_otourix();
	$pageLog				=	"log/otourix.gzk";
?>

<?php 
	//Traitements Otourix ici
	
	/******************************** Chargement des membres ***********************************************/
	if(isset($_POST['btn_file_send_member'])){
		
		//Les fichiers
		$memberFile_name 	= 	$_FILES['memberFile']['name'];
		$memberFile_size 	= 	$_FILES['memberFile']['size'];
		
		$fileTarget			=	$system->log_get_datetime()."_".$memberFile_name;
		$fileOrig			= 	$myMember->dumpDirectory.$fileTarget;

		if(!isset($memberFile_name)){
			$file_uploadMsg 	= "<div class=\"ADM_err_msg\">Erreur :<br />Vous devez choisir un fichier valide! $memberFile_name</div>";
		}
		else{
			//Procedure de renommage du fichier :
			$fileExt	= $myMember->get_file_ext($memberFile_name);
			if(!in_array($fileExt, $myMember->dump_fileExt)){
				$file_uploadMsg 	= "<div class=\"ADM_err_msg\">Erreur!<br />Les fichiers de type $fileExt ne sont pas accept&eacute;s</div>";
			}
			//elseif(move_uploaded_file($_FILES[contactFile]['tmp_name'], $fileOrig)){
			elseif(move_uploaded_file($_FILES['memberFile']['tmp_name'], $fileOrig)){
				$_SESSION['file_orig']	=	urlencode($fileOrig);
				$_SESSION['fileTarget']	=	urlencode($fileTarget);
				$file_uploadMsg = "<div class=\"ADM_cfrm_msg\"><p>Fichier membre envoy&eacute; avec succ&egrave;s!</p><p><a href=\"otourix-loaddata-members;".$_SESSION['fileTarget']."$thewu32_appExt\">Charger le fichier dans la base des donn&eacute;es</a></p></div>";
				$system->set_log('MEMBER FILE UPLOADED - ('.$fileTarget.')');
			}
			else{
				$file_uploadMsg 	= "<div class=\"ADM_err_msg\">Impossible d'envoyer le fichier membre</div>";
			}
		}
	}

    /******************************** Chargement des classes ***********************************************/
	if(isset($_POST['btn_file_send_classes'])){

		//Les fichiers
		$classesFile_name 			= 	$_FILES['classesFile']['name'];
		$classesFile_size 			= 	$_FILES['classesFile']['size'];

		$fileTarget						=	$system->log_get_datetime()."_".$classesFile_name;
		$fileOrig						= 	$myMember->dumpDirectory.$fileTarget;

		if(!isset($classesFile_name)){
			$file_uploadMsg_classes 	= "<div class=\"ADM_err_msg\">Erreur :<br />Vous devez choisir un fichier valide! $classesFile_name </div>";
		}
		else{
			//Procedure de renommage du fichier :
			$fileExt	= $myMember->get_file_ext($classesFile_name);
			if(!in_array($fileExt, $myMember->dump_fileExt)){
				$file_uploadMsg_classes 	= "<div class=\"ADM_err_msg\">Erreur!<br />Les fichiers de type $fileExt ne sont pas accept&eacute;s</div>";
			}
			//elseif(move_uploaded_file($_FILES[contactFile]['tmp_name'], $fileOrig)){
			elseif(move_uploaded_file($_FILES['classesFile']['tmp_name'], $fileOrig)){
				$_SESSION['file_orig']	=	urlencode($fileOrig);
				$_SESSION['fileTarget']	=	urlencode($fileTarget);
				$file_uploadMsg_classes = "<div class=\"ADM_cfrm_msg\"><p>Fichier des classees upload&eacute; avec succ&egrave;s</p><p><a href=\"otourix-loaddata-classes;".$_SESSION['fileTarget']."$thewu32_appExt\">Cliquez ici pour charger les donn&eacute;es et terminer le processus.</a></p></div>";
				$system->set_log('CLASSES FILE UPLOADED - ('.$fileTarget.')');
			}
			else{
				$file_uploadMsg_classes	= "<div class=\"ADM_err_msg\">".$mod_lang_output['OTOURIX_FILE_CANNOT_GO']."</div>";

			}
		}
	}

    /******************************** Chargement des matieres ***********************************************/
	if(isset($_POST['btn_file_send_courses'])){

		//Les fichiers
		$coursesFile_name 			= 	$_FILES['coursesFile']['name'];
		$coursesFile_size 			= 	$_FILES['coursesFile']['size'];

		$fileTarget						=	$system->log_get_datetime()."_".$coursesFile_name;
		$fileOrig						= 	$myMember->dumpDirectory.$fileTarget;

		if(!isset($coursesFile_name)){
			$file_uploadMsg_courses 	= "<div class=\"ADM_err_msg\">Erreur :<br />Vous devez choisir un fichier valide! $coursesFile_name </div>";
		}
		else{
			//Procedure de renommage du fichier :
			$fileExt	= $myMember->get_file_ext($coursesFile_name);
			if(!in_array($fileExt, $myMember->dump_fileExt)){
				$file_uploadMsg_courses 	= "<div class=\"ADM_err_msg\">Erreur!<br />Les fichiers de type $fileExt ne sont pas accept&eacute;s</div>";
			}
			//elseif(move_uploaded_file($_FILES[contactFile]['tmp_name'], $fileOrig)){
			elseif(move_uploaded_file($_FILES['coursesFile']['tmp_name'], $fileOrig)){
				$_SESSION['file_orig']	=	urlencode($fileOrig);
				$_SESSION['fileTarget']	=	urlencode($fileTarget);
				$file_uploadMsg_courses = "<div class=\"ADM_cfrm_msg\"><p>Fichier des mati&egrave;res upload&eacute;es avec succ&egrave;s</p><p><a href=\"otourix-loaddata-courses;".$_SESSION['fileTarget']."$thewu32_appExt\">Cliquez ici pour charger les donn&eacute;es et terminer le processus.</a></p></div>";
				$system->set_log('COURSES FILE UPLOADED - ('.$fileTarget.')');
			}
			else{
				$file_uploadMsg_courses	= "<div class=\"ADM_err_msg\">".$mod_lang_output['OTOURIX_FILE_CANNOT_GO']."</div>";

			}
		}
	}
	
	/******************************** Chargement des ecolages ***********************************************/
	if(isset($_POST['btn_file_send_scholarship'])){
		
		//Les fichiers
		$scholarshipFile_name 			= 	$_FILES['scholarshipFile']['name'];
		$scholarshipFile_size 			= 	$_FILES['scholarshipFile']['size'];

		$fileTarget						=	$system->log_get_datetime()."_".$scholarshipFile_name;
		$fileOrig						= 	$myMember->dumpDirectory.$fileTarget;

		if(!isset($scholarshipFile_name)){
			$file_uploadMsg_scholarship 	= "<div class=\"ADM_err_msg\">Erreur :<br />Vous devez choisir un fichier valide! $scholarshipFile_name </div>";
		}
		else{
			//Procedure de renommage du fichier :
			$fileExt	= $myMember->get_file_ext($scholarshipFile_name);
			if(!in_array($fileExt, $myMember->dump_fileExt)){
				$file_uploadMsg_scholarship 	= "<div class=\"ADM_err_msg\">Erreur!<br />Les fichiers de type $fileExt ne sont pas accept&eacute;s</div>";
			}
			//elseif(move_uploaded_file($_FILES[contactFile]['tmp_name'], $fileOrig)){
			elseif(move_uploaded_file($_FILES['scholarshipFile']['tmp_name'], $fileOrig)){
				$_SESSION['file_orig']	=	urlencode($fileOrig);
				$_SESSION['fileTarget']	=	urlencode($fileTarget);
				$file_uploadMsg_scholarship = "<div class=\"ADM_cfrm_msg\"><p>Fichier des frais de scolarit&eacute;s upload&eacute;es avec succ&egrave;s</p><p><a href=\"otourix-load-tuitionsload;".$_SESSION['fileTarget']."$thewu32_appExt\">Cliquez ici pour charger les donn&eacute;es et terminer le processus.</a></p></div>";
				$system->set_log('TUITION FEE FILE UPLOADED - ('.$fileTarget.')');
			}
			else{
				$file_uploadMsg_scholarship	= "<div class=\"ADM_err_msg\">".$mod_lang_output['OTOURIX_FILE_CANNOT_GO']."</div>";
				
			}	
		}
	}
	
	/******************************** Chargement des notes ***********************************************/	
	if(isset($_POST['btn_file_send_note'])){

		//Les fichiers
		$noteFile_name 			= 	$_FILES['noteFile']['name'];
		$noteFile_size 			= 	$_FILES['noteFile']['size'];
		
		$fileTarget			=	$system->log_get_datetime()."_".$noteFile_name;
		$fileOrig			= 	$myMember->dumpDirectory.$fileTarget;

		if(!isset($noteFile_name)){
			$file_uploadMsg_note 	= "<div class=\"ADM_err_msg\">Erreur :<br />Vous devez choisir un fichier de notes valide! $noteFile_name</div>";
		}
		else{
			//Procedure de renommage du fichier :
			$fileExt	= $myMember->get_file_ext($noteFile_name);
			if(!in_array($fileExt, $myMember->dump_fileExt)){
				$file_uploadMsg_note 	= "<div class=\"ADM_err_msg\">Erreur!<br />Les fichiers de type $fileExt ne sont pas accept&eacute;s</div>";
			}
			//elseif(move_uploaded_file($_FILES[contactFile]['tmp_name'], $fileOrig)){
			elseif(move_uploaded_file($_FILES['noteFile']['tmp_name'], $fileOrig)){
				$_SESSION['file_orig']	=	urlencode($fileOrig);
				$_SESSION['fileTarget']	=	urlencode($fileTarget);
				$file_uploadMsg_note = "<div class=\"ADM_cfrm_msg\"><p>Fichier envoy&eacute; avec succ&egrave;s!</p><p><a href=\"otourix-load-marksload;".$_SESSION['fileTarget']."$thewu32_appExt\">Charger le fichier dans la base des donn&eacute;es et terminer le processus</a></p></div>";
				$system->set_log('NOTES FILE UPLOADED - ('.$fileTarget.')');
			}
			else{
				$file_uploadMsg_note	= "<div class=\"ADM_err_msg\">Impossible d'envoyer le fichier</div>";
			}
		}
	}
	
	/******************************** Ajouter un membre ***********************************************/	
	if(isset($_POST['btn_memberInsert'])){
		
		$sel_memberType		=	$_POST['sel_memberType'];
		$sel_memberClass	=	$_POST['sel_memberClass'];
		$txt_memberName		=	$_POST['txt_memberName'];
		$txt_memberLogin	=	$_POST['txt_memberLogin'];
		$txt_memberPass1	=	$_POST['txt_memberPass1'];
		$txt_memberPass2	=	$_POST['txt_memberPass2'];
		$txt_memberTel		=	$_POST['txt_memberTel'];

		if(empty($txt_memberName) || empty($txt_memberLogin) || empty($txt_memberPass1))
			$member_insert_err_msg	=	"Erreur!<br />Les champs avec ast&eacute;risques sont obligatoires";
		elseif($txt_memberPass1 != $txt_memberPass2)
			$member_insert_err_msg	=	"Erreur!<br />Les mots de passe doivent &ecirc;tre identiques";
		elseif($myMember->chk_entry($myMember->tbl_member, $myMember->fld_memberName, $txt_memberName) || $myMember->chk_entry($myMember->tbl_member, $myMember->fld_memberLogin, $txt_memberLogin))
			$member_insert_err_msg	=	"Erreur!<br />Le code membre ou le nom existe d&eacute;j&agrave; dans notre syst&egrave;me.";
		elseif(($sel_memberType != '3') && ($sel_memberClass != '0'))
			$member_insert_err_msg	=	"Erreur!<br />Vous ne pouvez renseigner les classes que pour les membres de type <em>'&Eacute;l&egrave;ve'</em>";
		elseif($myMember->admin_set_member($txt_memberName, $sel_memberType, $txt_memberLogin, trim($txt_memberPass1), $sel_memberClass, $txt_memberTel, '0')){
			$member_insert_cfrm_msg	=	"Bravo!<br />Vous avez pu ins&eacute;rer un membre avec succ&egrave;s dans notre syst&egrave;me!<br /><a href=\"?what=memberDisplay\">Cliquez ici</a> pour afficher la liste des membres ou remplissez le formulaire pour en ajouter d'autres.";
			$system->set_log('OTOURIX MEMBER CREATED - ('.$txt_memberName.')');
		}
		
	}

    /******************************** Ajouter une classe ***********************************************/
    if(isset($_POST['btn_classInsert'])){
        $new_classCode      =   $_POST['txt_classIdInsert'];
        $new_className      =   $_POST['txt_classNameInsert'];
        $new_classLevel     =   $_POST['sel_classLevelInsert'];

        if(empty($new_classCode) || empty($new_className)){
            $classes_display_err_msg =   "Erreur!<br />Vous devez specifier un code <strong>et</strong> un nom valides pour la classe";
        }
        else{
            //$new_classCode  =   trim(strtoupper($new_classCode));
            $new_className  =   ucfirst($new_className);

            //If course exists
            if($myMember->chk_otourix_classes($new_classCode, $new_className)) $classes_display_err_msg = "Erreur!<br />Cette classe existe d&eacute;j&egrave;. BV proposer une autre.";
            else{
                if($myMember->set_otourix_classes($new_classCode, $new_className, $new_classLevel)) {
                    $classes_display_cfrm_msg    =   "Bravo.<br />Classe ajout&eacute;e avec succ&egrave;s";
                    $system->set_log("CLASS '{$new_className}' SUCCESSFULY CREATED");
                }
                /*else{
                    $courses_display_err_msg    =   "Erreur.<br />Impossible d'ajouter la mati&egrave;re {$new_courseName}";
                    $system->set_log("ERROR WHILE TRYING TO CREATE A NEW COURSE : '{$new_courseName}'");
                }*/
            }
        }
    }
    /******************************** Ajouter une matiere ***********************************************/
    if(isset($_POST['btn_courseInsert'])){
        $new_courseCode     =   $_POST['txt_courseIdInsert'];
        $new_courseName     =   $_POST['txt_courseNameInsert'];

        if(empty($new_courseCode) || empty($new_courseName)){
            $courses_display_err_msg =   "Erreur!<br />Vous devez specifier un code <strong>et</strong> un nom pour la mati&egrave;re";
        }
        else{
            $new_courseCode = trim(strtoupper($new_courseCode));
            $new_courseName =   ucfirst($new_courseName);

            //If course exists
            if($myMember->chk_otourix_course($new_courseCode, $new_courseName)) $courses_display_err_msg = "Erreur!<br />Cette mati&egrave;re existe d&eacute;j&egrave;. Bv proposer une autre.";
            else{
                if($myMember->set_otourix_course($new_courseCode, $new_courseName)) {
                    $courses_display_cfrm_msg    =   "Bravo.<br />Mati&egrave;re ajout&eacute;e avec succ&egrave;s";
                    $system->set_log("COURSE '{$new_courseName}' SUCCESSFULY CREATED");
                }
                /*else{
                    $courses_display_err_msg    =   "Erreur.<br />Impossible d'ajouter la mati&egrave;re {$new_courseName}";
                    $system->set_log("ERROR WHILE TRYING TO CREATE A NEW COURSE : '{$new_courseName}'");
                }*/
            }
        }
    }
    /******************************** Ajouter une matiere enseignee ***********************************************/
    if(isset($_POST['btn_teachingsInsert'])){
        $new_teacherLogin   =   $_POST['sel_teacherTeachings'];
        $newClass           =   $_POST['sel_classTeachings'];
        $newCourse          =   $_POST['sel_courseTeachings'];
        if($new_teacherLogin == '' OR $newClass == '' OR $newCourse == ''){
            $teachings_display_err_msg	=	"D&eacute;sol&eacute;!<br />Impossible d'enregistrer la mati&egrave;re enseigne&eacute;e!<br />Bien vouloir selectionner les informations adequates!";
			$system->set_log('ERROR IN OTOURIX COURSE AND CLASS ASSIGNATION - ('.$new_teacherLogin.')');
        }
        elseif($myMember->chk_otourix_teachings($new_teacherLogin, $newClass, $newCourse)){
            $teachings_display_err_msg	=	"D&eacute;sol&eacute;!<br />Mati&egrave;re enseign&eacute;e d&eacute;j&agrave; attribu&eacute;e!<br />";
        }
        elseif($myMember->set_teachings($newCourse, $newClass, $new_teacherLogin)){
            $teachings_display_cfrm_msg	=	"Bravo!<br />Vous enregistr&eacute; une nouvelle mati&egrave;re enseign&eacute;e avec succ&egrave;s!<br />";
			$system->set_log('OTOURIX COURSE AND CLASS ASSIGNED TO A TEACHER - ('.$new_teacherLogin.')');
        }
        else{
            $teachings_display_err_msg	=	"D&eacute;sol&eacute;!<br />Impossible d'enregistrer la mati&egrave;re enseigne&eacute;e car deja existante!<br />";
			$system->set_log('ERROR IN OTOURIX COURSE AND CLASS ALREADY EXISTS - ('.$new_teacherLogin.')');
        }
    }

	/******************************** Modifier un membre ***********************************************/
	if(isset($_POST['btn_memberUpdate'])){

		$hd_memberId			=	$_POST['hd_memberId'];
		$sel_memberTypeUpd		=	$_POST['sel_memberTypeUpd'];
		$sel_memberClassUpd		=	$_POST['sel_memberClassUpd'];
		$txt_memberNameUpd		=	$_POST['txt_memberNameUpd'];
		$txt_memberLoginUpd		=	$_POST['txt_memberLoginUpd'];
		$txt_memberPassUpd		=	$_POST['txt_memberPassUpd'];
		$txt_memberTelUpd		=	$_POST['txt_memberTelUpd'];

		if(empty($txt_memberNameUpd) || empty($txt_memberLoginUpd))
			$member_update_err_msg	=	"Erreur!<br />Les champs avec ast&eacute;risques sont obligatoires";
		/* elseif($myMember->chk_entry($myMember->tbl_member, $myMember->fld_memberName, $txt_memberNameUpd) || $myMember->chk_entry($myMember->tbl_member, $myMember->fld_memberLogin, $txt_memberLoginUpd))
			$member_update_err_msg	=	"Erreur!<br />Le code membre ou le nom existe d&eacute;j&agrave; dans notre syst&egrave;me."; */
		elseif(($sel_memberTypeUpd != '3') && ($sel_memberClassUpd != '0'))
			$member_update_err_msg	=	"Erreur!<br />Vous ne pouvez renseigner les classes que pour les membres de type <em>'&Eacute;l&egrave;ve'</em>";
		elseif($myMember->update_member($hd_memberId, $sel_memberTypeUpd, $sel_memberClassUpd, $txt_memberNameUpd, $txt_memberLoginUpd, $txt_memberTelUpd)){
			if(!empty($txt_memberPassUpd))
					$myMember->update_member_element($myMember->fld_memberPass, sha1(trim($txt_memberPassUpd)), $hd_memberId); //Update the password if necessary
			$member_update_cfrm_msg	=	"Bravo!<br />Vous avez pu mettre &agrave; jour les informations sur le membre avec succ&egrave;s dans notre syst&egrave;me!<br /><a href=\"otourix-read.html\">Cliquez ici</a> pour afficher la liste des membres.";
			$system->set_log('OTOURIX MEMBER UPDATED - ('.$txt_memberNameUpd.')');
		}
	}
	
	/******************************** Reinitialiser le mot de passe d'un membre ***********************************************/
	if (isset($_POST['btn_passwordIni'])){

		$hd_passwordIni		=	$_POST['hd_passwordIni'];
		$memberInfo	= $myMember->get_member($hd_passwordIni);
		if($myMember->password_ini($hd_passwordIni)){
			$action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mot de passe de ".ucfirst($memberInfo['m_NAME'])." r&eacute;initialis&eacute; avec succ&egrave;s</div>";
			$system->set_log('OTOURIX MEMBER PASSWORD REINITIALIZED - ('.ucfirst($memberInfo['m_NAME']).')');
		}
	}

    /******************************** Reinitialiser le mot de passe d'un membre ***********************************************/
    if(isset($_POST['btn_schoolSettingsUpdate'])){

        $selPeriod  =   $_POST['sel_schoolSettingsPeriodUpdate'];
        $selSession =   $_POST['sel_schoolSettingsSessionUpdate'];

        if($myMember->update_otourix_webmarks_settings($selPeriod, $selSession)){
            $session_stateName  =   (($selSession    ==  '1')    ?   ('Activ&eacute;e')  :   ('D&eacute;sactiv&eacute;e'));
            $member_display_cfrm_msg	=	"R&egrave;glages mis &agrave; jour avec succ&egrave;s :<br />Periode activ&eacute;e : ".$myMember->get_period_by_id($selPeriod)." <br /> Etat de la session : $session_stateName";
			$system->set_log('OTOURIX WEB SETTINGS UPDATED :: S&eacute;quence activ&eacute;= '.$selPeriod.' Etat : '.$selSession);
        }
    }

    /******************************** Modifier une mati�re ***********************************************/
   if(isset($_POST['btn_courseUpdate'])){
       $oldCode             =   $_POST['hd_oldCourseId'];
       $newCode             =   $_POST['txt_courseIdUpd'];
       $selected_courseId   =   (($newCode != '')) ? ($newCode) : ($oldCode);
       //$new_courseId        =   $_POST['txt_courseIdUpd'];
       $new_courseName      =   $_POST['txt_courseNameUpd'];
       //$old_courseId        =
       if($myMember->update_otourix_course($oldCode, $selected_courseId, $new_courseName)){
           $courses_display_cfrm_msg    =   'Matiere mise &agrave; jour avec succ&egrave;s';
           //print "Old code is '{$oldCode}', New code is '{$newCode}', Selected code is '{$selected_courseId}'";
           $system->set_log('OTOURIX SETTINGS UPDATED :: Mati&egrave;re '.$selected_courseId.'('.$new_courseName.') mise &agrave; jour avec succ&egrave; '.$selSession);
       }
   }

   /******************************** Modifier une classe ***********************************************/
   if(isset($_POST['btn_classUpdate'])){
       $oldCode             =   $_POST['hd_oldClassId'];
       $newCode             =   $_POST['txt_classIdUpd'];
       $selected_classId    =   (($newCode != '')) ? ($newCode) : ($oldCode);

       //$new_classId         =   ;
       $new_className       =   $_POST['txt_classNameUpd'];
       $new_classLevel      =   $_POST['sel_classLevelUpd'];
       if($myMember->update_otourix_classes($oldCode, $selected_classId, $new_className, $new_classLevel)){
           $classes_display_cfrm_msg    =   'Classe mise &agrave; jour avec succ&egrave;s.';
           $system->set_log('OTOURIX SETTINGS UPDATED :: Classe '.$selected_classId.'('.$new_className.') mise &agrave; jour avec succ&egrave; '.$selSession);
       }
   }

    /******************************** Modifier une matiere enseignee ***********************************************/
   /* if(isset($_POST['btn_teachingsUpdate'])){
       print "Toto teachings";
       $selected_teachingsId    =   $_POST['hd_teachingsId'];
       $new_classId             =   $_POST['sel_classUpd'];
       $new_courseId            =   $_POST['sel_courseUpd'];
       $new_teacherLogin        =   $_POST['hd_teacherLogin'];
       if($myMember->update_otourix_teachings($selected_teachingsId, $new_classId, $new_courseId, $new_teacherLogin)){
           $teachings_display_cfrm_msg    =   'Mati&egrave;re enseign&eacute;e mise &agrave; jour avec succ&egrave;s.';
           $system->set_log('OTOURIX TEACHINGS UPDATED :: Mati&egrave;re enseign&eacute;e '.$selected_teachingsId.'('.$new_className.') mise &agrave; jour avec succ&egrave; '.$selSession);
       }
       else{
            $teachings_display_cfrm_msg    =   'Mati&egrave;re enseign&eacute;e mise &agrave; jour avec succ&egrave;s.';
            $system->set_log('OTOURIX TEACHINGS UPDATE ERROR :: Mati&egrave;re enseign&eacute;e '.$selected_teachingsId.'('.$new_className.') Erreur de mise &agrave; jour avec des mati&egrave;res enseign&eacute;es '.$selSession);
       }
   } */

   if(isset($_POST['btn_teachingsUpdate'])){
		//print "Toto teachings";
		$selected_teachingsId    =   $_POST['hd_teachingsId'];
		$new_classId             =   $_POST['sel_classUpd'];
		$new_courseId            =   $_POST['sel_courseUpd'];
		$new_teacherLogin        =   $_POST['hd_teacherLogin'];
		if($myMember->chk_entry_twice($myMember->tbl_)){

		}
		elseif($myMember->update_otourix_teachings($selected_teachingsId, $new_classId, $new_courseId, $new_teacherLogin)){
			$teachings_display_cfrm_msg    =   'Mati&egrave;re enseign&eacute;e mise &agrave; jour avec succ&egrave;s.';
			$system->set_log('OTOURIX TEACHINGS UPDATED :: Mati&egrave;re enseign&eacute;e '.$selected_teachingsId.'('.$new_className.') mise &agrave; jour avec succ&egrave; '.$selSession);
		}
		else{
			$teachings_display_cfrm_msg    =   'Mati&egrave;re enseign&eacute;e mise &agrave; jour avec succ&egrave;s.';
			$system->set_log('OTOURIX TEACHINGS UPDATE ERROR :: Mati&egrave;re enseign&eacute;e '.$selected_teachingsId.'('.$new_className.') Erreur de mise &agrave; jour avec des mati&egrave;res enseign&eacute;es '.$selSession);
		}
	}



?>

<?php



	if($_REQUEST['what']	==	'read'){
		switch($_REQUEST['action']){
			case	'delete'			:	if($myMember->del_member($_REQUEST['dgtId'])) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Bravo<br />Le membre a &eacute;t&eacute; supprim&eacute; avec succ&egrave;s!</div>"; }
			break;
			case	'activate'			:	if($myMember->set_member_state($_REQUEST['dgtId'], '1')) { $memberInfo = $myMember->get_member($_REQUEST['dgtId']); $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Bravo<br />Le vous venez d'activer le compte membre de ".$memberInfo['m_NAME']." avec succ&egrave;s!</div>"; }
			break;
			case	'deactivate'		:	if($myMember->set_member_state($_REQUEST['dgtId'], '0')) { $memberInfo = $myMember->get_member($_REQUEST['dgtId']); $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Bravo<br />Le vous venez de d&eacute;sactiver le compte membre de ".$memberInfo['m_NAME']." avec succ&egrave;s!</div>"; }
			break;
			case	'disconnect'		:	if($myMember->set_connected_member($_REQUEST['dgtId'], '0'))	$action_modal_msgOk	=	"<div class=\"ADM_cfrm_msg\">Utilisateur d&eacute;connect&eacute; avec succ&egrave;s...</div>";
			break;
		}
	}
	elseif($_REQUEST['what']	==	'requestsread'){
		switch($_REQUEST['action']){
			case	'delete'			:	if($myMember->del_request($_REQUEST['dgtId'])) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Bravo<br />La requ&ecirc;te a &eacute;t&eacute; supprim&eacute;e avec succ&egrave;s!</div>"; }
			break;
			case	'show'				:	if($myMember->set_request_state($_REQUEST['dgtId'], '1')) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Bravo<br />La requ&ecirc;te est d&eacute;sormais marqu&eacute;e comme &laquo; En traitement... &raquo;</div>"; }
			break;
			case	'hide'				:	if($myMember->set_request_state($_REQUEST['dgtId'], '3')) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Bravo<br />La requ&ecirc;te est d&eacute;sormais marqu&eacute;e comme &laquo; Trait&eacute;e... &raquo;</div>"; }
			break;
		}
	}
	elseif($_REQUEST['what']	==	'update'){
		switch($_REQUEST['action']){
			case	'update'			:	$memberInfo	=	$myMember->get_member($_REQUEST['dgtId']);
			break;
		}
	}
	elseif($_REQUEST['what']	==	'loaddata'){
		switch($_REQUEST['action']){
			case	'members'		:	if($arr_totalMember = $myMember->csv_dump_members(urldecode($_REQUEST['dumpFile']))) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">".$arr_totalMember[0] ."/". ($arr_totalMember[0]+$arr_totalMember[1]) ." membres effectivement import&eacute;s dans le syst&egrave;me.<br /><a href=\"".$system->dgt_set_admin_link_module('otourix')."\">Afficher les membres</a></div>"; $system->set_log('OTOURIX MEMBER FILE DUMPED SUCCESSFULLY - ('.urldecode($_REQUEST['dumpFile']).')');} else{$file_dumpMsg="<div class=\"ADM_err_msg\">Erreur lors de l'importation des donn&eacute;es dans le syst&egrave;me</div>"; $system->set_log('OTOURIX MEMBER FILE DUMP ERROR - ('.urldecode($_REQUEST['dumpFile']).')');}
			break;
			case	'tuitions'		:	if($totalScholarship = $myMember->csv_dump_tuitions(urldecode($_REQUEST['dumpFile']))) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">$totalScholarship enregistrements effectivement import&eacute;s dans le syst&egrave;me.<br /><a href=\"".$system->dgt_set_admin_link_module('otourix', 'tuitionsread')."\">Afficher le donn&eacute;es d'ecolages</a></div>"; $system->set_log('OTOURIX TUITION FEES FILE DUMPED SUCCESSFULLY - ('.urldecode($_REQUEST['dumpFile']).')');} else{$file_dumpMsg_scholarship="<div class=\"ADM_err_msg\">Erreur lors de l'importation des donn&eacute;es d'&eacute;colage dans le syst&egrave;me</div>"; $system->set_log('OTOURIX TUITION FEE DUMP ERROR - ('.urldecode($_REQUEST['dumpFile']).')');}
			break;
			case 	'marks'			:	if($totalNote = $myMember->csv_dump_marks(urldecode($_REQUEST['dumpFile']))) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">$totalNote notes effectivement import&eacute;s dans le syst&egrave;me.<br /><a href=\"".$system->dgt_set_admin_link_module('otourix', 'marksread')."\">Afficher les notes</a></div>"; $system->set_log('OTOURIX SCHOOL NOTES DUMPED SUCCESSFULLY - ('.urldecode($_REQUEST['dumpFile']).')');} else{$file_dumpMsg_note="<div class=\"ADM_err_msg\">Erreur lors de l'importation des donn&eacute;es de notes dans le syst&egrave;me</div>"; $system->set_log('OTOURIX SCHOOL NOTES DUMP ERROR - ('.urldecode($_REQUEST['dumpFile']).')');}
			break;
            case    'classes'       :   if($totalClasses = $myMember->csv_dump_classes(urldecode($_REQUEST['dumpFile']))) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">$totalClasses classes effectivement import&eacute;s dans le syst&egrave;me.<br /><a href=\"".$system->dgt_set_admin_link_module('otourix', 'classes')."\">Afficher les classes</a></div>"; $system->set_log('OTOURIX CLASSES DUMPED SUCCESSFULLY - ('.urldecode($_REQUEST['dumpFile']).')');} else{$file_dumpMsg_classes="<div class=\"ADM_err_msg\">Erreur lors de l'importation des donn&eacute;es des classes dans le syst&egrave;me</div>"; $system->set_log('OTOURIX CLASSES DUMP ERROR - ('.urldecode($_REQUEST['dumpFile']).')');}
            break;
            case    'courses'       :   if($totalCourses = $myMember->csv_dump_courses(urldecode($_REQUEST['dumpFile']))) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">$totalCourses mati&egrave;res effectivement import&eacute;s dans le syst&egrave;me.<br /><a href=\"".$system->dgt_set_admin_link_module('otourix', 'courses')."\">Afficher les mati&egrave;res</a></div>"; $system->set_log('OTOURIX COURSES DUMPED SUCCESSFULLY - ('.urldecode($_REQUEST['dumpFile']).')');} else{$file_dumpMsg_courses="<div class=\"ADM_err_msg\">Erreur lors de l'importation des donn&eacute;es des mati&egrave;res dans le syst&egrave;me</div>"; $system->set_log('OTOURIX COURSES DUMP ERROR - ('.urldecode($_REQUEST['dumpFile']).')');}
            break;
            case    'teachings'     :   continue;
            break;
		}
	}
    elseif($_REQUEST['what'] == 'flushdata'){
        switch($_REQUEST['action']){
            case 'members'      :   if($myMember->empty_otourix_members()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des membres a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX MEMBER EMPTY OK'); } else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des membres n' a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX MEMBER FLUSH ERROR');}
            break;
            case 'classes'      :   if($myMember->empty_otourix_classes()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des classes a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX CLASSES EMPTY OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des classes n'a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX CLASSES FLUSH ERROR');}
            break;
            case 'courses'      :   if($myMember->empty_otourix_courses()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des mati&egrave;res a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX COURSES EMPTY OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des &eacute;colages n'a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX TUITION FEES FLUSH ERROR');}
            break;
            case 'teachings'    :   continue;
            break;
            case 'tuitions'     :   if($myMember->empty_otourix_tuitions()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des &eacute;colages a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX TUITION FEES EMPTY OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des &eacute;colages n'a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX TUITION FEES FLUSH ERROR');}
            break;
            case 'marks'        :   if($myMember->empty_otourix_marks()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des notes a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX SCHOOL NOTES EMPTY OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des notes n'a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX SCHOOL NOTES FLUSH ERROR');}
            break;
            case 'marksheets'   :   if($myMember->flush_otourix_marksheets($_REQUEST['dgtId'])){ $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des feuilles de notes a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX SCHOOL MARKSHEETS FLUSH OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des feuilles de notes n'a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX SCHOOL MARKSHEETS FLUSH ERROR');}
            break;
        }
    }
	/*elseif($_REQUEST['what']	==	'flush'){
		switch($_REQUEST['action']){
			case	'membersflush'		:	if($myMember->empty_otourix_members()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des membres a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s</div>"; $system->set_log('OTOURIX MEMBER EMPTY OK'); } else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des membres n' a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX MEMBER FLUSH ERROR');}
			break;
			case 	'tuitionsflush'		:	if($myMember->empty_otourix_tuitions()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des &eacute;colages a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s</div>"; $system->set_log('OTOURIX TUITION FEES EMPTY OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des &eacute;colages n' a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX TUITION FEES FLUSH ERROR');}
			break;
			case 	'marksflush'		:	if($myMember->empty_otourix_marks()) { $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des notes a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s</div>"; $system->set_log('OTOURIX SCHOOL NOTES EMPTY OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des notes n' a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX SCHOOL NOTES FLUSH ERROR');}
			break;
            case    'marksheetsflush'   :   if($myMember->flush_otourix_marksheets($_REQUEST['dgtId'])){ $empty_data_msg = "<div class=\"ADM_cfrm_msg\">La table des feuilles de notes a &eacute;t&eacute; vid&eacute;e avec succ&egrave;s</div>"; $system->set_log('OTOURIX SCHOOL MARKSHEETS FLUSH OK');} else { $empty_data_msg = "<div class=\"ADM_err_msg\">La table des feuilles de notes n'a pas pu &ecirc;tre vid&eacute;e</div>"; $system->set_log('OTOURIX SCHOOL MARKSHEETS FLUSH ERROR');}
            break;
		}
	}*/
    elseif($_REQUEST['what']    ==  'marksheetsread'){
        switch($_REQUEST['action']){
            case    'delete'            :   if($myOtourix->cascadel_marks($_REQUEST['dgtId'])){ $member_display_cfrm_msg =   "Feuille de notes et notes supprim&eacute;es avec succ&egrave;s."; $system->set_log('MARKSHEETS AND CORRESPONDING MARKS SUCCESSFULY DELETED');  }  else{   $member_display_err_msg =   "Erreur lors de la suppression en cascade des feuilles de notes et des notes concern&eacute;es"; $system->set_log('MARKSHEETS AND CORRESPONDING MARKS DELETION FAILED');   }
            break;
        }
    }
    /*elseif($_REQUEST['what']    ==  'export'){
        switch($_REQUEST['action']){
            case    'msexport'          :   $arr_markSheet  =   $myMember->get_marksheet_by_id($_REQUEST['dgtId']);
                                            $msLib  =   $arr_markSheet['ms_LIB'];
                                            header('Content-Type:application/xls');
                                            header("Content-Disposition:attachment; filename=$msLib.xls");
                                            print $myMember->export_otourix_members('3');
                                            print "Exportation de la feuille de notes <strong>$msLib</strong>";
            break;
        }
    }*/

    if($_REQUEST['page']    ==  'export'){
        print "Page d'exportation ici";
    }

    if($_REQUEST['page'] == 'otourix'){
        if($_REQUEST['what']    ==  'courses'){
            switch($_REQUEST['action']){
                case    'hide'      :   if($myOtourix->switch_state_course($_REQUEST['dgtCatId'], 0)){ $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re otourix d&eacute;sactiv&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX COURSE SUCCESSFULLY DISABLED - ('.$_REQUEST['dgtCatId'].')');} else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la d&eacute;sactivation d'une mati&egrave;re Otourix</div>"; $system->set_log('OTOURIX COURSE DISABLING ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'show'      :   if($myOtourix->switch_state_course($_REQUEST['dgtCatId'], 1)){ $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re otourix activ&eacute;ee avec succ&egrave;s.</div>"; $system->set_log('OTOURIX COURSE SUCCESSFULLY ENABLED - ('.$_REQUEST['dgtCatId'].')');} else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de l'activation d'une mati&egrave;re Otourix</div>"; $system->set_log('OTOURIX COURSE ENABLING ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'delete'    :   if($myOtourix->delete_otourix_course($_REQUEST['dgtCatId'])) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re otourix supprim&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX COURSE SUCCESSFULLY DELETED - ('.$_REQUEST['dgtCatId'].')'); } else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la suppression d'une mati&egrave;re Otourix</div>"; $system->set_log('OTOURIX COURSE DELETION ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
            }
        }

        if($_REQUEST['what']    ==  'classes'){
            switch($_REQUEST['action']){
                case    'hide'      :   if($myOtourix->switch_state_classes($_REQUEST['dgtCatId'], 0)){ $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Classe otourix d&eacute;sactiv&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX CLASS SUCCESSFULLY DISABLED - ('.$_REQUEST['dgtCatId'].')');} else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la d&eacute;sactivation d'une classe Otourix</div>"; $system->set_log('OTOURIX CLASS DISABLING ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'show'      :   if($myOtourix->switch_state_classes($_REQUEST['dgtCatId'], 1)){ $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Classe otourix activ&eacute;ee avec succ&egrave;s.</div>"; $system->set_log('OTOURIX CLASS SUCCESSFULLY ENABLED - ('.$_REQUEST['dgtCatId'].')');} else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de l'activation d'une classe Otourix</div>"; $system->set_log('OTOURIX CLASS ENABLING ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'delete'    :   if($myOtourix->delete_otourix_classes($_REQUEST['dgtCatId'])) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Classe otourix supprim&eacute;e avec succ&egrave;s.</div>"; $system->set_log('OTOURIX CLASS SUCCESSFULLY DELETED - ('.$_REQUEST['dgtCatId'].')'); } else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la suppression d'une classe Otourix</div>"; $system->set_log('OTOURIX CLASS DELETION ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
            }
        }

        if($_REQUEST['what']    ==  'teachings'){
            switch($_REQUEST['action']){
                case    'hide'      :   if($myOtourix->switch_state_teachings($_REQUEST['dgtCatId'], 0)){ $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re enseign&eacute;e d&eacute;sactiv&eacute;e avec succ&egrave;s.</div>"; $system->set_log('TEACHINGS SUCCESSFULLY DISABLED - ('.$_REQUEST['dgtCatId'].')');} else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la d&eacute;sactivation d'une mati&egrave;re enseign&eacute;e.</div>"; $system->set_log('OTOURIX TEACHING DISABLING ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'show'      :   if($myOtourix->switch_state_teachings($_REQUEST['dgtCatId'], 1)){ $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re enseign&eacute;e activ&eacute;ee avec succ&egrave;s.</div>"; $system->set_log('TEACHINGS SUCCESSFULLY ENABLED - ('.$_REQUEST['dgtCatId'].')');} else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de l'activation d'une mati&egrave;re enseign&eacute;e.</div>"; $system->set_log('OTOURIX TEACHING ENABLING ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'delete'    :   if($myOtourix->delete_otourix_teachings($_REQUEST['dgtCatId'])) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re enseign&eacute;e supprim&eacute;e avec succ&egrave;s.</div>"; $system->set_log('TEACHINGS SUCCESSFULLY DELETED - ('.$_REQUEST['dgtCatId'].')'); } else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la suppression d'une mati&egrave;re enseign&eacute;e.</div>"; $system->set_log('OTOURIX TEACHING DELETION ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
                case    'clear'   :   if($myOtourix->delete_otourix_teachings($_REQUEST['dgtCatId'])) { $action_msgOk	=	"<div class=\"ADM_cfrm_msg\">Mati&egrave;re enseign&eacute;e supprim&eacute;e avec succ&egrave;s.</div>"; $system->set_log('TEACHINGS SUCCESSFULLY DELETED2 - ('.$_REQUEST['dgtCatId'].')'); } else{$action_msgError="<div class=\"ADM_err_msg\">Erreur lors de la suppression d'une mati&egrave;re enseign&eacute;e.</div>"; $system->set_log('OTOURIX TEACHING DELETION2 ERROR - ('.$_REQUEST['dgtCatId'].')');};
                break;
            }
        }
    }




/******************************** Connexion des membres otourix ***********************************************/
//Validating App Connection.

if(isset($_POST['otourix_btnConnect'])){
	$otourix_txtLogin 		= 	trim($_POST['otourix_txtLogin']);
	$otourix_txtPass  		= 	trim($_POST['otourix_txtPass']);
	$pIdRedirect			= 	$myPage->get_home_by_lang($_SESSION['LANG']);
	if((!empty($otourix_txtLogin)) && (!empty($otourix_txtPass))){
		//Users/Administrators
		$tabUser 			= 	$my_userValidate->get_user_by_login($otourix_txtLogin);
		$tab_userDetail		=	$my_userValidate->get_user_detail($tabUser['u_ID']);
		
		//Members
		$tabMember			=	$my_memberValidate->get_member_by_login($otourix_txtLogin);
		
		$userHome			= 	'home-'.$pIdRedirect.'-front-0.html';
		$memberHome			=	'home-'.$pIdRedirect.'-front-0.html';
		
		//Connexion des admins
		if($system->chk_usr_pass_enc($my_userValidate->tbl_user, $my_userValidate->fld_userLogin, $my_userValidate->fld_userPass, $otourix_txtLogin, $otourix_txtPass)){
			$_SESSION['uId']				= 	$tabUser['u_ID'];
			$_SESSION['uLogin']				= 	$tabUser['u_LOGIN'];
			$_SESSION['uLevel']				=	$tabUser['u_TYPE'];
			$_SESSION['ud_Name']			= 	ucfirst($tab_userDetail['ud_FIRST']).' '.strtoupper($tab_userDetail['ud_LAST']);
			
			
			//$_SESSION['LANG']				= 	$_POST[selLang];
			switch($tabUser['u_TYPE']){
				case "1"	:	$_SESSION['CONNECTED_ADMIN']	=	true; $system->set_log('LOGIN ADMIN GRANTED - '.$otourix_txtLogin, $pageLog); /* $my_userValidate->set_connected_user($_SESSION['uId'], 1); */ header('location:'.$thewu32_site_url.$thewu32_admin_dir.'admin.php'); exit();
				break;
				case "2"	:	$_SESSION['CONNECTED_EDIT']		=	true; $system->set_log('LOGIN MEMBER GRANTED - '.$otourix_txtLogin, $pageLog);/* $my_userValidate->set_connected_user($_SESSION['uId'], 1); */ header('location:'.$thewu32_site_url.$thewu32_admin_dir.'admin.php'); exit();
			}
		}
		//Connexion des eleves, enseignants et conseillers
		elseif($system->chk_usr_pass_enc($my_memberValidate->tbl_member, $my_memberValidate->fld_memberLogin, $my_memberValidate->fld_memberPass, $otourix_txtLogin, $otourix_txtPass)){
			$_SESSION['mId']				= 	$tabMember['m_ID'];
			$_SESSION['mLogin']				= 	$tabMember['m_LOGIN'];
			$_SESSION['mPassword']			= 	$tabMember['m_PASSWORD'];
			$_SESSION['mLevel']				=	$tabMember['m_TYPE'];
			$_SESSION['mName']				= 	$tabMember['m_NAME'];
			$_SESSION['mClass']				= 	$tabMember['m_CLASSID'];
			
			
			//Connexion tracing for members(Students, teachers, councilors)...
			if($my_memberValidate->chk_entry($my_memberValidate->tbl_memberConnection, $my_memberValidate->fld_memberId, $tabMember['m_ID']))
				$my_memberValidate->otourix_update_connection_member($tabMember['m_ID'], 1);
			else 
				$my_memberValidate->otourix_set_connection($tabMember['m_ID'], '0');
			
			switch($tabMember['m_TYPE']){
				case "2"	:	$_SESSION['CONNECTED_COUNCILOR']	=	true;	$_SESSION['member']	=	'councilor'; /* $my_memberValidate->set_connected_member($_SESSION['mId'], 1); */ header('location:otourixweb/councilor.html');
				break;
				case "3"	:	$_SESSION['CONNECTED_STUDENT']		=	true;	$_SESSION['member']	=	'student'; /* $my_memberValidate->set_connected_member($_SESSION['mId'], 1); */ header('location:otourixweb/student.html');
				break;
				case "5"	:	$_SESSION['CONNECTED_TEACHER']		=	true;	$_SESSION['member']	=	'teacher'; /* $my_memberValidate->set_connected_member($_SESSION['mId'], 1); */ header('location:otourixweb/teacher.html');
				break;
				default		:	$_SESSION['CONNECTED_MEMBER']		=	true; /* $my_memberValidate->set_connected_member($_SESSION['mId'], 1); */ header('location:'.$memberHome);
			}
		}
		//Connexion des parents
		elseif($system->chk_usr_pass_enc($my_memberValidate->tbl_member, $my_memberValidate->fld_memberParent, $my_memberValidate->fld_memberParentPassword, $otourix_txtLogin, $otourix_txtPass)){
			//$_SESSION['mLevel']				=	$tabMember['m_TYPE'];
			$_SESSION['CONNECTED_PARENT']	=	true;
			$_SESSION['PARENT_LOGIN']		=	$otourix_txtLogin; //Correspondant au tel num
			$_SESSION['PARENT_PASSWORD']	=	sha1($otourix_txtPass);
			$_SESSION['mLogin']				=	$otourix_txtLogin;
			$_SESSION['mPassword']			=	sha1($otourix_txtPass);
			$_SESSION['member']				=	'parent';
			
			//Connection tracing for members(Parents)...
			//if($my_memberValidate->chk_entry($my_memberValidate->tbl_connection, $my_memberValidate->fld_memberParent, $otourix_txtLogin))
			if($my_memberValidate->chk_entry($my_memberValidate->tbl_memberConnection, 'member_parent', $otourix_txtLogin))
				$my_memberValidate->otourix_update_connection_parent($otourix_txtLogin, 1);
			else
				$my_memberValidate->otourix_set_connection('0', $otourix_txtLogin);
			
			header('location:otourixweb/parent.html');
			
			/* if($tabMember['m_TYPE'] == '4'){
				$_SESSION['CONNECTED_PARENT']	=	true;
				header('location:member/parent.php');
			} */
		}
		else
			$connectionMsg = "<div class=\"boxErr\">".$lang_output["LOGIN_PASS_FALSE"]."</div>";
	}
	else
		$connectionMsg 	= 	"<div class=\"boxErr\">".$lang_output["LOGIN_PASS_FALSE"]."</div>";	
}
?>