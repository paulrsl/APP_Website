<?php

    function getAll($where){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM " . $where);

        return $req;
    }

    function getLastId($where){
        $db = dbConnect();
        $req = $db->query("SELECT id FROM ".$where." ORDER BY id DESC LIMIT 1");

        return $req;
    }

    function getLastIdTest($where){
        $db = dbConnect();
        $req = $db->query("SELECT idTest FROM ".$where." ORDER BY idTest DESC LIMIT 1");

        return $req;
    }


    function getGTU($language){
        $db = dbConnect();
        $req = $db->query("SELECT text FROM gtu WHERE language=\"". $language ."\" ORDER BY lastChangeDate DESC LIMIT 1");

        return $req;
    }

    function getFAQ($language){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM faq WHERE language=\"". $language ."\"");

        return $req;
    }

    function getPerson(){
        $db = dbConnect();
        $req = $db->query("SELECT mail, firstName, lastName, typeAccess, id FROM person");

        return $req;
    }

    function getOrganismId($idPerson){
        $db = dbConnect();
        $req = $db->query("SELECT id FROM `organism` WHERE personId=".$idPerson);

        return $req;
    }

    function getUserInOrganism($idOrganism){
        $db = dbConnect();
        $req = $db->query("SELECT user.id,mail, firstName, lastName FROM person LEFT JOIN user ON person.id=user.personId WHERE typeAccess='user' AND organismId =".$idOrganism);

        return $req;
    }

    function getIdTest(){ //retourne l'idTest correspondant à l'userId
        $idTest=null;
        $testresults = getAll("results")->fetchAll();
        foreach ($testresults as $result) {
            if($_SESSION["userId"] == $result["userId"]) {
                $idTest=$result["idTone"];
            }
        }
        return $idTest;
    }

    function getResults($userId){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM `results` WHERE userId=".$userId);

        return $req;
    }

    function getQuestionAnswer($idFaq){
        $db = dbConnect();
        $req = $db->query("SELECT question,answer,language FROM faq WHERE id=".$idFaq);

        return $req;
    }

    function getPassword($id){
        $db = dbConnect();
        $req = $db->query("SELECT password FROM person WHERE id=".$id);

        return $req;
    }