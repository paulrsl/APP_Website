<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>

<div class="content">
<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h2 class="subpage"><?php echo _FAQ;?></h2>

    <?php if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism") || ($_SESSION["userTypeAccess"] == "admin")){?>

        <ul>
        <?php
        $faq = getFAQ($_SESSION["userLanguage"])->fetchAll();
        foreach ($faq as $ans){
            ?>
            <li>
                <div>
                    <a><?= $ans["question"]; ?></a>

                    <?php if($_SESSION["userTypeAccess"] == "admin"){?>

                        <a><?php echo _MODIFY ?></a>
                        <a><?php echo _DELETE ?></a>

                    <?php }?>
                    <br>
                    <a><?= $ans["answer"]; ?></a><br><br>
                </div>
            </li>

        <?php } ?>
        </ul>
        <?php if($_SESSION["userTypeAccess"] == "admin"){?>

            <a><?php echo _ADDMODIFY ?></a>
            <form method="post" action="index.php?action=addFAQ" enctype="multipart/form-data">

                <p>
                    <label><?php echo _QUESTION;?>
                        <textarea name="question" rows="2" cols="50"></textarea>
                    </label>
                </p>

                <p>
                    <label><?php echo _ANSWER;?>
                        <textarea name="answer" rows="2" cols="50"></textarea>
                    </label>
                </p>

                <p>
                    <a><?php echo _LANGUAGE;?> ?</a>
                    <br>
                    <select type = 'text' name="language" required>
                        <option value="EN" id="user">EN</option>
                        <option value="FR" id="organism">FR</option>
                    </select>
                </p>

                <input type="submit" value="<?php echo _SUBMIT;?>" >

            </form>



        <?php } ?>

    <?php } ?>


<?php }else{ ?>

<?php } ?>

</div>

</body>

</html>


