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

<?php include 'views/templates/footer.php'?>