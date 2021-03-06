<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _FAQ;?></h2>

            <?php if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism") || ($_SESSION["userTypeAccess"] == "admin")){?>

                <ul class="faq-list">
                <?php
                $faq = getFAQ($_SESSION["language"])->fetchAll();
                foreach ($faq as $ans){
                    ?>
                    <li class="faq-item">
                        <div>
                            <a class="faq-question"><?= $ans["question"]; ?></a>

                            <?php if($_SESSION["userTypeAccess"] == "admin") {?>

                                <a href="index.php?page=FAQ&IDMessage=<?= $ans['id'] ?>" class='smallButton'><?php echo _MODIFY ?></a>
                                <a href="index.php?action=deleteMessageFAQ&amp;IDMessage=<?= $ans['id'] ?>" class='smallButton'><?php echo _DELETE?></a>

                                <?php } ?>
                            <br>
                            <a class="faq-answer"><?= $ans["answer"]; ?><br></a>
                        </div>
                    </li>

                <?php } ?>
                </ul>
                <br>
                <?php if($_SESSION["userTypeAccess"] == "admin"){?>

                    <?php echo _ADDQUESTION ?>
                    <?php if(isset($_GET['IDMessage'])){ ?>

                        <form method="post" action="index.php?action=manageFAQ&amp;IDMessage=<?= $_GET['IDMessage'] ?>" enctype="multipart/form-data">

                    <?php }else{ ?>

                         <form method="post" action="index.php?action=manageFAQ" enctype="multipart/form-data">

                    <?php } ?>

                        <p>
                            <label><?php echo _QUESTION;?><br>
                                <textarea name="question" rows="3" cols="60" required><?php if(isset($_GET["IDMessage"])){$ans = getQuestionAnswer($_GET["IDMessage"])->fetchAll();echo $ans[0][0];}?></textarea>
                            </label>
                        </p>

                        <p>
                            <label><?php echo _ANSWER;?><br>
                                <textarea name="answer" rows="3" cols="60" required ><?php if(isset($_GET["IDMessage"])){ echo $ans[0][1];}?></textarea>
                            </label>
                        </p>

                        <p>
                            <?php echo _LANGUAGE; ?> ?
                            <br>
                            <select id="languageSelect" type='text' name="language" required>
                                <option value="EN" id="user" <?php if(isset($_GET["IDMessage"])){if($ans[0][2]=="EN"){echo "selected";}} ?>>EN</option>
                                <option value="FR" id="organism" <?php if(isset($_GET["IDMessage"])){if($ans[0][2]=="FR"){echo "selected";}} ?>>FR</option>
                            </select>
                        </p>

                        <input class="bigButton" type="submit" value="<?php echo _SUBMIT;?>" >

                    </form>



                <?php } ?>

            <?php } ?>


        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>


