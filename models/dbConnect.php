<<<<<<< HEAD
<?php

    function dbConnect(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
            return $db;
        } catch (Exception $e) {
            echo 'Pour résoudre le problème utiliser la commande : CREATE DATABASE app : dans SQL sur phpmyadmin et ensuite cliquer sur Creation BDD de la page de connection' . "<br />";
            die('Error : ' . $e->getMessage());
        }
=======
<?php

    function dbConnect(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
            return $db;
        } catch (Exception $e) {
            echo 'Pour résoudre le problème utiliser la commande : CREATE DATABASE app : dans SQL sur phpmyadmin et ensuite cliquer sur Creation BDD de la page de connection' . "<br />";
            die('Error : ' . $e->getMessage());
        }
>>>>>>> master
    }