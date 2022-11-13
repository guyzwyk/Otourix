<?php
    require_once ('library/otourix.inc.php');

    $myOtourix                 	=   new cwd_otourix();
	
	$pageOtourix	       		=   $myPage->get_pages_modules_links("otourix", $_SESSION["LANG"]); //$thewu32_modLink[annonce];
	$pageMaster         		=   $myPage->set_mod_page_master($pageOtourix); //Vers la page du module gallery dans la langue choisie mais sans la balise <a></a>
	$link_to_pageMaster			=   $myPage->get_mod_link($myPage->set_mod_pages($pageOtourix), $mod_lang_output['OTOURIX_BOX_LINK_ALL']); // Lien vers la page master
	$load_userType				=	$myOtourix->cmb_show_rub();

	if($_REQUEST['level'] 		== 'front'){
	    //Nothing to do
	}
	elseif($_REQUEST['mod']    	==  'otourix'){
	    //$pageHeader     		=   $mod_lang_output['USER_PAGE_HEADER'];
        //$thewu32_showMsg      =   $pageSelf;
	    if($_REQUEST['level']  	==  'inner'){

    			/*$pageContent    .=  "<div class=\"user_connect\">
    						            <div class=\"user_connect_title\"><i class=\"fa fa-lock\"></i>".$mod_lang_output['FORM_HEADER_CONNECT']."</div>
    						            <div class=\"user_connect_content\">
    							            ".$thewu32_showMsg."
    							            <form method=\"POST\" action=\"\">
                								<div class=\"frmLine\"><i class=\"fa fa-user\"></i><input placeholder=\"".$mod_lang_output['FORM_LABEL_USER-NAME']."\" name=\"txtLogin\" type=\"text\" id=\"txtLogin\" value=\"\" required /></div>
                								<div class=\"frmLine\"><i class=\"fa fa-key\"></i><input placeholder=\"".$mod_lang_output['FORM_LABEL_PASSWORD']."\" name=\"txtPass\" type=\"password\" id=\"txtPass\" value=\"\" required /></div>
                								<div class=\"frmLine\"><input type=\"submit\" name=\"btnConnect\" value=\"".strtoupper($mod_lang_output['FORM_BUTTON_CONNECT'])."\" /><input name=\"hd_connectionPage\" type=\"hidden\" value=\"$memberPage\" /></div>
                							</form>
                						</div>
                					</div>";*/
			$oSmarty->assign('s_lbl_otourix_connect_select', $mod_lang_output['OTOURIX_CONNECT_SELECT_LABEL']);
            $oSmarty->assign('s_lbl_otourix_connect_title', $mod_lang_output['OTOURIX_CONNECT_BOX_TITLE']);
            $oSmarty->assign('s_lbl_otourix_connect_login', $mod_lang_output['OTOURIX_CONNECT_FRM_LBL_LOGIN']);
            $oSmarty->assign('s_lbl_otourix_connect_pass', $mod_lang_output['OTOURIX_CONNECT_FRM_LBL_PASS']);
            $oSmarty->assign('s_lbl_otourix_connect_btn', strtoupper($mod_lang_output['OTOURIX_CONNECT_FRM_LBL_BTN_OK']));
            $oSmarty->assign('s_lbl_otourix_connect_page', $pageOtourix);
			$oSmarty->assign('s_load_userType', $load_userType);
            //$oSmarty->assign('s_validate_user_connect',  $frm_msgDisplay);
	    }
	}

	//Assignations
	//$oSmarty->assign('s_userLoginForm', $userLogin);