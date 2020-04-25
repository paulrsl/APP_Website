<<<<<<< HEAD
<?php

    function create_DB(){
        $db = dbConnect();
        $req = $db->prepare("CREATE TABLE Person (id INT PRIMARY KEY AUTO_INCREMENT, mail VARCHAR(255), password VARCHAR(255), firstName VARCHAR(255), lastName VARCHAR(255), typeAccess VARCHAR(255), language VARCHAR(255) DEFAULT 'EN', picture VARCHAR(255) DEFAULT 'defaultPicture.jpg', registrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE User (id INT PRIMARY KEY AUTO_INCREMENT, personId INT(255), organismId VARCHAR(255), birthdate date, sex VARCHAR(255), comment VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Organism (id INT PRIMARY KEY AUTO_INCREMENT, personId INT(255), name VARCHAR(255), contactMail VARCHAR(255), address VARCHAR(255), country VARCHAR(255), city VARCHAR(255), postalCode VARCHAR(255), phone VARCHAR(255), organismType VARCHAR(255), validated BOOLEAN DEFAULT FALSE)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Admin (id INT PRIMARY KEY AUTO_INCREMENT, personId INT(255), acceptationId INT(255), validated BOOLEAN DEFAULT FALSE)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE InfosJob (id INT PRIMARY KEY AUTO_INCREMENT, jobEN VARCHAR(255), jobFR VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE LinkJob (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), jobId INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE InfosSport (id INT PRIMARY KEY AUTO_INCREMENT, sportEN VARCHAR(255), sportFR VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE LinkSport (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), sportId INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE InfosHandicap (id INT PRIMARY KEY AUTO_INCREMENT, handicapEN VARCHAR(255), handicapFR VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE LinkHandicap (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), handicapId INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE GTU (id INT PRIMARY KEY AUTO_INCREMENT, text VARCHAR(255), lastChangeDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP, language VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE FAQ (id INT PRIMARY KEY AUTO_INCREMENT, adminId INT(255), question VARCHAR(255), answer VARCHAR(255), language VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Tickets (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), adminId INT(255), questionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP, answerDate TIMESTAMP, status VARCHAR(255), question VARCHAR(255), answer VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestSchedule (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), date TIMESTAMP, visualStimulus BOOLEAN, soundStimulus BOOLEAN, tone BOOLEAN, testPassed BOOLEAN)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Results (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), testDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP, idTone INT(255), idVisualStimulus INT(255), idSoundStimulus INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestTone (id INT PRIMARY KEY AUTO_INCREMENT, idTest INT(255), value INT(255), heartBeat INT(255), temperature INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestVisualStimulus (id INT PRIMARY KEY AUTO_INCREMENT, idTest INT(255), value INT(255), heartBeat INT(255), temperature INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestSoundStimulus (id INT PRIMARY KEY AUTO_INCREMENT, idTest INT(255), value INT(255), heartBeat INT(255), temperature INT(255))");
        $req->execute();

        $req->closeCursor();
    }


=======
<?php

    function create_DB(){
        $db = dbConnect();
        $req = $db->prepare("CREATE TABLE Person (id INT PRIMARY KEY AUTO_INCREMENT, mail VARCHAR(255), password VARCHAR(255), firstName VARCHAR(255), lastName VARCHAR(255), typeAccess VARCHAR(255), language VARCHAR(255) DEFAULT 'EN', picture VARCHAR(255) DEFAULT 'defaultPicture.jpg', registrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE User (id INT PRIMARY KEY AUTO_INCREMENT, personId INT(255), organismId VARCHAR(255), birthdate date, sex VARCHAR(255), comment VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Organism (id INT PRIMARY KEY AUTO_INCREMENT, personId INT(255), name VARCHAR(255), contactMail VARCHAR(255), address VARCHAR(255), country VARCHAR(255), city VARCHAR(255), postalCode VARCHAR(255), phone VARCHAR(255), organismType VARCHAR(255), validated BOOLEAN DEFAULT FALSE)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Admin (id INT PRIMARY KEY AUTO_INCREMENT, personId INT(255), acceptationId INT(255), validated BOOLEAN DEFAULT FALSE)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE InfosJob (id INT PRIMARY KEY AUTO_INCREMENT, jobEN VARCHAR(255), jobFR VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE LinkJob (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), jobId INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE InfosSport (id INT PRIMARY KEY AUTO_INCREMENT, sportEN VARCHAR(255), sportFR VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE LinkSport (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), sportId INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE InfosHandicap (id INT PRIMARY KEY AUTO_INCREMENT, handicapEN VARCHAR(255), handicapFR VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE LinkHandicap (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), handicapId INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE GTU (id INT PRIMARY KEY AUTO_INCREMENT, text VARCHAR(255), lastChangeDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP, language VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE FAQ (id INT PRIMARY KEY AUTO_INCREMENT, adminId INT(255), question VARCHAR(255), answer VARCHAR(255), language VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Tickets (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), adminId INT(255), questionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP, answerDate TIMESTAMP, status VARCHAR(255), question VARCHAR(255), answer VARCHAR(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestSchedule (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), date TIMESTAMP, visualStimulus BOOLEAN, soundStimulus BOOLEAN, tone BOOLEAN, testPassed BOOLEAN)");
        $req->execute();
        $req = $db->prepare("CREATE TABLE Results (id INT PRIMARY KEY AUTO_INCREMENT, userId INT(255), testDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP, idTone INT(255), idVisualStimulus INT(255), idSoundStimulus INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestTone (id INT PRIMARY KEY AUTO_INCREMENT, idTest INT(255), value INT(255), heartBeat INT(255), temperature INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestVisualStimulus (id INT PRIMARY KEY AUTO_INCREMENT, idTest INT(255), value INT(255), heartBeat INT(255), temperature INT(255))");
        $req->execute();
        $req = $db->prepare("CREATE TABLE TestSoundStimulus (id INT PRIMARY KEY AUTO_INCREMENT, idTest INT(255), value INT(255), heartBeat INT(255), temperature INT(255))");
        $req->execute();

        $req->closeCursor();
    }


>>>>>>> master
