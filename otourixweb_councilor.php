<?php
	$system->user_session_checker($_SESSION['CONNECTED_COUNCILOR']);
?>

<div id="csao_pathway"><?php print $system->greet_by_lang().", <strong>".$_SESSION['mName']."</strong>"; ?><?php if(isset($_REQUEST['page'])){?> | <a href="<?php print $currentPage; ?>">Retour &agrave; l'accueil</a><?php } ?></div>
							<div id="main_col">
								<?php print $box_passwordUpdate; ?>
								<?php if(!isset($_REQUEST['page'])) {?>
									<h1>Bienvenue</h1>
									<p>Bienvenue dans votre espace membre personnalis&eacute;</p>
									<p>En tant que Conseiller d'Orientation, vous pourrez parcourir cet environnement et serez capables de :</p>
									<ul>
										<li>Ins&eacute;rer et/ou supprimer les informations relatives &agrave; l'orientation scolaire ;</li>
										<li>Emettre des requ&ecirc;tes &agrave; l'attention de la hierarchie du CSAO.</li>
									</ul>
								<?php } ?>
								<?php if($_REQUEST[page] == 'account'){ ?>
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
								<?php if($_REQUEST['page'] == 'orientation'){ ?>
										<h1>Orientation scolaire</h1>
                                        <?php print $msgDelete; ?>
                                            
										<?php if($_REQUEST['what'] == 'list') {?>
											<h2>Vos articles d'orientation<span title="Ajouter un article d'orientation scolaire" style="float:right;"><a href="<?php print "$member-orientation-create.html#ORIENTATION_INSERT" ?>"><i class="fa fa-plus"></i></a></span></h2>
										    <?php print utf8_encode($myMember->user_load_orientations($_SESSION['mId'])); ?>
											<p>&raquo; <a href="<?php print "$member-orientation-create.html#ORIENTATION_INSERT" ?>">Ajouter un article d'orientation scolaire</a></p>
                                        <?php } ?>

										<?php if ($_REQUEST['what'] == 'create') { ?>
											<p class="pageDescr">Veuillez remplir correctement le formulaire ci-dessous pour ajouter un article d&eacute;di&eacute; &agrave; l'orientation scolaire des &eacute;l&egrave;ves du C.S.A.O <a name="ORIENTATION_INSERT"></a></p>
											<?php print $msgDisplay; ?>
											<form method="post">
												<div class="frmLine"><div class="frmLabel">Cat&eacute;gorie<span class="errorRed">*</span> :</div><div class="frmElt"><select name="sel_orientationCat"><?php print utf8_encode($myMember->cmb_load_orientations_categories('FR', $sel_orientationCat)); ?></select></div></div>
												<div class="frmLine"><div class="frmLabel">Titre<span class="errorRed">*</span> : </div><div class="frmElt"><input name="txt_orientationTitre" type="text" class="input_text" id="txt_orientationTitre" /></div></div>
												<div class="frmLine"><div class="frmLabel">Description<span class="errorRed">*</span> : </div><div class="frmElt"><textarea class="input_text" name="ta_orientationDescription" rows="5" cols="10" id="ta_orientationDescription"></textarea></div></div>
												<div class="frmLine"><div class="frmLabel">Contenu de l'article<span class="errorRed">*</span> : </div><div class="frmElt"><textarea class="csao_editor input_text" name="ta_orientationContent" id="ta_orientationContent"></textarea></div></div>
												<div class="frmLine"><div class="frmLabel">&nbsp;</div><div class="frmElt"><input type="submit" name="btn_orientationInsert" value="Ajouter un article" /></div></div>
											</form>
										<?php } ?>
										
								<?php } ?>
								<?php if($_REQUEST['page'] == 'requete'){ ?>
										<h1>Les requ&ecirc;tes</h1>

                                        <?php if($_REQUEST['what'] == 'list') {?>
										    <h2>Vos requ&ecirc;tes actuelles<span title="Ajouter une requ&ecirc;te" style="float:right;"><a href="<?php print "$member-requete-create.html#REQ_INSERT" ?>"><i class="fa fa-plus-circle"></i></a></span></h2>
										    <?php print $myMember->user_load_requests($_SESSION['mId'], 'councilor'); ?>
											<p>&raquo; <a href="<?php print "$member-requete-create.html#REQ_INSERT"; ?>">Ajouter une requ&ecirc;te</a></p>
										<?php } ?>

                                        <?php if($_REQUEST['what'] == 'create') {?>
                                            <h2>Soumettez une requ&ecirc;te &agrave; la hierarchie</h2><a name="REQ_INSERT"></a>
                                            <?php print $msgDisplay; ?>
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