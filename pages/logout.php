<?php
	session_start();
	session_destroy();
	session_start();
	
	$_SESSION['message'] = [
		'label' => 'Vous êtes déconnecté.',
		'status' => 'success'
	];

	header('Location: connexion');
	die();