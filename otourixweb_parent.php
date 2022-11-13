<?php
    $tabStudent		=	$myMember->get_students_by_parent($_SESSION['PARENT_LOGIN']);
?>
    <div id="csao_pathway"><?php print $system->greet_by_lang()."  cher Parent <strong>[".$_SESSION['PARENT_LOGIN']."],</strong>"; ?><?php if(isset($_REQUEST['page'])){?> | <a href="<?php print $currentPage; ?>">Retour &agrave; l'accueil</a><?php } ?></div>
		<div id="main_col">
			<?php print $box_passwordUpdate; ?>
			<?php if(!isset($_REQUEST['page'])) {?>
				<h1>Bienvenue</h1>
				<p>Bienvenue dans votre espace membre personnalis&eacute;</p>
				<p>En tant que parent d'&eacute;l&egrave;ve(s), vous pourrez parcourir cet environnement et serez capables de :</p>
				<ul>
					<li>Voir l'&eacute;tat de paiement des frais d'&eacute;colage de <?php print $lbl_yourChildren; ?> au CSAO ;</li>
					<li>Acc&eacute;der aux notes de <?php print $lbl_yourChildren; ?> ;</li>
					<li>T&eacute;l&eacute;charger les &eacute;preuves pour <?php print $lbl_yourChildren; ?> ;</li>
					<li>Envoyer des requ&ecirc;tes &agrave; l'administration concernant un probl&egrave;me donn&eacute;.</li>
				</ul>
			<?php } ?>

			<?php if($_REQUEST['page'] == 'account'){ ?>
				<h1>Modification du Mot de passe</h1>
				<?php print $msgDisplay; ?>
				<div>
					<p class="pageDescr">Remplissez correctement le formulaire ci-dessous pour modifier votre mote de passe</p>
					<form method="POST" action="">
						<div class="frmLine"><div class="frmLabel">Mot de passe actuel<span class="errorRed">*</span> :</div><div class="frmElt"><input name="txt_oldPassword" type="password" class="input_text" id="txt_oldPassword" value="" /></div></div>
						<div class="frmLine"><div class="frmLabel">Nouveau Mot de passe<span class="errorRed">*</span> : </div><div class="frmElt"><input name="txt_newPassword1" type="password" class="input_text" id="txt_newPassword1" value="" /></div></div>
						<div class="frmLine"><div class="frmLabel">Repetez le Nouveau Mot de passe<span class="errorRed">*</span> : </div><div class="frmElt"><input name="txt_newPassword2" type="password" class="input_text" id="txt_newPassword2" value="" /></div></div>
						<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input type="submit" name="btn_passwordUpdateParent" value="Modifier" /></div></div>
					</form>
				</div>
			<?php } ?>
								
            <?php if($_REQUEST['page'] == 'banque'){ ?>
				<h1>Banque d'&eacute;preuves</h1>
				<p><em>Vous &ecirc;tes dans la banque d'&eacute;preuves du C.S.A.O.<br />Pour acc&eacute;der aux diff&eacute;rentes &eacute;preuves, vous devrez tout d'abord choisir la classe concern&eacute;e et ensuite choisir la mati&egrave;re qui vous int&eacute;resse dans les listes d&eacute;roulantes ci-dessous :</em></p>
				<div>
				    <select  name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
						<?php print stripslashes($myMember->redir_cmb_load_classes_levels($_SESSION['member'], 'banque', 'Choisir une classe...', $_REQUEST['clsId'])); ?>
					</select>
				</div>
				<?php if (isset($_REQUEST['clsId'])) { ?>
					&nbsp;
					<div>
						<select  name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
							<?php print stripslashes($myMember->redir_cmb_load_existing_test_by_class($_SESSION['member'], 'banque', $_REQUEST['clsId'], 'Choisir une mati&egrave;re...', $_REQUEST['courseId'], "Aucune mati&ecirc;re &agrave; afficher")); ?>
						</select>
					</div>
				<?php } ?>
				<?php 
					if((isset($_REQUEST['courseId'])) && ($_REQUEST['clsId'] > 0) && ($_REQUEST['clsId'] <= 7)) { 
						print "<div><br /><h2>".$myMember->get_field_by_id($myMember->tbl_course, $myMember->fld_courseId, $myMember->fld_courseName, $_REQUEST['courseId'])." pour la classe de <em>\"".ucfirst($myMember->get_field_by_id($myMember->tbl_classLevel, $myMember->fld_classLevelId, $myMember->fld_classLevelLib, $_REQUEST['clsId']))."\"</em></h2>";
						print $myMember->load_test_by_class_level($_REQUEST['clsId'])."<div style=\"clear:both;\"></div></div>";					
					}
				?>
			<?php } ?>
								
            <?php if($_REQUEST['page'] == 'requete'){ ?>
				<h1>Les requ&ecirc;tes</h1>
				<h2>Vos requ&ecirc;tes actuelles<span title="Ajouter une requ&ecirc;te" style="float:right;"><a href="<?php print "$member-requete-create.html#REQ_INSERT" ?>"><i class="fa fa-plus-circle"></i></a></span></h2>
				<?php print $myMember->parent_load_requests($_SESSION['PARENT_LOGIN'], $member); ?>
				<p>&nbsp;</p>
				<h2>Soumettez une requ&ecirc;te &agrave; la hierarchie</h2>
				<?php print $msgDisplay; ?>
				<div>
					<p class="pageDescr">Veuillez remplir correctement le formulaire ci-dessous afin de soumettre votre requ&ecirc;te &agrave; la hierarchie du CSAO.</p>
					<form method="post" action="">
						<div class="frmLine"><div class="frmLabel">Cat&eacute;gorie<span class="errorRed">*</span> :</div><div class="frmElt"><select name="sel_reqCatId"><option value="0">[Choisir une cat&eacute;gorie]</option><?php print $myMember->cmb_show_req_cat($_POST['sel_reqCatId']);?></select></div></div>
						<div class="frmLine"><div class="frmLabel">Intitul&eacute;<span class="errorRed">*</span> :</div><div class="frmElt"><input name="txt_reqTitle" type="text" class="input_text" id="txt_reqTitle" value="<?php print $myMember->show_content($err_reqInsert, $_POST['txt_reqTitle']); ?>" /></div></div>
						<div class="frmLine"><div class="frmLabel">Votre message ici<span class="errorRed">*</span> :</div><div class="frmElt"><textarea rows="10" cols="10" name="ta_reqMessage"><?php print $myMember->show_content($err_reqInsert, $_POST['ta_reqMessage']); ?></textarea></div></div>
						<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input type="submit" name="btn_reqInsertParent" value="Soumettre la requ&ecirc;te" /></div></div>
					</form>
				</div>
			<?php } ?>
				
            <?php if($_REQUEST['page'] == 'ecolage'){ ?>
				<h1>Ecolage</h1>
				<p class="pageDescr">Ci-dessous, l'&eacute;tat des paiements des frais de scolarit&eacute; de <?php print $lbl_yourChildren; ?> au CSAO.</p>
				<?php
					foreach($tabStudent as $studentEcolage)
						print $myMember->user_load_scholarships($studentEcolage); 
				?>
				<p style="font-style:italic;"><u>NB :</u> Derni&egrave;re mise &agrave; jour : <strong><?php print $otourix_lastUpdate; ?></strong></p>
			<?php } ?>
								
            <?php if($_REQUEST[page] == 'note'){ ?>
			    <h1>Les moyennes obtenues par <?php print $lbl_yourChildren; ?></h1>
				<p class="pageDescr">Ci-dessous, une vue de vos notes, reflet de la performance scolaire au sein du CSAO de <?php print $lbl_yourChildren2; ?>.</p>
				<?php	
                    if(is_array($tabStudent)){
					    foreach ($tabStudent as $studentNote) 
					    print "<h2>".$myMember->get_student_by_id($studentNote)."<span style=\"font-size:70%; color:#ec6f1c;\"> - ".$myMember->get_class_by_student($studentNote)."</span></h2>".$myMember->user_load_notes($studentNote);
					}
				?>
			<?php } ?>					
								
			<?php print $myMember->br(5); ?>
			<div class="clrBoth"></div>
		</div>