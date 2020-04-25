<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>

<div class="content">
    <?php
    if(isset($_SESSION["userTypeAccess"])){?>
        <h2 class="subpage"><?php echo _TESTRESULT;?></h2>

        <?php if($_SESSION["userTypeAccess"] == "user"){?>

        <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

        <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

        <?php }?>

    <?php }else{ ?>

    <?php } ?>
</div>

</body>

</html>



