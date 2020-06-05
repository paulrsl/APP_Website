<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-15" />
</head>

<body>
<?php include 'views/templates/headerLogout.php'?>

<div class="page">
    <h2 class="subpage"><?php echo _FORGOTPASSWORD;?></h2>

    <form method="post" action="index.php?action=mailForgotPassword" enctype="multipart/form-data">

        <p>
            <label>
                <?php echo _SENDER;?>
                <input class="userInput" type='email' name="destinataire" placeholder="<?php echo _MAIL;?>" required>
            </label>
        </p>

        <p>
            <label><?php echo _OBJECT;?></label>
        </p>

        <input class="userInput blueButton" type="submit" value="<?php echo _SENDMAIL;?>">

    </form>

    <h2><a href="index.php?page=connection"><?php echo _BACK;?></a></h2>
</div>

<?php include 'views/templates/footer.php'?>
</body>

</html>