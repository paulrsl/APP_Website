<!DOCTYPE html>
<html>
<?php include 'views/templates/headerUnsession.php'?>

<body>
<h2 class="subpage"><?php echo _CONTACTUS;?></h2>

<form method="post" action="index.php?action=sendMessage" enctype="multipart/form-data">

    <p>
        <label><?php echo _MAIL;?> :<br>
            <input type='email' name="mail" placeholder="<?php echo _MAIL;?>" required>
        </label>
    </p>

    <p>
        <label><?php echo _MESSAGE;?>
            <br>
            <textarea name="message" rows="5" cols="50">

            </textarea>
        </label>
    </p>

    <input class="blueButton" type="submit" value="<?php echo _SUBMIT;?>" >

</form>

<h2>
    <a href="index.php?page=connection"><?php echo _BACK;?></a>
</h2>

</body>

</html>

<?php include 'views/templates/footer.php'?>