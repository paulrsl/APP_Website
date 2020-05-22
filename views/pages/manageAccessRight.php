<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
    <?php
    if(isset($_SESSION["userTypeAccess"])){?>
        <h2 class="subpage"><?php echo _MANAGEACCESSRIGHT;?></h2>

        <?php if($_SESSION["userTypeAccess"] == "admin"){?>

        <ul>
        <?php $person = getPerson()->fetchAll();
            foreach ($person as $ans){?>
                <li id="userList">
                    <?php echo $ans["firstName"]. " " .$ans["lastName"]. " " .$ans["mail"]. " " .$ans["typeAccess"] ?>

                    <?php if(isset($ans['id'])){ ?>
                        <a href="index.php?page=manageAccessRight&IDUser=<?= $ans['id'] ?>&typeAccess=<?= $ans['typeAccess'] ?>" class='smallButton'><?php echo _MODIFY ?></a>
                        <a href="index.php?action=deleteAccessRight&amp;IDUser=<?= $ans['id'] ?>" class='smallButton'><?php echo _DELETE?></a>
                    <?php } ?>

                </li>
            <?php } ?>
        </ul>

            <?php if ($_SESSION['userTypeAccess'] == "admin"){
                if(isset($_GET['typeAccess']) && isset($_GET['IDUser'])){ ?>

                    <form method="post" action="index.php?action=modifyAccessRight&amp;IDUser=<?= $_GET['IDUser'] ?>&amp;typeAccess=<?= $_GET['typeAccess'] ?>" enctype="multipart/form-data">

                        <label>
                            <?php echo _ACCOUNTYPE;
                            if ($_GET['typeAccess'] == 'user'){
                                echo  _USER;
                            } elseif ($_GET['typeAccess'] == 'organism'){
                                echo _ORGANISM;
                            } elseif ($_GET['typeAccess'] == 'admin'){
                                echo _ADMIN;
                            }?>
                        </label>

                        <p>
                            <br>
                            <select class="userInput" type='text' name="newTypeAccess">
                                <option value="user" id="user"><?php echo _USER;?></option>
                                <option value="organism" id="organism"><?php echo _ORGANISM;?></option>
                                <option value="admin" id="admin"><?php echo _ADMIN;?></option>
                            </select>
                        </p>

                        <input class="bigButton" type="submit" value="<?php echo _SUBMIT;?>" >
                    </form>
                <?php }
            } ?>

        <?php }else{ include "views/templates/accessDeny.php"; ?>

        <?php }?>

    <?php }else{ ?>

    <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>




