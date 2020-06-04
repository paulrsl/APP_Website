<?php

function deleteMessageFAQ(){
    if (isset($_GET['IDMessage'])){
        $idToDelete = $_GET['IDMessage'];
        $db = dbConnect();
        $req = $db->prepare("DELETE FROM `faq` WHERE id=?");
        $req -> execute(array($idToDelete));
        $req -> closeCursor();
    }
    header("Location: index.php?page=FAQ");
}

function deleteAccessRight(){
    if (isset($_GET['IDUser'])){
        $idToDelete = $_GET['IDUser'];
        $db = dbConnect();
        $req = $db->prepare("DELETE FROM `person` WHERE id=?");
        $req -> execute(array($idToDelete));
        $req -> closeCursor();
    }
    header("Location: index.php?page=manageAccessRight");
}

function deleteMessageTickets(){
    if (isset($_GET['IDMessage'])){
        $idToDelete = $_GET['IDMessage'];
        $db = dbConnect();
        $req = $db->prepare("DELETE FROM `tickets` WHERE id=?");
        $req -> execute(array($idToDelete));
        $req -> closeCursor();
    }
    header("Location: index.php?page=tickets");

}

function deleteUserList(){
    if (isset($_GET['IDMessage'])){
        $idToDelete = $_GET['IDMessage'];
        $db = dbConnect();
        $req = $db->prepare("UPDATE `user` SET organismId=null WHERE id=?");
        $req -> execute(array($idToDelete));
        $req -> closeCursor();
    }
    header("Location: index.php?page=userList");
}