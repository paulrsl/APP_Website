<?php
	require "controllers/controller.php";
	
	if (isset($_GET["page"])) {
		$page = htmlspecialchars($_GET["page"]);
		
		switch($page){
			
			case "connection" :  connection(); break;
			
			case "home" : home(); break;
			
			case "inscription" : inscription(); break;

            case "forgotPassword" : forgotPassword(); break;

            case "add_user" : addUser(); break;

            case "try_connection" : tryConnection(); break;

            case "createDB" : createDB(); break;
						
		}
	}
	else{
		connection();
	}
	
	
	
?>