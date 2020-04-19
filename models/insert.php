<?php

    function insertPerson($firstname, $lastname, $mail, $typeAccess, $language, $password){
        $db = dbConnect();

        $req = $db->prepare("INSERT INTO person(mail, firstname, lastname, typeAccess, language, password) VALUES(:mail, :firstname, :lastname, :typeAccess, :language, :password)");

        $req->bindParam("mail", $mail);
        $req->bindParam("firstname", $firstname);
        $req->bindParam("lastname", $lastname);
        $req->bindParam("typeAccess", $typeAccess);
        $req->bindParam("language", $language);
        $req->bindParam("password", $password);

        $req->execute();

    }

    function insertUser($id, $birthdate, $sex, $comment, $jobs, $sports, $handicaps){
        $db = dbConnect();

        $req = $db->prepare("INSERT INTO user(personId, birthdate, sex, comment) VALUES(:personId, :birthdate, :sex, :comment)");

        $req->bindParam("personId", $id);
        $req->bindParam("birthdate", $birthdate);
        $req->bindParam("sex", $sex);
        $req->bindParam("comment", $comment);

        $req->execute();

        insertInfos("job", $id, $jobs);
        insertInfos("sport", $id, $sports);
        insertInfos("handicap", $id, $handicaps);

        $req->closeCursor();
    }

    function insertOrganism($id, $organismName, $organismMail, $address, $country, $city, $postalCode, $phone, $organismType){
        $db = dbConnect();

        $req = $db->prepare("INSERT INTO organism(personId, name, contactMail, address, country, city, postalCode, phone, organismType) VALUES(:personId, :name, :contactMail, :address, :country, :city, :postalCode, :phone, :organismType)");

        $req->bindParam("personId", $id);
        $req->bindParam("name", $organismName);
        $req->bindParam("contactMail", $organismMail);
        $req->bindParam("address", $address);
        $req->bindParam("country", $country);
        $req->bindParam("city", $city);
        $req->bindParam("postalCode", $postalCode);
        $req->bindParam("phone", $phone);
        $req->bindParam("organismType", $organismName);

        $req->execute();
    }

    function insertAdmin($id){
        $db = dbConnect();

        $req = $db->prepare("INSERT INTO admin(personId) VALUES(:personId)");

        $req->bindParam("personId", $id);

        $req->execute();

        $req -> closeCursor();
    }

    function insertInfos($name, $id, $values){
        $db = dbConnect();
        foreach ($values as $value){
            if($value != null) {
                $req = $db->prepare("INSERT INTO link" . $name . "(userId, " . $name . "Id) VALUES(:userId, :" . $name . "Id)");
                $req->bindParam("userId", $id);
                $req->bindParam($name . "Id", $value);
                $req->execute();
            }
        }
    }

    function insertFaq($question, $answer, $language){
        $db = dbConnect();

        $req = $db->prepare("INSERT INTO faq(question, answer, language, adminId) VALUES(:question, :answer, :language, :adminId)");

        $req->bindParam("question", $question);
        $req->bindParam("answer", $answer);
        $req->bindParam("language", $language);
        $req->bindParam("adminId", $_SESSION["userId"]);

        $req->execute();
        $req->closeCursor();
    }