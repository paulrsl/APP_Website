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

    function getResults($userId){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM results WHERE userId=".$userId." ORDER BY testDate DESC");

        return $req;
    }

    function getResultsAsc($userId){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM results WHERE userId=".$userId." ORDER BY testDate ASC");

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

    function getInfos($id){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM person WHERE id=".$id);

        return $req;
    }

    function getUserTickets($userId){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM tickets WHERE userId=".(int)$userId." ORDER BY questionDate DESC");


        return $req;
    }

    function getIdTickets($id){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM tickets WHERE id=". (int)$id);

        return $req;
    }

    function getTicketsStatus($status){
        $db = dbConnect();
        if($status == "all"){
            $req = $db->query("SELECT * FROM tickets ORDER BY status ASC, questionDate DESC ");
        }else{
            $req = $db->query("SELECT * FROM tickets WHERE status=\"".$status."\"");
        }

        return $req;
    }


    function getIdUserMail($mail){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM person WHERE mail=\"".$mail."\"");

        return $req;
    }

    function getPersonId($userId){
        $db = dbConnect();
        $req = $db->query("SELECT personId FROM user WHERE id=". (int)$userId);

        return $req;
    }

    function getAllResults(){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM results ORDER BY testDate DESC");

        return $req;
    }

    function getUserId($personId){
        $db = dbConnect();
        $req = $db->query("SELECT id FROM user WHERE personId=". (int)$personId);

        return $req;
    }

    function getLastResults($userId,$n){
        $db = dbConnect();
        $req = $db->query("SELECT * FROM results WHERE userId=".$userId." ORDER BY testDate DESC LIMIT ". $n);

        return $req;
    }

