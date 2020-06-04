<?php
    function modifyFaq($question, $answer, $language, $id){
        $db = dbConnect();
        $req = $db->prepare("UPDATE `faq` SET question=?, answer=?, language=? WHERE id=?");

        $req->execute(array($question, $answer, $language, $id));
        $req->closeCursor();
    }

    function modifyProfil($where, $category, $newValue, $id){
        $db = dbConnect();
        $req = $db->prepare("UPDATE `".$where."` SET ".$category."='".$newValue."' WHERE id=".(int)$id);

        $req->execute();
        $req->closeCursor();
    }

    function mailForgotPassword(){

        var_dump($_POST['destinataire']);
        if (isset($_POST['destinataire'])){

            $destinataire = $_POST['destinataire'];
            var_dump($destinataire);
            $objet = "Mot de passe oublié";
            $message = "Votre nouveau de mot de passe est :" .generatePassword();
            $expediteur = "maximilien.teil@gmail.com";

            $headers = 'MIME-Version 1.0' . "\n";
            $headers .= 'From: "Nom Expéditeur"<maximilien.teil@gmail.com>' . "\n";
            $headers .= 'Reply-TO: maximilien.teil@gmail.com' . "\n";
            $headers .= 'Content-Type: text/html; charset="utf-8"' . "\n";
            $headers .= 'Content-Transfert-Encoding: 8bit';
            $headers .= 'X-Mailer: PHP/' . phpversion() . "\n";

            mail($destinataire, $objet, $message, $headers);

            echo "Mail envoyé";
        }
    }

    function generatePassword(){

        $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i",
            "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q",
            "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "@", "&", "#", "\'", "è", "é", "à", "^", "?",
            "!");
        $password = '';

        for($i = 0; $i < 8; $i++)
        {
            $password = ($i % 2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }

        return $password;
    }

    function modifyAccessRight($id){
        $modifyTypeAccess = $_POST["newTypeAccess"];
        $db = dbConnect();
        $req = $db->prepare("UPDATE `person` SET typeAccess=? WHERE id=?");
        $req->execute(array($modifyTypeAccess, $id));
        $req->closeCursor();
    }

    function modifyTickets($adminId,$answerDate, $status, $answer, $id){

        $db = dbConnect();
        $req = $db->prepare("UPDATE `tickets` SET adminId=?, answerDate=?, status=?, answer=? WHERE id=?");

        $req->execute(array($adminId, $answerDate, $status, $answer, $id));
        $req->closeCursor();

    }

    function modifyUserList($userId,$organismId){

        $db = dbConnect();
        $req = $db->prepare("UPDATE `user` SET organismId=? WHERE personId=?");

        $req->execute(array($organismId,$userId));
        $req->closeCursor();

    }
