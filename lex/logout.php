<?php session_start(); ?>

<?php  

	session_destroy(); 
	echo'<script> window.location="login.php";</script>';
?>