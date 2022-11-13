<?php
    $system->user_session_checker($_SESSION['CONNECTED_TEACHER']);
?>
<div id="csao_pathway"><?php print $system->greet_by_lang().", <strong>".$_SESSION['mName']."</strong>"; ?><?php if(isset($_REQUEST['page'])){?> | <a href="<?php print $pageHome; ?>">Retour &agrave; l'accueil</a><?php } ?></div>
							<div id="main_col">
								<?php print $box_passwordUpdate; ?>
								<?php if(!isset($_REQUEST['page'])) {?>
									<h1>Bienvenue</h1>
									<p>Bienvenue dans votre espace membre personnalis&eacute;</p>
									<p>En tant qu'enseignant, vous pourrez parcourir cet environnement et serez capables de :</p>
									<ul>
										<li>Ajouter, modifier et/ou supprimer des &eacute;preuves dans la banque d'&eacute;preuves qui seront mis &agrave; la disposition des &eacute;l&egrave;ves ;</li>
										<li>Publier les assignments qui seront du coup accessibles aux  &eacute;l&egrave;ves en telechargement ;</li>
										<li>Envoyer des requ&ecirc;tes &agrave; l'administration concernant un probl&egrave;me donn&eacute;.</li>
									</ul>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'account'){ ?>
										<h1>Modification du Mot de passe</h1>
										<?php if(isset($_POST['btn_passwordUpdate'])) print $msgDisplay; ?>
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
											<?php print $msgDelete; ?>
                                            
										<?php if($_REQUEST['what'] == 'list') {?>
											<h2>Vos &eacute;preuves<span title="Ajouter une &eacute;preuve" style="float:right;"><a href="<?php print "$member-banque-create.html#TEST_INSERT" ?>"><i class="fa fa-plus-circle"></i></a></span></h2></h2></h2>
											<?php print $myMember->user_load_tests($_SESSION['mId']); ?>
								
											<!-- ?page=banque&member=teacher&action=testInsert#TEST_INSERT -->
											<p>&raquo; <a href="<?php print "$member-banque-create.html#TEST_INSERT"; ?>">Ajouter une &eacute;preuve</a></p>
										<?php } ?>
										<?php if($_REQUEST['what'] == 'create') { ?>
											<h2>Ajouter une &eacute;preuve</h2><a name="TEST_INSERT"></a>
											<?php if(isset($_POST['btn_testInsert'])) print $msgDisplay; ?>
											<form enctype="multipart/form-data" method="POST" action="">
												<div class="frmLine"><div class="frmLabel">Titre<span class="errorRed">*</span> :</div><div class="frmElt"><input name="txt_testLib" type="text" class="input_text" id="txt_testLib" value="<?php print $myMember->show_content($err_testInsert, $_POST['txt_testLib'])?>" /></div></div>
												<div class="frmLine"><div class="frmLabel">Description<span class="errorRed">*</span> : </div><div class="frmElt"><textarea name="ta_testDescription" class="input_text" id="ta_testDescription" cols="10" rows="5"><?php print $myMember->show_content($err_testInsert, $_POST['ta_testDescription'])?></textarea></div></div>
												<div class="frmLine"><div class="frmLabel">Mati&egrave;res<span class="errorRed">*</span> : </div><div class="frmElt"><select name="sel_testCourses" class="input_text" id="sel_testCourses"><option value=""> - Choisir une mati&egrave;re - </option><?php print $myMember->cmb_load_courses($_POST['sel_testCourses']); ?></select></div></div>
												<div class="frmLine"><div class="frmLabel">Niveau d'Etude<span class="errorRed">*</span> : </div><div class="frmElt"><select name="sel_testLevels" class="input_text" id="sel_testLevels"><option value=""> - Choisir un niveau d'&eacute;tude - </option><?php print $myMember->cmb_load_classes_levels($_POST['sel_testLevels']); ?></select></div></div>
												<div class="frmLine"><div class="frmLabel">Pi&egrave;ce-jointe<span class="errorRed">*</span> : </div><div class="frmElt"><input name="testFile" placeholder="La pi&egrave;ce-jointe ici" type="file" id="testFile" /></div><span style="font-size:80%; font-style:italic; font-weight:normal;" >(Type : PDF, DOC, DOCX, TXT. Max 3Mo)</div>
												<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input style="width:50%;" type="submit" name="btn_testInsert" id="btn_testInsert" value="Ajouter une &eacute;preuve" /></div></div>
											</form>
										<?php }?>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'assignment'){ ?>
										<h1>Les devoirs</h1>
										<?php print $msgDelete; ?>
										
										<?php if($_REQUEST['what'] == 'list') {?>
											<h2>Vos devoirs<span title="Ajouter un devoir" style="float:right;"><a href="<?php print "$member-assignment-create.html#ASS_INSERT" ?>"><i class="fa fa-plus-circle"></i></a></span></h2></h2>
											<?php print $myMember->user_load_assignments($_SESSION['mId']); ?>
											<!-- ?page=assignment&member=teacher&action=assInsert#ASS_INSERT -->
											<p>&raquo; <a href="<?php print "$member-assignment-create.html#ASS_INSERT"; ?>">Ajouter un devoir</a></p>
										<?php } ?>

										<?php if($_REQUEST['what'] == 'create') { ?>
											<h2>Proposez un devoir</h2><a name="ASS_INSERT"></a>
											<?php if(isset($_POST['btn_assInsert'])) print $msgDisplay; ?>
											<form enctype="multipart/form-data" method="POST" action="">
												<div class="frmLine"><div class="frmLabel">Titre<span class="errorRed">*</span> :</div><div class="frmElt"><input name="txt_assLib" type="text" class="input_text" id="txt_assLib" value="<?php print $myMember->show_content($err_assInsert, $_POST['txt_assLib']); ?>" /></div></div>
												<div class="frmLine"><div class="frmLabel">Objectif<span class="errorRed">*</span> : </div><div class="frmElt"><textarea name="ta_assDescription" class="input_text" id="ta_assDescription" cols="10" rows="5"><?php print $myMember->show_content($err_assInsert, $_POST['ta_assDescription']); ?></textarea></div></div>
												<div class="frmLine"><div class="frmLabel">Classes<span class="errorRed">*</span> : </div><div class="frmElt"><select name="sel_assClasses" class="input_text" id="sel_assClasses"><option value=""> - Choisir une classe - </option><?php print $myMember->cmb_load_classes($_POST['sel_assClasses']); ?></select></div></div>
												<div class="frmLine"><div class="frmLabel">Mati&egrave;res<span class="errorRed">*</span> : </div><div class="frmElt"><select name="sel_assCourses" class="input_text" id="sel_assCourses"><option value=""> - Choisir une mati&egrave;re - </option><?php print $myMember->cmb_load_courses($_POST['sel_assCourses']); ?></select></div></div>
												<div class="frmLine"><div class="frmLabel">P&eacute;riode<span class="errorRed">*</span> : </div><div class="frmElt"><select name="sel_assPeriods" class="input_text" id="sel_assPeriods"><option value=""> - Choisir une p&eacute;riode - </option><?php print $myMember->cmb_load_periods($_POST['sel_assPeriods']); ?></select></div></div>
												<div class="frmLine"><div class="frmLabel">Date limite de restitution du devoir<span class="errorRed">*</span> : </div><div class="frmElt"><?php print $myMember->combo_datetimeFr($ass_dateReturn); ?></div></div>												
												<div class="frmLine"><div class="frmLabel">Corps du devoir<span class="errorRed">*</span> : </div><div class="frmElt"><textarea name="ta_assContent" class="csao_editor input_text" id="ta_assContent" cols="10" rows="15"><?php print $myMember->show_content($err_assInsert, $_POST['ta_assContent']); ?></textarea></div></div>
												<div class="frmLine"><div class="frmLabel">Pi&egrave;ce-jointe : </div><div class="frmElt"><input name="assFile" placeholder="La pi&egrave;ce-jointe ici" type="file" id="assFile" /></div></div>
												<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input style="width:50%;" type="submit" name="btn_assInsert" id="btn_assInsert" value="Ajouter le devoir" /></div></div>
											</form>
										<?php } ?>
								<?php } ?>
								<?php if($_REQUEST['page'] == 'requete'){ ?>
										<h1>Les requ&ecirc;tes</h1>
										<?php print $msgDelete; ?>
										
										<?php if($_REQUEST['what'] == 'list') {?>
											<h2>Vos requ&ecirc;tes actuelles<span title="Ajouter une requ&ecirc;te" style="float:right;"><a href="<?php print "$member-requete-create.html#REQ_INSERT" ?>"><i class="fa fa-plus-circle"></i></a></span></h2>
											<?php print $myMember->user_load_requests($_SESSION['mId'], 'teacher'); ?>
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
								<div class="clrBoth"></div>
							</div>