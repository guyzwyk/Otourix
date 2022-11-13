<?php
	$system			= 	new cwd_system();
	$mId			=	$_SESSION['mId'];
	$member			=	$_SESSION['member'];
	$account_menu	=	$system->cwdBoxed("Mon compte", "<p><a href=\"$member-account.html\">Modifier mon mot de passe</a></p><p><a href=\"../logout.php\">D&eacute;connexion</a></p>", "");	
	$pageHome		=	$member.'.html';

	$pageList		=	array('account', 'banque', 'assignment', 'ecolage', 'jeu', 'note', 'orientation', 'requete');
	$memberList		=	array('student', 'teacher', 'parent', 'councilor');

	if(isset($_SESSION['CONNECTED_STUDENT'])){
		//Student primary menu
		
		//$member='student';
		$main_menu 		= 	"<ul>
								<li><a href=\"$member-banque.html\">Banque d'&eacute;preuves</a></li>
								<li><a href=\"$member-assignment.html\">Devoirs</a></li>
								<li><a href=\"$member-requete-list.html\">Requ&ecirc;tes</a></li>
								<li><a href=\"$member-orientation.html\">Orientation scolaire</a></li>
								<li><a href=\"$member-ecolage.html\">Ecolage</a></li>
								<li><a href=\"$member-note.html\">Notes</a></li>
								<li><a href=\"$member-jeu.html\">Jeux</a></li>
								<li><a href=\"$member-account.html\">Mon compte</a></li>
							</ul>";
		
		//$account_menu	=	$system->cwdBoxed("Mon compte", "<p><a href=\"$member-account.html\">Modifier mon mot de passe</a></p><p><a href=\"../logout.php\">D&eacute;connexion</a></p>", "");
	}
	elseif(isset($_SESSION['CONNECTED_TEACHER'])){
		//Student primary menu
		
		//$member='teacher';
		$main_menu 		= 	"<ul>
								<li><a href=\"$member-banque-list.html\">Banque d'&eacute;preuves</a></li>
								<li><a href=\"$member-assignment-list.html\">Devoirs</a></li>
								<li><a href=\"$member-requete-list.html\">Requ&ecirc;tes</a></li>
								<li><a href=\"$member-account.html\">Mon compte</a></li>
							</ul>";
		//$account_menu	=	$system->cwdBoxed("Mon compte", "<p><a href=\"$mId-account.html\">Modifier mon mot de passe</a></p><p><a href=\"../logout.php\">D&eacute;connexion</a></p>", "");
	}
	elseif(isset($_SESSION['CONNECTED_COUNCILOR'])){
		//Student primary menu
		//$member='councilor';
		$main_menu 		= 	"<ul>
								<li><a href=\"$member-orientation-list.html\">Orientation scolaire</a></li>
								<li><a href=\"$member-requete-list.html\">Requ&ecirc;tes</a></li>
								<li><a href=\"$member-account.html\">Mon compte</a></li>
							</ul>";
		//$account_menu	=	$system->cwdBoxed("Mon compte", "<p><a href=\"$mId-account.html\">Modifier mon mot de passe</a></p><p><a href=\"../logout.php\">D&eacute;connexion</a></p>", "");
	}
	elseif(isset($_SESSION['CONNECTED_PARENT'])){
		//Student primary menu
		//$member='parent';
		$main_menu 		= 	"<ul>
								<li><a href=\"$member-banque.html\">Banque d'Epreuves</a></li>
								<li><a href=\"$member-requete-list.html\">Requ&ecirc;tes</a></li>
								<li><a href=\"$member-ecolage.html\">Ecolage</a></li>
								<li><a href=\"$member-note.html\">Notes scolaires</a></li>
								<li><a href=\"$member-account.html\">Mon compte</a></li>
							</ul>";
		//$account_menu	=	$system->cwdBoxed("Mon compte", "<p><a href=\"$mId-account.html\">Modifier mon mot de passe</a></p><p><a href=\"../logout.php\">D&eacute;connexion</a></p>", "");
	}
	//Password update if login = pass
	if(sha1($_SESSION['mLogin']) == $_SESSION['mPassword']){
		$box_passwordUpdate	=	"<div class=\"boxErr\">Vous utilisez encore votre mot de passe par d&eacute;faut!<br />Veuillez le modifier afin d'&eacute;viter toute intrusion dans votre compte.<br /><p>&raquo; <a class=\"md-trigger md-setperspective\" data-modal=\"modal-5\" href=\"$member-account.html\">Cliquez ici pour mettre votre mot de passe &agrave; jour.</a></p></div>";
	}
	
?>


<?php
	//Secure the URL
	if(isset($_REQUEST['page']) && (!in_array($_REQUEST['page'], $pageList))) header($pageHome);
?>

<?php
	$tabStudent		=	$myMember->get_students_by_parent($_SESSION['PARENT_LOGIN']);

	//Afficher la liste des enfants d'un memeparent sous forme de liste
	$childNb	=	0;
	foreach($tabStudent as $student){
		$childNb	+=1;
		$studentList	.=	"<li><strong>".$myMember->get_student_by_id($student)."</strong> (<em>".$myMember->get_class_by_student($student)."</em>)</li>";
	}
	
	$children_boxHead	=	(($childNb > 1) ? ("Vos $childNb enfants") : ("Votre enfant"));
	$lbl_yourChildren	=	(($childNb > 1) ? ("vos $childNb enfants") : ("votre enfant"));
	$lbl_yourChildren2	=	(($childNb > 1) ? ("vos $childNb prog&eacute;nitures") : ("votre prog&eacute;niture"));
			
	$children_menu	=	$system->cwdBoxed($children_boxHead, "<ul>".$studentList."</ul>", '');
?>