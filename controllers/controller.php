<?php

    require "models/model.php";

	function connection(){
		require "views/connection.php";
	}
	
	function home(){
		require "views/dashboard.php";
	}
	
	function inscription(){
		require "views/inscription.php";
	}

	function forgotPassword(){
	    require "views/forgotPassword.php";
    }

    function createDB(){
        create_DB();
	    require "views/connection.php";
    }

    function addUser() {
        if ($_FILES['picture'] && $_POST["name"] && $_POST["surname"] && $_POST["mail"] && $_POST["birthdate"] && $_POST["password"]){

            $picture = $_FILES['picture']['name'];
            $name = htmlspecialchars($_POST["name"]);
            $surname = htmlspecialchars($_POST["surname"]);
            $mail = htmlspecialchars($_POST["mail"]);
            $birthdate = htmlspecialchars($_POST["birthdate"]);
            $password = htmlspecialchars($_POST["password"]);

            insertUser($picture, $name, $surname, $mail, $birthdate, $password);

            $users = getUsers()->fetchAll();
            require "views/connection.php";

        } else {
            require "views/dashboard.php";
        }
    }

    function tryConnection(){
	   if($_POST["mail"] && $_POST["password"]){
	       $mailConnection = htmlspecialchars($_POST["mail"]);
           $passwordConnection = htmlspecialchars($_POST["password"]);

           $users = getUsersConnection()->fetchAll();

           $connection = true;
           foreach ($users as $user) {
               if($mailConnection == $user["mail"] && $passwordConnection == $user["password"]){
                   echo $user["id"];
                   require "views/dashboard.php";
                   $connection = false;
                   break;
               }
           }
           if($connection){
               echo "Mail ou mot de passe incorrect !";
               require "views/connection.php";
           }
       } else {
    require "views/dashboard.php";
	   }
    }