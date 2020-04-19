<?php
	require "controllers/redirection.php";
    require "controllers/language.php";
    require "controllers/addToDB.php";
    require "controllers/test.php";
    require "models/dbConnect.php";
    require "models/createDB.php";
    require "models/get.php";
    require "models/insert.php";

    session_start();

    if(isset($_SESSION["language"])==false){
        language("EN"); //Langue par défaut
    }

    if(isset($_GET["action"]) && isset($_GET["page"])==false){
        $action = htmlspecialchars(($_GET["action"]));
        switch ($action){
            case "addPerson" : addPerson(); break;
            case "tryConnection" : tryConnection(); break;
            case "addFAQ" : addFAQ(); break;
            default : redirection("connection");
        }
    }

    if(isset($_GET["page"])){
        if(isset($_GET["language"])){
            $language = htmlspecialchars($_GET["language"]);
            language($language);
        }

        $page = htmlspecialchars($_GET["page"]);
        redirection($page);

	}elseif(isset($_GET["action"])) { //Si on fait une action sans donner de page, la redirection est géré dans l'action

    }else{
	    redirection("connection"); //Page par défaut
	}
