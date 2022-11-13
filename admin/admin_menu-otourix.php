  <!-- OTOURIX Manager -->
  <?php
    //Initializations for statistics
    $my_memberStats	    =	new cwd_otourix();
    $nbMembers			=	$my_memberStats->count_members('ALL');
	//$nb_membersTotal	=	$my_memberStats->count_members('ALL');

    //Library call
    require('../modules/otourix/langfiles/'.$langFile.'.php');

	//Personalizing the links
    $system->set_uri_what(array('requests', 'members', 'teachers', 'students', 'marksheetsread', 'schoolsettings', 'courses', 'classesread', 'teachings', 'classes', 'marks', 'tuitions', 'flushdata', 'loaddata'));
    $system->set_uri_action(array('flush', 'load', 'msexport', 'assign', 'disconnectall', 'export'));
?>
<?php
    $admin_menu =   "<li>
                            <a href=\"#\"><i class=\"fa fa-users nav_icon\"></i> OTOURIX<span class=\"badge badge-warning\">$nbMembers</span><span class=\"fa arrow\"></span></a>
                            <ul class=\"nav nav-second-level\">
                            	<li>
                            		<a href=\"#\"><i class=\"fa fa-eye nav_icon\"></i> Afficher<span class=\"fa arrow\"></span></a>
                                	<ul class=\"nav nav-third-level\">
                                		<li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix')."\"><i class=\"fa fa-user nav_icon\"></i> Les membres</a>
		                                </li>
		                                <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'courses')."\"><i class=\"fa fa-tags nav_icon\"></i> Les mati&egrave;res</a>
		                                </li>
                                        <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'classes')."\"><i class=\"fa fa-tags nav_icon\"></i> Les classes</a>
		                                </li>
                                        <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'teachings')."\"><i class=\"fa fa-tags nav_icon\"></i> Mati&egrave;res enseign&eacute;es</a>
		                                </li>
		                                <li>
                                    		<a title=\"".$nb_payStarted.' '.$lang_output['LABEL_TUITION_HAVE_STARTED']."\" href=\"".$system->dgt_set_admin_link_module('otourix', 'tuitionsread')."\"><i class=\"fa fa-money nav_icon\"></i> Les &eacute;colages<span class=\"badge badge-warning\">$nb_payStarted</span></a>
		                                </li>
                                        <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'marks', 'read')."\"><i class=\"fa fa-tags nav_icon\"></i> Les notes</a>
		                                </li>
		                                <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'requestsread')."\"><i class=\"fa fa-question-circle nav_icon\"></i> Les requetes</a>
		                                </li>
                                        <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'marksheetsread')."\"><i class=\"fa fa-file nav_icon\"></i> Les feuilles de notes</a>
		                                </li>
                                	</ul>
                                </li>
                                <li>
                                    <a href=\"".$system->dgt_set_admin_link_module('otourix', 'create')."\"><i class=\"fa fa-plus nav_icon\"></i> Ajouter un membre</a>
                                </li>
                                <li>
                                	<a href=\"#\"><i class=\"fa fa-cogs nav_icon\"></i>OTOURIX setting<span class=\"fa arrow\"></span></a>
                                	<ul class=\"nav nav-third-level\">
                                		<li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'loaddata')."\"><i class=\"fa fa-upload nav_icon\"></i> Charger les donn&eacute;es</a>
		                                </li>
		                                <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'flushdata')."\"><i class=\"fa fa-times nav_icon\"></i> Purger les donn&eacute;es</a>
		                                </li>
                                        <li>
                                    		<a href=\"".$system->dgt_set_admin_link_module('otourix', 'schoolsettings')."\"><i class=\"fa fa-cog nav_icon\"></i> School settings</a>
		                                </li>
                                	</ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>";