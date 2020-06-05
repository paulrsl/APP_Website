<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <h2 class="subpage"><?php echo _TESTRESULT;?></h2>

        <?php if ($_SESSION["language"] == 'FR') {?>
            <a href="index.php?page=visualReflex">
                <img src="pictures/FR/Visual-reflex-2.png" class="testIcon" alt="Reflexe-visuel-2"/>
            </a>
            <a href="index.php?page=soundReflex">
                <img src="pictures/FR/Sound-reflex-2.png" class="testIcon" alt="Reflexe-sonore-2"/>
            </a>
            <a href="index.php?page=hearingTest">
                <img src="pictures/FR/Hearing-test-2.png" class="testIcon" alt="Test-audition-2"/>
            </a>
        <?php }?>

        <?php if ($_SESSION["language"] == 'EN') {?>
            <a href="index.php?page=visualReflex">
                <img src="pictures/EN/Visual-reflex-2.png" class="testIcon" alt="Visual-reflex-2"/>
            </a>
            <a href="index.php?page=soundReflex">
                <img src="pictures/EN/Sound-reflex-2.png" class="testIcon" alt="Sound-reflex-2"/>
            </a>
            <a href="index.php?page=hearingTest">
                <img src="pictures/EN/Hearing-test-2.png" class="testIcon" alt="Hearing-test-2"/>
            </a>
        <?php }?>

        <?php
        if(isset($_SESSION["userTypeAccess"])){?>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>



