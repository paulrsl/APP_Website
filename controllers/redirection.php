<<<<<<< HEAD
<?php

    function redirection($page){

        if($page == "logout"){
            session_destroy();
            session_start();
            require "views/pages/connection.php";
        }elseif($page == "inscription") {
            $language = $_SESSION["language"];
            session_destroy();
            session_start();
            language($language);
            require "views/pages/inscription.php";
        }elseif($page == "inscription2"){
            if(isset($_SESSION["inscriptionMail"])==false) {
                saveInscriptionInformations();
            }
            require "views/pages/inscription2.php";
        }else{
            $filename = "views/pages/".$page.".php";
            if(file_exists($filename)){ //Test si la page existe
                require "views/pages/".$page.".php";
            }else{
                require "views/pages/404.php"; //On redirige si la page n'est pas définie
            }
        }
    }


=======
<?php

    function redirection($page){

        if($page == "logout"){
            session_destroy();
            session_start();
            require "views/pages/connection.php";
        }elseif($page == "inscription") {
            $language = $_SESSION["language"];
            session_destroy();
            session_start();
            language($language);
            require "views/pages/inscription.php";
        }elseif($page == "inscription2"){
            if(isset($_SESSION["inscriptionMail"])==false) {
                saveInscriptionInformations();
            }
            require "views/pages/inscription2.php";
        }else{
            $filename = "views/pages/".$page.".php";
            if(file_exists($filename)){ //Test si la page existe
                require "views/pages/".$page.".php";
            }else{
                require "views/pages/404.php"; //On redirige si la page n'est pas définie
            }
        }
    }


>>>>>>> master
