<<<<<<< HEAD
<?php

    function language($language)
    {
        switch ($language) {
            case "EN" :
                $_SESSION["language"] = "EN";
                break;
            case "FR" :
                $_SESSION["language"] = "FR";
                break;
        }
    }
?>

