<!DOCTYPE html>
<?php include "views/templates/headerSession.php"; ?>
<html>

<body>
<?php include "views/templates/lefter.php"; ?>

<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h1><?php echo _MODIFYRESULT;?></h1>

    <?php if($_SESSION["userTypeAccess"] == "admin"){?>

    <?php }else{ include "views/templates/accessDeny.php"; ?>


    <?php }?>

<?php }else{ ?>

<?php } ?>
</body>

</html>

<?php include 'views/templates/footer.php'?>

