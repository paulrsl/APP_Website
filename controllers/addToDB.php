<?php
    function addPerson() {
        switch($_SESSION["inscriptionTypeAccess"]){
            case "user" : addUser(); break;
            case "organism" : addOrganism(); break;
            case "admin" : addAdmin(); break;
        }
        redirection("connection");
    }

    function addUser(){
        if($_POST["sex"] && $_POST["birthdate"]){
            insertPerson($_SESSION["inscriptionFirstname"], $_SESSION["inscriptionLastname"], $_SESSION["inscriptionMail"], $_SESSION["inscriptionTypeAccess"], $_SESSION["inscriptionLanguage"], $_SESSION["inscriptionPassword"]);

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
            insertPerson($_SESSION["inscriptionFirstname"], $_SESSION["inscriptionLastname"], $_SESSION["inscriptionMail"], $_SESSION["inscriptionTypeAccess"], $_SESSION["inscriptionLanguage"], $_SESSION["inscriptionPassword"]);

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
        insertPerson($_SESSION["inscriptionFirstname"], $_SESSION["inscriptionLastname"], $_SESSION["inscriptionMail"], $_SESSION["inscriptionTypeAccess"], $_SESSION["inscriptionLanguage"], $_SESSION["inscriptionPassword"]);

        $personId = getLastId("person")->fetchAll();;
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

    function addFAQ(){
        if(isset($_POST["question"]) && isset($_POST["answer"]) && isset($_POST["language"])) {

            $question = htmlspecialchars($_POST["question"]);
            $answer = htmlspecialchars($_POST["answer"]);
            $language = htmlspecialchars($_POST["language"]);

            if (isset($_GET['IDMessage'])) {
                $idToModify = $_GET['IDMessage'];
                $db = dbConnect();
                $req = $db->prepare("UPDATE `faq` SET question=?, answer=?, language=? WHERE id=?");
                $req->execute(array($question, $answer, $language, $idToModify));
                $req->closeCursor();

            }else{
                insertFaq($question, $answer, $language);
            }
            header("Location: index.php?page=FAQ");
        }
    }

    function performTest(){
        if ($_POST["userID"]){

            $userID = htmlspecialchars($_POST["userID"]);
            $visualResult = generateResults("visualStimulus",15);
            $soundResult = generateResults("soundStimulus",15);
            $toneResult = generateResults("tone",10);

            insertResult($userID, $visualResult, $soundResult, $toneResult);

            redirection("performTest");
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