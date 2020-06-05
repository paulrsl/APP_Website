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

        <table id="manageTable">
            <tr>
                <th>
                    <?php echo _FIRSTNAME?>
                </th>
                <th>
                    <?php echo _LASTNAME?>
                </th>
                <th>
                    <?php echo _MAIL?>
                </th>
                <th>
                    <?php echo _TYPE?>
                </th>
            </tr>
        <?php $person = getPerson()->fetchAll();
            foreach ($person as $ans){?>
                <tr>
                    <td>
                        <?php echo $ans["firstName"];?>
                    </td>
                    <td>
                        <?php echo $ans["lastName"];?>
                    </td>
                    <td>
                        <?php echo $ans["mail"];?>
                    </td>
                    <td>
                        <?php echo $ans["typeAccess"];?>
                    </td>
                    <td>
                        <?php if(isset($ans['id'])){ ?>
                            <a href="index.php?page=manageAccessRight&IDUser=<?= $ans['id'] ?>&typeAccess=<?= $ans['typeAccess'] ?>" class='smallButton'><?php echo _MODIFY ?></a>
                            <a href="index.php?action=deleteAccessRight&amp;IDUser=<?= $ans['id'] ?>" class='smallButton'><?php echo _DELETE?></a>
                        <?php } ?>
                    </td>


                </tr>
            <?php } ?>
        </table>

            <?php if ($_SESSION['userTypeAccess'] == "admin"){
                if(isset($_GET['typeAccess']) && isset($_GET['IDUser'])){ ?>

                    <form method="post" action="index.php?action=modifyAccessRight&amp;IDUser=<?= $_GET['IDUser'] ?>&amp;typeAccess=<?= $_GET['typeAccess'] ?>" enctype="multipart/form-data">
                        <p>
                            <br>
                            <select class="userInput" type='text' name="newTypeAccess">
                                <option value="user" id="user" <?php if($_GET['typeAccess'] == 'user'){echo "selected";} ?>> <?php echo _USER;?></option>
                                <option value="organism" id="organism" <?php if($_GET['typeAccess'] == 'organism'){echo "selected";} ?>><?php echo _ORGANISM;?></option>
                                <option value="admin" id="admin" <?php if($_GET['typeAccess'] == 'admin'){echo "selected";} ?>><?php echo _ADMIN;?></option>
                            </select>
                        </p>

                        <input class="bigButton leftButton" type="submit" value="<?php echo _MODIFY;?>" >
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




