<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _LASTTEST;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <table id="resultTable">
                    <tr>
                        <th><?php echo _FIRSTNAME;?></th>
                        <th><?php echo _LASTNAME;?></th>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _AVERAGEVISUALSTIMULUS;?></th>
                        <th><?php echo _AVERAGESOUNDSTIMULUS;?></th>
                        <th><?php echo _AVERAGETONE;?></th>
                    </tr>

                    <?php $userId = getUserId($_SESSION["userId"])->fetchAll();
                    $results = getResults($userId[0][0])->fetchAll();

                    foreach ($results as $result) { ?>
                        <tr>
                            <td>
                                <?php $personId =  getPersonId($result['userId'])->fetchAll();
                                $info = getInfos((int) $personId[0][0])->fetchAll();
                                $info = $info[0];
                                echo $info["firstName"]?>
                            </td>
                            <td>
                                <?php echo $info["lastName"]?>
                            </td>
                            <td>
                                <?php echo $result["testDate"];?>
                            </td>
                            <td>
                                <?php echo $result["averageVisualStimulus"];?>
                            </td>
                            <td>
                                <?php echo $result["averageSoundStimulus"];?>
                            </td>
                            <td>
                                <?php echo $result["averageTone"];?>
                            </td>
                        </tr>
                    <?php }?>
                </table>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
                <table id="resultTable">
                    <tr>
                        <th><?php echo _FIRSTNAME;?></th>
                        <th><?php echo _LASTNAME;?></th>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _AVERAGEVISUALSTIMULUS;?></th>
                        <th><?php echo _AVERAGESOUNDSTIMULUS;?></th>
                        <th><?php echo _AVERAGETONE;?></th>
                    </tr>

                    <?php $id = getOrganismId($_SESSION["userId"])->fetchAll();
                    if(empty($id) == false){ ?>
                        <?php $listId = getUserInOrganism((int) $id[0][0]);?>

                        <?php foreach ($listId as $list){
                            $results = getResults((int) $list [0][0])->fetchAll();

                            foreach ($results as $result){
                                $personId =  getPersonId($result['userId'])->fetchAll();
                                $info = getInfos((int) $personId[0][0])->fetchAll();
                                $info = $info[0]; ?>

                                <tr>
                                    <td>
                                        <?php echo $info['firstName']?>
                                    </td>
                                    <td>
                                        <?php echo $info['lastName']?>
                                    </td>
                                    <td>
                                        <?php echo $result['testDate']?>
                                    </td>
                                    <td>
                                        <?php echo $result["averageVisualStimulus"];?>
                                    </td>
                                    <td>
                                        <?php echo $result["averageSoundStimulus"];?>
                                    </td>
                                    <td>
                                        <?php echo $result["averageTone"];?>
                                    </td>
                                </tr>

                            <?php } }?>

                    <?php }else{ echo _NOMEMBER; } ?>
                </table>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>

