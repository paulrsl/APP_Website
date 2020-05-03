<?php

function modifyMessageFAQ(){
    if (isset($_GET['IDMessage'])) {
        $idToModify = $_GET['IDMessage'];
        $db = dbConnect();
        $req = $db->prepare("SELECT FROM `faq` WHERE id=?");
        $req->execute(array($idToModify));
        $req->closeCursor();
    }

}
