<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _HEARINGTEST;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <table id="hearingTestTable">
                    <tr>
                        <th><?php echo _VALUE;?></th>
                        <th><?php echo _HEARTBEAT;?></th>
                        <th><?php echo _TEMPERATURE;?></th>
                    </tr>

                    <?php $hearingTest = getAll("testtone")->fetchAll();

                    foreach ($hearingTest as $ht) {
                        if(getIdTest() == $ht["idTest"]){?>
                            <tr>
                                <td><?php echo $ht["value"];?></td>
                                <td><?php echo $ht["heartBeat"];?></td>
                                <td><?php echo $ht["temperature"];?></td>
                            </tr>
                        <?php }?>
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


