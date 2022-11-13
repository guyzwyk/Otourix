<div id="openModalConnected" class="modalDialog">
		<div style="width:80%;">
			<h3><?php print $mod_lang_output['MODULE_NAME']; ?> :: <?php print $mod_lang_output['PAGE_HEADER_MEMBER_NOW_CONNECTED']?></h3>
			<a href="#close" title="Close" class="close">X</a>
            <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
                <div class="panel-body no-padding">
                    <div class="scrollbar" style="max-height:80%;">
        			    <?php if(isset($action_msgOk)) print $action_modal_msgOk; ?>
                        <?php print $myOtourix->admin_load_connected(); ?>
                    </div>
                </div>
            </div>
			<p>&nbsp;</p><p>&nbsp;</p>
		</div>
</div>

<!-- ********************************* Afficher les membres  ******************************************************
      ****************************************************************************************************************-->
<div id="openModalMembers" class="modalDialog">
    <div style="width:80%; overflow:auto;">
		<h1>Membres Otourix</h1>
		<a href="#close" title="Close" class="close">X</a>
		<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
            <div class="panel-body no-padding">
                <div class="scrollbar" style="max-height:80%;">
					<?php //$member->limit = $_REQUEST[limite]; ?>
					<?php if(isset($action_msgOk)) print $action_modal_msgOk; ?>
			        <?php isset($_SESSION['CONNECTED_ADMIN']) ? ($dbView = '1') : ($dbView='0'); ?>
			        <?php //print $member->admin_load_members(4000); ?>
		        </div>
		    </div>
        </div>
		<p>&nbsp;</p><p>&nbsp;</p>
	</div>
</div>
