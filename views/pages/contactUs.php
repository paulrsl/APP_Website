<?php include 'views/templates/headerUnsession.php'?>

<!DOCTYPE html>

<html>

<body>
<h1><?php echo _CONTACTUS;?></h1>

<form method="post" action="index.php?action=sendMessage" enctype="multipart/form-data">

    <p>
        <label><?php echo _MAIL;?> :<br>
            <input type='email' name="mail" placeholder="<?php echo _MAIL;?>" required>
        </label>
    </p>

    <p>
        <label><?php echo _MESSAGE;?>
            <textarea name="message" rows="5" cols="50">

            </textarea>
        </label>
    </p>

    <input type="submit" value="<?php echo _SUBMIT;?>" >

</form>


<a href="index.php?page=connection"><?php echo _BACK;?></a>

</body>

</html>

<?php include 'views/templates/footer.php'?>