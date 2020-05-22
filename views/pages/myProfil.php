<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <form class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _MYPROFIL;?></h2>

            <?php if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism") || ($_SESSION["userTypeAccess"] == "admin")){ ?>

                <form method="post" action="index.php?action=manageProfil" enctype="multipart/form-data">

                    <p>
                        <label><?php echo _MAIL;?><br>
                            <input class="userInput" type='email' name="mail" placeholder="<?php echo _MAIL;?>" value=<?php echo $_SESSION["userMail"] ?>>
                        </label>
                    </p>

                    <p>
                        <label><?php echo _FIRSTNAME;?><br>
                            <input class="userInput" type='text' name="firstname" placeholder="<?php echo _FIRSTNAME;?>" value=<?php echo $_SESSION["userFirstName"] ?>>
                        </label>
                    </p>

                    <p>
                        <label><?php echo _LASTNAME;?><br>
                            <input class="userInput" type='text' name="lastname" placeholder="<?php echo _LASTNAME;?>" value=<?php echo $_SESSION["userLastName"] ?>>
                        </label>
                    </p>

                    <p>
                        <?php echo _LANGUAGE; ?> ?
                        <br>
                        <select id="languageSelect" type='text' name="language" required>
                            <option value="EN" id="user" <?php if($_SESSION["userLanguage"]=="EN"){echo "selected";} ?>>EN</option>
                            <option value="FR" id="organism" <?php if($_SESSION["userLanguage"]=="FR"){echo "selected";} ?>>FR</option>
                        </select>
                    </p>

                    <p>
                        <label><?php echo _PROFILPICTURE;?><br>
                            <input type='file' name="profilPicture">
                            <i id="profilIcon" class="fas fa-user-circle"></i>
                        </label>
                    </p>

                    <p>
                        <label><?php echo _PASSWORD;?><br>
                            <input class="userInput" type='password' name="password" placeholder="<?php echo _PASSWORD;?>" required>
                        </label>
                    </p>






                    <?php if($_SESSION["userTypeAccess"] == "user"){?>

                    <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>


                    <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

                    <?php }?>

                    <input class="bigButton" type="submit" value="<?php echo _MODIFY;?>" >

                </form>

            <?php } ?>

        <?php }else{ ?>

        <?php } ?>

    </form>

</div> <!--fin du bloc main-->

</body>

</html>




