<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _MODIFYRESULT;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "admin"){?>
                <table id="resultTable" class="allResult">
                    <tr>
                        <th><?php echo _FIRSTNAME;?></th>
                        <th><?php echo _LASTNAME;?></th>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _AVERAGEVISUALSTIMULUS;?></th>
                        <th><?php echo _AVERAGESOUNDSTIMULUS;?></th>
                        <th><?php echo _AVERAGETONE;?></th>
                    </tr>

                    <?php
                    $results = getAllResults()->fetchAll();

                    foreach ($results as $result){
                        $personId =  getPersonId($result['userId'])->fetchAll();
                        $info = getInfos((int) $personId[0][0])->fetchAll();
                        $info = $info[0]; ?>

                        <tr>
                            <td><?php echo $info['firstName']?></td>
                            <td><?php echo $info['lastName']?></td>
                            <td><?php echo $result['testDate']?></td>
                            <td><?php echo $result["averageVisualStimulus"];?></td>
                            <td><?php echo $result["averageSoundStimulus"];?></td>
                            <td><?php echo $result["averageTone"];?></td>

                            <td>
                                <a href="index.php?action=deleteUserResult&amp;IDMessage=<?= $result['id'] ?>" class='smallButton'><?php echo _DELETE?></a>
                            </td>
                        </tr>
                    <?php }?>
                </table>

            <?php }else{ include "views/templates/accessDeny.php"; ?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>



