<?php

    function deleteAll($where){
        $db = dbConnect();
        $req = $db -> query("DELETE * FROM " . $where);

        return $req;
    }

    function deleteMessageFAQ($idToDelete){
        $idToDelete = is_int($_GET['id']) ? $_GET['id'] : false;
        if ($idToDelete){
            $db = dbConnect();
            $req = $db -> prepare("DELETE FROM `faq` WHERE id= :idToDelete");
            $req -> execute(array(':id' => $idToDelete));
        }
    }
?>

