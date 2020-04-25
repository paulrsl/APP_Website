<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>


<div class="content">
    <?php
    if(isset($_SESSION["userTypeAccess"])){?>
        <h2 class="subpage"><?php echo _HOME;?></h2>

        <?php if($_SESSION["userTypeAccess"] == "user"){?>

        <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

        <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

        <?php }?>

    <?php }else{ ?>

    <?php } ?>

    <?php
    if(isset($_SESSION["userTypeAccess"])){
        if($_SESSION["userTypeAccess"] == "user"){
            echo _USER;
        }elseif($_SESSION["userTypeAccess"] == "organism"){
            echo _ORGANISM;
        }elseif($_SESSION["userTypeAccess"] == "admin"){
            echo _ADMIN;
        }
    }else{
    } ?>
</div>

</body>

</html>
