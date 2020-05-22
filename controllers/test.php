<?php

    function tryConnection(){
        if($_POST["mail"] && $_POST["password"]){
            $mailConnection = htmlspecialchars($_POST["mail"]);
            $passwordConnection = htmlspecialchars($_POST["password"]);

            $person = getAll("person")->fetchAll();

            $connection = true;
            foreach ($person as $user) {
                if($mailConnection == $user["mail"] && $passwordConnection == $user["password"]){
                    session_destroy();
                    session_start();
                    $_SESSION["userId"] = $user["id"];
                    $_SESSION["userMail"] = $user["mail"];
                    $_SESSION["userFirstName"] = $user["firstName"];
                    $_SESSION["userLastName"] = $user["lastName"];
                    $_SESSION["userLanguage"] = $user["language"];
                    $_SESSION["userTypeAccess"] = $user["typeAccess"];
                    $_SESSION["userPicture"] = $user["picture"];
                    $connection = false;
                    language($user["language"]);
                    header("Location: index.php?page=dashboard");
                    break;
                }
            }
            if($connection){
                echo "Mail ou mot de passe incorrect !";
                header("Location: index.php?page=connection");
            }
        } else {
            header("Location: index.php?page=connection");
        }
    }

    function saveInscriptionInformations(){
        if ($_POST["firstname"] && $_POST["lastname"] && $_POST["mail"] && $_POST["typeAccess"] && $_POST["password"]){

            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname = htmlspecialchars($_POST["lastname"]);
            $mail = htmlspecialchars($_POST["mail"]);
            $typeAccess = htmlspecialchars($_POST["typeAccess"]);
            $language = htmlspecialchars($_SESSION["language"]);
            $password = htmlspecialchars($_POST["password"]);

            $person = getAll("person")->fetchAll();

            $exist = false;
            foreach ($person as $user) {
                if($mail == $user["mail"]){ //Vérification si l'adresse mail existe déjà ou non
                    echo 'Adress mail is already exist';
                    header("Location: index.php?page=inscription");
                    $exist = true;
                    break;
                }
            }

            if($exist == false){
                $_SESSION["inscriptionFirstname"] = $firstname;
                $_SESSION["inscriptionLastname"] = $lastname;
                $_SESSION["inscriptionMail"] = $mail;
                $_SESSION["inscriptionTypeAccess"] = $typeAccess;
                $_SESSION["inscriptionLanguage"] = $language;
                $_SESSION["inscriptionPassword"] = $password;
            }

        } else {
            header("Location: index.php?page=inscription");
        }
    }

    function avg($list){
        $sum = 0;
        for($i=0; $i<sizeof($list); $i++){
            $sum += $list[$i];
        }
        return $sum/sizeof($list);
    }


