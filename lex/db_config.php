<?php
	
	/* 
	*	Set the database login details here. The app will 
	*	not work if any of these details are wrong incorrect.
	*
	*
	*	When you get to the login page, use the following default login details.
	*
	*	name: admin
	*	pass: IGGlex19
	*
	*/
	

	define('HOST', "localhost"); //Your host is usually localhost. No need to change.
	define('USER', ""); //insert your databse username in the empty quotes
	define('PASS', ''); //insert your databse password in the empty quotes
	define('DB', ""); //insert the name of your databse in the empty quotes

	
	/*Encrypted admin password. Only replace with another encrypted version.
	You can go to "http://yoururl.com/lex/cp.html" to ecnrypt a new password 
	and overwrite the default. Replace only the second parameter as usual.*/
	define('ADMIN_PASS', "2af0b878babc5302ea5d1cee09600cf0ce68799c"); 

?>