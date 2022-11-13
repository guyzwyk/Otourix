<?php
	$system->user_session_checker($_SESSION['CONNECTED_STUDENT'], '../../index.php');
?>


<div id="csao_pathway"><?php print $system->greet_by_lang().", <strong>".$_SESSION['mName']; ?> - <?php print $myMember->get_class_by_student($_SESSION['mId'])."</strong>"; ?><?php if(isset($_REQUEST['page'])){?> | <a href="<?php print $pageHome; ?>">Retour &agrave; l'accueil</a><?php } ?> | <a href="../logout.php" border="0"><img src="../img/dzine/icons/logout.png" />D&eacute;connexion</a></div>
							<div id="main_col">
								<?php print $box_passwordUpdate; ?>
								<?php if(!isset($_REQUEST['page'])) {?>
									<h1>Bienvenue</h1>
									<p>Bienvenue dans votre espace membre personnalis&eacute;</p>
									<p>En tant qu'&eacute;l&egrave;ve, vous pourrez parcourir cet environnement et serez capables de :</p>
									<ul>
										<li>Parcourir la banque d'&eacute;preuves fournies par vos enseignants ;</li>
										<li>T&eacute;l&eacute;charger les assignments soumis par vos enseignants via cette application ;</li>
										<li>Soumettre des requetes &agrave; la hierarchie du CSAO ;</li>
										<li>Parcourir des articles et informations relatives &agrave; l'orientation scolaire ;</li>
										<li>Consulter les informations concernant vos frais d'&eacute;colages ;</li>
										<li>Consulter les informations concernant votre performance acad&eacute;mique ;</li>
										<li>Participer aux jeux en ligne.</li>
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
												<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input type="submit" name="btn_passwordUpdate" value="Modifier" /></div></div>
											</form>
										</div>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'banque'){ ?>
										<h1>Banque d'&eacute;preuves</h1>
										<p>Ci-dessous, la banque d'&eacute;preuves du C.S.A.O.<br />Pour acc&eacute;der aux diff&eacute;rentes &eacute;preuves, vous devez d'abord choisir la classe concern&eacute;e &agrave; partir des zones de listes qui apparaitront ci-dessous au fur-et-&agrave;-mesure:</p>
											<div>
												<select  name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
										      		<?php print stripslashes($myMember->redir_cmb_load_classes_levels($_SESSION['member'], 'banque', 'Choisir une classe...', $_REQUEST['clsId'])); ?>
										    	</select>
									    	</div>
									    	<?php if(isset($_REQUEST['clsId'])) { ?>
										    	&nbsp;
										    	<div>
										    		<select  name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
										      			<?php print stripslashes($myMember->redir_cmb_load_existing_test_by_class($_SESSION['member'], 'banque', $_REQUEST['clsId'], 'Choisir une mati&egrave;re...', $_REQUEST['courseId'], "Aucune mati&egrave;re &agrave; afficher!")); ?>
										    		</select>
										    	</div>
										    <?php } ?>
										<?php 
											if((isset($_REQUEST['courseId'])) && ($_REQUEST['clsId'] > 0) && ($_REQUEST['clsId'] <= 7)) { 
												print "<div><br /><h2>".$myMember->get_field_by_id($myMember->tbl_course, $myMember->fld_courseId, $myMember->fld_courseName, $_REQUEST['courseId'])." pour la classe de <em>\"".ucfirst($myMember->get_field_by_id($myMember->tbl_classLevel, $myMember->fld_classLevelId, $myMember->fld_classLevelLib, $_REQUEST['clsId']))."\"</em></h2>";
												print $myMember->load_test_by_class_level($_REQUEST['clsId'])."<div style=\"clear:both;\"></div></div>";
										
											}
										?>
										<!--  <p style="font-style:italic;">Aucune &eacute;preuve disponible pour l'instant.</p> -->
								<?php } ?>

								
								<?php if($_REQUEST['page'] == 'assignment'){ ?>
										<h1>Les devoirs de classe</h1>
										<h2>Tous les devoirs de la classe de <?php print $myMember->get_class_by_student($_SESSION['mId']); ?></h2>
											<?php print $myMember->class_load_assignments($_SESSION['mClass']); ?>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'requete'){ ?>
										<h1>Les requ&ecirc;tes</h1>
										<?php print $msgDelete; ?>
										
										<?php if($_REQUEST['what'] == 'list') { ?>
											<h2>Vos requ&ecirc;tes actuelles<span title="Ajouter une requ&ecirc;te" style="float:right;"><a href="<?php print "$member-requete-create.html#REQ_INSERT" ?>"><i class="fa fa-plus-circle"></i></a></span></h2>
											<?php print $myMember->user_load_requests($_SESSION['mId'], 'student'); ?>
											<p>&raquo; <a href="<?php print "$member-requete-create.html#REQ_INSERT"; ?>">Ajouter une requ&ecirc;te</a></p>
										<?php } ?>
										
										<?php if($_REQUEST['what'] == 'create') { ?>
											<h2>Soumettez une requ&ecirc;te &agrave; la hierarchie</h2><a name="REQ_INSERT"></a>
											<?php if(isset($_POST['btn_reqInsert'])) print $msgDisplay; ?>
											<div>
												<p class="pageDescr">Veuillez remplir correctement le formulaire ci-dessous afin de soumettre votre requ&ecirc;te &agrave; la hierarchie du CSAO.</p>
												<form method="post" action="">
													<div class="frmLine"><div class="frmLabel">Cat&eacute;gorie<span class="errorRed">*</span> :</div><div class="frmElt"><select name="sel_reqCatId"><option value="0">[Choisir une cat&eacute;gorie]</option><?php print $myMember->cmb_show_req_cat($_POST['sel_reqCatId']);?></select></div></div>
													<div class="frmLine"><div class="frmLabel">Intitul&eacute;<span class="errorRed">*</span> :</div><div class="frmElt"><input name="txt_reqTitle" type="text" class="input_text" id="txt_reqTitle" value="<?php print $myMember->show_content($err_reqInsert, $_POST['txt_reqTitle']); ?>" /></div></div>
													<div class="frmLine"><div class="frmLabel">Votre message ici<span class="errorRed">*</span> :</div><div class="frmElt"><textarea rows="10" cols="10" name="ta_reqMessage"><?php print $myMember->show_content($err_reqInsert, $_POST['ta_reqMessage']); ?></textarea></div></div>
													<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input type="submit" name="btn_reqInsert" value="Soumettre" /></div></div>
												</form>
											</div>
										<?php } ?>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'orientation'){ ?>
										<h1>Orientation scolaire</h1>
										<p class="pageDescr">Ci-dessous, quelques articles d'orientation scolaire post&eacute;s par les Conseillers d'Orientations du C.S.A.O</p>
										<?php print $myMember->student_load_orientations(); ?>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'ecolage'){ ?>
										<h1>Ecolage</h1>
										<p class="pageDescr">Ci-dessous, l'&eacute;tat des paiements de votre scolarit&eacute; au CSAO.</p>
										<?php print $myMember->user_load_scholarships($_SESSION['mId']); ?>
										<p style="font-style:italic;"><u>NB :</u> Derni&egrave;re mise &agrave; jour : <strong><?php print $otourix_lastUpdate; ?></strong></p>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'note'){ ?>
										<h1>Vos notes actuelles</h1>
										<p class="pageDescr">Ci-dessous, une vue de vos notes, reflet de votre performance scolaire au sein du CSAO.</p>
										<?php print $myMember->user_load_notes($_SESSION['mId']); ?>										
								<?php } ?>
								<?php if($_REQUEST['page'] == 'jeu'){ ?>
										<h1>Jeux &eacute;ducatifs interactifs</h1>
										<p style="font-style:italic;">Bient&ocirc;t disponible...</p>
								<?php print $myMember->br(10); } ?>
								
								<div class="clrBoth"></div>
							</div>