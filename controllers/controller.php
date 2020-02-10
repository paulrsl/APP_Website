<?php

	require "models/model.php";

	function connection(){
		require "views/connection.php";
	}
	
	function home(){
        $users = getUsers()->fetchAll();
		require "views/home.php";
	}
	
	function inscription(){
		require "views/inscription.php";
	}

	function forgotPassword(){
	    require "views/forgotPassword.php";
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
            require "views/home.php";
        }
    }

    function tryConnection(){
	   if($_POST["mail"] && $_POST["password"]){
            echo 'here';
       }
    }
?>