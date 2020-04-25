<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>

<div class="content">
<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h2 class="subpage"><?php echo _MANAGEACCESSRIGHT;?></h2>

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
</div>

</body>

</html>




