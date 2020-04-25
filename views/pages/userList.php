<<<<<<< HEAD
<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>

<div class="content">
<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h2 class="subpage"><?php echo _USERLIST;?></h2>

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
</div>

</body>

</html>



=======
<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerSession.php"; ?>

<div class="content">
<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h2 class="subpage"><?php echo _USERLIST;?></h2>

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
</div>

</body>

</html>



>>>>>>> eade9b217a854d1552c52ae7f2abfca102448b99
