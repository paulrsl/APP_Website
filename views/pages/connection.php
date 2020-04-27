<!DOCTYPE html>
<html>

<body>
<?php include 'views/templates/headerLogout.php'?>

<img src="pictures/BigMap_Logo.png" id="logo1" alt="Logo BigMap"/>
<img src="pictures/InfiniteMesures_Logo.png" id="logo2" alt="Logo InfiniteMeasures"/>

<form method="post" action="index.php?action=tryConnection">
    <br>
    <br>

    <p>
        <input class="userInput" type='text' name="mail" placeholder="<?php echo _MAIL;?>" required>
    </p>

    <p>
        <input class="userInput" type='password' name="password" placeholder="<?php echo _PASSWORD;?>" required>
    </p>

    <br>
    <input class="userInput blueButton" type="submit" value="<?php echo _CONNECTION;?>"></br>
</form>

<a href="index.php?page=forgotPassword"><?php echo _FORGOTPASSWORD;?></a><br>
<br>
<br>

<?php echo _NOACCOUNT;?><br>
<form method="post" action="index.php?page=inscription">
    <input class="userInput" type="submit" value="<?php echo _INSCRIPTION;?>">
</form>

<br>
<br>
<a class="preFooter" href="index.php?page=presentation"><?php echo _WHOAREWE;?></a>
<a class="preFooter" href="index.php?page=contactUs"><?php echo _CONTACTUS;?></a>
<br>
<br>

<?php include 'views/templates/footer.php'?>
</body>

</html>