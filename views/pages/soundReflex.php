<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _SOUNDREFLEX;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <table id="soundReflexTable">
                    <tr>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _VALUE;?></th>
                    </tr>

                    <?php $soundReflex = getResults($_SESSION["userId"])->fetchAll();

                    foreach ($soundReflex as $sr) { ?>
                        <tr>
                            <td><?php echo $sr["testDate"];?></td>
                            <td><?php echo $sr["averageSoundStimulus"];?></td>
                        </tr>
                    <?php }?>

                </table>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>



