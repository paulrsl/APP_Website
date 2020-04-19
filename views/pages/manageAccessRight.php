<!DOCTYPE html>
<?php include "views/templates/headerSession.php"; ?>
<html>

<body>
<?php include "views/templates/lefter.php"; ?>

<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h1><?php echo _MANAGEACCESSRIGHT;?></h1>

    <?php if($_SESSION["userTypeAccess"] == "admin"){?>

    <ul>
    <?php $person = getPerson()->fetchAll();
        foreach ($person as $ans){?>
            <li>
                <?php echo $ans["firstName"]. " " .$ans["lastName"]. " " .$ans["mail"]. " " .$ans["typeAccess"] ?>
                <a><?php echo _MODIFY?></a>
                <a><?php echo _DELETE?></a>
            </li>

        <?php } ?>
    </ul>
    <?php }else{ include "views/templates/accessDeny.php"; ?>


    <?php }?>

<?php }else{ ?>

<?php } ?>

</body>

</html>

<?php include 'views/templates/footer.php'?>


