<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _VISUALREFLEX;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <table id="visualReflexTable">
                    <tr>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _VALUE;?></th>
                    </tr>

                    <?php $visualReflex = getResults($_SESSION["userId"])->fetchAll();

                    foreach ($visualReflex as $vr) { ?>
                            <tr>
                                <td><?php echo $vr["testDate"];?></td>
                                <td><?php echo $vr["averageVisualStimulus"];?></td>
                            </tr>
                    <?php }?>

                </table>


            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>