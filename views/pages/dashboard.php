<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <div class="container box">
                    <a class="subpage" href="index.php?page=testResult"><h2><?php echo _TESTRESULT;?></h2></a>

                    <img src="pictures/Rythme-cardiaque-1.png" class="testIcon" alt="Rythme-cardiaque-1"/>
                    <img src="pictures/Reflexe-visuel-1.png" class="testIcon" alt="Reflexe-visuel-1"/>
                    <br>
                    <img src="pictures/Test-audition-1.png" class="testIcon" alt="Test-audition-1"/>
                    <img src="pictures/Reflexe-sonore-1.png" class="testIcon" alt="Reflexe-sonore-1"/>
                </div>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
                <div class="container flexbox">
                    <a class="subpage" href="index.php?page=calendar"><h2><?php echo _USERLIST;?></h2></a>
                </div>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>
                <div class="container flexbox">
                    <a class="subpage" href="index.php?page=calendar"><h2><?php echo _MODIFYRESULT;?></h2></a>
                </div>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>

    <div class="container flexbox">
        <a class="subpage" href="index.php?page=calendar"><h2><?php echo _CALENDAR;?></h2></a>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>




