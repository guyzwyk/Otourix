<?php
    /***********************************************************
    *                 Module language and validation calls                     *
    ************************************************************/
    require('../modules/otourix/langfiles/'.$langFile.'.php');
	require_once('../modules/otourix/inc/otourix_validations.php');
    
    $wmSettings                     =   $myOtourix->get_otourix_webmarks_settings();
    $_SESSION['mPeriod']            =   $wmSettings['PERIOD'];
?>

    <p style="font-style: italic;">Il y a actuellement <a href="#openModalConnected"><?php print $myMember->count_member_connected(); ?> membre(s) connect&eacute;(s)</a></p>
    <?php //print $myOtourix->otourix_fix_classes("4E4"); ?><br /><br />
    <!--
	<p> 
		<?php 
			foreach($arr_accountType as $key => $value){
				print 'Nombre de compte '.$value['LEVEL'].' : '.$myMember->count_member_by_cat($value['ID']).'<br />';
			}
		?>
	</p>
	<p>Le veritable nombre de parents : <?php print $myMember->count_parents(); ?></p>
	 -->
	 
	<?php if(isset($action_msgOk)) print $action_msgOk; ?>
	
	<?php if($_REQUEST['what'] == 'loaddata'){ ?>
	<!-- Tab buttons start -->
	<div class="but_list">
	
		<!-- File load and dump validations -->
		
		<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li id="tab_0" class="active" role="presentation">
					<a id="membres-tab" role="tab" aria-expanded="true" aria-controls="membres" href="#membres" data-toggle="tab">Membres</a>
				</li>
                <li id="tab_1" role="presentation">
					<a id="classes-tab" role="tab" aria-controls="classes" href="#classes" data-toggle="tab">Classes</a>
				</li>
                <li id="tab_1" role="presentation">
					<a id="courses-tab" role="tab" aria-controls="courses" href="#courses" data-toggle="tab">Mati&egrave;res</a>
				</li>
                <li id="tab_1" role="presentation">
					<a id="teachings-tab" role="tab" aria-controls="teachings" href="#teachings" data-toggle="tab">Mati&egrave;s enseign&eacute;es</a>
				</li>
				<li id="tab_1" role="presentation">
					<a id="ecolages-tab" role="tab" aria-controls="ecolages" href="#ecolages" data-toggle="tab">Ecolages</a>
				</li>
				<li id="tab_2" role="presentation">
				    <a id="notes-tab" role="tab" aria-controls="notes" href="#notes" data-toggle="tab">Notes</a>
				</li>
			</ul>
			
			<!-- Tabs contents start -->

            <!-- ********************************* Charger les membres depuis un fichier csv  ******************************************************
			****************************************************************************************************************-->
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade in active" id="membres" role="tabpanel" aria-labelledby="membres-tab">

						<div class="tab-content">
						
							<?php if(isset($file_uploadMsg)) print $file_uploadMsg; ?>
							<?php if(isset($file_dumpMsg)) print $file_dumpMsg; ?>
							
							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
									
									<h3><?php print $mod_lang_output['PAGE_HEADER_MEMBER_IMPORT']?></h3>
									<div class="form-group">
										<label for="memberFile" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_MEMBER_FILE_IMPORT']?></label>
										<div class="col-sm-8">
											<input class="form-control1" name="memberFile" placeholder="<?php print $mod_lang_output['FORM_LABEL_MEMBER_FILE_IMPORT']?>" type="file" id="memberFile" />
										</div>
										<div class="col-sm-2">
											<p class="help-block redStar"><?php print $mod_lang_output['FORM_HELP_CSV_ONLY']?>!</p>
										</div>
									</div>
									<div class="panel-footer">
						                <div class="row">
						                    <div class="col-sm-8 col-sm-offset-2">
						                        <button type="submit" name="btn_file_send_member" id="btn_file_send_member" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_IMPORT_MEMBER']?></button>
						                    </div>
						                </div>
					             	</div>
								</form>
							</div>
						</div>
						<p>&nbsp;</p><p>&nbsp;</p>
					
				</div>

                <!-- ********************************* Charger les classes  ******************************************************
				****************************************************************************************************************-->
				<div class="tab-pane fade" id="classes" role="tabpanel" aria-labelledby="classes-tab">

					<?php //if($_REQUEST[what] == 'otourixLoad'){ ?>
						<div class="tab-content">

							<?php if(isset($file_uploadMsg_classes)) print $file_uploadMsg_classes; ?>
							<?php if(isset($file_dumpMsg_classes)) print $file_dumpMsg_classes; ?>

							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">

									<h3><?php print $mod_lang_output['PAGE_HEADER_CLASSES_IMPORT']?></h3>
									<div class="form-group">
										<label for="classesFile" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_CLASSES_FILE_IMPORT']?></label>
										<div class="col-sm-8">
											<input class="form-control1" name="classesFile" placeholder="<?php print $mod_lang_output['FORM_LABEL_CLASSES_FILE_IMPORT']?>"  type="file" id="classesFile" />
										</div>
										<div class="col-sm-2">
											<p class="help-block redStar"><?php print $mod_lang_output['FORM_HELP_CSV_ONLY']?>!</p>
										</div>
									</div>
									<div class="panel-footer">
						                <div class="row">
						                    <div class="col-sm-8 col-sm-offset-2">
						                        <button type="submit" name="btn_file_send_classes" id="btn_file_send_classes" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_IMPORT_CLASSES']?></button>
						                    </div>
						                </div>
					             	</div>
								</form>
							</div>
						</div>
						<p>&nbsp;</p><p>&nbsp;</p>
					<?php //} ?>
				</div>


                <!-- ********************************* Charger les matieres otourix  ******************************************************
				****************************************************************************************************************-->
				<div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">

					<?php //if($_REQUEST[what] == 'otourixLoad'){ ?>
						<div class="tab-content">

							<?php if(isset($file_uploadMsg_courses)) print $file_uploadMsg_courses; ?>
							<?php if(isset($file_dumpMsg_courses)) print $file_dumpMsg_courses; ?>

							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">

									<h3><?php print $mod_lang_output['PAGE_HEADER_COURSES_IMPORT']?></h3>
									<div class="form-group">
										<label for="coursesFile" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_COURSES_FILE_IMPORT']?></label>
										<div class="col-sm-8">
											<input class="form-control1" name="coursesFile" placeholder="<?php print $mod_lang_output['FORM_LABEL_COURSES_FILE_IMPORT']?>"  type="file" id="coursesFile" />
										</div>
										<div class="col-sm-2">
											<p class="help-block redStar"><?php print $mod_lang_output['FORM_HELP_CSV_ONLY']?>!</p>
										</div>
									</div>
									<div class="panel-footer">
						                <div class="row">
						                    <div class="col-sm-8 col-sm-offset-2">
						                        <button type="submit" name="btn_file_send_courses" id="btn_file_send_courses" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_IMPORT_COURSES']?></button>
						                    </div>
						                </div>
					             	</div>
								</form>
							</div>
						</div>
						<p>&nbsp;</p><p>&nbsp;</p>
					<?php //} ?>
				</div>


                <!-- ********************************* Charger les matieres ensignees  ******************************************************
				****************************************************************************************************************-->
				<div class="tab-pane fade" id="teachings" role="tabpanel" aria-labelledby="teachings-tab">

					<?php //if($_REQUEST[what] == 'otourixLoad'){ ?>
						<div class="tab-content">

							<?php if(isset($file_uploadMsg_teachings)) print $file_uploadMsg_teachings; ?>
							<?php if(isset($file_dumpMsg_teachings)) print $file_dumpMsg_teachings; ?>

							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">

									<h3><?php print $mod_lang_output['PAGE_HEADER_TEACHINGS_IMPORT']?></h3>
									<div class="form-group">
										<label for="teachingsFile" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_TEACHINGS_FILE_IMPORT']?></label>
										<div class="col-sm-8">
											<input class="form-control1" name="teachingsFile" placeholder="<?php print $mod_lang_output['FORM_LABEL_TEACHINGS_FILE_IMPORT']?>"  type="file" id="teachingsFile" />
										</div>
										<div class="col-sm-2">
											<p class="help-block redStar"><?php print $mod_lang_output['FORM_HELP_CSV_ONLY']?>!</p>
										</div>
									</div>
									<div class="panel-footer">
						                <div class="row">
						                    <div class="col-sm-8 col-sm-offset-2">
						                        <button type="submit" name="btn_file_send_teachings" id="btn_file_send_teachings" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_IMPORT_TEACHINGS']?></button>
						                    </div>
						                </div>
					             	</div>
								</form>
							</div>
						</div>
						<p>&nbsp;</p><p>&nbsp;</p>
					<?php //} ?>
				</div>


                <!-- ********************************* Charger les frais d'ecolage  ******************************************************
				****************************************************************************************************************-->
				<div class="tab-pane fade" id="ecolages" role="tabpanel" aria-labelledby="ecolages-tab">

					<?php //if($_REQUEST[what] == 'otourixLoad'){ ?>
						<div class="tab-content">
						
							<?php if(isset($file_uploadMsg_scholarship)) print $file_uploadMsg_scholarship; ?>
							<?php if(isset($file_dumpMsg_scholarship)) print $file_dumpMsg_scholarship; ?>
							
							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
									
									<h3><?php print $mod_lang_output['PAGE_HEADER_TUITION_IMPORT']?></h3>
									<div class="form-group">
										<label for="scholarshipFile" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_TUITION_FILE_IMPORT']?></label>
										<div class="col-sm-8">
											<input class="form-control1" name="scholarshipFile" placeholder="<?php print $mod_lang_output['FORM_LABEL_TUITION_FILE_IMPORT']?>"  type="file" id="scholarshipFile" />
										</div>
										<div class="col-sm-2">
											<p class="help-block redStar"><?php print $mod_lang_output['FORM_HELP_CSV_ONLY']?>!</p>
										</div>
									</div>
									<div class="panel-footer">
						                <div class="row">
						                    <div class="col-sm-8 col-sm-offset-2">
						                        <button type="submit" name="btn_file_send_scholarship" id="btn_file_send_scholarship" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_IMPORT_SCHOLARSHIP']?></button>
						                    </div>
						                </div>
					             	</div>
								</form>
							</div>
						</div>
						<p>&nbsp;</p><p>&nbsp;</p>
					<?php //} ?>
				</div>
				

                <!-- ********************************* Charger les notes de classe  ******************************************************
				****************************************************************************************************************-->
				<div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">

					<?php //if($_REQUEST[what] == 'otourixLoad'){ ?>
						<div class="tab-content">
							
							<?php if(isset($file_uploadMsg_note)) print $file_uploadMsg_note; ?>
							<?php if(isset($file_dumpMsg_note)) print $file_dumpMsg_note; ?>
							
							<div class="tab-pane active" id="horizontal-form">
								<h3><?php print $mod_lang_output['PAGE_HEADER_NOTES_IMPORT']?></h3>
								<form class="form-horizontal" enctype="multipart/form-data" action="" method="post" target="_self">
									
									<div class="form-group">
										<label for="noteFile" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_NOTE_FILE_IMPORT']?></label>
										<div class="col-sm-8">
											<input class="form-control1" name="noteFile" placeholder="<?php print $mod_lang_output['FORM_LABEL_NOTE_FILE_IMPORT']?>" type="file" id="noteFile" />
										</div>
										<div class="col-sm-2">
											<p class="help-block redStar"><?php print $mod_lang_output['FORM_HELP_CSV_ONLY']?>!</p>
										</div>
									</div>
									<div class="panel-footer">
						                <div class="row">
						                    <div class="col-sm-8 col-sm-offset-2">
						                        <button type="submit" name="btn_file_send_note" id="btn_file_send_note" class="btn-success btn">Importer le fichier des notes</button>
						                    </div>
						                </div>
					             	</div>
								</form>
							</div>
						</div>
					<!-- Maintenir les Tab actifs apres validation -->
						<?php if(isset($_POST['btn_file_send_member'])) { ?>
							<script> $('a[href="#membres"]').click(); </script>
                        <?php }  elseif(isset($_POST['btn_file_send_classes'])) { ?>
							<script>
								$('a[href="#classes"]').click();
							</script>
                        <?php }  elseif(isset($_POST['btn_file_send_courses'])) { ?>
							<script>
								$('a[href="#courses"]').click();
							</script>
                        <?php }  elseif(isset($_POST['btn_file_send_teachings'])) { ?>
							<script>
								$('a[href="#teachings"]').click();
							</script>
						<?php }  elseif(isset($_POST['btn_file_send_scholarship'])) { ?>
							<script>
								$('a[href="#ecolages"]').click();
							</script>
						<?php } elseif(isset($_POST['btn_file_send_note'])) { ?>
							<script> $('a[href="#notes"]').click(); </script>
						<?php } ?>
						<!--  -->
				</div>
			</div>
	   	</div>
	</div>
	<!-- Tabs contents end -->
	<?php } ?>
	


	<!-- ********************************* Charger les membres depuis un fichier csv  ******************************************************
      ****************************************************************************************************************-->
	<?php if($_REQUEST['what'] == 'membersDump'){ ?>
		<h3>Load batch of stakeholders in the system</h3>
		<?php if(isset($file_uploadMsg)) print $file_uploadMsg; ?>
		<?php if(isset($file_dumpMsg)) print $file_dumpMsg; ?>
		
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
			
				<form class="form-horizontal"  enctype="multipart/form-data" action="" method="post">
					<div class="form-group">
						<label for="memberFile" class="col-sm-2 control-label">File to load</label>
						<div class="col-sm-8">
	                        <input class="form-control1" name="memberFile" type="file" id="memberFile" />
						</div>
						<div class="col-sm-2">
							<p class="help-block">CSV files only</p>
						</div>
					</div>
					
					<div class="panel-footer">
		                <div class="row">
		                    <div class="col-sm-8 col-sm-offset-2">
		                        <button type="submit" name="btn_file_send_member" id="btn_file_send_member" class="btn-success btn">Import file</button>
		                    </div>
		                </div>
	             	</div>

				</form>
				
			</div>
		</div>
	<?php } ?>
		
	
	<!-- ********************************* Ajouter les membres  ******************************************************
      ****************************************************************************************************************-->
		<?php if($_REQUEST['what']=="create") { ?>
			<h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_ADD_MEMBER']?></h3>
      
			<?php if(isset($member_insert_err_msg)) {  ?>
				<div class="ADM_err_msg"><?php print $member_insert_err_msg; ?></div>
			<?php } ?>
			<?php if(isset($member_insert_cfrm_msg)) {  ?>
				<div class="ADM_cfrm_msg"><?php print $member_insert_cfrm_msg; ?></div>
			<?php } ?>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" action="" method="post">
						<div class="form-group">
	          				<label for="sel_memberType" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_CATEGORY']; ?></label>
	            			<div class="col-sm-8">
	            				<select class="form-control" name="sel_memberType" id="sel_memberType"><?php print $myMember->admin_cmb_show_member_type($_POST['sel_memberType']); ?></select>
	             			</div>
	             			<div class="col-sm-2">
								<!-- <p class="help-block">&nbsp;</p> -->
							</div>
	             		</div>
	             		
						<div class="form-group">
            				<label for="txt_memberName" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_FULL-NAME']; ?><span class="redStar">*</label>
            				<div class="col-sm-8">
            					<input class="form-control1" name="txt_memberName" type="text" value="<?php print $myMember->show_content($member_insert_err_msg, $txt_memberName) ?>" id="txt_memberName" />
            				</div>
            				<div class="col-sm-2">
								<!-- <p class="help-block">&nbsp;</p> -->
							</div>
          				</div>
          				
			          	<div class="form-group">
			            	<label for="txt_memberLogin" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_LOGIN']; ?><span class="redStar">*</span></label>
			            	<div class="col-sm-8">
			            		<input class="form-control1" name="txt_memberLogin" type="text" value="<?php print $myMember->show_content($member_insert_err_msg, $txt_memberLogin) ?>" id="txt_memberLogin" />
			            	</div>
			            	<div class="col-sm-2">
								<!-- <p class="help-block">&nbsp;</p> -->
							</div>
			          	</div>
			          
						<div class="form-group">
			         		<label for="txt_memberPass1" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_PASSWORD']; ?><span class="redStar">*</span></label>
			            	<div class="col-sm-8">
			            		<input class="form-control1" name="txt_memberPass1" type="password" value="<?php print $myMember->show_content($member_insert_err_msg, $txt_memberPass1) ?>" id="txt_memberPass1" />
			            	</div>
			            	<div class="col-sm-2">
								<!-- <p class="help-block">&nbsp;</p> -->
							</div>
			          	</div>
			          	
				        <div class="form-group">
				        	<label for="txt_memberPass2" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_PASSWORD2']; ?><span class="redStar">*</span></label>
				        	<div class="col-sm-8">
				        		<input class="form-control1" name="txt_memberPass2" type="password" value="<?php print $myMember->show_content($member_insert_err_msg, $txt_memberPass2) ?>" id="txt_memberPass2" />
				        	</div>
				        	<div class="col-sm-2">
								<!-- <p class="help-block">&nbsp;</p> -->
							</div>
				        </div>
				        
						<div class="form-group">
            				<label for="sel_memberClass" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_CLASS_STUDENT_ONLY']; ?></label>
            				<div class="col-sm-8">
            					<select class="form-control1" name="sel_memberClass" id="member_selCat"><option value='0'<?php if($_POST[sel_memberClass]=='0') print " SELECTED"; ?>><?php print $mod_lang_output['FORM_VALUE_NO_CLASS']?></option><?php print $myMember->admin_cmb_get_row($myMember->tbl_classes, 'classes_id', 'classes_name', 'classes_name', 'ASC', $_POST[sel_memberClass]); ?></select>
            				</div>
            				<div class="col-sm-2">
								<!-- <p class="help-block">&nbsp;</p> -->
							</div>
          				</div>
          
          				<div class="form-group">
            				<label for="txt_memberTel" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_PARENT_PHONE']?></label>
            				<div class="col-sm-8">
            					<input class="form-control1" name="txt_memberTel" type="text" value="<?php print $myMember->show_content($member_insert_err_msg, $txt_memberTel) ?>" id="txt_memberTel" />
            				</div>
            				<div class="col-sm-2">
								<p class="help-block">Ex: 677977877</p>
							</div>
          				</div>
          				
          				<div class="panel-footer">
			                <div class="row">
			                    <div class="col-sm-8 col-sm-offset-2">
			                        <button type="submit" name="btn_memberInsert" id="btn_memberInsert" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_ADD_MEMBER']?></button>
			                    </div>
			                </div>
		             	</div>
        
				</form>
			</div>
      	</div>
      	
      <?php } ?>
      
      
    <!-- ********************************* Modifier les informations des membres  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what']=="update") { ?>
        <?php $memberType = $myMember->get_member_type_by_id2($_REQUEST['dgtId']); ?>
	    <div class="col-sm-8">
		    <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_UPDATE_MEMBER']?></h3>
		      
		    <?php if(isset($member_update_err_msg)) {  ?>
		        <div class="ADM_err_msg"><?php print $member_update_err_msg; ?></div>
		    <?php } ?>
		    <?php if(isset($member_update_cfrm_msg)) {  ?>
		        <div class="ADM_cfrm_msg"><?php print $member_update_cfrm_msg; ?></div>
		    <?php } ?>
		    <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
			        <form class="form-horizontal" action="" method="post">
				    	
					    <div class="form-group">
		                    <label for="sel_memberTypeUpd" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_CATEGORY']?></label>
					        <div class="col-sm-8">
					            <select class="form-control" name="sel_memberTypeUpd" id="sel_memberTypeUpd"><?php print $myMember->admin_cmb_show_member_type($memberInfo['m_TYPE']); ?></select>
					        </div>
					        <div class="col-sm-2">
							    <!-- <p class="help-block">04 Caracters Max</p> -->
							</div>
					    </div>
					          
					    <div class="form-group">
						    <label for="txt_memberNameUpd" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_FULL-NAME']?></label>
						    <div class="col-sm-8">
						        <input class="form-control1" name="txt_memberNameUpd" type="text" value="<?php print $memberInfo['m_NAME']; ?>" id="txt_memberNameUpd" />
						    </div>
					        <div class="col-sm-2">
							    <!-- <p class="help-block">04 Caracters Max</p> -->
							</div>
					    </div>
					          
					    <div class="form-group">
					        <label for="txt_memberLoginUpd" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_LOGIN']?></label>
					        <div class="col-sm-8">
					            <input class="form-control1" name="txt_memberLoginUpd" type="text" value="<?php print $memberInfo['m_LOGIN']; ?>" id="txt_memberLoginUpd" />
					        </div>
					        <div class="col-sm-2">
							    <!-- <p class="help-block">04 Caracters Max</p> -->
							</div>
					    </div>
					          
					    <div class="form-group">
					        <label for="txt_memberPassUpd" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_PASSWORD']?></label>
					        <div class="col-sm-8">
					            <input class="form-control1" name="txt_memberPassUpd" type="password" value="" id="txt_memberPassUpd" />
					        </div>
					        <div class="col-sm-2">
							    <!-- <p class="help-block">04 Caracters Max</p> -->
							</div>
					    </div>

                        <?php if($memberType == '3') { //Display only if member is student ?>
					    <div class="form-group">
					        <label for="txt_memberNameUpd" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_CLASS_STUDENT_ONLY']?></label>
					        <div class="col-sm-8">
					            <select class="form-control" name="sel_memberClassUpd" id="sel_memberClassUpd"><option value='0'<?php if($memberInfo['m_CLASSID']=='0') print " SELECTED"; ?>>Aucune classe</option><?php print $myMember->admin_cmb_get_row($myMember->tbl_classes, 'classes_id', 'classes_name', 'classes_name', 'ASC', $memberInfo['m_CLASSID']); ?></select>
					        </div>
					        <div class="col-sm-2">
							    <!-- <p class="help-block">04 Caracters Max</p> -->
							</div>
					    </div>
					          
					    <div class="form-group">
					        <label for="txt_memberNameUpd" class="col-sm-2 control-label"><?php print $mod_lang_output['FORM_LABEL_PARENT_PHONE']?></label>
					        <div class="col-sm-8">
					            <input class="form-control1" name="txt_memberTelUpd" type="text" value="<?php print $memberInfo['m_PARENT'] ?>" id="txt_memberTelUpd" size="20" /><input name="hd_memberId" type="hidden" value="<?php print $memberInfo['m_ID'] ?>" id="hd_memberId" />
					        </div>
    					    <div class="col-sm-2">
    						    <!-- <p class="help-block">04 Caracters Max</p> -->
    						</div>
					    </div>
					    <?php } ?>
						<div class="panel-footer">
			                <div class="row">
			                    <div class="col-sm-8 col-sm-offset-2">
			                        <button name="btn_memberUpdate" id="btn_memberUpdate" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_UPDATE']?></button>
			                    </div>
						    </div>
						</div>
			      	</form>
		      	</div>
		    </div>

		</div>
		  
		<!-- Reinitialiser le mot de passe -->
		<div class="col-sm-4">
            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
			  		<h3><?php print $mod_lang_output['PAGE_HEADER_PASSWORD_REINITIALIZE']?></h3>
			  		<form class="form-horizontal" action="" method="post">
			  			<div class="panel-footer">
	                        <div class="row">
	                            <div class="col-sm-8 col-sm-offset-2">
							  		<input type="hidden" name="hd_passwordIni" id="passwordIni" value="<?php print $_REQUEST['memberId']; ?>" />
							  		<button class="btn-success btn"  type="submit" name="btn_passwordIni" id="btn_passwordInitialize" onclick="return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir r&eacute;initialiser ce mot de passe?')">R&eacute;initialiser...</button>
							  	</div>
							</div>
						</div>
			  		</form>
			  	</div>
			</div>
		</div>

		<div style="clear:both;"></div>
    <?php } ?>
      
	
	<!-- ********************************* Afficher les membres  ******************************************************
      ****************************************************************************************************************-->
    <?php if($_REQUEST['what']=="read") { ?>
        <h3>
		    <?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_MEMBERS']?>
			<span class="float-right">
			    <a href="<?php print $system->dgt_set_admin_link_module('otourix', 'create'); ?>" title="<?php print $mod_lang_output['FORM_BUTTON_ADD_MEMBER']; ?>"><?php print $system->admin_button_crud('create'); ?></a>
                <a title="Afficher la liste des enseignants" href="otourix-teachers.html"><i class="fa fa-graduation-cap"></i></a>
                <a title="Afficher la liste des &eacute;l&egrave;ves" href="otourix-students.html"><i class="fa fa-users"></i></a>
					<!--<a title="<?php print $mod_lang_output['FORM_BUTTON_LIST_MEMBERS']; ?>" data-toggle="modal" data-target="#modal-memberDisplay"><?php print $system->admin_button_crud('read'); ?></a> -->
			</span>
		</h3>
        <?php $myMember->limit = $_REQUEST['limite']; ?>

        <div class="col-sm-7">
	        <?php if(isset($member_display_err_msg)) {  ?>
	            <div class="ADM_err_msg"><?php print $member_display_err_msg; ?></div>
	        <?php } ?>
	        <?php if(isset($member_display_cfrm_msg)) {  ?>
	          	<div class="ADM_cfrm_msg"><?php print $member_display_cfrm_msg; ?></div>
	        <?php } ?>
	        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			    <div class="panel-body no-padding">
				    <?php print $myMember->admin_load_members(); ?>
					<div style="clear:both;"></div>
				</div>
	        </div>
        </div>
         
        <div class="col-sm-5">
            <style>
			    /* white color data labels */
				.jqplot-data-label{color:white;}
		    </style>
         	<?php print $chartOut; ?>
        </div>
		<div style="clear:both;"></div>
      		  
    <?php } ?>

    <!-- ********************************* Afficher les matieres  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what'] == 'courses') { ?>
        <h3>
            <?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_COURSES']?>
            <span>
			    <a href="<?php print $system->dgt_set_admin_link_module('otourix', 'courses', 'create'); ?>" title="<?php print $mod_lang_output['FORM_BUTTON_ADD_COURSE']; ?>"><?php print $system->admin_button_crud('create'); ?></a>
				<!--<a title="<?php print $mod_lang_output['FORM_BUTTON_LIST_MEMBERS']; ?>" data-toggle="modal" data-target="#modal-memberDisplay"><?php print $system->admin_button_crud('read'); ?></a> -->
			</span>
        </h3>
		<?php $myMember->limit = $_REQUEST['limite']; ?>

        <?php if(isset($courses_display_err_msg)) {  ?>
            <div class="ADM_err_msg"><?php print $courses_display_err_msg; ?></div>
        <?php } ?>
        <?php if(isset($courses_display_cfrm_msg)) {  ?>
            <div class="ADM_cfrm_msg"><?php print $courses_display_cfrm_msg; ?></div>
        <?php } ?>
        <div class="col-sm-6">
			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-body no-padding">
          			<?php
                        /*print "Action is... ".$_REQUEST['what'];
                        print $_SERVER['QUERY_STRING'];*/
                        print $myMember->admin_load_courses();
                    ?>
          		</div>
          	</div>
        </div>
        <div class="col-sm-6">
            <!--***************** Create/Insert courses *******************************-->
            <?php if($_REQUEST['action'] == 'create') {  ?>

                <?php $courseInfo = $myMember->get_course($_REQUEST['dgtCatId']); ?>
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
                        <strong>Ajouter une mati&egrave;re </strong><hr />
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                        	    <form class="form-horizontal" action="" method="post">
                        		    <div class="form-group" style="padding: 0 15px;">
                        		        <label for="txt_courseIdInsert" class="control-label" style="font-weight:bold;"><?php print $mod_lang_output['FORM_LABEL_CODE']?></label>
                        				<div>
                        				    <input class="form-control1" name="txt_courseIdInsert" type="text" value="<?php print $_POST['txt_courseIdInsert']; ?>" id="txt_courseIdInsert" />
                        				</div>
                        			</div>

                        			<div class="form-group" style="padding: 0 15px;">
                        		        <label for="txt_courseNameInsert" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_LABEL']?></label>
                        				<div>
                        				    <input class="form-control1" name="txt_courseNameInsert" type="text" value="<?php print $_POST['txt_courseNameInsert']; ?>" id="txt_courseNameInsert" />
                        				</div>
                        			</div>

                        			<div class="panel-footer">
                        			    <div class="row">
                        			        <div class="col-sm-8 col-sm-offset-2">
                        			            <input type="hidden" name="hd_courseId" value="<?php print($_REQUEST['dgtCatId']); ?>" />
                        			            <button name="btn_courseInsert" id="btn_courseInsert" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_INSERT']?></button>
                        			        </div>
                        				</div>
                        			</div>
                        		</form>
                        	</div>
                        </div>

                    </div>
                </div>
            <?php }  ?>

            <!--***************** Update courses *******************************-->
            <?php if($_REQUEST['action'] == 'update') {  ?>
                <?php $courseInfo = $myMember->get_course($_REQUEST['dgtCatId']); ?>
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
              			Mati&egrave;re &agrave; modifier : <strong><?php print $myMember->get_course_name_by_id($courseInfo['c_ID']); ?></strong><hr />

                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
            			        <form class="form-horizontal" action="" method="post">
            					    <div class="form-group" style="padding: 0 15px;">
            		                    <label for="txt_courseIdUpd" class="control-label" style="font-weight:bold;"><?php print $mod_lang_output['FORM_LABEL_CODE']?></label>
            					        <div>
            					            <input class="form-control1" <?php print $inputDisable; ?> name="txt_courseIdUpd" type="text" value="<?php print $courseInfo['c_ID']; ?>" id="txt_courseIdUpd" />
            					        </div>
            					    </div>

            					    <div class="form-group" style="padding: 0 15px;">
            		                    <label for="txt_courseNameUpd" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_LABEL']?></label>
            					        <div>
            					            <input class="form-control1" name="txt_courseNameUpd" type="text" value="<?php print $courseInfo['c_NAME']; ?>" id="txt_courseNameUpd" />
            					        </div>
            					    </div>

            						<div class="panel-footer">
            			                <div class="row">
            			                    <div class="col-sm-8 col-sm-offset-2">
            			                        <input type="hidden" name="hd_courseId" value="<?php print($_REQUEST['dgtCatId']); ?>" />
                                                <input type="hidden" name="hd_oldCourseId" value="<?php print($courseInfo['c_ID']); ?>" />
            			                        <button name="btn_courseUpdate" id="btn_courseUpdate" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_UPDATE']?></button>
            			                    </div>
            						    </div>
            						</div>
            			      	</form>
            		      	</div>
            		    </div>

          		    </div>
          	    </div>
            <?php }  ?>
        </div>
        <div style="clear:both;"></div>

    <?php } ?>

    <!-- ********************************* Afficher les classes  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what'] == 'classes') { ?>
        <h3>
            <?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_CLASSES']?>
            <span>
			    <a href="<?php print $system->dgt_set_admin_link_module('otourix', 'classes', 'create'); ?>" title="<?php print $mod_lang_output['FORM_BUTTON_ADD_COURSE']; ?>"><?php print $system->admin_button_crud('create'); ?></a>
				<!--<a title="<?php print $mod_lang_output['FORM_BUTTON_LIST_MEMBERS']; ?>" data-toggle="modal" data-target="#modal-memberDisplay"><?php print $system->admin_button_crud('read'); ?></a> -->
			</span>
        </h3>
		<?php $myMember->limit = $_REQUEST['limite']; ?>

        <?php if(isset($classes_display_err_msg)) {  ?>
            <div class="ADM_err_msg"><?php print $classes_display_err_msg; ?></div>
        <?php } ?>
        <?php if(isset($classes_display_cfrm_msg)) {  ?>
            <div class="ADM_cfrm_msg"><?php print $classes_display_cfrm_msg; ?></div>
        <?php } ?>
        <div class="col-sm-6">
			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-body no-padding">
          			<?php
                        /*print "Action is... ".$_REQUEST['what'];
                        print $_SERVER['QUERY_STRING'];*/
                        print $myMember->admin_load_classes();
                    ?>
          		</div>
          	</div>
        </div>
        <div class="col-sm-6">
            <!--***************** Create/Insert classes *******************************-->
            <?php if($_REQUEST['action'] == 'create') {  ?>
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
                    	<div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <strong>Ajouter une classe</strong><hr />
                        		 <form class="form-horizontal" action="" method="post">
                        			<div class="form-group" style="padding: 0 15px;">
                        		        <label for="txt_classInsert" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_CODE']?></label>
                        			    <div>
                        			        <input class="form-control1" name="txt_classIdInsert" type="text" value="<?php print $_POST['txt_classIdInsert']; ?>" id="txt_classIdInsert" />
                        			    </div>
                        			</div>
                        			<div class="form-group" style="padding: 0  15px;">
                        		        <label for="txt_classNameInsert" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_LABEL']?></label>
                        				<div>
                        					<input class="form-control1" name="txt_classNameInsert" type="text" value="<?php print $_POST['txt_classNameInsert']; ?>" id="txt_classNameInsert" />
                        				</div>
                        			</div>
                                    <div class="form-group" style="padding: 0  15px;">
                        		        <label for="sel_classLevelInsert" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_LEVEL']?></label>
                        			    <div>
                        				    <select class="form-control" name="sel_classLevelInsert" id="sel_classLevelInsert"><?php print $myMember->cmb_load_classes_levels($_POST['sel_classLevelInsert']); ?></select>
                        				</div>
                        			</div>

                        			<div class="panel-footer">
                        			    <div class="row">
                        			        <div class="col-sm-8 col-sm-offset-2">
                        			            <button name="btn_classInsert" id="btn_classInsert" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_INSERT']?></button>
                        			        </div>
                        				</div>
                        			</div>
                        	    </form>
                        	</div>
                        </div>
                    </div>
                </div>
            <?php }  ?>

            <!--***************** Update classes *******************************-->
            <?php if($_REQUEST['action'] == 'update') {  ?>
                <?php $classInfo = $myMember->get_class($_REQUEST['dgtCatId']); ?>
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
          			    Classe &agrave; modifier : <strong><?php print $classInfo['cl_NAME']; ?></strong><hr />
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
            			        <form class="form-horizontal" action="" method="post">
            					    <div class="form-group" style="padding: 0 15px;">
            		                    <label for="txt_classIdUpd" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_CODE']?></label>
            					        <div>
            					            <input class="form-control1" <?php print $inputDisable; ?> name="txt_classIdUpd" type="text" value="<?php print $classInfo['cl_ID']; ?>" id="txt_classIdUpd" />
            					        </div>
            					    </div>
            					    <div class="form-group" style="padding: 0  15px;">
            		                    <label for="txt_classNameUpd" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_LABEL']?></label>
            					        <div>
            					            <input class="form-control1" name="txt_classNameUpd" type="text" value="<?php print $classInfo['cl_NAME']; ?>" id="txt_classNameUpd" />
            					        </div>
            					    </div>
                                    <div class="form-group" style="padding: 0  15px;">
            		                    <label for="sel_classLevelUpd" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_LEVEL']?></label>
            					        <div>
            					            <select class="form-control" name="sel_classLevelUpd" id="sel_classLevelUpd"><?php print $myMember->cmb_load_classes_levels($classInfo['cl_LEVEL']); ?></select>
            					        </div>
            					    </div>

            						<div class="panel-footer">
            			                <div class="row">
            			                    <div class="col-sm-8 col-sm-offset-2">
            			                        <input type="hidden" name='hd_classId' value='<?php print $_REQUEST['dgtCatId']; ?>' />
                                                <input type="hidden" name='hd_oldClassId' value='<?php print $classInfo['cl_ID']; ?>' />
            			                        <button name="btn_classUpdate" id="btn_classUpdate" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_UPDATE']?></button>
            			                    </div>
            						    </div>
            						</div>
            			      	</form>
            		      	</div>
            		    </div>
          		    </div>
          	    </div>
            <?php }  ?>
        </div>
        <div style="clear:both;"></div>

    <?php } ?>

    <!-- ********************************* Afficher les matieres enseignees  ******************************************************
        ****************************************************************************************************************-->
    <?php if($_REQUEST['what'] == 'teachings') { ?>
        <h3>
            <?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_TEACHINGS']?>
            <span>
			    <a href="<?php print $system->dgt_set_admin_link_module('otourix', 'teachings', 'assign'); ?>" title="<?php print $mod_lang_output['FORM_BUTTON_ASSIGN_TEACHINGS']; ?>"><?php print $system->admin_button_crud('create'); ?></a>
				<!--<a title="<?php print $mod_lang_output['FORM_BUTTON_LIST_MEMBERS']; ?>" data-toggle="modal" data-target="#modal-memberDisplay"><?php print $system->admin_button_crud('read'); ?></a> -->
			</span>
        </h3>
		<?php $myMember->limit = $_REQUEST['limite']; ?>

        <?php if(isset($teachings_display_err_msg)) {  ?>
            <div class="ADM_err_msg"><?php print $teachings_display_err_msg; ?></div>
        <?php } ?>
        <?php if(isset($teachings_display_cfrm_msg)) {  ?>
            <div class="ADM_cfrm_msg"><?php print $teachings_display_cfrm_msg; ?></div>
        <?php } ?>
        <div class="col-sm-7">
			<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				<div class="panel-body no-padding">
                    <?php
                        /*print "Action is... ".$_REQUEST['what'];
                        print $_SERVER['QUERY_STRING'];*/
                        print $myMember->admin_load_teachings();
                    ?>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <!--***************** Assign teachings to any teacher *******************************-->
            <?php if($_REQUEST['action'] == 'assign') { ?>
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
                        <strong>Ajouter une mati&egrave;re enseign&eacute;e</strong><hr />
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                        	    <form class="form-horizontal" action="" method="post">
                        	        <div class="form-group" style="padding: 0 15px;">
                        		        <label for="sel_teacherTeachings" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_TEACHER-NAME']?></label>
                        			    <div>
                        				    <select class="form-control" name="sel_teacherTeachings" id="sel_teacherTeachings"><?php print $myMember->cmb_load_members(5, $myMember->get_member_by_login($_POST['sel_teacherTeachings']), $_POST['sel_teacherTeachings']); ?></select>
                        				</div>
                        			</div>
                        		    <div class="form-group" style="padding: 0 15px;">
                        		        <label for="sel_courseTeachings" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_COURSE']?></label>
                        			    <div>
                        				    <select class="form-control" name="sel_courseTeachings" id="sel_courseTeachings"><?php print $myMember->cmb_load_courses($_POST['sel_courseTeachings']); ?></select>
                        				</div>
                        			</div>
                        			<div class="form-group" style="padding: 0  15px;">
                        		        <label for="sel_classTeachings" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_CLASS']?></label>
                        				<div>
                        				    <select class="form-control" name="sel_classTeachings" id="sel_classTeachings"><?php print $myMember->cmb_load_classes($_POST['sel_classTeachings']); ?></select>
                        				</div>
                        			</div>

                        			<div class="panel-footer">
                        			    <div class="row">
                        			        <div class="col-sm-8 col-sm-offset-2">
                        			            <button name="btn_teachingsInsert" id="btn_teachingsInsert" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_INSERT']?></button>
                        			        </div>
                        				</div>
                        			</div>
                        		</form>
                        	</div>
                        </div>

                    </div>
                </div>

            <?php } ?>

            <!--***************** Update teachings *******************************-->
            <?php if($_REQUEST['action'] == 'update') {  ?>
                <?php $teachingsInfo = $myMember->get_teaching($_REQUEST['dgtCatId']); ?>
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
                        <i class="fa fa-graduation-cap"></i> <strong><?php print $teacher = $myMember->get_member_name_by_login($teachingsInfo['tc_TEACHERID']); ?></strong><hr />
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                        	    <form class="form-horizontal" action="" method="post">
                        		    <div class="form-group" style="padding: 0 15px;">
                        		        <label for="sel_courseUpd" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_COURSE']?></label>
                        			    <div>
                        				    <select class="form-control" name="sel_courseUpd" id="sel_courseUpd"><?php print $myMember->cmb_load_courses($teachingsInfo['tc_COURSEID']); ?></select>
                        				</div>
                        			</div>
                        			<div class="form-group" style="padding: 0  15px;">
                        		        <label for="sel_classUpd" class="control-label" style="font-weight: bold;"><?php print $mod_lang_output['FORM_LABEL_CLASS']?></label>
                        				<div>
                        				    <select class="form-control" name="sel_classUpd" id="sel_classUpd"><?php print $myMember->cmb_load_classes($teachingsInfo['tc_CLASSID']); ?></select>
                        				</div>
                        			</div>

                        			<div class="panel-footer">
                        			    <div class="row">
                        			        <div class="col-sm-8 col-sm-offset-2">
                        			            <input type="hidden" name='hd_teacherLogin'value='<?php print $teachingsInfo['tc_TEACHERID']; ?>' />
                                                <input type="hidden" name='hd_teachingsId' value='<?php print $_REQUEST['dgtCatId']; ?>' />
                        			            <button name="btn_teachingsUpdate" id="btn_teachingsUpdate" class="btn-success btn"><?php print $mod_lang_output['FORM_BUTTON_UPDATE']?></button>
                        			        </div>
                        				</div>
                        			</div>
                        		</form>
                        	</div>
                        </div>

                    </div>
                </div>

                <!-- Display all related teachings -->
                <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
				    <div class="panel-body no-padding">
                        <h5>Toutes les matieres enseignees par <?php print $teacher;  ?> :</h5>
                        <div class="tab-content">
                            <div class="tab-pane active" id="horizontal-form">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Classe</th>
                                        <th>Mati&egrave;re</th>
                                        <th>Action</th>
                                    </tr>
                                <?php
                                    $arrTeachings = $myMember->get_teachings($teachingsInfo['tc_TEACHERID']);
                                    $limite = (isset($_REQUEST['limite']) ? (','.$_REQUEST['limite']) : (''));
                                    foreach($arrTeachings as $value){
                                        print "<tr>
                                                    <td>".$myMember->get_class_by_id($value['CLASSID'])."</td>
                                                    <td>".$myMember->get_course_name_by_id($value['COURSEID'])."</td>
                                                    <td align=\"center\">
                                                        <!-- <a><img src=\"img/icons/delete.gif\" /></a> -->
                                                        <a title=\"Supprimer l'assignation\" href=\"otourix-teachings-clear@".$value['TEACHINGSID']."$limite$thewu32_appExt\" onclick=\"return confirm('&Ecirc;tes-vous s&ucirc;r de vouloir supprimer cette assignation?')\"><img src=\"img/icons/delete.gif\" /></a>
                                                    </td>
                                                </tr>";
                                    }
                                ?>
                                </table>
                            </div>
                        </div>
				    </div>
                </div>

            <?php }  ?>
        </div>
        <div style="clear:both;"></div>

    <?php } ?>


      
    <!-- ********************************* Afficher les ecolages  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what']=="tuitionsread") { ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_TUITIONS']?></h3>
		<?php $myMember->limit = $_REQUEST['limite']; ?>
          
        <?php if(isset($scholarship_display_err_msg)) {  ?>
            <div class="ADM_err_msg"><?php print $scholarship_display_err_msg; ?></div>
        <?php } ?>
        <?php if(isset($scholarship_display_cfrm_msg)) {  ?>
            <div class="ADM_cfrm_msg"><?php print $scholarship_display_cfrm_msg; ?></div>
        <?php } ?>
		<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
		    <div class="panel-body no-padding">
          	    <?php print $myMember->admin_load_scholarships(); ?>
          	</div>
        </div>
    <?php } ?>
      
    <!-- ********************************* Afficher les notes  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what']=="marks") { ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_NOTES']?></h3>
		<?php $myMember->limit = $_REQUEST['limite']; ?>
          
        <?php if(isset($note_display_err_msg)) {  ?>
            <div class="ADM_err_msg"><?php print $note_display_err_msg; ?></div>
        <?php } ?>
        <?php if(isset($note_display_cfrm_msg)) {  ?>
            <div class="ADM_cfrm_msg"><?php print $note_display_cfrm_msg; ?></div>
        <?php } ?>
		<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
		    <div class="panel-body no-padding">
		        <?php
                    /*$seqId  =   '1';
                    $query  =   "SELECT a.mr_student, a.mr_mark, a.mr_date_enreg, b.matieres_id, b.classes_id, b.period_id FROM kol_otourix_mark_registration a, kol_otourix_mark_sheets b WHERE a.ms_id = b.ms_id and b.period_id = $seqId";
                    print 'Total est : '.$myMember->count_query($query).'<br />';  */
                    $seq = $_SESSION['mPeriod'];
                    print "<h4><span style=\"font-weight:bold; text-decoration:underline;\">Notes de la s&eacute;quence ".$seq."</span><span style=\"float:right; padding:0 10px 0 0;\"><i class=\"fa fa-download\"></i> <a target=\"_blank\" href=\"../plugins/data-export/\">Exporter</a></span></h4>";
                    print "<div style=\"height:800px; overflow:auto;\">".
                                $myMember->admin_load_marks_by_period($seq, 1000)."</div>";
                ?>
          	</div>
        </div>
    <?php } ?>
      
    <!-- ********************************* Afficher les requetes  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what']=="requestsread") { ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_LIST_REQUESTS']?></h3>
		<?php $myMember->limit = $_REQUEST['limite']; ?>
          
        <?php if(isset($request_display_err_msg)) {  ?>
            <div class="ADM_err_msg"><?php print $request_display_err_msg; ?></div>
        <?php } ?>
        <?php if(isset($request_display_cfrm_msg)) {  ?>
            <div class="ADM_cfrm_msg"><?php print $request_display_cfrm_msg; ?></div>
        <?php } ?>
		<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
		    <div class="panel-body no-padding">
          	    <?php print $myMember->admin_load_requests(); ?>
          	</div>
        </div>
    <?php } ?>
      
    <!-- ********************************* Afficher les liens pour purger les tables  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what'] == 'flushdata') { ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_OTOURIX_DATA_EMPTY']; ?> </h3>
        <?php if(isset($empty_data_msg)) print $empty_data_msg; ?>
        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
		    <div class="panel-body no-padding">
			    <ul>
				    <li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_MEMBERS_DELETE']; ?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'members'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_MEMBER_TABLE']; ?></a></li>
                    <li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_CLASSES_DELETE']; ?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'classes'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_CLASSES_TABLE']; ?></a></li>
                    <li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_COURSES_DELETE']; ?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'courses'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_COURSES_TABLE']; ?></a></li>
                    <li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_TEACHINGS_DELETE']; ?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'teachings'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_TEACHINGS_TABLE']; ?></a></li>
		          	<li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_TUITIONS_DELETE']; ?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'tuitions'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_TUITIONS_TABLE']; ?></a></li>
		          	<li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_MARKS_DELETE']?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'marks'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_NOTES_TABLE']; ?></a></li>
		          	<li><a onclick = "return confirm('<?php print $mod_lang_output['FORM_CONFIRM_MARKSHEETS_DELETE']?>')" href="<?php print $system->dgt_set_admin_link_module('otourix', 'flushdata', 'marksheets'); ?>"><?php print $mod_lang_output['PAGE_LINK_EMPTY_MARKSHEETS_TABLE']; ?></a></li>
		        </ul>
			</div>
		</div>
    <?php } ?>

    <!-- ********************************* Afficher les enseignants uniquement  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what']   ==  'teachers') { ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: Liste des enseignants dans le systeme </h3>
        <?php $myMember->limit = $_REQUEST['limite']; ?>
        <span class="float-right">
		    <a href="<?php print $system->dgt_set_admin_link_module('otourix', 'create'); ?>" title="<?php print $mod_lang_output['FORM_BUTTON_ADD_MEMBER']; ?>"><?php print $system->admin_button_crud('create'); ?></a>
            <a title="Afficher la liste des &eacute;l&egrave;ves" href="otourix-students.html"><i class="fa fa-users"></i></a>
            <a title="Exporter vers Excel" href="../modules/otourix/admin/export.php?dataExport=teachers"><i class="fa fa-download"></i></a>
		</span>

	    <?php if(isset($member_display_err_msg)) {  ?>
	        <div class="ADM_err_msg"><?php print $member_display_err_msg; ?></div>
	    <?php } ?>
	    <?php if(isset($member_display_cfrm_msg)) {  ?>
	        <div class="ADM_cfrm_msg"><?php print $member_display_cfrm_msg; ?></div>
	    <?php } ?>
	    <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
		    <div class="panel-body no-padding">
                <?php print $myMember->admin_load_otourix_members('5', '200', 'otourix-teachers'); ?>
                <div style="clear:both;"></div>
			</div>
	    </div>

    <?php } ?>

	<!-- ********************************* Afficher les élèves uniquement  ******************************************************
    ****************************************************************************************************************-->
    <?php if($_REQUEST['what']   ==  'students') { ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: Liste des &eacute;l&egrave;ves dans le systeme </h3>
        <span class="float-right">
		    <a href="<?php print $system->dgt_set_admin_link_module('otourix', 'create'); ?>" title="<?php print $mod_lang_output['FORM_BUTTON_ADD_MEMBER']; ?>"><?php print $system->admin_button_crud('create'); ?></a>
            <a title="Afficher la liste des enseignants" href="otourix-teachers.html"><i class="fa fa-graduation-cap"></i></a>
            <a title="Exporter vers Excel" href="../modules/otourix/admin/export.php?dataExport=students"><i class="fa fa-download"></i></a>
        </span>
            <?php $myMember->limit = $_REQUEST['limite']; ?>
	        <?php if(isset($member_display_err_msg)) {  ?>
	          	<div class="ADM_err_msg"><?php print $member_display_err_msg; ?></div>
	        <?php } ?>
	        <?php if(isset($member_display_cfrm_msg)) {  ?>
	          	<div class="ADM_cfrm_msg"><?php print $member_display_cfrm_msg; ?></div>
	        <?php } ?>

	        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			    <div class="panel-body no-padding">
			        <!-- <span style="float: right;"><a href="../modules/otourix/admin/export.php?dataExport=students"><button type="button" class="btn btn-primary">Export</button></a></span> -->
                    <?php print $myMember->admin_load_otourix_members('3', '200', 'otourix-students'); ?>
                    <div style="clear:both;"></div>
				</div>
	        </div>
    <?php } ?>


	<!-- ********************************* Afficher les feuilles de note  ******************************************************
    ****************************************************************************************************************-->
    <?php
        if($_REQUEST['what']    ==  'marksheetsread'){
    ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: Feuilles de notes </h3>
        <?php $myMember->limit = $_REQUEST['limite']; ?>
	        <?php if(isset($member_display_err_msg)) {  ?>
	          	<div class="ADM_err_msg"><?php print $member_display_err_msg; ?></div>
	        <?php } ?>
	        <?php if(isset($member_display_cfrm_msg)) {  ?>
	          	<div class="ADM_cfrm_msg"><?php print $member_display_cfrm_msg; ?></div>
	        <?php } ?>

	        <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			    <div class="panel-body no-padding">
			        <!-- <span style="float: right;"><a href="../modules/otourix/admin/export.php?dataExport=students"><button type="button" class="btn btn-primary">Export</button></a></span> -->
                    <?php print $myMember->admin_load_otourix_marksheets(); ?>
                    <div style="clear:both;"></div>
				</div>
	        </div>
    <?php } ?>


    <!-- ********************************* Paramètres pour l'école  ******************************************************
    ****************************************************************************************************************-->
    <?php
        if($_REQUEST['what']    ==  'schoolsettings'){
            $wmSettings     =   $myMember->get_otourix_webmarks_settings();
    ?>
        <h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: R&eacute;glages OTOURIX School </h3>
	        <?php if(isset($member_display_err_msg)) {  ?>
	          	<div class="ADM_err_msg"><?php print $member_display_err_msg; ?></div>
	        <?php } ?>
	        <?php if(isset($member_display_cfrm_msg)) {  ?>
	          	<div class="ADM_cfrm_msg"><?php print $member_display_cfrm_msg; ?></div>
	        <?php } ?>

            <div class="tab-content">
                <div class="tab-pane active" id="horizontal-form">
			        <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sequence active</label>
                            <div class="col-sm-8">
                                <select class="form-control1" name="sel_schoolSettingsPeriodUpdate">
                                    <?php print $myMember->cmb_load_periods($wmSettings['PERIOD']); ?>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sessions</label>
                            <div class="col-sm-8">
                                <select class="form-control1" name="sel_schoolSettingsSessionUpdate">
                                    <option <?php print $selected =   (($wmSettings['STATE']    ==  '0') ? 'SELECTED' : ''); ?> value='1'>Activer</option>
                                    <option <?php print $selected =   (($wmSettings['STATE']    ==  '1') ? 'SELECTED' : ''); ?> value="0">D&eacute;sactiver</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="panel-footer">
			                <div class="row">
			                    <div class="col-sm-8 col-sm-offset-2">
			                        <button name="btn_schoolSettingsUpdate" id="btn_memberUpdate" class="btn-success btn"><i class="fa fa-save"></i> Valider</button>
			                    </div>
						    </div>
						</div>
                    </form>
			    </div>
            </div>

    <?php } ?>
