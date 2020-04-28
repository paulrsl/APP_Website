<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
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

            <input class="bigButton" type="submit" value="<?php echo _SUBMIT;?>" >

        </form>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>