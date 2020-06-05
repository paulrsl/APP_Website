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

    function insertResult($id, $visual, $sound, $tone){
        $db = dbConnect();

        $visualAvg = (int)avg($visual[0]);
        $soundAvg = (int)avg($sound[0]);
        $toneAvg = (int)avg($tone[0]);
        $temperatureVisualAvg = (int)avg($visual[2]);
        $heartBeatVisualAvg = (int)avg($visual[1]);
        $temperatureSoundAvg = (int)avg($sound[2]);
        $heartBeatSoundAvg = (int)avg($sound[1]);
        $temperatureToneAvg = (int)avg($tone[2]);
        $heartBeatToneAvg = (int)avg($tone[1]);

        if($visual != null){
            $testIdVisual = getLastIdTest("testvisualstimulus")->fetchAll()[0][0];
            if($testIdVisual == null){
                $testIdVisual=0;
            }else{
                $testIdVisual++;
            }
            for($i = 0; $i<sizeof($visual[0]); $i++){
                $req = $db->prepare("INSERT INTO testvisualstimulus(idTest, value, heartBeat, temperature) VALUES(:idTest, :value, :heartBeat, :temperature)");
                $req->bindParam("idTest",$testIdVisual);
                $req->bindParam("value", $visual[0][$i]);
                $req->bindParam("heartBeat", $visual[1][$i]);
                $req->bindParam("temperature", $visual[2][$i]);
                $req->execute();
            }

        }else{
            $testIdVisual = null;
        }

        if($sound != null){
            $testIdSound = getLastIdTest("testsoundstimulus")->fetchAll()[0][0];
            if($testIdSound == null){
                $testIdSound=0;
            }else{
                $testIdSound++;
            }
            for($i = 0; $i<sizeof($sound[0]); $i++){
                $req = $db->prepare("INSERT INTO testsoundstimulus(idTest, value, heartBeat, temperature) VALUES(:idTest, :value, :heartBeat, :temperature)");
                $req->bindParam("idTest",$testIdSound);
                $req->bindParam("value", $sound[0][$i]);
                $req->bindParam("heartBeat", $sound[1][$i]);
                $req->bindParam("temperature", $sound[2][$i]);
                $req->execute();
            }
        }else{
            $testIdSound = null;
        }

        if($tone != null){
            $testIdTone = getLastIdTest("testtone")->fetchAll()[0][0];
            if($testIdTone == null){
                $testIdTone=0;
            }else{
                $testIdTone++;
            }
            for($i = 0; $i<sizeof($tone[0]); $i++){
                $req = $db->prepare("INSERT INTO testtone(idTest, value, heartBeat, temperature) VALUES(:idTest, :value, :heartBeat, :temperature)");
                $req->bindParam("idTest",$testIdTone);
                $req->bindParam("value", $tone[0][$i]);
                $req->bindParam("heartBeat", $tone[1][$i]);
                $req->bindParam("temperature", $tone[2][$i]);
                $req->execute();
            }
        }else{
            $testIdTone = null;
        }

        $req = $db->prepare("INSERT INTO results(userId, idTone, idVisualStimulus, idSoundStimulus, averageTone, averageVisualStimulus, 
averageSoundStimulus, averageVisualTemperature, averageVisualHeartBeat, averageSoundTemperature, averageSoundHeartBeat, averageToneTemperature, averageToneHeartBeat) VALUES(:userId, :idTone, :idVisualStimulus, :idSoundStimulus, 
:averageTone, :averageVisualStimulus, :averageSoundStimulus, :averageVisualTemperature, :averageVisualHeartBeat, :averageSoundTemperature, :averageSoundHeartBeat, :averageToneTemperature, :averageToneHeartBeat)");

        $req->bindParam("userId",$id);
        $req->bindParam("idTone",$testIdTone);
        $req->bindParam("idVisualStimulus",$testIdVisual);
        $req->bindParam("idSoundStimulus",$testIdSound);
        $req->bindParam("averageTone",$toneAvg);
        $req->bindParam("averageVisualStimulus",$visualAvg);
        $req->bindParam("averageSoundStimulus",$soundAvg);
        $req->bindParam("averageVisualTemperature",$temperatureVisualAvg);
        $req->bindParam("averageVisualHeartBeat",$heartBeatVisualAvg);
        $req->bindParam("averageSoundTemperature",$temperatureSoundAvg);
        $req->bindParam("averageSoundHeartBeat",$heartBeatSoundAvg);
        $req->bindParam("averageToneTemperature",$temperatureToneAvg);
        $req->bindParam("averageToneHeartBeat",$heartBeatToneAvg);

        $req->execute();
        $req->closeCursor();
    }

    function insertTicket($question, $status, $id){
        $db = dbConnect();

        $req = $db->prepare("INSERT INTO tickets(question, status, userId) VALUES(:question, :status, :userId)");

        $req->bindParam("question", $question);
        $req->bindParam("status", $status);
        $req->bindParam("userId", $id);


        $req->execute();
        $req->closeCursor();
    }