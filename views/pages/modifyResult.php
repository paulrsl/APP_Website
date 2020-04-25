<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>

<div class="content">
    <?php
    if(isset($_SESSION["userTypeAccess"])){?>
        <h2 class="subpage"><?php echo _MODIFYRESULT;?></h2>

        <?php if($_SESSION["userTypeAccess"] == "admin"){?>

        <?php }else{ include "views/templates/accessDeny.php"; ?>


        <?php }?>

    <?php }else{ ?>

    <?php } ?>
</div>

</body>

</html>



