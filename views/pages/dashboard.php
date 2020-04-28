<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container" id="box1">
        <a class="subpage" href="index.php?page=testResult"><h2><?php echo _TESTRESULT;?></h2></a>
<<<<<<< HEAD

        <img src="pictures/Rythme-cardiaque-1.png" class="testIcon" alt="Rythme-cardiaque-1"/>
        <img src="pictures/Reflexe-visuel-1.png" class="testIcon" alt="Reflexe-visuel-1"/>
        <br>
        <img src="pictures/Test-audition-1.png" class="testIcon" alt="Test-audition-1"/>
        <img src="pictures/Reflexe-sonore-1.png" class="testIcon" alt="Reflexe-sonore-1"/>

        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
=======
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <img src="pictures/Rythme-cardiaque-1.png" class="testIcon" alt="Rythme-cardiaque-1"/>
            <img src="pictures/Reflexe-visuel-1.png" class="testIcon" alt="Reflexe-visuel-1"/>
            <br>
            <img src="pictures/Test-audition-1.png" class="testIcon" alt="Test-audition-1"/>
            <img src="pictures/Reflexe-sonore-1.png" class="testIcon" alt="Reflexe-sonore-1"/>
>>>>>>> 423510a5835f43f695c6c602128d4a6376fd40ea

        <?php if($_SESSION["userTypeAccess"] == "user"){?>

        <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

        <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

        <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>

    <div class="container" id="box2">
        <a class="subpage" href="index.php?page=calendar"><h2><?php echo _CALENDAR;?></h2></a>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>




