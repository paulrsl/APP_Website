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

        <ul class="faq-list">
        <?php
        $faq = getFAQ($_SESSION["userLanguage"])->fetchAll();
        foreach ($faq as $ans){
            ?>
            <li class="faq-item">
                <div>
                    <a class="faq-question"><?= $ans["question"]; ?></a>

                    <?php if($_SESSION["userTypeAccess"] == "admin"){?>

                        <input class="smallButton" type="submit" value="<?php echo _MODIFY ?>">
                        <input class="smallButton" type="submit" value="<?php echo _DELETE ?>">

                    <?php }?>
                    <br>
                    <a class="faq-answer"><?= $ans["answer"]; ?><br></a>
                </div>
            </li>

        <?php } ?>
        </ul>
        <br>
        <?php if($_SESSION["userTypeAccess"] == "admin"){?>

            <?php echo _ADDQUESTION ?>
            <form method="post" action="index.php?action=addFAQ" enctype="multipart/form-data">

                <p>
                    <label><?php echo _QUESTION;?><br>
                        <textarea name="question" rows="2" cols="50"></textarea>
                    </label>
                </p>

                <p>
                    <label><?php echo _ANSWER;?><br>
                        <textarea name="answer" rows="2" cols="50"></textarea>
                    </label>
                </p>

                <p>
                    <?php echo _LANGUAGE;?> ?
                    <br>
                    <select id="languageSelect" type='text' name="language" required>
                        <option value="EN" id="user">EN</option>
                        <option value="FR" id="organism">FR</option>
                    </select>
                </p>

                <input class="bigButton" type="submit" value="<?php echo _SUBMIT;?>" >

            </form>



        <?php } ?>

    <?php } ?>


<?php }else{ ?>

<?php } ?>

</div>

</body>

</html>


