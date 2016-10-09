<?php
	session_start();
	session_destroy();

	header('location: ../WEB/index.html');
?>