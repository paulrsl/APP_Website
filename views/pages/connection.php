<<<<<<< HEAD
<!DOCTYPE html>
<html>
<?php include 'views/templates/headerUnsession.php'?>

<head>
</head>

<body>

<img src="pictures/BigMap_Logo.png" id="logo1" alt="Logo BigMap"/>
<img src="pictures/InfiniteMesures_Logo.png" id="logo2" alt="Logo InfiniteMeasures"/>

<form method="post" action="index.php?action=tryConnection">
    <br>
    <br>

    <p>
        <input type='text' name="mail" placeholder="<?php echo _MAIL;?>" required>
    </p>

    <p>
        <input type='password' name="password" placeholder="<?php echo _PASSWORD;?>" required>
    </p>

    <br>
    <input class="blueButton" type="submit" value="<?php echo _CONNECTION;?>"></br>
</form>

<a href="index.php?page=forgotPassword"><?php echo _FORGOTPASSWORD;?></a><br>
<br>
<br>

<?php echo _NOACCOUNT;?><br>
<form method="post" action="index.php?page=inscription">
    <input type="submit" value="<?php echo _INSCRIPTION;?>">
</form>

<br>
<br>
<a class="preFooter" href="index.php?page=presentation"><?php echo _WHOAREWE;?></a>
<a class="preFooter" href="index.php?page=contactUs"><?php echo _CONTACTUS;?></a>
<br>
<br>
</body>

</html>

=======
<!DOCTYPE html>
<html>
<?php include 'views/templates/headerUnsession.php'?>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="design/css/connection.css" />
    <link rel="stylesheet" href="design/css/generalUnsession.css" />
</head>

<body>

<img src="pictures/BigMap_Logo.png" id="logo1" alt="Logo BigMap"/>
<img src="pictures/InfiniteMesures_Logo.png" id="logo2" alt="Logo InfiniteMeasures"/>

<form method="post" action="index.php?action=tryConnection">
    <br>
    <br>
    <br>
    <br>

    <p>
        <input type='text' name="mail" placeholder="<?php echo _MAIL;?>" required>
    </p>

    <p>
        <input type='password' name="password" placeholder="<?php echo _PASSWORD;?>" required>
    </p>
    <br>
    <input id='submit' type="submit" value="<?php echo _CONNECTION;?>"></br>
    <br>
</form>

<a href="index.php?page=forgotPassword"><?php echo _FORGOTPASSWORD;?></a><br>
<a><?php echo _NOACCOUNT;?></a><br>
<br>
<form method="post" action="index.php?page=inscription">
    <input type="submit" value="<?php echo _INSCRIPTION;?>">
</form>

<br>
<a href="index.php?page=presentation"><?php echo _WHOAREWE;?></a>
<br>
<a href="index.php?page=contactUs"><?php echo _CONTACTUS;?></a>
<br>
<br>
</body>

</html>

>>>>>>> eade9b217a854d1552c52ae7f2abfca102448b99
<?php include 'views/templates/footer.php'?>