<?php

    function deleteAll($where){
        $db = dbConnect();
        $req = $db -> query("DELETE * FROM " . $where);

        return $req;
    }

    function deleteMessageFAQ($idToDelete){
        $idToDelete = is_int($_POST['id']) ? $_POST['id'] : false;
        if ($idToDelete){
            $db = dbConnect();
            $req = $db -> prepare("DELETE FROM `faq` WHERE id= :idToDelete");
            $req -> execute(array(':id' => $idToDelete));
        }
    }
?>

