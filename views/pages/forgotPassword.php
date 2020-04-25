<?php include 'views/templates/headerUnsession.php'?>

<?php

$objetMail = _FORGOTPASSWORD;
$message = _MESSAGECONTENT . genereMotDePasse();

if (isset($_POST['mailform'])) {

    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From: "BIG MAP"<maximilien.teil@gmail.com>' . "\r\n";
    $header .= 'Content-Type: text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
}
?>


<html>

    <head>
        <link rel="stylesheet" href="design/css/generalUnsession.css" />
    </head>

    <body>
    <h1><?php echo _FORGOTPASSWORD;?></h1>

    <p>
        <?php echo _MAILPASSWORD;?>
    </p>

    <form method="post" action="index.php?action=">
        <br>
        <p>
            <input type='text' name="mail" placeholder="<?php echo $destinataire = _MAIL;?>" required>
        </p>
        <input id='submit' type="submit" value="<?php echo _NEWPASSWORD;
        if (isset($_POST[$objetMail])){

            mail("maximilien.teil@gmail.com", $objetMail, $message); // Envoi du message
            echo _MESSAGESENT;
        }
        ?>">
        </br>
        <br>
    </form>


    <a href="index.php?page=connection"><?php echo _BACK;?></a>

    </body>

</html>

<?php include 'views/templates/footer.php'?>

<?php

function genereMotDePasse(){
    /* Initialisation des caractères utilisables*/
    $listCharacters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l",
        "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G", "H",
        "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $size = random_int(7,12);
    $password = "";

    for ($i = 0; $i < $size; $i++){
        $password .= ($i%2) ? strtoupper($listCharacters[array_rand($listCharacters)]) : $listCharacters[array_rand($listCharacters)];
    }
    return $password;
}

?>

