<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <h2 class="subpage"><?php echo _TESTRESULT;?></h2>

        <img src="pictures/Rythme-cardiaque-2.png" class="resultIcon" alt="Rythme-cardiaque-2"/>
        <img src="pictures/Reflexe-visuel-2.png" class="resultIcon" alt="Reflexe-visuel-2"/>
        <br>
        <img src="pictures/Test-audition-2.png" class="resultIcon" alt="Test-audition-2"/>
        <img src="pictures/Reflexe-sonore-2.png" class="resultIcon" alt="Reflexe-sonore-2"/>

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



