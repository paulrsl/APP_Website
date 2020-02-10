<?php

    function dbConnect(){
        try {
            $db = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
            return $db;
        } catch (Exception $e) {
            die('Error : ' . $e->getMessage());
        }
    }

    function create_DB(){
        $db = dbConnect();
        $req = $db->prepare("CREATE TABLE users (id INT PRIMARY KEY AUTO_INCREMENT, picture VARCHAR(255) DEFAULT 'defaultPicture.jpg', name VARCHAR(255), surname VARCHAR(255), mail VARCHAR(255), birthdate DATE, password VARCHAR(255))");
        $req->execute();
    }

    function insertUser($picture, $name, $surname, $mail, $birthdate, $password){
        $db = dbConnect();
        $target = "pictures/" . $picture;
        move_uploaded_file($_FILES['picture']['tmp_name'], $target);

        $req = $db->prepare("INSERT INTO users(picture, name, surname, mail, birthdate, password) VALUES(:picture, :name, :surname, :mail, :birthdate, :password)");

        $req->bindParam("picture", $picture);
        $req->bindParam("name", $name);
        $req->bindParam("surname", $surname);
        $req->bindParam("mail", $mail);
        $req->bindParam("birthdate", $birthdate);
        $req->bindParam("password", $password);

        $req->execute();
        $req->closeCursor();
    }

    function getUsers(){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM users");

        return $req;
    }

    function getUsersConnection(){
        $db = dbConnect();
        $req = $db->query("SELECT id,mail,password FROM users");

        return $req;
    }

