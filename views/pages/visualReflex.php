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
                        <th><?php echo _VALUE;?></th>
                        <th><?php echo _HEARTBEAT;?></th>
                        <th><?php echo _TEMPERATURE;?></th>
                    </tr>

                <?php $visualReflex = getAll("testvisualstimulus")->fetchAll();

                foreach ($visualReflex as $vr) {
                    if(getIdTest() == $vr["idTest"]){?>
                        <tr>
                            <td><?php echo $vr["value"];?></td>
                            <td><?php echo $vr["heartBeat"];?></td>
                            <td><?php echo $vr["temperature"];?></td>
                        </tr>
                    <?php }?>
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