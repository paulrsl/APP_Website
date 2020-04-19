<!DOCTYPE html>
<?php include "views/templates/headerSession.php"; ?>
<html>

<body>
<?php include "views/templates/lefter.php"; ?>

<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h1><?php echo _USERLIST;?></h1>

    <?php if($_SESSION["userTypeAccess"] == "organism"){?>
        <?php
        $id = getOrganismId($_SESSION["userId"])->fetchAll();
        if(empty($id) == false){ ?>
            <ul>
            <?php $users = getUserInOrganism($id[0][0])->fetchAll();
            foreach ($users as $user){?>
                <li><?= $user["mail"]?></li>
            <?php } ?>
            </ul>
        <?php }else{ echo _NOMEMBER; } ?>

    <?php }else{ include "views/templates/accessDeny.php"; ?>


    <?php }?>

<?php }else{ ?>

<?php } ?>
</body>

</html>

<?php include 'views/templates/footer.php'?>


