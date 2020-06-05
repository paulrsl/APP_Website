<?php
    function addPerson() {
        switch($_SESSION["inscriptionTypeAccess"]){
            case "user" : addUser(); break;
            case "organismNoConfirmed" : addOrganism(); break;
            case "adminNoConfirmed" : addAdmin(); break;
        }
        header("Location: index.php?page=connection");
    }

    function addUser(){
        if($_POST["sex"] && $_POST["birthdate"]){
            insertPerson($_SESSION["inscriptionFirstname"], $_SESSION["inscriptionLastname"], $_SESSION["inscriptionMail"], $_SESSION["inscriptionTypeAccess"], $_SESSION["inscriptionLanguage"], password_hash($_SESSION["inscriptionPassword"], PASSWORD_BCRYPT));

            $personId = getLastId("person")->fetchAll();;
            $id = $personId[0][0]; //Transforme la valeur du tableau en string
            $sex = htmlspecialchars($_POST["sex"]);
            $birthdate = htmlspecialchars($_POST["birthdate"]);
            if(isset($_POST["comment"])){
                $comment = htmlspecialchars($_POST["comment"]);
            }else{
                $comment = null;
            }

            $sports = attributes("sports");
            $jobs = attributes("jobs");
            $handicaps = attributes("handicaps");
            insertUser($id, $birthdate, $sex, $comment, $jobs, $sports, $handicaps);
        }
    }



    function addOrganism(){
        if($_POST["organismName"] && $_POST["contactMail"] && $_POST["address"] && $_POST["country"] && $_POST["city"] && $_POST["postalCode"] && $_POST["phone"] && $_POST["organismType"]){
            insertPerson($_SESSION["inscriptionFirstname"], $_SESSION["inscriptionLastname"], $_SESSION["inscriptionMail"], $_SESSION["inscriptionTypeAccess"], $_SESSION["inscriptionLanguage"], password_hash($_SESSION["inscriptionPassword"], PASSWORD_BCRYPT));

            $personId = getLastId("person")->fetchAll();;
            $id = $personId[0][0]; //Transforme la valeur du tableau en string

            $organismName = htmlspecialchars($_POST["organismName"]);
            $organismMail = htmlspecialchars($_POST["contactMail"]);
            $address = htmlspecialchars($_POST["address"]);
            $country = htmlspecialchars($_POST["country"]);
            $city = htmlspecialchars($_POST["city"]);
            $postalCode = htmlspecialchars($_POST["postalCode"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $organismType = htmlspecialchars($_POST["organismType"]);

            insertOrganism($id, $organismName, $organismMail, $address, $country, $city, $postalCode, $phone, $organismType);

        }
    }

    function addAdmin(){
        insertPerson($_SESSION["inscriptionFirstname"], $_SESSION["inscriptionLastname"], $_SESSION["inscriptionMail"], $_SESSION["inscriptionTypeAccess"], $_SESSION["inscriptionLanguage"], password_hash($_SESSION["inscriptionPassword"], PASSWORD_BCRYPT));

        $personId = getLastId("person")->fetchAll();
        $id = $personId[0][0]; //Transforme la valeur du tableau en string

        insertAdmin($id);
    }

    function attributes($name){
        if(isset($_POST[$name])){
            $result = array();
            foreach($_POST[$name] as $value){
                $result[] = (int)$value[1];
            }
        }else{
            $result[] = null;
        }
        return $result;
    }

    function performTest(){
        if ($_GET["IDUser"]){

            $userID = htmlspecialchars($_GET["IDUser"]);
            $visualResults = generateResults("visualStimulus",15);
            $soundResults = generateResults("soundStimulus",15);
            $toneResults = generateResults("tone",10);

            insertResult($userID, $visualResults, $soundResults, $toneResults);

            header("Location: index.php?page=performTest2");
        }
    }

    function generateResults($testType, $numberOfTests){

        switch ($testType){ //3 random : 1er => score, 2e => rythme cardiaque, 3e => temperature
            case "soundStimulus" : return array(randomNumber(100, 1000, $numberOfTests),randomNumber(40, 120, $numberOfTests),randomNumber(35, 42, $numberOfTests)); break;
            case "visualStimulus" : return  array(randomNumber(100, 1000, $numberOfTests),randomNumber(40, 120, $numberOfTests),randomNumber(35, 42, $numberOfTests)); break;
            case "tone" : return array(randomNumber(0, 100, $numberOfTests),randomNumber(40, 120, $numberOfTests),randomNumber(35, 42, $numberOfTests)); break;

        }

    }

    function randomNumber($min, $max, $numberOfTests){
        $results = array();
        for ($i=0; $i<$numberOfTests; $i++){
            $results[] = rand($min, $max);
        }
        return $results;
    }

    function addTicket(){
        if(isset($_POST["question"])){
            $question = htmlspecialchars($_POST["question"]);
            $id = $_SESSION["userId"];
            $status = "new";
            insertTicket($question, $status, $id);
            header("Location: index.php?page=tickets");
        }

    }

function addUserList(){
    if(isset($_POST["mail"])){
        $mail = htmlspecialchars($_POST["mail"]);
        $idPerson=getIdUserMail($mail)->fetchall();
        $idOrganismTest=getOrganismPersonId((int)$idPerson[0][0])->fetchAll();

        if($idOrganismTest[0][0]==null){
            $idOrganism=getOrganismId($_SESSION["userId"])->fetchall();
            modifyUserList($idPerson[0][0], $idOrganism[0][0]);
        }

        redirection("userList");
        /*header("Location: index.php?page=userList");*/
    }

}




