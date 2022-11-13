<?php
	class cwd_otourix extends cwd_system{
		var $tbl_member;
		var $tbl_memberClass;
		var $tbl_memberType;
		var $tbl_request;
		var $tbl_requestCat;
		var $tbl_requestState;
		var $tbl_scholarship;
		var $tbl_note;
		var $tbl_assignment;
		var $tbl_classes;
		var $tbl_period;
		var $tbl_course;
		var $tbl_classLevel;
		var $tbl_test;
		var $tbl_memberConnection;
		var $tbl_orientation;
		var $tbl_orientationCat;
        var $tbl_classesCoursesTeachers;
        var $tbl_teachings;
        var $tbl_markSheets;
        var $tbl_marksRegistration;
        var $tbl_marksSettings;
        var $tbl_memberPix;
		
		var $fld_memberId;
		var $fld_memberClassId;
		var $fld_memberClassLevelId;
		var $fld_memberTypeId;
		var $fld_requestId;
		var $fld_requestCatId;
		var $fld_requestStateId;
		var $fld_scholarshipId;
		var $fld_noteId;
		var $fld_assId;
		var $fld_classesId;
		var $fld_periodId;
		var $fld_courseId;
		var $fld_classLevelId;
		var $fld_testId;
		var $fld_memberConnectionId;
		var $fld_orientationId;
		var $fld_orientationCatId;
        var $fld_classesCoursesTeachersId;
        var $fld_teachingsId;
        var $fld_msId;
        var $fld_mrId;
        var $fld_memberPixId;
		
		var $fld_memberName;
		var $fld_memberLogin;
		var $fld_memberPass;
		var $fld_memberParent;
		var $fld_memberParentPassword;
		var $fld_memberTypeLib;
		var $fld_memberClassLib;
		var $fld_requestTitle;
		var $fld_requestMsg;
		var $fld_requestDate;
		var $fld_requestCatLib;
		var $fld_requestStateLib;
		var $fld_scholarshipPaid;
		var $fld_scholarshipRemains;
		var $fld_noteRang;
		var $fld_noteMoyenne;
		var $fld_noteAppreciation;
		var $fld_notePeriode;
		var $fld_noteDateCreated;
		var $fld_assLib;
		var $fld_assDescr;
		var $fld_assContent;
		var $fld_assDateCrea;
		var $fld_assDateReturn;
		var $fld_assAttachment;
		var $fld_classesName;
		var $fld_periodLib;
		var $fld_courseName;
		var $fld_classLevelLib;
		var $fld_testLib;
		var $fld_testDescr;
		var $fld_testAttachment;
		var $fld_memberConnectionCount;
		var $fld_memberConnectionIp;
		var $fld_orientationLib;
		var $fld_orientationDescription;
		var $fld_orientationContent;
		var $fld_orientationDateInsert;
		var $fld_orientationCatLib;
        var $fld_msLib;
        var $fld_msDate;
        var $fld_mrMark;
        var $fld_mrDate;
        var $fld_mrStudent;
        var $fld_msTeacher;
        var $fld_memberPixLib;

		var $URI_member;
		var $URI_memberCat;
		var $URI_request		= 	'rId';
		var $mod_queryKey 		= 	'memberId';
		var $mod_fkQueryKey 	= 	'member_catId' ;
		var $URI_memberLang		= 	'langId';
		var $admin_modPage		= 	'otourix';
		var $dumpDirectory		=	'../modules/otourix/files/imported/';
		var $dump_fileExt		=	array("csv", "txt", "gzk", "cwd");
		
		public function __construct(){
			global $thewu32_tblPref, $thewu32_cLink;
			$this->tbl_member					= 	$thewu32_tblPref.'otourix_usr';
			$this->tbl_memberType				=	$thewu32_tblPref.'otourix_usr_level';
			$this->tbl_memberClass				=	$thewu32_tblPref.'otourix_classes';
			$this->tbl_request					=	$thewu32_tblPref.'otourix_requete';
			$this->tbl_requestCat				=	$thewu32_tblPref.'otourix_requete_categorie';
			$this->tbl_requestState				=	$thewu32_tblPref.'otourix_requete_state';
			$this->tbl_scholarship				=	$thewu32_tblPref.'otourix_ecolages';
			$this->tbl_note						=	$thewu32_tblPref.'otourix_notes';
			$this->tbl_assignment				=	$thewu32_tblPref.'otourix_assignment';
			$this->tbl_classes					=	$thewu32_tblPref.'otourix_classes';
			$this->tbl_course					=	$thewu32_tblPref.'otourix_matieres';
			$this->tbl_period					=	$thewu32_tblPref.'otourix_period';
			$this->tbl_classLevel				=	$thewu32_tblPref.'otourix_classes_level';
			$this->tbl_test						=	$thewu32_tblPref.'otourix_test';
			$this->tbl_memberConnection			=	$thewu32_tblPref.'otourix_usr_connections';
			$this->tbl_orientation				=	$thewu32_tblPref.'otourix_orientations';
			$this->tbl_orientationCat			=	$thewu32_tblPref.'otourix_orientations_categories';
            $this->tbl_classesCoursesTeachers   =   $thewu32_tblPref.'otourix_classes_matieres_enseignants';
            $this->tbl_teachings                =   $thewu32_tblPref.'otourix_classes_matieres_enseignants';
            $this->tbl_markSheets               =   $thewu32_tblPref.'otourix_mark_sheets';
            $this->tbl_marksRegistration        =   $thewu32_tblPref.'otourix_mark_registration';
            $this->tbl_marksSettings            =   $thewu32_tblPref.'otourix_mark_settings';
            $this->tbl_memberPix                =   $thewu32_tblPref.'otourix_usr_pictures';
			
			$this->fld_memberId					= 	'member_id';
			$this->fld_memberTypeId				=	'usr_level_id'; //Intru
			$this->fld_memberClassId			=	'classes_id';
			$this->fld_memberClassLevelId		=	'classes_level_id';
			$this->fld_requestId				=	'req_id';
			$this->fld_requestCatId				=	'req_cat_id';
			$this->fld_reqStateId				=	'req_state_id';
			$this->fld_scholarshipId			=	'ecolages_id';
			$this->fld_noteId					=	'notes_id';
			$this->fld_assId					=	'ass_id';
			$this->fld_classesId				=	'classes_id';
			$this->fld_periodId					=	'period_id';
			$this->fld_courseId					=	'matieres_id';
			$this->fld_classLevelId				=	'classes_level_id';
			$this->fld_testId					=	'test_id';
			$this->fld_connectionId				=	'connection_id';
			$this->fld_memberConnectionId		=	'connection_id';
			$this->fld_orientationId			=	'orientation_id';
			$this->fld_orientationCatId			=	'orientation_cat_id';
            $this->fld_classesCoursesTeachersId =   'cme_id';
            $this->fld_teachingsId              =   'cme_id';
            $this->fld_msId                     =   'ms_id';
            $this->fld_mrId                     =   'mr_id';
            $this->fld_memberPixId              =   'up_id';
						
			$this->fld_memberName				=	'member_name';
			$this->fld_memberLogin				= 	'member_login';
			$this->fld_memberPass				=	'member_password';
			$this->fld_memberParent				=	'member_parent';
			$this->fld_memberParentPassword		=	'member_parent_password';
			$this->fld_memberTypeLib			=	'usr_level_lib';
			$this->fld_memberClassLib			=	'classes_name';
			$this->fld_requestTitle				=	'req_libelle';
			$this->fld_requestMsg				=	'req_message';
			$this->fld_requestDate				=	'req_created';
			$this->fld_requestCatLib			=	'req_cat_lib';
			$this->fld_requestStateLib			=	'req_state_lib';
			$this->fld_scholarshipPaid			=	'ecolages_mont_paye';
			$this->fld_scholarshipRemains		=	'ecolages_mont_reste';
			$this->fld_noteRang					=	'notes_rang';
			$this->fld_noteMoyenne				=	'notes_moyenne';
			$this->fld_noteAppreciation			=	'notes_appreciation';
			$this->fld_notePeriode				=	'notes_periode';
			$this->fld_noteDateCreated			=	'notes_created';
			$this->fld_assLib					=	'ass_lib';
			$this->fld_assDescr					=	'ass_description';
			$this->fld_assContent				=	'ass_content';
			$this->fld_assDateCrea				=	'ass_date_crea';
			$this->fld_assDatePub				=	'ass_date_return';
			$this->fld_assAttachment			=	'ass_attachment';
			$this->fld_classesName				=	'classes_name';
			$this->fld_periodLib				=	'period_lib';
			$this->fld_courseName				=	'matieres_name';
			$this->fld_classLevelLib			=	'classes_level_lib';
			$this->fld_testLib					=	'test_title';
			$this->fld_testDescr				=	'test_descr';
			$this->fld_testAttachment			=	'test_attachment';
			$this->fld_testDateCrea				=	'test_date_created';
			$this->fld_memberConnectionCount	=	'connection_count';
			$this->fld_memberConnectionIp		=	'connection_ip';
			$this->fld_orientationLib			=	'orientation_titre';
			$this->fld_orientationDescription	=	'orientation_description';
			$this->fld_orientationContent		=	'orientation_corps';
			$this->fld_orientationDateInsert	=	'orientation_created';
			$this->fld_orientationCatLib		=	'orientation_cat_lib';
            $this->fld_msLib                    =   'ms_lib';
            $this->fld_msDate                   =   'ms_date_enreg';
            $this->fld_mrDate                   =   'mr_date_enreg';
            $this->fld_mrMark                   =   'mr_mark';
            $this->fld_mrStudent                =   'mr_student';
            $this->fld_msTeacher                =   'ms_teacher';
            $this->fld_memberPixLib             =   'picture_name';
			

			$this->set_uri_member("memberId");
			$this->set_uri_member_cat("member_catId");
		}
		
		function cwd_otourix(){
			self::__construct();
		}

				
		/**
		 * Definir la variabe d'url pour les membres
		 *
		 * @param string $new_uriVar
		 *
		 * @return void()*/
		function set_uri_member($new_uriVar){
			return $this->URI_member = $new_uriVar;
		}
		/**
		 * Definir la variabe d'url pour les categories de membres
		 *
		 * @param string $new_uriCatVar
		 *
		 * @return void()*/
		function set_uri_member_cat($new_uriCatVar){
			return $this->URI_memberCat = $new_uriCatVar;
		}

		function admin_load_requests($nombre='50', $modUrl='otourix-requestsread', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;
			
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;
		
			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_request, $this->fld_requestId);
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
		
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);
		
			$query 	= "SELECT * FROM $this->tbl_request ORDER BY $this->fld_requestDate DESC LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load requests!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th scope=\"row\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_CATEGORY']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_TITLE']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_DESCRIPTION']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_DATE-CREA']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_AUTHOR']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_ACTIONS']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	'';
				
				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
					$stateImg 	= (($row[5] 	== 	"1")	? 	("<img src=\"../koga/img/icons/pending.gif\" />") : ("<img src=\"../koga/img/icons/treated.gif\" />"));
					$varUri		= ($row[5] 		== 	"1")	?	("hide")	:	("show");
					$stateAlt	= ($row[5] 		== 	"1")	?	("En traitement...")	:	("Trait&eacute;e");
					
					$date		=	$this->datetime_fr($row[6]);
					$state		=	$this->get_request_state_by_id($row[5]);
					
					//Obtenir les libelles des categories
					$categorie 	= 	$this->get_request_cat_by_id($row[1]);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
					
					//Les auteurs
					if($row[4] == 0) {
						$arrStudents	=	$this->get_students_by_parent($row[7]);
						$counter		= 	0;
						if(is_array($arrStudents)){
							foreach($arrStudents as $studentId){
								$counter 		+= 	1;
								$studentNames	= 	$this->get_member_name_by_id($studentId)." ; ";
								//if($counter > 1)	", "
							}
						}
						
					}
					
					$author		=	($row[4]	== '0') ? ('Parent de '.$studentNames) : ($this->get_member_name_by_id($row[4]));
		
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>".utf8_encode($categorie)."</td>
					<td>".utf8_encode(stripslashes($row[2]))."</td>
					<td>".utf8_encode(stripslashes($row[3]))."</td>
					<td>".$this->datetime_fr($row[6])."</td>
					<td>$author</td>
					<td nowrap style=\"background-color:#FFF; text-align:center;\">
					<a title=\"$stateAlt\" href=\"otourix-requestsread-$varUri-$row[0]$limite$thewu32_appExt\">$stateImg</a>
					<a title=\"Supprimer la requ&ecirc;te\" href=\"otourix-requestsread-delete-$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette requ&ecirc;te?')\"><img src=\"../koga/img/icons/delete.gif\" /></a>
					</td>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}
		
		function admin_load_members($nombre='50', $modUrl='otourix-read', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;
			
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;
		
			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_member, $this->fld_memberId);
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
				
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);
				
			$query 	= "SELECT * FROM $this->tbl_member ORDER BY $this->fld_memberName LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th scope=\"row\">&num;</th>
							<th>".$mod_lang_output['TABLE_HEADER_CATEGORY']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_LOGIN']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_TELEPHONE']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_ACTIONS']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	'';

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
					$stateImg 	= (($row[8] == 0) 	? 	("<img src=\"../koga/img/icons/disabled.gif\" />") : ("<img src=\"../koga/img/icons/enabled.gif\" />"));
					$varUri		= ($row[8] == "1")	?	("deactivate"):("activate");
					$stateAlt	= ($row[8] == "1")	?	("D&eacute;sactiver ce compte membre")	:	("Activer ce compte membre");
					//Obtenir les libelles des categories
					$categorie 	= $this->get_member_type_by_id($row[2]);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
		
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>$categorie</td>
					<td>".stripslashes($row[1])."</td>
					<td>$row[3]</td>
					<td>$row[6]</td>
					<td nowrap style=\"background-color:#FFF; text-align:center;\">
					<a title=\"".$mod_lang_output['TABLE_TOOLTIP_UPDATE']."\" href=\"otourix-update-update-$row[0]$thewu32_appExt\"><img src=\"../koga/img/icons/edit.gif\" /></a>
					<a title=\"".$mod_lang_output['TABLE_TOOLTIP_DELETE']."\" href=\"$modUrl-delete-$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ce membre?')\"><img src=\"../koga/img/icons/delete.gif\" /></a>
					<a title=\"$linkState\" href=\"$modUrl-$varUri-$row[0]$limite$thewu32_appExt\">$stateImg</a>
					</td>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
				}
				else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

        function admin_load_otourix_members($new_memberType='5', $nombre='100', $modUrl='otourix-teachers', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;

			$limite = $this->limit;
			if(!$limite) $limite = 0;

			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;

			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl_where1($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, $new_memberType);

			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;

			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);

			$query 	= "SELECT * FROM $this->tbl_member WHERE $this->fld_memberTypeId = '".$new_memberType."' ORDER BY $this->fld_memberName LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members of type $new_memberType!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
                $thClass    =   ($new_memberType  ==  '3')    ?   ('<th>Classe</th>') :   ('');
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th scope=\"row\">&num;</th>
							<th>".$mod_lang_output['TABLE_HEADER_NAME']."</th>
                            $thClass
							<th>".$mod_lang_output['TABLE_HEADER_LOGIN']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_TELEPHONE']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_ACTIONS']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	'';

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive

					$stateImg 	= (($row[8] == 0) 	? 	("<img src=\"../koga/img/icons/disabled.gif\" />") : ("<img src=\"../koga/img/icons/enabled.gif\" />"));
					$varUri		= ($row[8] == "1")	?	("deactivate"):("activate");
					$stateAlt	= ($row[8] == "1")	?	("D&eacute;sactiver ce compte membre")	:	("Activer ce compte membre");
					//Obtenir les libelles des categories
					$categorie 	= $this->get_member_type_by_id($row[2]);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
                    $tdClass      =     ($new_memberType  ==  '3')    ?   ('<td>'.$this->get_class_by_id($row[5]).'</td>')   :   ('');
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>".stripslashes($row[1])."</td>
                    $tdClass
                    <td>$row[3]</td>
					<td>$row[6]</td>
					<td nowrap style=\"background-color:#FFF; text-align:center;\">
					<a title=\"".$mod_lang_output['TABLE_TOOLTIP_UPDATE']."\" href=\"otourix-update-update-$row[0]$thewu32_appExt\"><img src=\"../koga/img/icons/edit.gif\" /></a>
					<a title=\"".$mod_lang_output['TABLE_TOOLTIP_DELETE']."\" href=\"$modUrl-delete-$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ce membre?')\"><img src=\"../koga/img/icons/delete.gif\" /></a>
					<a title=\"$linkState\" href=\"$modUrl-$varUri-$row[0]$limite$thewu32_appExt\">$stateImg</a>
					</td>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";

			}
			else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			}
			return $toRet;
		}

        function export_otourix_members($new_memberType='5'){
			global $mod_lang_output, $thewu32_cLink;

			$query 	= "SELECT * FROM $this->tbl_member WHERE $this->fld_memberTypeId = '".$new_memberType."' ORDER BY $this->fld_memberName ASC";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members of type $new_memberType!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
                $thClass    =   ($new_memberType  ==  '3')    ?   ('<th>Classe</th>') :   ('');
				$toRet 	= "<table class=\"table table-bordered\">
						<tr>
							<th scope=\"row\">Num</th>
							<th>".$mod_lang_output['TABLE_HEADER_NAME']."</th>
                            $thClass
							<th>".$mod_lang_output['TABLE_HEADER_LOGIN']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_TELEPHONE']."</th>
						</tr>";

				while($row = mysqli_fetch_array($result)){
					$num++;
					$categorie 	= $this->get_member_type_by_id($row[2]);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
                    $tdClass      =     ($new_memberType  ==  '3')    ?   ('<td>'.$this->get_class_by_id($row[5]).'</td>')   :   ('');
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>".stripslashes($row[1])."</td>
                    $tdClass
                    <td>".strtoupper($row[3])."</td>
					<td>$row[6]</td>
					</tr>";
				}
				$toRet .= "</table>";

			}
			else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			}
			return $toRet;
		}

		function admin_load_connected($nombre='50', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;
			
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"];
		
			//Obtention du total des enregistrements:
			//$total = $this->count_in_tbl($this->tbl_member, $this->fld_memberId);
			$total	=	$this->count_in_tbl_where($this->tbl_memberConnection, 'display', '1');
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
		
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage($nombre, $page, $total);
		
			$query 	= "SELECT * FROM $this->tbl_memberConnection WHERE display='1' LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>Nom</th>
							<th>Fr&eacute;quence</th>
							<th>@ IP</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
					$stateImg 	= (($row[8] 	== 	0) 		? 	("<img src=\"../koga/img/icons/disabled.gif\" />") : ("<img src=\"../koga/img/icons/enabled.gif\" />"));
					
					if($row[8] 		!= 	"0")	{	$varUri		=	"disconnect";	}
					
					//Obtenir les noms des connectes
					if($row[3] == 0) {
						$arrStudents	=	$this->get_students_by_parent($row[4]);
						$counter		= 	0;
						foreach($arrStudents as $studentId){
							$counter 		+= 	1;
							$studentNames	= 	$this->get_member_name_by_id($studentId)." ; ";
							//if($counter > 1)	", "
						}
					
					}
						
					$connected		=	($row[3]	== '0') ? ('Parent de '.$studentNames) : ($this->get_member_name_by_id($row[3]));
					
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
		
					$toRet .="<tr class=\"$currentCls\">
								<td align=\"center\">$num</td>
								<td>$connected</td>
								<td>$row[1]</td>
								<td>$row[2]</td>
								<td nowrap style=\"background-color:#FFF; text-align:center;\">
									<a title=\"".$mod_lang_output['TABLE_TOOLTIP_DISCONNECT_MEMBER']."\" href=\"otourix-read-$varUri-$row[0]$thewu32_appExt#openModalConnected\"><img src=\"../koga/img/icons/enabled.gif\" /></a>
								</td>
							</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}
		
		
		function admin_load_scholarships($nombre='50', $modUrl='otourix-tuitionsread', $limit='0'){
			global $mod_lang_output, $thewu32_cLink;
			
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;
		
			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_scholarship, $this->fld_scholarshipId);
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
		
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);
		
			$query 	= "SELECT * FROM $this->tbl_scholarship ORDER BY $this->fld_scholarshipPaid LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load scholarships data!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_FIRST-LAST-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_AMOUNT_PAID']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_AMOUNT_BALANCE']."</th>
						</tr>";
				
				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	'';

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
					/*$stateImg 	= (($row[7] == 0) ? ("<img src=\"img/icons/disabled.gif\" />") : ("<img src=\"img/icons/enabled.gif\" />"));
					$varUri		= ($row[7] == "0")?("memberDeactivate"):("memberActivate");
					$stateAlt	= ($row[7] == "0")?("D&eacute;sactiver ce compte membre"):("Activer ce compte membre");*/
					//Obtenir les libelles des categories
					$studentInfos 	= $this->get_member($row[3]);
					$studentName	=	$studentInfos['m_NAME'];
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
		
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>$studentName</td>
					<td>$row[1] F CFA</td>
					<td>$row[2] F CFA</td>
					<!--
					<td nowrap style=\"background-color:#FFF; text-align:center;\">
					<a title=\"Modifier le membre\" href=\"?page=otourix&what=memberUpdate&action=memberUpdate&$this->URI_member=$row[0]\"><img src=\"../koga/img/icons/edit.gif\" /></a>
					<a title=\"Supprimer le membre\" href=\"?page=otourix&what=memberDisplay&action=memberDelete&$this->URI_member=$row[0]\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ce membre?')\"><img src=\"../koga/img/icons/delete.gif\" /></a>
					<a title=\"$linkState\" href=\"?page=otourix&action=$varUri&$this->URI_member=$row[0]\">$stateImg</a>
					</td> 
					-->
					</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

        function admin_load_courses($nombre='50', $modUrl='otourix-courses', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;

			$limite = $this->limit;
			if(!$limite) $limite = 0;

			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;

			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_course, $this->fld_courseId);


			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;

			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);

			$query 	= "SELECT * FROM $this->tbl_course ORDER BY '$this->fld_courseId' LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load courses data!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_COURSE-NAME']."</th>
                            <th>Actions</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	(','.$limit);

				while($row = mysqli_fetch_array($result)){
					$num++;

                    $stateImg 	= (($row[2] == 0) ? ("<img src=\"img/icons/disabled.gif\" />") : ("<img src=\"img/icons/enabled.gif\" />"));
					$varUri		= ($row[2] == "0")?("courseDeactivate"):("courseActivate");
					$stateAlt	= ($row[2] == "0")?("D&eacute;sactiver cette mati&egrave;re"):("Activer cette mati&egrave;re");
                    $state      = ($row[2] == '0')?('show'):('hide');

					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));

					$toRet .="<tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td>$row[1]</td>
    					<td nowrap style=\"background-color:#FFF; text-align:center;\">
    					<a title=\"Modifier la mati&egrave;re\" href=\"otourix-courses-update@$row[0]$limite$thewu32_appExt\"><img src=\"img/icons/edit.gif\" /></a>
    					<a title=\"Supprimer la mati&egrave;re\" href=\"otourix-courses-delete@$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette mati&egrave;re?')\"><img src=\"img/icons/delete.gif\" /></a>
    					<a title=\"$linkState\" href=\"otourix-courses-$state@$row[0]$limite$thewu32_appExt\">$stateImg</a>
    					</td>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";

			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

        function admin_load_classes($nombre='50', $modUrl='otourix-classes', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;

			$limite = $this->limit;
			if(!$limite) $limite = 0;

			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;

			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_classes, $this->fld_classesId);


			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;

			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);

			$query 	= "SELECT * FROM $this->tbl_classes ORDER BY '$this->fld_classesId' LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load Classes data!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;

				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_CLASSES-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_CLASSES-LEVEL']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_ACTION']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	(','.$limit);

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive

					$stateImg 	= (($row[3] == 0) ? ("<img src=\"img/icons/disabled.gif\" />") : ("<img src=\"img/icons/enabled.gif\" />"));
    				$stateAlt	= ($row[3] == "0")?("D&eacute;sactiver cette classe"):("Activer cette classe");
                    $state      = ($row[3] == '0')?('show'):('hide');


					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));

					$toRet .="<tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td>$row[1]</td>
    					<td>$row[2]</td>

    					<td nowrap style=\"background-color:#FFF; text-align:center;\">
    					<a title=\"Modifier la classe\" href=\"otourix-classes-update@$row[0]$limite$thewu32_appExt\"><img src=\"img/icons/edit.gif\" /></a>
        				<a title=\"Supprimer la classe\" href=\"otourix-classes-delete@$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette classe?')\"><img src=\"img/icons/delete.gif\" /></a>
        				<a title=\"$linkState\" href=\"otourix-classes-$state@$row[0]$limite$thewu32_appExt\">$stateImg</a>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";

			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

        function admin_load_teachings($nombre='50', $modUrl='otourix-teachings', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;

			$limite = $this->limit;
			if(!$limite) $limite = 0;

			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;

			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_teachings, $this->fld_teachingsId);


			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;

			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);

			$query 	= "SELECT * FROM $this->tbl_teachings ORDER BY '$this->fld_courseId' LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load teachings data!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;

				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_COURSE-NAME']."</th>
                            <th>".$mod_lang_output['TABLE_HEADER_CLASSES-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_TEACHER-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_ACTION']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	(','.$limit);

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive

					$stateImg 	    =   (($row[4] == 0) ? ("<img src=\"img/icons/disabled.gif\" />") : ("<img src=\"img/icons/enabled.gif\" />"));
    				$stateAlt	    =   ($row[4] == "0")?("D&eacute;sactiver"):("Activer");
                    $state          =   ($row[4] == '0')?('show'):('hide');
                    $teacherName    =   $this->get_member_name_by_login($row[3]);
                    $courseName     =   $this->get_course_name_by_id($row[2]);
                    $className      =   $this->get_class_by_id($row[1]);


					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));

					$toRet .="<tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td>$courseName</td>
                        <td nowrap>$className</td>
    					<td>$teacherName</td>

    					<td nowrap style=\"background-color:#FFF; text-align:center;\">
    					<a title=\"Modifier l'assignation\" href=\"otourix-teachings-update@$row[0]$limite$thewu32_appExt\"><img src=\"img/icons/edit.gif\" /></a>
        				<a title=\"Supprimer l'assignation\" href=\"otourix-teachings-delete@$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette assignation?')\"><img src=\"img/icons/delete.gif\" /></a>
        				<a title=\"$linkState\" href=\"otourix-teachings-$state@$row[0]$limite$thewu32_appExt\">$stateImg</a>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";

			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}


		function admin_load_notes($nombre='50', $modUrl='otourix-marksread', $limit='0'){
			global $mod_lang_output, $thewu32_cLink;
			
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;
		
			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_note, $this->fld_noteId);
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
		
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);
		
			$query 	= "SELECT * FROM $this->tbl_note ORDER BY '$this->fld_noteRang' LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load marksheets data!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_FIRST-LAST-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_AVERAGES']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_RANKS']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_OBSERVATIONS']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_REG-DATE']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	'';

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
					/*$stateImg 	= (($row[7] == 0) ? ("<img src=\"img/icons/disabled.gif\" />") : ("<img src=\"img/icons/enabled.gif\" />"));
					 $varUri		= ($row[7] == "0")?("memberDeactivate"):("memberActivate");
					 $stateAlt	= ($row[7] == "0")?("D&eacute;sactiver ce compte membre"):("Activer ce compte membre");*/
					//Obtenir les libelles des categories
					$studentInfos 	= $this->get_member($row[4]);
					$studentName	=	$studentInfos['m_NAME'];
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
		
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>$studentName</td>
					<td>$row[2]</td>
					<td>$row[1]</td>
					<td>$row[3]</td>
					<td>$row[6]</td>
					<!--
					<td nowrap style=\"background-color:#FFF; text-align:center;\">
					<a title=\"Modifier le membre\" href=\"?page=otourix&what=memberUpdate&action=memberUpdate&$this->URI_member=$row[0]\"><img src=\"img/icons/edit.gif\" /></a>
					<a title=\"Supprimer le membre\" href=\"?page=otourix&what=memberDisplay&action=memberDelete&$this->URI_member=$row[0]\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ce membre?')\"><img src=\"img/icons/delete.gif\" /></a>
					<a title=\"$linkState\" href=\"?page=otourix&action=$varUri&$this->URI_member=$row[0]\">$stateImg</a>
					</td>
					-->
					</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

        function admin_load_marks_by_period($period = '1', $nombre='100', $modUrl='otourix-marks', $limit='0'){
			global $mod_lang_output, $thewu32_cLink;

			$limite = $this->limit;
			if(!$limite) $limite = 0;

			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;

            //Definir la requete
            $query = "SELECT a.mr_student, a.mr_mark, a.mr_date_enreg, b.matieres_id, b.classes_id, b.ms_teacher, b.period_id FROM kol_otourix_mark_registration a, kol_otourix_mark_sheets b WHERE a.ms_id = b.ms_id and b.period_id = $period";

			//Obtention du total des enregistrements:
			$total = $this->count_query($query);


			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;

			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);

            $query = "SELECT a.mr_student, a.mr_mark, a.mr_date_enreg, b.matieres_id, b.classes_id, b.ms_teacher, b.period_id FROM kol_otourix_mark_registration a, kol_otourix_mark_sheets b WHERE a.ms_id = b.ms_id and b.period_id = $period ORDER BY b.classes_id LIMIT ".$limite.",".$nombre;
            //$query 	= "SELECT * FROM $this->tbl_note ORDER BY '$this->fld_noteRang' LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load marks for sequence $period!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<tr>
							<th row=\"scope\">N&ordm;</th>
							<th>".$mod_lang_output['TABLE_HEADER_CLASSES-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_COURSE-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_STUDENT-NAME']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_MARKS']."</th>
							<th>".$mod_lang_output['TABLE_HEADER_REG-DATE']."</th>
                            <th>".$mod_lang_output['TABLE_HEADER_TEACHER-NAME']."</th>
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	(','.$limit);

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive

					/*$stateImg 	= (($row[7] == 0) ? ("<img src=\"img/icons/disabled.gif\" />") : ("<img src=\"img/icons/enabled.gif\" />"));
					 $varUri		= ($row[7] == "0")?("memberDeactivate"):("memberActivate");
					 $stateAlt	= ($row[7] == "0")?("D&eacute;sactiver ce compte membre"):("Activer ce compte membre");*/
					//Obtenir les libelles des categories
					$studentInfos 	=   $this->get_member_by_login($row[0]);
                    $teacherInfos   =   $this->get_member_by_login($row[5]);
					$studentName	=	$studentInfos['m_NAME'];
                    $teacherName    =   $teacherInfos['m_NAME'];
                    $courseName     =   $this->get_course_name_by_id($row[3]);
                    $className      =   $this->get_class_by_id($row[4]);
                    $date           =   $this->set_date_by_lang($row[2], $_SESSION['LANG']);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));

					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>$className</td>
					<td>$courseName</td>
					<td>$studentName</td>
					<td>$row[1]</td>
					<td>$date</td>
                    <td>$teacherName</td>
					<!--
					<td nowrap style=\"background-color:#FFF; text-align:center;\">
					<a title=\"Modifier le membre\" href=\"?page=otourix&what=memberUpdate&action=memberUpdate&$this->URI_member=$row[0]\"><img src=\"img/icons/edit.gif\" /></a>
					<a title=\"Supprimer le membre\" href=\"?page=otourix&what=memberDisplay&action=memberDelete&$this->URI_member=$row[0]\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer ce membre?')\"><img src=\"img/icons/delete.gif\" /></a>
					<a title=\"$linkState\" href=\"?page=otourix&action=$varUri&$this->URI_member=$row[0]\">$stateImg</a>
					</td>
					-->
					</tr>";
				}
				$toRet .= "</table>$nav_menu";

			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

        function admin_load_otourix_marksheets($nombre='50', $modUrl='otourix-marksheetsread', $limit='0'){
			global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;

			$limite = $this->limit;
			if(!$limite) $limite = 0;

			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"].$modUrl;

			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl($this->tbl_markSheets, $this->fld_msId);


			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;

			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage2($nombre, $page, $total);

			$query 	= "SELECT * FROM $this->tbl_markSheets ORDER BY $this->fld_msDate LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"table table-bordered\">
						<caption><i class=\"fa fa-download\"></i> <a target=\"_blank\" href=\"../plugins/data-export/\">Cliquer pour afficher les notes integrales</a></caption>
						<tr>
							<th scope=\"row\">&num;</th>
							<th>P&eacute;riode</th>
							<th>Libell&eacute;</th>
							<th>Classe</th>
							<th>Mati&egrave;re</th>
							<th>Enseignant</th>
                            <th>Date</th>
                            <!-- <th>Actions</th> -->
						</tr>";

				//Keep the view at the current page, in case of many
				$limite		=	isset($_REQUEST['limite'])	?	(','.$limite)	:	'';

				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive

					$stateImg 	= (($row[7] == 0) 	? 	("<img src=\"../koga/img/icons/disabled.gif\" />") : ("<img src=\"../koga/img/icons/enabled.gif\" />"));
					$varUri		= ($row[7] == "1")	?	("deactivate"):("activate");
					$stateAlt	= ($row[7] == "1")	?	("D&eacute;sactiver cette feuille de note")	:	("Activer cette feuille de note");
					//Obtenir les libelles des categories
					$categorie 	= $this->get_member_type_by_id($row[2]);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));

					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>".$this->get_period_by_id($row[2])."</td>
					<td>$row[1]</td>
					<td>".$this->get_class_by_id($row[4])."</td>
                    <td>".$this->get_course_name_by_id($row[3])."</td>
                    <td>".$this->get_member_name_by_login($row[5])."</td>
                    <td>".$this->date_fr2($row[6])."</td>
					<!-- <td nowrap style=\"background-color:#FFF; text-align:center;\"> -->
					<!-- <a target=\"_blank\" title=\"Exporter la feuille de notes $row[1] vers excel\" href=\"../modules/otourix/admin/export.php?dataExport=marksheets&msId=$row[0]\"><i class=\"fa fa-download\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    <!-- <a target=\"_blank\" title=\"Exporter la feuille de notes $row[1] vers excel\" href=\"../plugins/data-export/index.php?msId=$row[0]&class=$row[4]&course=$row[3]&period=$row[2]\"><i class=\"glyphicon glyphicon-new-window\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a title=\"".$mod_lang_output['TABLE_TOOLTIP_DELETE']."\" href=\"$modUrl-delete-$row[0]$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer la feuille de note $row[1]?')\"><i class=\"fa fa-trash\"></i></a> -->
					<!-- <a title=\"$linkState\" href=\"$modUrl-$varUri-$row[0]$limite$thewu32_appExt\">$stateImg</a> -->
					<!-- </td> -->
					</tr>";
				}
				$toRet .= "</table>$nav_menu";

				}
				else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}

		/**
		 * Afficher les rubriques dans un combobox, toutes les rubriques (Utile pour l'espace d'admin).
		 *
		 * @param $FORM_var 	: La variable de formulaire, pour fixer la valeur choisie, en cas d'erreur dans le formulaire qui entrainerait le rechargement de la page
		 * @param $CSS_class 	: La classe CSS a utiliser pour enjoliver la presentation
		 */
		/*function admin_cmb_show_rub($FORM_var="", $CSS_class=""){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_memberType ORDER BY $this->fld_memberTypeLib";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load type of members.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = "";
				//if($FORM_var	== )
				while($row = mysqli_fetch_array($result)){
					$selected = ($FORM_var == $row[0])?("SELECTED"):("");
					$toRet .= "<option value=\"$row[0]\"$selected>$row[1]</option>";
				}
			}
			else{
				$toRet = "<option>Aucun type membre &agrave; afficher</option>";
			}
			return $toRet;
		}*/
		
		//Afficher tous les types de membres, sauf administrateur
		function admin_cmb_show_member_type($FORM_var="", $valSkip='1', $CSS_class=""){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_memberType ORDER BY $this->fld_memberTypeLib";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load type of members.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = "";
				//if($FORM_var	== )
				while($row = mysqli_fetch_array($result)){
					$selected = ($FORM_var == $row[0])?("SELECTED"):("");
					if($row[0] == $valSkip)
						continue;
					else
						$toRet .= "<option value=\"$row[0]\"$selected>$row[1]</option>";
				}
			}
			else{
				$toRet = "<option>Aucun type membre &agrave; afficher</option>";
			}
			return $toRet;
		}
		
		/**
		 * @param string $new_memberLogin
		 * @desc Load an associative array of member record knowing the member login
		 * @return array_assoc*/
		function get_member_by_login($new_memberLogin){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_member WHERE $this->fld_memberLogin = '$new_memberLogin'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to load member record by login<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row 	= 	mysqli_fetch_row($result)){
					$toRet 	= 	array("m_ID"			=> 	$row[0],
									  "m_NAME"			=> 	$row[1],
									  "m_TYPE"			=> 	$row[2],
									  "m_LOGIN"			=> 	$row[3],
									  "m_PASSWORD"		=> 	$row[4],
									  "m_CLASSID"		=> 	$row[5],
									  "m_PARENT"		=> 	$row[6]);
				}
				return $toRet;
			}
			else
				return false;
		}

        function get_period_by_id($new_periodId){
            return $this->get_field_by_id($this->tbl_period, $this->fld_periodId, $this->fld_periodLib, $new_periodId);
        }

		function get_assignment($new_assId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_assignment WHERE $this->fld_assId = '$new_assId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to load an assignment record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(	"ass_ID"			=> 	$row[0],
										"ass_NAME"			=> 	$row[1],
										"ass_DESCR"			=> 	$row[2],
										"ass_CONTENT"		=> 	$row[3],
										"ass_ATTACHMENT"	=> 	$row[4],
										"ass_USRID"			=> 	$row[5],
										"ass_COURSEID"		=> 	$row[6],
										"ass_CLASSID"		=>	$row[7],
										"ass_PERIODID"		=>	$row[8],
										"ass_DATECREA"		=>	$row[9],
										"ass_DATERETURN"	=>	$row[10],
										"ass_DISPLAY"		=>	$row[11]);
				}
				return $toRet;
			}
			else
				return false;
		}
		
		function get_orientation($new_orientationId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_orientation WHERE $this->fld_orientationId = '$new_orientationId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to load an orientation record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(	"or_ID"			=> 	$row[0],
							"or_TITLE"			=> 	$row[2],
							"or_DESCR"			=> 	$row[3],
							"or_CONTENT"		=> 	$row[4],
							"or_DATE"			=> 	$row[6],
							"or_USRID"			=> 	$row[5],
							"or_CATID"			=> 	$row[1]);
				}
				return $toRet;
			}
			else
				return false;
		}

        function get_course($new_courseId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_course WHERE $this->fld_courseId = '$new_courseId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to get a course record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(	"c_ID"			=> 	$row[0],
							"c_NAME"			=> 	$row[1],
							"DISPLAY"			=> 	$row[2]);
				}
				return $toRet;
			}
			else
				return false;
		}

        function get_class($new_classesId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_classes WHERE $this->fld_classesId = '$new_classesId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to get a class record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(	"cl_ID"			=> 	$row[0],
							"cl_NAME"			=> 	$row[1],
							"cl_LEVEL"			=> 	$row[2],
							"DISPLAY"		    => 	$row[3]);
				}
				return $toRet;
			}
			else
				return false;
		}

        function get_teaching($new_teachingsId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_teachings WHERE $this->fld_teachingsId = '$new_teachingsId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to get a course record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(
                                "tc_ID"		        => 	$row[0],
    							"tc_CLASSID"		=> 	$row[1],
                                "tc_COURSEID"       =>  $row[2],
                                "tc_TEACHERID"      =>  $row[3],
    							"DISPLAY"			=> 	$row[4]
                                );
				}
				return $toRet;
			}
			else
				return false;
		}

        function get_teachings($new_teacherId){
			global $thewu32_cLink;
			$query = "SELECT $this->fld_courseId, $this->fld_classesId, $this->fld_teachingsId FROM $this->tbl_teachings WHERE $this->fld_memberLogin = '$new_teacherId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to teachings.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
			    $toRet = array();
				while($row = mysqli_fetch_row($result)){
				    array_push($toRet, array('COURSEID'=>$row[0], 'CLASSID'=>$row[1], 'TEACHINGSID'=>$row[2]));
				}
				return $toRet;
			}
			else
				return false;
		}

		/*function otourix_teachings_not_assigned($new_classId, $new_courseId, $new_teachersLogin){
			$query = "SELECT $this->fld_teachingsId FROM $this->tbl_teachings WHERE $this->tbl";
		}*/

		//Get a row of Teachings
		function arr_get_teachings($new_teachingsId){
			global $thewu32_cLink;
			$query	=	"SELECT * FROM $this->tbl_teachings WHERE $this->fld_teachingsId = '$new_teachingsId'";
			$result =	mysqli_query($thewu32_cLink, $query) or die ("Unable to get an array of teachings form ID $new_teachingsId.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = array();
				while($row = mysqli_fetch_row($result)){
					array_push($toRet, array('ID'=>$row[0], 'CLASSID'=>$row[1], 'COURSEID'=>$row[2], 'MATRICULE'=>$row[3], 'DiSPLAY'=>$row[4]));
				}
				return $toRet;
			}
			else{
				return false;
			}
		}

		function get_course_by_assignment_id($new_assId){
			$courseId	=	$this->get_field_by_id($this->tbl_assignment, $this->fld_assId, $this->fld_courseId, $new_assId);
			return	$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $new_assId);
		}
		
		function get_class_by_id($new_classId){
			return $this->get_field_by_id($this->tbl_memberClass, $this->fld_memberClassId, $this->fld_memberClassLib, $new_classId);
		}

        function get_course_name_by_id($new_courseId){
			return $this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $new_courseId);
		}
		
		function get_class_by_student($new_studentId){
			$studentInfos	=	$this->get_member($new_studentId);
			return $this->get_class_by_id($studentInfos['m_CLASSID']);
		}
		
		function get_member_name_by_id($new_memberId){
			return $this->get_field_by_id($this->tbl_member, $this->fld_memberId, $this->fld_memberName, $new_memberId);
		}

        function get_member_name_by_login($new_memberLogin){
			return $this->get_field_by_id($this->tbl_member, $this->fld_memberLogin, $this->fld_memberName, $new_memberLogin);
		}

		function get_student_by_id($new_studentId){
			return $this->get_field_by_id($this->tbl_member, $this->fld_memberId, $this->fld_memberName, $new_studentId);
		}
		
		function get_member($new_memberId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_member WHERE $this->fld_memberId = '$new_memberId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to load member record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array("m_ID"			=> 	$row[0],
									  "m_NAME"			=> 	$row[1],
									  "m_TYPE"			=> 	$row[2],
									  "m_LOGIN"			=> 	$row[3],
									  "m_PASSWORD"		=> 	$row[4],
									  "m_CLASSID"		=> 	$row[5],
									  "m_PARENT"		=> 	$row[6],
									  "m_PARENT_PASS"	=>	$row[7],
									  "m_DISPLAY"		=>	$row[8]);
				}
				return $toRet;
			}
			else
				return false;
		}
			
		function get_note_by_member($new_memberId){
			global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_note WHERE $this->fld_memberId = '$new_memberId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to load marksheet record<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(	"n_ID"				=> 	$row[0],
										"n_RANK"			=> 	$row[1],
										"n_AVERAGE"			=> 	$row[2],
										"n_APPRECIATION"	=> 	$row[3],
										"m_ID"				=> 	$row[4],
										"n_PERIOD"			=> 	$row[5],
										"n_DATECREA"		=> 	$row[6]);
				}
				return $toRet;
			}
			else
				return false;
		}
		
		function get_member_type_by_id($new_memberTypeId){
			return $this->get_field_by_id($this->tbl_memberType, $this->fld_memberTypeId, "usr_level_lib", $new_memberTypeId);
		}

        function get_member_type_by_id2($new_memberId){
			return $this->get_field_by_id($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, $new_memberId);
		}

        //Get the type of member knowing his login(matricule)
        function get_member_type_by_login($new_memberLogin){
			return $this->get_field_by_id($this->tbl_member, $this->fld_memberLogin, $this->fld_memberTypeId, $new_memberLogin);
		}
		
		//Get all the students belonging to the same parent
		function get_students_by_parent($new_parentLogin){
			global $thewu32_cLink;
			$query	=	"SELECT $this->fld_memberId FROM $this->tbl_member WHERE $this->fld_memberParent = '$new_parentLogin' ORDER BY $this->fld_memberName";
			$result	=	 mysqli_query($thewu32_cLink, $query) or die("Unable to load students of the same parent!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= array();
				while($row = mysqli_fetch_array($result)){
					//if
					array_push($toRet, $row[0]);
				}
				return $toRet;
			}
			else
				return false;
		}
		
		function get_request_cat_by_id($new_requestCatId){
			return $this->get_field_by_id($this->tbl_requestCat, $this->fld_requestCatId, $this->fld_requestCatLib, $new_requestCatId);
		}
		
		function get_request_state_by_id($new_requestStateId){
			//return $this->get_field_by_id($this->tbl_requestState, $this->fld_requestStateId, $this->fld_requestStateLib, $new_requestStateId);
			return $this->get_field_by_id($this->tbl_requestState, 'req_state_id', 'req_state_lib', $new_requestStateId);
		}
		
		//Dump the file content into DB
		function csv_dump_members($fileOrig='', $val_delim=';', $val_skip='Prefix', $lang='FR'){
		    /*NB File format is
            0 : Member ID
            1 : Member Name
            2 : Member Type ID
            3 : Member Login = Matricule
            4 : Member Pass = Matricule
            5 : Member Class
            6 : Member Parent = Telephone
            */

			$fileOrig	=	$this->dumpDirectory.$fileOrig;
			// Ouverture fichier en lecture
			if($fp = @fopen($fileOrig,"r")) {
				$toRet      = "";
				$compteur   = 0;
                $nbExistant = 0;
				$newContent = '';
				while (!feof($fp)){
					$row 		= fgets($fp);
	
					$tab_elem	=   explode($val_delim, $row);

                    $memberName =   addslashes($tab_elem[1]);
	
					if(in_array($val_skip, $tab_elem)){ //$val_skip = valeur a sauter si on rencontre dans le csv
						continue;
					}
					elseif(!is_array($tab_elem)){ //Si on a une ligne vide, continuer
						continue;
					}
                    elseif($this->chk_otourix_member($memberName, $tab_elem[2]) || $this->chk_entry($this->tbl_member, $this->fld_memberId, $tab_elem[0])){
                        //print $tab_elem[1].' ('.$tab_elem[2].')';
                        //Envoyer dans un fichier log pour voir les membres deja enregistres
                        $nbExistant++;
                        continue;
                    }

					else{
						//Dump into DB table and update the contacts
						$this->set_member($tab_elem[0], $memberName, $tab_elem[2], $tab_elem[3], $tab_elem[4], $tab_elem[5], $tab_elem[6]);
                        $compteur += 1;
					}
	
				}
				// fermeture fichier
				fclose ($fp);
                return array($compteur, $nbExistant);
			}
			else{
				return false;
			}
			
		}
		
		//Dump the scholarship file content into DB
		function csv_dump_tuitions($fileOrig='', $val_delim=';', $val_skip='Prefix', $lang='FR'){
			$fileOrig	=	$this->dumpDirectory.$fileOrig;
			// Ouverture fichier en lecture
			if($fp = @fopen($fileOrig,"r")) {
				$toRet = "";
				$compteur = 0;
				$newContent = '';
				while (!feof($fp)){
					$compteur += 1;
					$row 		= fgets($fp);
		
					$tab_elem	= explode($val_delim, $row);
		
		
					if(in_array($val_skip, $tab_elem)){ //$val_skip = valeur a sauter si on rencontre dans le csv
						continue;
					}
					elseif(!is_array($tab_elem)){ //Si on a une ligne vide, continuer
						continue;
					}
					else{
						//Dump into DB table and update the contacts
						$this->set_scholarship($tab_elem[0], $tab_elem[1], $tab_elem[2]);
					}
		
				}
				// fermeture fichier
				fclose ($fp);
				return $compteur;
			}
			else{
				return false;
			}
				
		}
		
		//Dump the file content into DB
		function csv_dump_marks($fileOrig='', $val_delim=';', $val_skip='Prefix', $lang='FR'){
			$fileOrig	=	$this->dumpDirectory.$fileOrig;
			// Ouverture fichier en lecture
			if($fp = @fopen($fileOrig,"r")) {
				$toRet = "";
				$compteur = 0;
				$newContent = '';
				while (!feof($fp)){
					$compteur += 1;
					$row 		= fgets($fp);
		
					$tab_elem	= explode($val_delim, $row);
		
		
					if(in_array($val_skip, $tab_elem)){ //$val_skip = valeur a sauter si on rencontre dans le csv
						continue;
					}
					elseif(!is_array($tab_elem)){ //Si on a une ligne vide, continuer
						continue;
					}
					else{
						//Dump into DB table and update the contacts
						$this->set_note($tab_elem[1], $tab_elem[2], $tab_elem[3], $tab_elem[0], $tab_elem[4]);
					}
		
				}
				// fermeture fichier
				fclose ($fp);
				return $compteur;
			}
			else{
				return false;
			}
				
		}

        //Dump the classes file content into DB
		function csv_dump_classes($fileOrig='', $val_delim=';', $val_skip='Prefix', $lang='FR'){
			$fileOrig	=	$this->dumpDirectory.$fileOrig;
			// Ouverture fichier en lecture
			if($fp = @fopen($fileOrig,"r")) {
				$toRet = "";
				$compteur = 0;
				$newContent = '';
				while (!feof($fp)){
					$compteur += 1;
					$row 		= fgets($fp);

					$tab_elem	= explode($val_delim, $row);


					if(in_array($val_skip, $tab_elem)){ //$val_skip = valeur a sauter si on rencontre dans le csv
						continue;
					}
					elseif(!is_array($tab_elem)){ //Si on a une ligne vide, continuer
						continue;
					}
                    elseif($this->chk_otourix_classes($tab_elem[0], $tab_elem[1])){
                        continue;
                    }
					else{
						//Dump into DB table and update the contacts
						$this->set_otourix_classes($tab_elem[0], $tab_elem[1], $tab_elem[2], '1');
					}

				}
				// fermeture fichier
				fclose ($fp);
				return $compteur;
			}
			else{
				return false;
			}

		}

        //Dump the courses file content into DB
		function csv_dump_courses($fileOrig='', $val_delim=';', $val_skip='Prefix', $lang='FR'){
			$fileOrig	=	$this->dumpDirectory.$fileOrig;
			// Ouverture fichier en lecture
			if($fp = @fopen($fileOrig,"r")) {
				$toRet = "";
				$compteur = 0;
				$newContent = '';
                $arrRegistered = array();
				while (!feof($fp)){
					$compteur += 1;
					$row 		= fgets($fp);

					$tab_elem	= explode($val_delim, $row);


					if(in_array($val_skip, $tab_elem)){ //$val_skip = valeur a sauter si on rencontre dans le csv
						continue;
					}
					elseif(!is_array($tab_elem)){ //Si on a une ligne vide, continuer
						continue;
					}
					else{
						//Dump into DB table and update the contacts
						$this->set_otourix_course(trim($tab_elem[0]), ucfirst($tab_elem[1]), '1');
                        array_push($arrRegistered, $tab_elem[1]);
					}
                    //$toRet = array_push($arrRegistered, )

				}
				// fermeture fichier
				fclose ($fp);
				//return $compteur;
                return $arrRegistered;
			}
			else{
				return false;
			}

		}

        //Dump the teachings file content into DB
		function csv_dump_teachings($fileOrig='', $val_delim=';', $val_skip='Prefix', $lang='FR'){
			$fileOrig	=	$this->dumpDirectory.$fileOrig;
			// Ouverture fichier en lecture
			if($fp = @fopen($fileOrig,"r")) {
				$toRet = "";
				$compteur = 0;
				$newContent = '';
                $arrRegistered = array();
				while (!feof($fp)){
					$compteur += 1;
					$row 		= fgets($fp);

					$tab_elem	= explode($val_delim, $row);


					if(in_array($val_skip, $tab_elem)){ //$val_skip = valeur a sauter si on rencontre dans le csv
						continue;
					}
					elseif(!is_array($tab_elem)){ //Si on a une ligne vide, continuer
						continue;
					}
					else{
						//Dump into DB table and update the contacts
						$this->set_teachings($tab_elem[0], $tab_elem[1], $tab_elem[2]);
                        array_push($arrRegistered, array('COURSEID' => $tab_elem[0], 'CLASSID' => $tab_elem[1], 'TEACHERID' => $tab_elem[3]));
					}
                    //$toRet = array_push($arrRegistered, )

				}
				// fermeture fichier
				fclose ($fp);
				//return $compteur;
                return $arrRegistered;
			}
			else{
				return false;
			}

		}

		function admin_set_member($new_memberName, $new_memberType, $new_memberLogin, $new_memberPass, $new_memberClass, $new_memberParent, $display='1', $msgError='Error in query<br />'){
			global $thewu32_cLink;
			//$query 	= 	"INSERT INTO $this->tbl_member VALUES('$new_memberId', '$new_memberName', '$new_memberType', '".trim($new_memberLogin)."', '".sha1(trim($new_memberPass))."', '$new_memberClass', '".$this->clear_prefix(trim($new_memberParent))."', '".sha1($this->clear_prefix(trim($new_memberParent)))."', '$display')";
            $new_memberClass      =   (($this->otourix_fix_classes($new_memberClass) != '') ? ($this->otourix_fix_classes($new_memberClass)) : ($new_memberClass));
            $new_memberId	=	($this->get_last_id($this->tbl_member, $this->fld_memberId)) + 1;
			$query 	= 	"INSERT INTO $this->tbl_member VALUES('".$new_memberId."', '".addslashes($new_memberName)."', '".$new_memberType."', '".trim($new_memberLogin)."', '".sha1(trim($new_memberPass))."', '$new_memberClass', '".trim($new_memberParent)."', '".sha1(trim($new_memberParent))."', '$display')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function set_member($new_memberId, $new_memberName, $new_memberType, $new_memberLogin, $new_memberPass, $new_memberClass, $new_memberParent, $display='1', $msgError='Error in query<br />'){
			global $thewu32_cLink;
			//$query 	= 	"INSERT INTO $this->tbl_member VALUES('$new_memberId', '$new_memberName', '$new_memberType', '".trim($new_memberLogin)."', '".sha1(trim($new_memberPass))."', '$new_memberClass', '".$this->clear_prefix(trim($new_memberParent))."', '".sha1($this->clear_prefix(trim($new_memberParent)))."', '$display')";
            $new_memberClass      =   (($this->otourix_fix_classes($new_memberClass) != '') ? ($this->otourix_fix_classes($new_memberClass)) : ($new_memberClass));
            $query 	= 	"INSERT INTO $this->tbl_member VALUES('$new_memberId', '".addslashes($new_memberName)."', '".$new_memberType."', '".trim($new_memberLogin)."', '".sha1(trim($new_memberPass))."', '$new_memberClass', '".trim($new_memberParent)."', '".sha1(trim($new_memberParent))."', '$display')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}

		function set_scholarship($new_scholarshipUsr, $new_scholarshipPaid, $new_scholarshipRemains, $msgError='Error in scholarship\'s insert query<br />'){
			global $thewu32_cLink;
			$new_scholarshipId	=	$this->count_in_tbl($this->tbl_scholarship, $this->fld_scholarshipId);
			$query 	= 	"INSERT INTO $this->tbl_scholarship VALUES('$new_scholarshipId', '$new_scholarshipPaid', '$new_scholarshipRemains', '$new_scholarshipUsr')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function set_note($new_noteRank, $new_noteAverage, $new_noteAppreciation, $new_noteUsr, $new_notePeriod, $msgError='Error in note\'s insert query<br />'){
			global $thewu32_cLink;
			$new_noteId	=	$this->count_in_tbl($this->tbl_note, $this->fld_noteId);
			$query 	= 	"INSERT INTO $this->tbl_note VALUES('$new_noteId', '$new_noteRank', '$new_noteAverage', '$new_noteAppreciation', '$new_noteUsr', '$new_notePeriod', '".$this->get_datetime()."')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function set_orientation($new_member, $new_orientationCat, $new_orientationTitre, $new_orientationDescr, $new_orientationContent, $msgError='Erreur dans l\'insertion des articles d\'orientation<br />'){
			global $thewu32_cLink;
			$new_orientationId	=	$this->count_in_tbl($this->tbl_orientation, $this->fld_orientationId);
			$query 	= 	"INSERT INTO $this->tbl_orientation VALUES('$new_orientationId', '$new_orientationCat', '$new_orientationTitre', '$new_orientationDescr', '$new_orientationContent', '$new_member', '".$this->get_datetime()."')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		//A modifier ulterieurement, pour identifier les membres qui sont connectes. NB utiliser une table pour gerer les connected
		/*function set_connected_member($new_whereId, $valConnected='1'){
			return $this->set_connected($this->fldnew_eltFld, $new_eltValue, $new_whereId);
		}*/
		
		//Toggle Connected/Disconnected
		function set_connected_member($new_connectionId, $new_valConnected='1'){
			return $this->set_connected($this->tbl_memberConnection, 'display', $this->fld_memberConnectionId, $new_connectionId, $new_valConnected);
		}
		
		function load_member_type($pageDest="member.php", $errMsg="", $lang){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_memberType WHERE ORDER BY $this->fld_memberType";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load annonces categories.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = "<ul>";
				while($row = mysqli_fetch_array($result)){
					//$toRet .= "<li><a href=\"$pageDest"."&".$this->URI_annonceCat."=".$row[0]."\">$row[1]</a></li>";
					$toRet .= "<li><a href=\"$pageDest"."-".$row[0].".html\">$row[1]</a></li>";
				}
				$toRet .="</ul>";
			}
			else{
				$toRet = $errMsg;
			}
			return $toRet;
		}
		
		//Charger les requetes dans l'espace membre
		function user_load_requests($usrId, $membre='student', $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"];
		
			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl_where($this->tbl_request, $this->fld_memberId, $usrId);
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
		
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage($nombre, $page, $total);
		
			$query 	= "SELECT * FROM $this->tbl_request WHERE $this->fld_memberId = '$usrId' ORDER BY $this->fld_requestId LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load requests!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"USR_table\">
						<tr>
							<th>N&ordm;</th>
							<th>Titre</th>
							<th>Categorie</th>
							<th>Date</th>
							<th>Etat</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
					
					//Obtenir les libelles des categories
					$categorie 	= 	utf8_encode($this->get_request_cat_by_id($row[1]));
					$date		=	$this->datetime_fr($row[6]);
					$state		=	utf8_encode($this->get_request_state_by_id($row[5]));
					//$stateImg	=	($state	== '1') ? ("<img alt=\"Requ&ecirc;te en cours de traitement\" style=\"border:none; padding-top:5px;\" src=\"img/icons/pending.gif\" />") : ("<img alt=\"Requ&ecirc;te trait&ecirc;e\" style=\"border:none; padding-top:5px;\" src=\"img/icons/treated.gif\" />");
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
					
					//Afficher les liens de modifs et suppression quand la requete est encore en attente de traitement  ?page=requete&membre=$membre&action=list&what=reqDelete&rId=$row[0]									391-assignment-assInsert-teacher.html#ASS_INSERT
					$localMenu = ($row[5] == 1) ? ("<a title=\"Annuler la requ&ecirc;te\" href=\"$membre-requete-list-reqDelete-$row[0].html\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette requ&ecirc;te?')\"><img style=\"border:none;\" src=\"../modules/otourix/img/icons/delete.gif\" /></a>") : ("");
		
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>".stripslashes($row[2])."</td>
					<td>$categorie</td>
					<td>$date</td>
					<td><em>$state</em></td>
					<td valign=\"middle\" nowrap style=\"background-color:#FFF; text-align:center; padding:5px;\">
						$localMenu						
					</td>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}
		
		//Charger les requetes dans l'espace membre
		function parent_load_requests($parentCode, $member='parent', $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$limite = $this->limit;
			if(!$limite) $limite = 0;
		
			//Recherche du nom de la page
			$path_parts = pathinfo($PHP_SELF);
			$page = $path_parts["basename"];
		
			//Obtention du total des enregistrements:
			$total = $this->count_in_tbl_where($this->tbl_request, $this->fld_memberParent, $parentCode);
		
		
			//V&eacute;rification de la validit&eacute; de notre variable $limite......
			$veriflimite = $this->veriflimite($limite, $total, $nombre);
			if(!$veriflimite) $limite = 0;
		
			//Bloc menu de liens
			if($total > $nombre)
				$nav_menu	= $this->cmb_affichepage($nombre, $page, $total);
		
			$query 	= "SELECT * FROM $this->tbl_request WHERE $this->fld_memberParent = '$parentCode' ORDER BY $this->fld_requestId LIMIT ".$limite.",".$nombre;
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$num	= 0;
				$toRet 	= $nav_menu;
				$toRet 	.= "<table class=\"USR_table\">
						<tr>
							<th>N&ordm;</th>
							<th>Titre</th>
							<th>Categorie</th>
							<th>Date</th>
							<th>Etat</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					$num++;
					//alterner les liens public / prive
		
						
					//Obtenir les libelles des categories
					$categorie 	= 	$this->get_request_cat_by_id($row[1]);
					$date		=	$this->datetime_fr($row[6]);
					$state		=	$this->get_request_state_by_id($row[5]);
					//$stateImg	=	($state	== '1') ? ("<img alt=\"Requ&ecirc;te en cours de traitement\" style=\"border:none; padding-top:5px;\" src=\"../modules/otourix/img/icons/pending.gif\" />") : ("<img alt=\"Requ&ecirc;te trait&ecirc;e\" style=\"border:none; padding-top:5px;\" src=\"../modules/otourix/img/icons/treated.gif\" />");
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
						
					//Afficher les liens de modifs et suppression quand la requete est encore en attente de traitement
					$localMenu = ($row[5] == 1) ? ("<!-- <a style=\"border:none;\" title=\"Modifier la requ&ecirc;te\" href=\"$member-requete-update-$row[0].html\"><img style=\"border:none; padding-top:5px;\" src=\"../modules/otourix/img/icons/edit.gif\" /></a> --> $stateImg<a title=\"Annuler la requ&ecirc;te\" href=\"$member-requete-list-reqDelete-$row[0].html\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette requ&ecirc;te?')\"><img style=\"border:none;\" src=\"../modules/otourix/img/icons/delete.gif\" /></a>") : ("");
		
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">$num</td>
					<td>".stripslashes($row[2])."</td>
					<td>$categorie</td>
					<td>$date</td>
					<td><em>$state</em></td>
					<td valign=\"middle\" nowrap style=\"background-color:#FFF; text-align:center; padding:5px;\">
					$localMenu
					</td>
					</tr>";
				}
				$toRet .= "</table>$nav_menu";
					
			}
			else{
			$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
				}
			return $toRet;
		}
		
		//Charger les requetes dans l'espace membre
		function user_load_scholarships($usrId, $membre='student', $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_scholarship WHERE $this->fld_memberId = '$usrId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load user's scholarship infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>Nom</th>
							<th>Montant paye</th>
							<th>Montant restant</th>
						</tr>";
				if($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
						
					//Obtenir les libelles des categories
					$studentInfo 	= 	$this->get_member($row[3]);
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
					
					$toRet .="<tr class=\"$currentCls\">
					<td align=\"center\">".$studentInfo['m_NAME']."</td>
					<td>$row[1] F CFA</td>
					<td>$row[2] F CFA</td>
					</tr>";
				}
				$toRet .= "</table>";
					
			}
			else
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			return $toRet;
		}
		
		//Charger les requetes dans l'espace membre
		function user_load_assignments($usrId, $member='teacher', $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_assignment WHERE $this->fld_memberId = '$usrId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load user's marksheet infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>Titre / Description</th>
							<th>Classe</th>
							<th>Mati&egrave;re</th>
							<th>Date de remise</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
		
					//Obtenir les libelles des categories
					$classes	=	$this->get_field_by_id($this->tbl_memberClass, $this->fld_memberClassId, $this->fld_memberClassLib, $row[7]);
					$courses	=	$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $row[6]);
						
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
					$rank	=	($rank == 1 ) ? ($rank."<sup>er</sup>") : ($rank."<sup>&egrave;me</sup>");
		
					$toRet .="<tr class=\"$currentCls\">
						<td><strong>$row[1]</strong><br /><em>$row[2]</em></td>
						<td>$classes</td>
						<td>$courses</td>
						<td>".$this->datetime_to_datefr($row[9])."</td>
						<td valign=\"middle\" nowrap style=\"background-color:#FFF; text-align:center;\"><a style=\"border:none;\" href=\"$member-assignment-list-assDelete-$row[0].html\"><img style=\"padding:4px; border:none;\" src=\"../modules/otourix/img/icons/delete.gif\" /></a></td>
					</tr>";
				}
				$toRet .= "</table>";
		
			}
			else{
			$toRet	= "<p>Aucune &eacute;preuve &agrave; afficher</p>";
				}
					return $toRet;
		}
		
		//Charger les articles d'orientation scolaire dans l'espace membre des conseillers
		function user_load_orientations($usrId, $member='councilor', $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_orientation WHERE $this->fld_memberId = '$usrId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load user's orientations infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>Cat.</th>
							<th>Titre</th>
							<th>Description</th>
							<th>Date</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
					//Obtenir les libelles des categories
					$category	=	$this->get_field_by_id($this->tbl_orientationCat, $this->fld_orientationCatId, $this->fld_orientationCatLib, $row[1]);
		
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
		
					$toRet .="<tr class=\"$currentCls\">
					<td><strong>$category</strong></td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>".$this->datetime_to_datefr($row[6])."</td>
					<td valign=\"middle\" nowrap style=\"background-color:#FFF; text-align:center;\"><!-- <a style=\"border:none;\" href=\"$member-orientation-orUpdate-Id=$row[0]\"><img style=\"padding:4px; border:none;\" src=\"../modules/otourix/img/icons/update.gif\" /></a>&nbsp;--><a onclick=\"return confirm('&Ecirc;tes vous s&ucirc; de vouloir supprimer cet articles ?')\" style=\"border:none;\" href=\"$member-orientation-list-orDelete-Id=$row[0]\"><img style=\"padding:4px; border:none;\" src=\"../modules/otourix/img/icons/delete.gif\" /></a></td>
					</tr>";
				}
				$toRet .= "</table>";
		
			}
			else{
					$toRet	= "<p>Aucun article d'orientation &agrave; afficher</p>";
				}
					return $toRet;
		}
		
		/*
		 * @desc Charger les articles d'orientation dans l'espace des eleves 
		 * */
		function student_load_orientations($nombre='50', $limit='0'){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_orientation";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load user's orientations infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>Cat&eacute;gorie</th>
							<th>Titre</th>
							<th>Description</th>
							<th>Date</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
					//Obtenir les libelles des categories
					$category	=	utf8_encode($this->get_field_by_id($this->tbl_orientationCat, $this->fld_orientationCatId, $this->fld_orientationCatLib, $row[1]));
		
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
		
					$toRet .="<tr class=\"$currentCls\">
					<td><strong>$category</strong></td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>".$this->datetime_to_datefr($row[6])."</td>
					<td valign=\"middle\"><a title=\"Voir le detail de cet article d'orientation\" target=\"_blank\" style=\"border:none;\" href=\"print_or.php?orientationId=$row[0]\"><img style=\"padding:4px; border:none;\" src=\"../modules/otourix/img/icons/print_preview.png\" /></a></td>
					</tr>";
				}
				$toRet .= "</table>";
		
			}
			else{
			$toRet	= "<p>Aucun article d'orientation &agrave; afficher pour l'instant.</p>";
				}
					return $toRet;
		}
		
		/* @return array
		 * @var string $new_usrId
		 * @desc Get all the orientation articles written by a particular user, to avoid him to change those of the others by manipulating the URL.
		 */
		function get_user_orientations($new_usrId){
			return $this->load_id($this->tbl_orientation, $this->fld_orientationId, "WHERE member_id = '$new_usrId'");
		}
		
		//Charger les requetes dans l'espace membre
		function class_load_assignments($classId, $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_assignment WHERE $this->fld_memberClassId = '$classId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load user's marksheet infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>Titre / Description</th>
							<th>Mati&egrave;re</th>
							<th>Date de remise</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
		
					//Obtenir les libelles des categories
					$classes	=	$this->get_field_by_id($this->tbl_memberClass, $this->fld_memberClassId, $this->fld_memberClassLib, $row[7]);
					$courses	=	$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $row[6]);
		
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
					$rank	=	($rank == 1 ) ? ($rank."<sup>er</sup>") : ($rank."<sup>&egrave;me</sup>");
					$assBtn	=	($row[4] == '') ? ("<a title=\"Voir le contenu de l'&eacute;preuve avant impression\" target=\"_blank\" style=\"border:none;\" href=\"print.php?assId=".$row[0]."\"><img style=\"border:0;\" src=\"img/icons/print_preview.png\" /></a>") : ("<a title=\"Voir le contenu de l'&eacute;preuve avant impression\" target=\"_blank\" style=\"border:none;\" href=\"print.php?assId=".$row[0]."\"><img style=\"border:0;\" src=\"img/icons/print_preview.png\" /></a> | <a style=\"border:0;\" target=\"_blank\" href=\"files/assignments/$row[4]\"><img  style=\"border:0;\" src=\"img/icons/download.png\" /></a>");
		
					$toRet .="<tr class=\"$currentCls\">
					<td><strong>$row[1]</strong><br /><em>$row[2]</em></td>
					<td>$courses</td>
					<td>".$this->datetime_to_datefr($row[9])."</td>
					<td valign=\"middle\">$assBtn</td>
					</tr>";
				}
				$toRet .= "</table>";
		
			}
			else{
					$toRet	= "<p>Aucun devoir &agrave; afficher</p>";
				}
					return $toRet;
		}
		
		//Charger les requetes dans l'espace membre
		function user_load_tests($usrId, $member='teacher', $nombre='50', $limit='0'){				
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_test WHERE $this->fld_memberId = '$usrId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load teacher's tests infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>Titre</th>
							<th>Niveau</th>
							<th>Mati&egrave;re</th>
							<th>Date de publication</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
		
					//Obtenir les libelles des categories
					$classesLevel	=	$this->get_field_by_id($this->tbl_classLevel, $this->fld_classLevelId, $this->fld_classLevelLib, $row[3]);
					$courses		=	$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $row[4]);
					
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
					$rank	=	($rank == 1 ) ? ($rank."<sup>er</sup>") : ($rank."<sup>&egrave;me</sup>");
						
					$toRet .="<tr class=\"$currentCls\">
								<td>$row[1]</td>
								<td>$classesLevel</td>
								<td>$courses</td>
								<td>".$this->datetime_to_datefr($row[7])."</td>
								<td valign=\"middle\"><a onclick=\"return confirm('&Ecirc;tes-vous sur de vouloir supprimer cette &eacute;preuve?')\" style=\"border:none;\" href=\"$member-banque-list-testDelete-$row[0].html\"><img style=\"padding:4px; border:none;\" src=\"../modules/otourix/img/icons/delete.gif\" /></a></td>
							</tr>";
				}
				$toRet .= "</table>";
			
			}
			else{
			$toRet	= "<p>Aucune &eacute;preuve &agrave; afficher</p>";
				}
					return $toRet;
		}
		
		function get_class_level_id(){
			return $this->load_id($this->tbl_classLevel, $this->fld_classLevelId);
		}
		
		function get_class_level_id_by_test(){
			return $this->load_id($this->tbl_test, $this->fld_classLevelId);
		}
		
		function get_test_id(){
			return $this->load_id($this->tbl_test, $this->fld_testId);
		}
		
		function load_test_by_class_level($new_classLevelId){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_test WHERE $this->fld_memberClassLevelId = '$new_classLevelId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load tests by class level!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table><tr><th>Intitul&eacute;</th></tr>";
				$file_ext	=	$this->get_file_ext($row[6]);
				
				$fileUrl	= "files/tests/".$row[6];
				$fileSize	= ceil(filesize($fileUrl) / 1024);
				$fileInfo	= $this->get_file_ext_name($fileUrl);
				
				while($row = mysqli_fetch_array($result)){
					$file_ext	=	$this->get_file_ext($row[6]);
					
					$fileUrl	= "files/tests/".$row[6];
					$fileSize	= @ceil(filesize($fileUrl) / 1024);
					$fileInfo	= $this->get_file_ext_name($fileUrl);
					
					
					//Obtenir les libelles des categories
					$courses		=	$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $row[4]);
						
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("TEST_row1") : ("TEST_row2"));
			
					$toRet .=	"<tr>
									<td><a title=\"Cliquez pour t&eacute;l&eacute;charger l'&eacute;preuve\" style=\"border:0;\" href=\"../modules/otourix/$fileUrl\"> <img align=\"left\" style=\"border:0; padding:5px;\" src=\"../modules/otourix/img/icons/download.png\" /> <strong>$row[1]</strong><br /><em>$row[2]</em></a></td>
								</tr>";
				}
				$toRet .= "</table>";			
			}
			else{
				$toRet	= "<p style=\"margin-left:10px;\">Aucune &eacute;preuve &agrave; afficher</p>";
			}
				return $toRet;
		}
		
		//Charger les notes dans l'espace membre
		function user_load_notes($usrId, $nombre='50', $limit='0'){
			global $thewu32_cLink;
			$query 	= "SELECT DISTINCT * FROM $this->tbl_note WHERE $this->fld_memberId = '$usrId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load user's marksheet infos!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet 	= "<table class=\"USR_table\">
						<tr>
							<th>P&eacute;riode</th>
							<th>Moyenne</th>
							<th>Rang</th>
							<th>Appr&eacute;ciation</th>
							<th>Date de publication</th>
						</tr>";
				while($row = mysqli_fetch_array($result)){
					//alterner les liens public / prive
		
		
					//Obtenir les libelles des categories
					$studentInfo 	= 	$this->get_member($row[4]);
					$rank			=	$row[1];
					//Alternet les css
					$currentCls = ((($num%2)==0) ? ("USR_row1") : ("USR_row2"));
					$rank	=	($rank == 1 ) ? ($rank."<sup>er</sup>") : ($rank."<sup>&egrave;me</sup>");
		
					$toRet .="<tr class=\"$currentCls\">
					<td>".ucfirst($row[5])."</td>
					<td>$row[2]</td>
					<td>$rank</td>
					<td>".ucfirst($row[3])."</td>
					<td>".$this->datetime_fr($row[6])."</td>
					</tr>";
				}
				$toRet .= "</table>";
						
			}
			else{
			$toRet	= "Aucune note &agrave; afficher";
				}
					return $toRet;
			}
		
		/*function admin_cmb_show_rub_by_lang($lang="FR", $FORM_var="", $CSS_class=""){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_memberType WHERE lang='$lang' ORDER BY $this->fld_memberTypeLib";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load member types.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = "";
				//if($FORM_var	== )
				while($row = mysqli_fetch_array($result)){
					$selected = ($FORM_var == $row[0])?("SELECTED"):("");
					$toRet .= "<option value=\"$row[0]\"$selected>$row[1]</option>";
				}
			}
			else{
				$toRet = "<option>Aucun type de membre &agrave; afficher</option>";
			}
			return $toRet;
		}*/
		
		/*Rendre public/prive une categorie*/
		function set_rub_state($new_memberTypeId, $new_stateId){
			return $this->set_updated_1($this->tbl_memberType, "display", $new_stateId, $this->fld_memberTypeId, $new_memberTypeId);
		}
		
		/*Activer/desactiver un membre*/
		function set_member_state($new_memberId, $new_stateId){
			return $this->set_updated_1($this->tbl_member, "display", $new_stateId, $this->fld_memberId, $new_memberId);
		}
		
		/*Activer/desactiver une requete*/
		function set_request_state($new_requestId, $new_stateId){
			return $this->set_updated_1($this->tbl_request, $this->fld_reqStateId, $new_stateId, $this->fld_requestId, $new_requestId);
		}
		
		/*Rendre public/prive une rubrique*/
		function set_member_type_state($new_memberTypeId, $new_stateId){
			return $this->set_updated_1($this->tbl_memberType, "display", $new_stateId, $this->fld_memberTypeId, $new_memberTypeId);
		}
		
		function set_request($new_reqCatId, $new_reqTitle, $new_reqMsg, $new_reqMemberId, $new_parentLogin='0', $new_reqStateId='1', $msgError="Impossible d'ajouter la requ&ecirc;te"){
			global $thewu32_cLink;
			$dateCrea	=	$this->get_datetime();
			$new_requestId	=	($this->get_last_id($this->tbl_request, $this->fld_requestId) +1);
			$query 	= 	"INSERT INTO $this->tbl_request VALUES ($new_requestId, '$new_reqCatId', '$new_reqTitle', '$new_reqMsg', '$new_reqMemberId', '$new_reqStateId', '$dateCrea', '$new_parentLogin')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function otourix_set_connection($new_memberId, $new_memberParent, $new_connectionCount='1', $new_displayValue='1', $msgError="Unable to set an otourix connection"){
			global $thewu32_cLink;
			$newId 	=	($this->count_in_tbl($this->tbl_memberConnection, 'connection_id')) + 1;
			$query	=	"INSERT INTO $this->tbl_memberConnection VALUES ($newId, '$new_connectionCount', '".$this->get_ip()."', '$new_memberId', '$new_memberParent', '$new_displayValue')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			
			if($result)
				return true;
			else
				return false;
		}
		
		function otourix_update_connection_member($new_memberId, $countIncrement = '0', $new_connectedVal = '1', $msgError="Unable to update an otourix member connection"){
			global $thewu32_cLink;
			$newIp	=	$this->get_ip();
			$count	=	$this->otourix_get_connection_count_m($new_memberId) + $countIncrement;
			
			$query	=	"UPDATE $this->tbl_memberConnection SET connection_ip 		= 	'$newIp',
																 connection_count	=	'$count',
													 			 display			=	'$new_connectedVal'
						WHERE member_id		=	'$new_memberId'";
			
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			
			if($result)
				return true;
			else
				return false;
		}

		function otourix_update_connection_parent($new_parentId, $countIncrement = '0', $new_connectedVal='1', $msgError="Unable to update an otourix parent connection"){
			global $thewu32_cLink;
			$newIp	=	$this->get_ip();
			$count	=	$this->otourix_get_connection_count_p($new_parentId) + $countIncrement;
			
			$query	=	"UPDATE $this->tbl_memberConnection SET connection_ip 		= 	'$newIp',
																 connection_count	=	'$count',
													 			 display			=	'$new_connectedVal'
						WHERE member_parent		=	'$new_parentId'";
			
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			
			if($result)
				return true;
			else
				return false;
		}
		
		//Extract the count status of an otourix member
		function otourix_get_connection_count_m($new_memberId){
			return $this->get_field_by_id($this->tbl_memberConnection, 'member_id', 'connection_count', $new_memberId);
		}
		
		//Extract the count status of a parent
		function otourix_get_connection_count_p($new_parentId){
			return $this->get_field_by_id($this->tbl_memberConnection, 'member_parent', 'connection_count', $new_parentId);
				
		}

        function otourix_get_connection_state($new_memberId){
            return $this->get_field_by_id($this->tbl_memberConnection, 'member_id', 'display', $new_memberId);
        }

		/*Supprimer un membre*/
		function del_member($new_memberId){
			return $this->rem_entry($this->tbl_member, $this->fld_memberId, $new_memberId);
		}
		/*Supprimer un membre*/
		function del_request($new_requestId){
			return $this->rem_entry($this->tbl_request, $this->fld_requestId, $new_requestId);
		}
		/**
		 * Supprimer une categorie :
		 * Entraine une suppression en cascade dans les tables mere et fille
		 *
		 * @param int $new_annonceCatId
		 * @return true or false*/
		function del_member_cat($new_memberTypeId){
			if(
					($this->rem_entry($this->tbl_memberType, $this->fld_memberTypeId, $new_memberTypeId))
					&&
					($this->rem_entry($this->tbl_memberType, $this->fld_memberTypeId, $new_memberTypeId))
			)
				return true;
			else
				return false;
		}
		
		
		/**
		 * Afficher les rubriques dans un combobox.
		 *
		 * @param $FORM_var 	: La variable de formulaire, pour fixer la valeur choisie, en cas d'erreur dans le formulaire qui entrainerait le rechargement de la page
		 * @param $CSS_class 	: La classe CSS a utiliser pour enjoliver la presentation
		 */
		function cmb_show_rub($FORM_var="", $CSS_class=""){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_memberType ORDER BY $this->fld_memberTypeLib";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load otourix categories.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = "";
				//if($FORM_var	== )
				while($row = mysqli_fetch_array($result)){
					$selected = ($FORM_var == $row[0])?("SELECTED"):("");
					$toRet .= "<option value=\"$row[0]\"$selected>$row[1]</option>";
				}
			}
			else{
				$toRet = "<option>Aucun type de membre &agrave; afficher</option>";
			}
			return $toRet;
		}
		
		function cmb_load_classes($valSelected=""){
			return $this->admin_cmb_get_row($this->tbl_memberClass, $this->fld_memberClassId, $this->fld_memberClassLib, $this->fld_classLevelId, 'ASC', $valSelected);
		}
		
		/**
		 * Charger les classes ds un combobox redirectionnel
		 * */
		function redir_cmb_load_classes($new_queryString='page=banque&member=student', $classSelected=""){
			global $thewu32_cLink;
			$redir_key 		= 	'clsId'; //$this->URI_classVar;
			$page_redirect 	= 	'student.php'; //$this->mod_page;
			 
			$query 	= 	"SELECT $this->fld_classesId, $this->fld_classesName FROM $this->tbl_classes WHERE display = '1' ORDER BY $this->fld_memberClassLevelId";
			$result	=	mysqli_query($thewu32_cLink, $query) or die("Unable to list classes.<br />".mysqli_error($thewu32_cLink));
			if($total	= 	mysqli_num_rows($result)){
				$toRet = "<option> -- Choose a page -- </option>";
				while($row = mysqli_fetch_row($result)){
					$selected = ($classSelected == $row[0]) ? (" SELECTED") : ("");
					$toRet .= "<option".$selected." value=\"$page_redirect?$new_queryString&$redir_key=$row[0]\">$row[1] ($row[2])</option>";
				}
			}
			else{
				$toRet = "<option value=\"NULL\">No class to display</option>";
			}
			return $toRet;
		}
		
		function redir_cmb_load_classes_levels($pageRedirect='student.php', $new_queryString='page=banque&member=student', $selectLabel='Choisir une classe', $classSelected="", $noResult='No class to be displayed'){
			global $thewu32_cLink;
			$redirKey 		= 	'clsId'; //$this->URI_classVar;
		
			$query 	= 	"SELECT $this->fld_classLevelId, $this->fld_classLevelLib FROM $this->tbl_classLevel WHERE display = '1' ORDER BY $this->fld_classLevelId";
			$result	=	mysqli_query($thewu32_cLink, $query) or die("Unable to list classes.<br />".mysqli_error($thewu32_cLink));
			if($total	= 	mysqli_num_rows($result)){
				$toRet = "<option value=\"$pageRedirect-$new_queryString.html\"> -- $selectLabel -- </option>";
				while($row = mysqli_fetch_row($result)){
					$selected = ($classSelected == $row[0]) ? (" SELECTED") : ("");
					//$toRet .= "<option".$selected." value=\"$pageRedirect?$new_queryString&$redirKey=$row[0]\">$row[1]</option>";
					$toRet .= "<option".$selected." value=\"$pageRedirect-$new_queryString-$row[0].html\">$row[1]</option>";
				}
			}
			else{
				$toRet = "<option value=\"NULL\">$noResult</option>";
			}
			return $toRet;
		}
		
		function redir_cmb_load_existing_test_by_class($new_pageRedirect='student.php', $new_queryString='page=banque&member=student', $new_classLevel ='1', $selectLabel='Choisir une mati&egrave;re', $classSelected="", $noResult='No course to be displayed'){
			global $thewu32_cLink;
			$redirKey 		= 	'courseId'; //$this->URI_classVar;
			
			$query 	= 	"SELECT DISTINCT $this->fld_courseId FROM $this->tbl_test WHERE $this->fld_classLevelId = '$new_classLevel' ORDER BY $this->fld_classLevelId";
			$result	=	mysqli_query($thewu32_cLink, $query) or die("Unable to list courses.<br />".mysqli_error($thewu32_cLink));
			if($total	= 	mysqli_num_rows($result)){
				$toRet = "<option value=\"$new_pageRedirect-$new_queryString-$new_classLevel.html\"> -- $selectLabel -- </option>";
				while($row = mysqli_fetch_row($result)){
					$selected = ($classSelected == $row[0]) ? (" SELECTED") : ("");
					//$toRet .= "<option".$selected." value=\"$pageRedirect?$new_queryString&clsId=$new_classLevel&$redirKey=$row[0]\">".$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $row[0])."</option>";
					$toRet .= "<option".$selected." value=\"$new_pageRedirect-$new_queryString-$new_classLevel-$row[0].html\">".$this->get_field_by_id($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $row[0])."</option>";
				}
			}
			else{
				$toRet = "<option value=\"NULL\">$noResult</option>";
			}
			return $toRet;
		}
		
		function cmb_load_courses($valSelected=""){
			return $this->admin_cmb_get_row($this->tbl_course, $this->fld_courseId, $this->fld_courseName, $this->fld_courseName, 'ASC', $valSelected);
		}
		
		function cmb_load_periods($valSelected){
			//return $this->admin_cmb_get_row($this->tbl_period, $this->fld_periodId, $this->fld_periodLib, $this->fld_periodLib, 'ASC', $valSelected);
			return $this->cmb_get_row_display($this->tbl_period, $this->fld_periodId, $this->fld_periodLib, 'display', $valSelected, '1');
		}
		
		function cmb_load_orientations_categories($lang="FR", $valSelected=""){
			return $this->cmb_get_row_display($this->tbl_orientationCat, $this->fld_orientationCatId, $this->fld_orientationCatLib, 'lang', $valSelected, $lang);
		}
		
		function cmb_load_classes_levels($valSelected=""){
			return $this->admin_cmb_get_row($this->tbl_classLevel, $this->fld_classLevelId, $this->fld_classLevelLib, $this->fld_classLevelId, 'ASC', $valSelected);
		}
		/**
		 * Afficher les rubriques dans un combobox.
		 *
		 * @param $FORM_var 	: La variable de formulaire, pour fixer la valeur choisie, en cas d'erreur dans le formulaire qui entrainerait le rechargement de la page
		 * @param $CSS_class 	: La classe CSS a utiliser pour enjoliver la presentation
		 */
		function cmb_show_req_cat($FORM_var="", $CSS_class=""){
			global $thewu32_cLink;
			$query 	= "SELECT * FROM $this->tbl_requestCat ORDER BY $this->fld_requestCatLib";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load requests categories.<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				$toRet = "";
				//if($FORM_var	== )
				while($row = mysqli_fetch_array($result)){
					$selected = ($FORM_var == $row[0])?("SELECTED"):("");
					$toRet .= "<option value=\"$row[0]\"$selected>".utf8_encode($row[1])."</option>";
				}
			}
			else{
				$toRet = "<option>Aucun type de membre &agrave; afficher</option>";
			}
			return $toRet;
		}
		
		function update_member($new_memberId, $new_memberTypeId, $new_memberClassId, $new_memberName, $new_memberLogin, $new_memberParent){
			global $thewu32_cLink;
			$query = "UPDATE $this->tbl_member SET
			$this->fld_memberTypeId 	= 	'$new_memberTypeId',
			$this->fld_memberClassId	= 	'$new_memberClassId',
			$this->fld_memberName		= 	'$new_memberName',
			$this->fld_memberLogin		= 	'$new_memberLogin',
			$this->fld_memberParent		= 	'$new_memberParent'
			WHERE 	$this->fld_memberId = 	'$new_memberId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to update member information!<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		//Mettre a jour n'importe quel champ de la table des membres, 1 a la fois.
		function update_member_element($new_eltFld, $new_eltValue, $new_whereId){
			global $thewu32_cLink;
			$query	=	"UPDATE $this->tbl_member SET $new_eltFld = '$new_eltValue' WHERE $this->fld_memberId = '$new_whereId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to update member information! $new_eltFld = $new_eltValue<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function update_parent_password($new_parentLogin, $new_parentPassword){
			global $thewu32_cLink;
			$query	=	"UPDATE $this->tbl_member SET $this->fld_memberParentPassword = '$new_parentPassword' WHERE $this->fld_memberParent = '$new_parentLogin'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to update member information! $new_eltFld = $new_eltValue<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}

        function update_otourix_member_account($new_memberId, $new_memberName, $new_memberPass){
            global $thewu32_cLink;
			$query	=	"UPDATE $this->tbl_member SET
                        $this->fld_memberName       =   '$new_memberName',
                        $this->fld_memberPass       =   '$new_memberPass'
                        WHERE $this->fld_memberId   =   '$new_memberId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to update member's account!<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
        }

		function empty_otourix_marks($msgError="Unable to empty the marks table<br />"){
			global $thewu32_cLink;
			$query = "DELETE FROM $this->tbl_note WHERE 1";
			$result = mysqli_query($thewu32_cLink, $query) or die ("$msgError".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}

        function empty_otourix_courses($msgError="Unable to empty the courses table<br />"){
			global $thewu32_cLink;
			$query = "DELETE FROM $this->tbl_course WHERE 1";
			$result = mysqli_query($thewu32_cLink, $query) or die ("$msgError".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}

        function empty_otourix_classes($msgError="Unable to empty the classes table<br />"){
			global $thewu32_cLink;
			$query = "DELETE FROM $this->tbl_classes WHERE 1";
			$result = mysqli_query($thewu32_cLink, $query) or die ("$msgError".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function empty_otourix_members($msgError="Unable to empty the members table<br />"){
			global $thewu32_cLink;
			$query = "TRUNCATE TABLE $this->tbl_member";
			$result = mysqli_query($thewu32_cLink, $query) or die ("$msgError".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}
		
		function empty_otourix_tuitions($msgError="Unable to empty the scholarships table<br />"){
			global $thewu32_cLink;
			$query = "DELETE FROM $this->tbl_scholarship WHERE 1";
			$result = mysqli_query($thewu32_cLink, $query) or die ("$msgError".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
		}

        function flush_otourix_marksheets_by_id($new_marksheetId){
            return $this->cascadel($this->tbl_markSheets, $this->tbl_marksRegistration, $this->fld_msId, $new_marksheetId);
        }

        function flush_otourix_marksheets(){
            if($this->flush_table($this->tbl_markSheets) && $this->flush_table($this->tbl_marksRegistration))
                return true;
            else
                return false;
        }

		//Ajouter un devoir
		function set_assignment($new_assLib, $new_assDescr, $new_assContent, $new_assAttachment, $new_assMember, $new_assCourse, $new_assClass, $new_assPeriod, $new_assDateReturn, $msgError="Unable to insert an assignment!<br />"){
			global $thewu32_cLink;
			$new_assignmentId	=	($this->get_last_id($this->tbl_assignment, $this->fld_assId) +1);
			
			$query 	= 	"INSERT INTO $this->tbl_assignment VALUES($new_assignmentId, '$new_assLib', '$new_assDescr', '$new_assContent', '$new_assAttachment', '$new_assMember', '$new_assCourse', '$new_assClass', '$new_assPeriod', '".$this->get_date()."', '$new_assDateReturn', '1')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return mysqli_insert_id($thewu32_cLink);
				//mysqli_inserted_id()
			else
				return false;
		}
		
		//Ajouter une epreuve dans la banque d'epreuves
		function set_test($new_testLib, $new_testDescr, $new_testCourse, $new_testLevel, $new_teacherId, $new_testAttachment, $new_testDateInsert, $msgError="Unable to insert a test in the data bank!<br />"){
			global $thewu32_cLink;
			$new_testId	=	($this->get_last_id($this->tbl_test, $this->fld_testId)	+	1);

			$query 	= 	"INSERT INTO $this->tbl_test VALUES($new_testId, '$new_testLib', '$new_testDescr', '$new_testLevel', '$new_testCourse', '$new_teacherId', '$new_testAttachment', '".$this->get_datetime()."')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("$msgError<br />".mysqli_error($thewu32_cLink));
			if($result)
				return mysqli_insert_id($thewu32_cLink);
			else
				return false;
		}
		
		function update_test_by_field($fldToUpdate, $valUpdate, $new_testId){
			/*
				* Mettre � jour n'importe kel champ de la table des fichiers, en sachant juste le nom du champ et l'id pivot
				* @param : $fldToUpdate = Champ � mettre � jour
				* @param : $valUpdate	= Nouvelle valeur saisie par l'user
				* @param : $new_testId  = l'Id � circonscrire
				*/
			return $this->update_entry_by_id($this->tbl_test, $this->fld_testId, $fldToUpdate, $valUpdate, $new_testId);
		}
		
		function update_assignment_by_field($fldToUpdate, $valUpdate, $new_assId){
			/*
			 * Mettre � jour n'importe kel champ de la table des fichiers, en sachant juste le nom du champ et l'id pivot
			 * @param : $fldToUpdate = Champ � mettre � jour
			 * @param : $valUpdate	= Nouvelle valeur saisie par l'user
			 * @param : $new_testId  = l'Id � circonscrire
			 */
			return $this->update_entry_by_id($this->tbl_assignment, $this->fld_assId, $fldToUpdate, $valUpdate, $new_assId);
		}
				
		function get_student_by_parent($new_parentLogin){
			global $thewu32_cLink;
			$query	= 	"SELECT $this->fld_memberId FROM $this->tbl_member WHERE $this->fld_memberParent = '$new_parentLogin'";
			$result	=	mysqli_query($thewu32_cLink, $query) or die("Error while trying to get students from the same parent<br />".mysqli_error($thewu32_cLink));
			if($total	=	mysqli_num_rows($result)){
				$retArray	=	array();
				while($row=mysqli_fetch_array($result)){
					array_push($retArray, $row[0]);
				}
				return $retArray;
			}
			else
				return false;
		}
		
		//Toujours verifier l'appartenance avant de supprimer
		function delete_assignment($new_assEntry, $new_assAuthor){
			return $this->rem_entry_twice($this->tbl_assignment, $this->fld_assId, $this->fld_memberId, $new_assEntry, $new_assAuthor);
		}
		
		//Toujours verifier l'appartenance avant de supprimer
		function delete_test($new_testEntry, $new_testAuthor){
			return $this->rem_entry_twice($this->tbl_test, $this->fld_testId, $this->fld_memberId, $new_testEntry, $new_testAuthor);
		}
		
		//Toujours verifier l'appartenance avant de supprimer
		function delete_request($new_reqEntry, $new_reqAuthor){
			return $this->rem_entry_twice($this->tbl_request, $this->fld_requestId, $this->fld_memberId, $new_reqEntry, $new_reqAuthor);
		}
		
		//Toujours verifier l'appartenance avant de supprimer
		function delete_orientation($new_orientationEntry, $new_orientationAuthor){
			return $this->rem_entry_twice($this->tbl_orientation, $this->fld_orientationId, $this->fld_memberId, $new_orientationEntry, $new_orientationAuthor);
		}


        //Supprimer une matiere Otourix
        function delete_otourix_course($new_courseId){
            return $this->rem_entry($this->tbl_course, $this->fld_courseId, $new_courseId);
        }

        //Supprimer une classe Otourix
        function delete_otourix_classes($new_classesId){
            return $this->rem_entry($this->tbl_classes, $this->fld_classesId, $new_classesId);
        }

        //Supprimer une matiere enseignee Otourix
        function delete_otourix_teachings($new_teachingsId){
            return $this->rem_entry($this->tbl_teachings, $this->fld_teachingsId, $new_teachingsId);
        }

		//Comptages
		function count_member_connected(){
			return $this->count_in_tbl_where($this->tbl_memberConnection, 'display', '1');
		}
		
		function count_members($memberType	=	'ALL'){
			switch($memberType){
				case 	'ALL'			: 	$toRet	=	$this->count_in_tbl($this->tbl_member, $this->fld_memberId);
				break;
				case 	'TEACHERS'		:	$toRet	=	$this->count_in_tbl_where1($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, '5');
				break;
				case 	'STUDENTS'		:	$toRet	=	$this->count_in_tbl_where1($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, '3');
				break;
				case 	'COUNCILORS'	:	$toRet	=	$this->count_in_tbl_where1($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, '2');
				break;
				case 	'PARENTS'		:	$toRet	=	$this->count_distinct_in_tbl($this->tbl_member, $this->fld_memberParent);
				break;
			}
			return intval($toRet);		
		}
		
		function count_tuitions(){
			return $this->count_in_tbl_where1($this->tbl_scholarship, $this->fld_scholarshipId, $this->fld_scholarshipRemains, '0');
		}
		
		/**
		 * @desc count the students that have started already to pay their tuitions fees
		 * */
		function count_tuitions_started(){
			return $this->count_in_tbl_where_above($this->tbl_scholarship, $this->fld_scholarshipPaid, '0');
		}
		
		/**
		 * @desc count the students that have finished already to pay their tuitions fees
		 * */
		function count_tuitions_ended(){
			return $this->count_in_tbl_where_above($this->tbl_scholarship, $this->fld_scholarshipRemains, '0');
		}
		
		function count_member_by_cat($cat='1'){
			$arr_memberCat	=	$this->arr_assoc_load_field($this->tbl_memberType, $this->fld_memberTypeId, $this->fld_memberTypeLib);
			/*switch($cat){
				case '1' : $toRet	=	$this->count_in_tbl_where1($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, '3');
			}*/
			return $this->count_in_tbl_where1($this->tbl_member, $this->fld_memberId, $this->fld_memberTypeId, $cat);
		}
		
		function count_parents(){
			return $this->count_distinct_in_tbl($this->tbl_member, $this->fld_memberParent);
		}
		
		function connection_checker($new_connectionId){
			
		}

		function password_ini($new_memberId){
			global $thewu32_cLink;			
			$memberInfo	=	$this->get_member($new_memberId);
			$query		=	"UPDATE $this->tbl_member SET $this->fld_memberPass = '".sha1($memberInfo['m_LOGIN'])."' WHERE $this->fld_memberId = '$new_memberId'";
			$result		=	mysqli_query($thewu32_cLink, $query) or die("Impossible de r&eacute;initialiser le mot de passe de cet utilisateur");
			if($result)
				return true;
			else 
				return false;
			
		}

        function cmb_load_students_by_class($new_classId, $new_frmVar){
            return $this->cmb_load_data_where($this->tbl_member, $this->fld_memberId, $this->fld_memberName, $this->fld_memberClassId, $this->fld_memberName, $new_classId, $new_frmVar);
            //return $this->combo_load_row_selected_2($this->tbl_otourix_user, $this->fld_otourix_user_id, $this->fld_otourix_user_type, $this->fld_otourix_class_id, )
        }

        function cmb_load_members($new_memberType='5', $new_txtSelect, $new_frmVar, $maxLenght){
            return $this->cmb_load_data_where($this->tbl_member, $this->fld_memberLogin, $this->fld_memberName, $this->fld_memberTypeId, $this->fld_memberName, $new_memberType, $new_frmVar, $new_txtSelect, 'ASC', $maxLenght);
        }

        function get_teachers_classes($new_teacherId){

        }

        function load_evaluation_sheet($new_evalNum='1', $new_classId='2', $new_matiereId='3'){
            global $mod_lang_output, $thewu32_cLink, $thewu32_appExt, $arr_keepMarks;

			$query 	= "SELECT $this->fld_memberId, $this->fld_memberName, $this->fld_memberLogin FROM $this->tbl_member WHERE $this->fld_memberTypeId = '3' AND $this->fld_classesId = '".$new_classId."' ORDER BY $this->fld_memberName";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members of type $this->fld_memberTypeId!<br />".mysqli_error($thewu32_cLink));

            if($total = mysqli_num_rows($result)){
				$num	= 0;
				//$toRet 	= $nav_menu;
                $toRet  =   "<form method=\"post\" action=\"\">";
				$toRet 	.= "<table class=\"table table-bordered\">
                        <caption>".$this->get_course_by_id($new_matiereId)."</caption>
						<tr>
							<th scope=\"row\">&num;</th>
							<th>Nom de l'&eacute;l&egrave;ve</th>
							<th>Note / 20</th>
						</tr>";

				while($row = mysqli_fetch_array($result)){
					$num++;

                    //alterner les CSS
                    $currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
					$toRet .="
                    <tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td style=\"text-transform: capitalize; padding: 0 0 0 10px;\">".strtolower(stripslashes($row[1]))."<input type=\"hidden\" name=\"hd_marks_$num\" value=\"$row[2]\"></td>
    					<td><input maxlength=\"5\" style=\"background:transparent; border:none; text-align:center;\" name=\"txt_marks[]\" value=\"".$arr_keepMarks[$num-1]."\" title=\"Ins&eacute;rez une note pour l'&eacute;l&egrave;ve ".stripslashes($row[0])."\" type=\"number\" step=\"0.01\"  min=\"0\" max=\"20\" onKeyDown=\"if(this.value.length==5 && event.keyCode!=8) return false;\" onKeyUp=\"if(this.value>20){this.value='0';}else if(this.value<0){this.value='0';}\" /></td>
					</tr>";
				}
				//$toRet .= "</table>$nav_menu";
                $toRet  .=  "<tr><td colspan=\"3\"><button type=\"submit\" name=\"btn_marksInsert\"><i class = 'fa fa-save'></i> Valider les notes</button><input type=\"hidden\" name=\"hd_totalLine\" value=\"$num\" /></td></tr></table></form>";

			}
			else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			}
			return $toRet;
		}

        function load_empty_mark_sheet($new_evalNum='1', $new_classId='2', $new_matiereId='3'){
            global $mod_lang_output, $thewu32_cLink, $thewu32_appExt, $arr_keepMarks;

			$query 	= "SELECT $this->fld_memberId, $this->fld_memberName, $this->fld_memberLogin FROM $this->tbl_member WHERE $this->fld_memberTypeId = '3' AND $this->fld_classesId = '".trim($new_classId)."' ORDER BY $this->fld_memberName";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load members of type $this->fld_memberTypeId!<br />".mysqli_error($thewu32_cLink));

            if($total = mysqli_num_rows($result)){
				$num	= 0;
				//$toRet 	= $nav_menu;
                $toRet  =   "<form method=\"post\" action=\"\">";
				$toRet 	.= "<table class=\"table table-bordered\">
                        <caption>".$this->get_course_name_by_id($new_matiereId)."</caption>
						<tr>
							<th scope=\"row\">&num;</th>
							<th>Nom de l'&eacute;l&egrave;ve</th>
							<th>Note / 20</th>
						</tr>";

				while($row = mysqli_fetch_array($result)){
					$num++;

                    //alterner les CSS
                    $currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
					$toRet .="
                    <tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td style=\"text-transform: capitalize; padding: 0 0 0 10px;\">".strtolower(stripslashes($row[1]))."<input type=\"hidden\" name=\"hd_marks_$num\" value=\"$row[2]\"></td>
    					<td><input maxlength=\"5\" style=\"background:transparent; border:none; text-align:center;\" name=\"txt_marks[]\" value=\"".$arr_keepMarks[$num-1]."\" title=\"Ins&eacute;rez une note pour l'&eacute;l&egrave;ve ".stripslashes($row[1])."\" type=\"number\" step=\"0.01\"  min=\"0\" max=\"20\" onKeyDown=\"if(this.value.length==5 && event.keyCode!=8) return false;\" onKeyUp=\"if(this.value>20){this.value='0';}else if(this.value<0){this.value='0';}\" /></td>
					</tr>";
				}
				//$toRet .= "</table>$nav_menu";
                $toRet  .=  "<tr><td style=\"padding: 10px 0;\" colspan=\"3\"><button type=\"submit\" name=\"btn_marksInsert\"><i class = 'fa fa-save'></i> Valider les notes</button><input type=\"hidden\" name=\"hd_totalLine\" value=\"$num\" /></td></tr></table></form>";

			}
			else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			}
			return $toRet;
		}

        function load_filled_mark_sheet($new_marksheetId){
            global $mod_lang_output, $thewu32_cLink, $thewu32_appExt;
            $query 	= "SELECT * FROM $this->tbl_marksRegistration WHERE $this->fld_msId = '$new_marksheetId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load filled marksheets!<br />".mysqli_error($thewu32_cLink));

            if($total = mysqli_num_rows($result)){
                $courseId   =   $this->get_field_by_id($this->tbl_markSheets, $this->fld_msId, $this->fld_courseId, $new_marksheetId);
                $num	    =   0;
				//$toRet 	= $nav_menu;
                $toRet  =   "<form method=\"post\" action=\"\">";
				$toRet 	.= "<table class=\"table table-bordered\">
                        <caption>".$this->get_course_name_by_id($courseId)."</caption>
						<tr>
							<th scope=\"row\">&num;</th>
							<th>Nom de l'&eacute;l&egrave;ve</th>
                            <!-- <th>Date d'enregistrement</th> -->
							<th>Note / 20</th>
						</tr>";

				while($row = mysqli_fetch_array($result)){
					$num++;
                    $studentName    =   $this->get_member_by_login_2($row[1]);
                    //alterner les CSS
                    $currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
					$toRet .="
                    <tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td style=\"text-transform: capitalize; padding: 0 0 0 10px;\">".strtolower(stripslashes($studentName))."<input type=\"hidden\" name=\"hd_marks_$num\" value=\"$row[1]\"></td>
                        <!-- <td style=\"padding: 0 0 0 10px;\">".$this->date_fr2($row[3])."</td> -->
    					<td><input maxlength=\"5\" style=\"background:transparent; border:none; text-align:center;\" name=\"txt_marksUpd[]\" value=\"".$row[2]."\" title=\"Modifiez une note pour l'&eacute;l&egrave;ve ".stripslashes($studentName)."\" type=\"number\" step=\"0.01\"  min=\"0\" max=\"20\" onKeyDown=\"if(this.value.length==5 && event.keyCode!=8) return false;\" onKeyUp=\"if(this.value>20){this.value='0';}else if(this.value<0){this.value='0';}\" /></td>
					</tr>";
				}
				//$toRet .= "</table>$nav_menu";
                $toRet  .=  "<tr><td style=\"padding: 10px 0;\" colspan=\"3\"><button type=\"submit\" name=\"btn_marksUpdate\"><i class = 'fa fa-save'></i> Modifier les notes</button><input type=\"hidden\" name=\"hd_totalLine\" value=\"$num\" /><input type=\"hidden\" name=\"hd_markSheet\" value=\"$new_marksheetId\" /></td></tr></table></form>";
			}
			else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			}
			return $toRet;
        }

        function export_mark_sheet($new_marksheetId){
            global $mod_lang_output, $thewu32_cLink;
            $query 	= "SELECT * FROM $this->tbl_marksRegistration WHERE $this->fld_msId = '$new_marksheetId'";
			$result	= mysqli_query($thewu32_cLink, $query) or die("Unable to load filled marksheets!<br />".mysqli_error($thewu32_cLink));

            if($total = mysqli_num_rows($result)){
                $courseId   =   $this->get_field_by_id($this->tbl_markSheets, $this->fld_msId, $this->fld_courseId, $new_marksheetId);
                $classId    =   $this->get_field_by_id($this->tbl_markSheets, $this->fld_msId, $this->fld_classesId, $new_marksheetId);
                $msName     =   $this->get_field_by_id($this->tbl_markSheets, $this->fld_msId, $this->fld_msLib, $new_marksheetId);
                $className  =   $this->get_class_by_id($classId);
                $num	    =   0;

                //$toRet 	= $nav_menu;
				$toRet 	= "<table class=\"table table-bordered\">
                        <caption><strong><u>LYCEE&nbsp;DE&nbsp;TSINGA</u></strong><br /><br />FEUILLE&nbsp;DE&nbsp;NOTE&nbsp;No <strong>$msName</strong><br /><strong>CLASSE :</strong> $className - <strong>MATIERE :</strong> ".$this->get_course_name_by_id($courseId)."<br /><br /></caption>
						<tr>
							<th scope=\"row\">No</th>
							<th>Nom de l'&eacute;l&egrave;ve</th>
                            <th>Matricule El&egrave;ve</th>
							<th>Note / 20</th>
                            <th>Date d'enregistrement</th>
						</tr>";

				while($row = mysqli_fetch_array($result)){
					$num++;
                    $studentName    =   $this->get_member_by_login_2($row[1]);
                    //alterner les CSS
                    $currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));
					$toRet .="
                    <tr class=\"$currentCls\">
    					<td align=\"center\">$num</td>
    					<td style=\"text-transform: capitalize; padding: 0 0 0 10px;\">".strtolower(stripslashes($studentName))."</td>
                        <td>$row[1]</td>
    					<td>$row[2]</td>
                        <td style=\"padding: 0 0 0 10px;\">".$this->date_fr2($row[3])."</td>
					</tr>";
				}
				//$toRet .= "</table>$nav_menu";
                $toRet  .=  "</table>";
			}
			else{
				$toRet	= "Aucun &eacute;l&eacute;ment &agrave; afficher";
			}
			return $toRet;
        }

        function get_teacher_classes($new_teacherCode){
            global $thewu32_cLink;
    		$query = "SELECT `$this->fld_classesId` FROM `$this->tbl_classesCoursesTeachers` WHERE $this->fld_memberLogin = '".$new_teacherCode."' ORDER BY $this->fld_classesId ASC";
    		$result = mysqli_query($thewu32_cLink, $query) or die("Erreur d'extraction des classes pour l'enseignant <br />".mysqli_error($thewu32_cLink));
    		if($total = mysqli_num_rows($result)){
    			$retArray = array();
    			while($row=mysqli_fetch_row($result)){
    				array_push($retArray, $row[0]); //NB; le n? 0 = total des enregistrements
    			}
    			return $retArray; //Renvoit un tableau d'Ids avec le total ? l'indice N?0
    		}
    		else
    			return false;
        }

        function get_teacher_courses($new_teacherCode){
            global $thewu32_cLink;
    		$query = "SELECT `$this->fld_courseId` FROM `$this->tbl_classesCoursesTeachers` WHERE $this->fld_memberLogin = '".$new_teacherCode."' ORDER BY $this->fld_courseId ASC";
    		$result = mysqli_query($thewu32_cLink, $query) or die("Erreur d'extraction des matieres pour l'enseignant <br />".mysqli_error($thewu32_cLink));
    		if($total = mysqli_num_rows($result)){
    			$retArray = array();
    			while($row=mysqli_fetch_row($result)){
    				array_push($retArray, $row[0]); //NB; le n? 0 = total des enregistrements
    			}
    			return $retArray; //Renvoit un tableau d'Ids avec le total ? l'indice N?0
    		}
    		else
    			return false;
        }

        function get_teacher_courses_by_class($new_teacherCode, $new_classId){
            global $thewu32_cLink;
    		$query = "SELECT `$this->fld_courseId` FROM `$this->tbl_classesCoursesTeachers` WHERE $this->fld_memberLogin = '".$new_teacherCode."' AND $this->fld_classesId = '".$new_classId."' ORDER BY $this->fld_courseId ASC";
    		$result = mysqli_query($thewu32_cLink, $query) or die("Erreur d'extraction des matieres pour l'enseignant <br />".mysqli_error($thewu32_cLink));
    		if($total = mysqli_num_rows($result)){
    			$retArray = array();
    			while($row=mysqli_fetch_row($result)){
    				array_push($retArray, $row[0]); //NB; le n? 0 = total des enregistrements
    			}
    			return $retArray; //Renvoit un tableau d'Ids avec le total ? l'indice N?0
    		}
    		else
    			return false;
        }

        function get_member_by_login_2($new_memberCode){
            return $this->get_field_by_id($this->tbl_member, $this->fld_memberLogin, $this->fld_memberName, $new_memberCode);
        }

        function set_mark_sheet($new_seqId, $new_courseId, $new_classesId, $new_teacherId){
            global $thewu32_cLink;
            $new_msId	=	($this->get_last_id($this->tbl_markSheets, $this->fld_msId)	+	1);
            $new_msLib  =   'FN-'.$new_seqId.'_'.$new_courseId.'_'.$new_classesId.'-'.$new_msId;

            $query 	= 	"INSERT INTO $this->tbl_markSheets VALUES($new_msId, '$new_msLib', '$new_seqId', '$new_courseId', '$new_classesId', '$new_teacherId', '".$this->get_date()."', '1')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("Impossible de creer la feille de note $new_msLib<br />".mysqli_error($thewu32_cLink));
			if($result)
				return mysqli_insert_id($thewu32_cLink);
			else
				return false;
        }

        function set_marks_registration($new_msId, $new_studentId, $new_mrMark){
            global $thewu32_cLink;
            $new_mrId	=	($this->get_last_id($this->tbl_marksRegistration, $this->fld_mrId)	+	1);

            $query 	= 	"INSERT INTO $this->tbl_marksRegistration VALUES($new_mrId, '$new_studentId', '$new_mrMark', '".$this->get_date()."', '$new_msId')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("Impossible d'enregistrer la note de l'eleve au matricule $new_studentId<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
        }

        /**
        * Creer une matiere Otourix
        */
        function set_otourix_course($new_courseId, $new_courseLib, $new_valDisplay='0'){
            global $thewu32_cLink;
            //$new_courseId	=	($this->get_last_id($this->tbl_course, $this->fld_courseId)	+	1);

            $query 	            = 	"INSERT INTO $this->tbl_course VALUES('$new_courseId', '$new_courseLib', '$new_valDisplay')";
			$result             = 	mysqli_query($thewu32_cLink, $query) or die ("Impossible de cr&eacute;er la mati&egrave;re.<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
        }

        /**
        * Creer une classe Otourix
        */
        function set_otourix_classes($new_classesId, $new_classesLib, $new_classesLevel, $new_valDisplay='0'){
            global $thewu32_cLink;
            //$new_classesId	=	($this->get_last_id($this->tbl_classes, $this->fld_classesId)	+	1);
            $new_classesId      =   (($this->otourix_fix_classes($new_classesId) != '') ? ($this->otourix_fix_classes($new_classesId)) : ($new_classesId));

            $query 	            = 	"INSERT INTO $this->tbl_classes VALUES('$new_classesId', '$new_classesLib', '$new_classesLevel', '$new_valDisplay')";
			$result             = 	mysqli_query($thewu32_cLink, $query) or die ("Impossible de cr&eacute;er la classe Otourix ".$new_classesId.".<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
        }

        /**
        * Creer une matiere enseignee
        */
        function set_teachings($new_courseId, $new_classesId, $new_teacherLogin){
            global $thewu32_cLink;
            $new_teachingsId	=	($this->get_last_id($this->tbl_teachings, $this->fld_teachingsId)	+	1);
            $new_classesId      =   (($this->otourix_fix_classes($new_classesId) != '') ? ($this->otourix_fix_classes($new_classesId)) : ($new_classesId));

            $query 	            = 	"INSERT INTO $this->tbl_teachings VALUES($new_teachingsId, '$new_classesId', '$new_courseId', '$new_teacherLogin', '1')";
			$result             = 	mysqli_query($thewu32_cLink, $query) or die ("Impossible de cr&eacute;er la mati&egrave;re enseign&eacute;e<br />".mysqli_error($thewu32_cLink));
			if($result)
				return mysqli_insert_id($thewu32_cLink);
			else
				return false;
        }

        function update_marks_registration($new_msId, $new_studentId, $new_mrMark){
            global $thewu32_cLink;

            $query 	= 	"UPDATE $this->tbl_marksRegistration SET
                        $this->fld_mrMark = '$new_mrMark',
                        $this->fld_mrDate = '".$this->get_date()."'
                        WHERE ($this->fld_msId = '$new_msId' AND $this->fld_mrStudent = '$new_studentId')";
			$result = 	mysqli_query($thewu32_cLink, $query) or die ("Impossible de modifier la note de l'eleve au matricule $new_studentId<br />".mysqli_error($thewu32_cLink));
			if($result)
				return true;
			else
				return false;
        }

        function chk_mark_sheet($new_courseId, $new_classId, $new_periodId){
    	    global $thewu32_cLink;
    	    $query = "SELECT $this->fld_msId FROM $this->tbl_markSheets WHERE $this->fld_courseId = '$new_courseId' and $this->fld_classesId = '$new_classId' and $this->fld_periodId = '$new_periodId'";
    		$result = mysqli_query($thewu32_cLink, $query) or die ("Erreur d'extraction des donnees pour chk_mark_sheet ".mysqli_error($thewu32_cLink));
    		$row = mysqli_fetch_row($result);
    		if($total = $row[0])  //Mysql a genere au moins 1 resultat
    			return $row[0];
    		else
    			return false;
    	}

        function get_marksheet_by_id($new_markSheetId){
            global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_markSheets WHERE $this->fld_msId = '$new_markSheetId'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to get marksheets info from its Id<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	array(
                            "ms_ID"			    => 	$row[0],
							"ms_LIB"			=> 	$row[1],
							"ms_PERIOD"			=> 	$row[2],
							"ms_COURSE"		    => 	$row[3],
							"ms_CLASS"			=> 	$row[4],
							"ms_TEACHER"		=> 	$row[5],
							"ms_DATE"			=> 	$row[6],
                            "ms_DISPLAY"        =>  $row[7]);
				}
				return $toRet;
			}
			else
				return false;
        }

        function arr_get_marksheets_id_by_teacher($new_teacherLogin){
            //retrun $this->load_id_where_limit()
        }

        function load_marksheet_by_teacher($new_teacherLogin){
            global $thewu32_cLink;
			$query = "SELECT * FROM $this->tbl_markSheets WHERE $this->fld_msTeacher = '$new_teacherLogin'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to load marksheets fo the teacher code $new_teacherLogin<br />".mysqli_error($thewu32_cLink));
            $btn_addNotes   =   "<p><a  class='button' href=\"marks-create.html\">Ajoutez des notes</a></p>";
            $tblHeader      =   "<table class=\"table table-bordered\" style=\"margin-top: 40px;\">
                                    <tr>
                                        <th>No</th>
                                        <th>Feuille de note</th>
                                        <th>P&eacute;riode</th>
                                        <th>Mati&egrave;res</th>
                                        <th>Classes</th>
                                        <th>Date d'enregistrement</th>
                                    </tr>";
			if($total = mysqli_num_rows($result)){

                $num    =   0;
				while($row = mysqli_fetch_row($result)){
				    $num++;
                    //alterner les CSS
                    $currentCls = ((($num%2)==0) ? ("ADM_row1") : ("ADM_row2"));

				    $toRet  .=  "<tr class=\"$currentCls\" style=\"padding:5px; text-align: center;\">
                                    <td style=\"padding:5px 0; text-align: center;\">$num</td>
                                    <td style=\"font-weight: bold; color:#009933\"><a href=\"marks-create@$row[4]@$row[3].html\">$row[1]</a></td>
                                    <td>".$this->get_period_by_id($row[2])."</td>
                                    <td style=\"text-transform:capitalize;\">".strtolower($this->get_course_name_by_id($row[3]))."</td>
                                    <td>$row[4]</td>
                                    <td>".$this->date_fr2($row[6])."</td>
                                </tr>";
				}
				return $tblHeader.$toRet."</table>".$btn_addNotes;
			}
			else
				return $toRet   .=  $tblHeader."<tr style=\"padding:10px; text-align: center;\"><td colspan=\"6\">Vous n'avez encore enregistr&eacute; aucune note.<br /><a  class='button' href=\"marks-create.html\">Cliquez ici</a> pour ajouter des notes</td></tr></table>";
        }

        //Supprimer les feuilles de notes
        function delete_marksheet($new_marksheetId){
            return $this->rem_entry($this->tbl_markSheets, $this->fld_msId, $new_marksheetId);
        }

        //Supprimer toutes les notes enregistrees dans une feuille de notes
        function delete_marks_from_marksheet($new_marksheetId){
            return $this->rem_entry($this->tbl_marksRegistration, $this->fld_msId, $new_marksheetId);
        }

        function delete_teachings($new_teachingsId){
            return $this->rem_entry($this->tbl_teachings, $this->fld_teachingsId, $new_teachingsId);
        }

        //Supprimer les notes en cascade : Suppression des notes et de la feuille de notes y relative
        function cascadel_marks($new_marksheetId){
            if($this->delete_marksheet($new_marksheetId) && $this->delete_marks_from_marksheet($new_marksheetId))
                return true;
            else
                return false;
        }

        function get_otourix_webmarks_settings(){
            global $thewu32_cLink;
    	    $query = "SELECT * FROM $this->tbl_marksSettings";
    		$result = mysqli_query($thewu32_cLink, $query) or die("Unable to get OTOURIX Web Marks settings!<br />".mysqli_error($thewu32_cLink));
    		if($total = mysqli_num_rows($result)){
    			$toRet = array();
    			while($row = mysqli_fetch_array($result)){
    				$toRet = array(
    						 "ID"      	=> 	$row[0],
    						 "PERIOD" 	=> 	$row[1],
    						 "STATE"   	=> 	$row[2],
    						 "DISPLAY"	=> 	$row[3]);
    			}
    			return $toRet;
    		}
    		else{
    			return false;
    		}
        }

        function update_otourix_webmarks_settings($new_webmarkPeriod, $new_webmarkState){
            global $thewu32_cLink;
            $query  =   "UPDATE $this->tbl_marksSettings SET
                        period_id       =   $new_webmarkPeriod,
                        settings_state  =   $new_webmarkState";
            $result = mysqli_query($thewu32_cLink, $query) or die("Erreur de mise &agrave; jour des r&egrave;glages OTOURIX Web Marks".mysqli_error($thewu32_cLink));
    		if($result){
    			return true; //$err_msg .= "Le Champ $field_to_update a ete mis ? jour";
    		}
    		else{
    			return false;
    		}

        }

        function update_otourix_classes($selected_classId, $new_classId, $new_className, $new_classLevel){
            global $thewu32_cLink;
            $query  =   "UPDATE $this->tbl_classes SET
                        $this->fld_classesId    =   '$new_classId',
                        $this->fld_classesName  =   '$new_className',
                        $this->fld_classLevelId =   '$new_classLevel'
                        WHERE $this->fld_classesId = '$selected_classId'";
            $result = mysqli_query($thewu32_cLink, $query) or die("Erreur de mise &agrave; jour des informations sur la classe".mysqli_error($thewu32_cLink));
    		if($result){
    			return true; //$err_msg .= "Le Champ $field_to_update a ete mis ? jour";
    		}
    		else{
    			return false;
    		}

        }

        function update_otourix_course($selectedId, $new_courseId, $new_courseName){
            global $thewu32_cLink;
            $query  =   "UPDATE $this->tbl_course SET
                        $this->fld_courseId     =   '$new_courseId',
                        $this->fld_courseName   =   '$new_courseName'
                        WHERE $this->fld_courseId = '$selectedId'";
            $result = mysqli_query($thewu32_cLink, $query) or die("Erreur de mise &agrave; jour des informations sur la mati&egrave;re".mysqli_error($thewu32_cLink));
    		if($result){
    			return true; //$err_msg .= "Le Champ $field_to_update a ete mis ? jour";
    		}
    		else{
    			return false;
    		}

        }

        function update_otourix_teachings($selected_teachingsId, $new_classId, $new_courseId, $new_teacherLogin){
            global $thewu32_cLink;
            $query  =   "UPDATE $this->tbl_teachings SET
                        $this->fld_classesId    =   '$new_classId',
                        $this->fld_courseId     =   '$new_courseId',
                        $this->fld_memberLogin  =   '$new_teacherLogin'
                        WHERE $this->fld_teachingsId = '$selected_teachingsId'";
            $result = mysqli_query($thewu32_cLink, $query) or die("Erreur de mise &agrave; jour des informations sur la classe".mysqli_error($thewu32_cLink));
    		if($result){
    			return true; //$err_msg .= "Le Champ $field_to_update a ete mis ? jour";
    		}
    		else{
    			return false;
    		}

        }

		//function get_teacher_by_teachings($new_teachin)

        function chk_otourix_teachings($new_teacher, $new_class, $new_course){
            //Chec if a course and classe have been assigned to a specified teacher
            if($this->chk_entry_trice($this->tbl_teachings, $this->fld_classesId, $this->fld_courseId, $this->fld_memberLogin, $new_class, $new_course, $new_teacher))  return true;
            //Chec if a course and classe have been assigned to any teacher
            elseif($this->chk_entry_twice($this->tbl_teachings, $this->fld_classesId, $this->fld_courseId, $new_class, $new_course)) return true;
            //return true if none of the two above are valid
            else return false;
        }

		function chk_otourix_teachings_already($newTeacher, $newClass, $newCourse){
			global $thewu32_cLink;
    	    $query = "SELECT * FROM $this->tbl_teachings WHERE $this->fld_classesId = '$newClass' AND $this->fld_courseId = '$newCourse' AND $this->fld_memberLogin != '$newTeacher'";
    		$result = mysqli_query($thewu32_cLink, $query) or die ("Erreur d'extraction des donnees pour verification de l'inexistence d'une matiere enseignee.".mysqli_error($thewu32_cLink));
    		$row = mysqli_fetch_row($result);
    		if($total = $row[0])  //Mysql a genere au moins 1 resultat
    			return true;
    		else
    			return false;
		}

        function chk_entry_trice_diff($tbl, $fld1, $fld2, $fld3, $entry1, $entry2, $entry3){
    	    global $thewu32_cLink;
    	    $query = "SELECT * FROM $tbl WHERE $fld1 = '$entry1' AND $fld2 = '$entry2' AND $fld3 != '$entry3'";
    		$result = mysqli_query($thewu32_cLink, $query) or die ("Erreur d'extraction des donnees pour test sur 3 valeurs ".mysqli_error($thewu32_cLink));
    		$row = mysqli_fetch_row($result);
    		if($total = $row[0])  //Mysql a genere au moins 1 resultat
    			return true;
    		else
    			return false;
    	}

        function chk_otourix_course($new_courseId, $new_courseLib){
            if(($this->chk_entry($this->tbl_course, $this->fld_courseId, $new_courseId)) || ($this->chk_entry($this->tbl_course, $this->fld_courseName, $new_courseLib)))
                return true;
            else return false;
        }

        function chk_otourix_classes($new_classesId, $new_classesLib){
            if(($this->chk_entry($this->tbl_classes, $this->fld_classesId, $new_classesId)) || ($this->chk_entry($this->tbl_classes, $this->fld_classesName, $new_classesLib)))
                return true;
            else return false;
        }

        function get_otourix_member_picture($new_memberId, $defaultPix='default-pp.png'){
            global $thewu32_cLink;
			$query = "SELECT $this->fld_memberPixLib FROM $this->tbl_memberPix WHERE $this->fld_memberId = '$new_memberId' AND display = '1'";
			$result = mysqli_query($thewu32_cLink, $query) or die("Unable to get Otourix User's picture!<br />".mysqli_error($thewu32_cLink));
			if($total = mysqli_num_rows($result)){
				while($row = mysqli_fetch_row($result)){
					$toRet 	= 	$row[0];
				}
				return $toRet;
			}
			else
				return $defaultPix;
        }

        //To set a profile picture for a member(replace de default picture)
        function set_otourix_member_picture($new_memberId, $new_memberPicture){
            global $thewu32_cLink;
            $new_upId	=	($this->get_last_id($this->tbl_memberPix, $this->fld_memberPixId)	+	1);
            $query      =   "INSERT INTO $this->tbl_memberPix VALUES ($new_upId, '$new_memberId', '$new_memberPicture', '1')";
            $result     =   mysqli_query($thewu32_cLink, $query) or die("Unable to insert a new profile picture!<br />".mysqli_error($thewu32_cLink));
            	if($result)
				return true;
			else
				return false;
        }

        //Update profile picture of a member
        function update_otourix_member_picture($new_memberId, $new_memberPicture){
            global $thewu32_cLink;
            $query      =   "UPDATE $this->tbl_memberPix SET $this->fld_memberPixLib =   '$new_memberPicture' WHERE $this->fld_memberId   =   '$new_memberId'";
            $result     =   mysqli_query($thewu32_cLink, $query) or die("Unable to update a profile picture!!<br />".mysqli_error($thewu32_cLink));
            	if($result)
				return true;
			else
				return false;
        }

        //To check if a member(Student or teacher or counselor exists
        function chk_otourix_member($new_memberName, $new_memberType){
            return $this->chk_entry_twice($this->tbl_member, $this->fld_memberName, $this->fld_memberTypeId, $new_memberName, $new_memberType);
        }

        //To check if a profile picture exists for a member
        function chk_otourix_member_picture($new_memberId){
            return $this->chk_entry($this->tbl_memberPix, $this->fld_memberId, $new_memberId);
        }

        function switch_state_course($new_courseId, $newState){
            return $this->switch_display($this->tbl_course, $this->fld_courseId, $this->fld_display, $newState, $new_courseId);
        }

        function switch_state_classes($new_classesId, $newState){
            return $this->switch_display($this->tbl_classes, $this->fld_classesId, $this->fld_display, $newState, $new_classesId);
        }

        function switch_state_teachings($new_teachingsId, $newState){
            return $this->switch_display($this->tbl_teachings, $this->fld_teachingsId, $this->fld_display, $newState, $new_teachingsId);
        }

        function otourix_fix_classes($new_classId){
            global $thewu32_fixClasses; //Future feature...
            /*
            6èMx --> 5èMx : 6eMx --> 5eMx (x = 1 --> 7)
            3E5, 3E6 : 3ESP5, 3ESP6
            P ARA : PARA
            TLE A : TLEA
            */
            //Replace 'è' with 'e'
            $newString =  str_ireplace('è', 'e', $this->clear_space($new_classId));
            if($newString   != $new_classId)    return $newString;
            else{
                //Replace 3Ex or 4Ex with 3ESPx or 4ESPx
                for($i = 1; $i<=10; $i++){
                    if(('3E'.$i) == $new_classId){
                        $newString = str_ireplace('E'.$i, 'ESP'.$i, $new_classId);
                        //print $i.'<br />'.$new_classId;
                        return $newString  != '' ? $newString : $new_classId;
                    }
                    if(('3A'.$i) == $new_classId){
                        $newString = str_ireplace('A'.$i, 'ALL'.$i, $new_classId);
                        //print $i.'<br />'.$new_classId;
                        return $newString  != '' ? $newString : $new_classId;
                    }
                    elseif(('4E'.$i) == $new_classId){
                        $newString = str_ireplace('E'.$i, 'ESP'.$i, $new_classId);
                        //print $i.'<br />'.$new_classId;
                        return $newString  != '' ? $newString : $new_classId;
                    }
                    elseif(('4A'.$i) == $new_classId){
                        $newString = str_ireplace('A'.$i, 'ALL'.$i, $new_classId);
                        //print $i.'<br />'.$new_classId;
                        return $newString  != '' ? $newString : $new_classId;
                    }
                    else{
                        //print $i.' - '.$new_classId.'<br />';
                        continue;
                    }
                }

            }

        }

	}