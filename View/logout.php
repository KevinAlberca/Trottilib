<?php
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
		header('Location: ?page=accueil');
		session_destroy();
		exit;
	}