<!DOCTYPE html>
<html>

<body>
<?php include 'views/templates/headerLogout.php'?>

<h2 class="subpage"><?php echo _CONTACTUS;?></h2>

<form method="post" action="index.php?action=sendMessage" enctype="multipart/form-data">

    <p>
        <label><?php echo _MAIL;?> :<br>
            <input class ="userInput" type='email' name="mail" placeholder="<?php echo _MAIL;?>" required>
        </label>
    </p>

    <p>
        <label><?php echo _MESSAGE;?>
            <br>
            <textarea name="message" rows="5" cols="50">

            </textarea>
        </label>
    </p>

    <input class="userInput blueButton" type="submit" value="<?php echo _SUBMIT;?>" >

</form>

<h2>
    <a href="index.php?page=connection"><?php echo _BACK;?></a>
</h2>

<?php include 'views/templates/footer.php'?>
</body>

</html>