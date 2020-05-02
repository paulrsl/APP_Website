<?php

function deleteMessageFAQ(){
    if (isset($_GET['IDMessage'])){
        $idToDelete = $_GET['IDMessage'];
        $db = dbConnect();
        $req = $db->prepare("DELETE FROM `faq` WHERE id=?");
        $req -> execute(array($idToDelete));
        $req -> closeCursor();

    }
}