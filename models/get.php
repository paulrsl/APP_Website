<<<<<<< HEAD
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
        $req = $db->query("SELECT mail, firstName, lastName, typeAccess FROM person");

        return $req;
    }

    function getOrganismId($idPerson){
        $db = dbConnect();
        $req = $db->query("SELECT id FROM `organism` WHERE personId=".$idPerson);

        return $req;
    }

    function getUserInOrganism($idOrganism){
        $db = dbConnect();
        $req = $db->query("SELECT mail, firstName, lastName FROM person LEFT JOIN user ON person.id=user.personId WHERE typeAccess='user' AND organismId =".$idOrganism);

        return $req;
    }
=======
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
        $req = $db->query("SELECT mail, firstName, lastName, typeAccess FROM person");

        return $req;
    }

    function getOrganismId($idPerson){
        $db = dbConnect();
        $req = $db->query("SELECT id FROM `organism` WHERE personId=".$idPerson);

        return $req;
    }

    function getUserInOrganism($idOrganism){
        $db = dbConnect();
        $req = $db->query("SELECT mail, firstName, lastName FROM person LEFT JOIN user ON person.id=user.personId WHERE typeAccess='user' AND organismId =".$idOrganism);

        return $req;
    }
>>>>>>> master
