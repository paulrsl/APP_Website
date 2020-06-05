<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _USERLIST;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "organism"){?>
                <?php
                $id = getOrganismId($_SESSION["userId"])->fetchAll();
                if(empty($id) == false){ ?>
                    <form method="post" action="index.php?action=addUserList" enctype="multipart/form-data">
                        <p>
                            <label><?php echo _MAIL;?> :<br>
                                <input class="userInput" type='email' name="mail" placeholder="<?php echo _MAIL;?>" required>
                            </label>
                        </p>
                        <input class="bigButton leftButton" type="submit" value="<?php echo _SUBMIT;?>" ></br></br>
                    </form>

                    <ul>
                    <?php $users = getUserInOrganism($id[0][0])->fetchAll();
                    foreach ($users as $user){?>
                        <li id="userList"><?= $user["mail"]?>
                            <a href="index.php?action=deleteUserList&amp;IDMessage=<?= $user['id'] ?>" class='smallButton'><?php echo _DELETE?></a>
                        </li>

                    <?php } ?>

                    </ul>
                <?php }else{ echo _NOMEMBER; } ?>

            <?php }else{ include "views/templates/accessDeny.php"; ?>


            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>



