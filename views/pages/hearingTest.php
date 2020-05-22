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
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _VALUE;?></th>
                    </tr>

                    <?php $hearingTest = getResults($_SESSION["userId"])->fetchAll();

                    foreach ($hearingTest as $ht) { ?>
                        <tr>
                            <td><?php echo $ht["testDate"];?></td>
                            <td><?php echo $ht["averageTone"];?></td>
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



