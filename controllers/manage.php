<?php
    function manageFAQ(){
        if(isset($_POST["question"]) && isset($_POST["answer"]) && isset($_POST["language"])) {

            $question = htmlspecialchars($_POST["question"]);
            $answer = htmlspecialchars($_POST["answer"]);
            $language = htmlspecialchars($_POST["language"]);

            if (isset($_GET['IDMessage'])) {
                $idToModify = $_GET['IDMessage'];
                modifyFaq($question, $answer, $language, $idToModify);

            }else{
                insertFaq($question, $answer, $language);
            }
            header("Location: index.php?page=FAQ");
        }
    }

    function manageProfil(){
        if(isset($_POST["password"])){
            $password = htmlspecialchars($_POST["password"]);
            $person = getPassword($_SESSION["userId"])->fetchAll();

            if(password_verify($password, $person[0]["password"])){
                $modifyList = array("mail","firstName","lastName","language","picture");

                foreach ($modifyList as $item) {
                    if(isset($_POST[$item])){
                        modifyProfil("person",$item,$_POST[$item],$_SESSION["userId"]);
                    }
                }


                if($_SESSION["userTypeAccess"] == "user"){
                    $userList = array("sex","comment");
                    foreach ($userList as $item) {
                        if(isset($_POST[$item])){
                            modifyProfil("user",$item,$_POST[$item],$_SESSION["userId"]);
                        }
                    }

                }elseif($_SESSION["userTypeAccess"] == "organism"){
                    $organismList = array("name","contactMail","address","country","city","postalCode","phone");
                    foreach ($organismList as $item) {
                        if(isset($_POST[$item])){
                            modifyProfil("organism",$item,$_POST[$item],$_SESSION["userId"]);
                        }
                    }

                }elseif($_SESSION["userTypeAccess"] == "admin") {

                }

                $person = getInfos($_SESSION["userId"])->fetchAll();

                foreach ($person as $user) {
                    $_SESSION["userMail"] = $user["mail"];
                    $_SESSION["userFirstName"] = $user["firstName"];
                    $_SESSION["userLastName"] = $user["lastName"];
                    $_SESSION["language"] = $user["language"];
                    $_SESSION["userTypeAccess"] = $user["typeAccess"];
                    $_SESSION["userPicture"] = $user["picture"];
                }

            }else{
            }

            redirection("myProfil");

        }
    }

    function manageAccessRight(){

        if (isset($_GET['IDUser'])){

            $idUser = htmlspecialchars($_GET['IDUser']);

            modifyAccessRight($idUser);

            header("Location: index.php?page=manageAccessRight");
        }

    }

    function manageTickets(){
        date_default_timezone_set('Europe/Paris');

        if(isset($_POST["answer"]) && isset($_GET["IDMessage"])){
            $adminId = $_SESSION["userId"];
            $answerDate = date('Y-m-d H:i:s');
            $status = "solved";
            $answer = $_POST["answer"];
            $id = (int)$_GET["IDMessage"];
            modifyTickets($adminId, $answerDate, $status, $answer, $id);
            header("Location: index.php?page=tickets");

        }else{
            header("Location: index.php?page=tickets");
        }
    }

