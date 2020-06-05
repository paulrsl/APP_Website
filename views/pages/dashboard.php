<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <div class="container box">
                    <a class="subpage" href="index.php?page=testResult"><h2><?php echo _TESTRESULT;?></h2></a>
                    <?php if ($_SESSION["language"] == 'FR') {?>
                        <a href="index.php?page=visualReflex">
                            <img src="pictures/FR/Visual-reflex-1.png" class="testIcon" alt="Reflexe-visuel-1"/>
                        </a>
                        <a href="index.php?page=soundReflex">
                            <img src="pictures/FR/Sound-reflex-1.png" class="testIcon" alt="Reflexe-sonore-1"/>
                        </a>
                        <br>
                        <a href="index.php?page=hearingTest">
                            <img src="pictures/FR/Hearing-test-1.png" class="testIcon" alt="Test-audition-1"/>
                        </a>
                    <?php }?>

                    <?php if ($_SESSION["language"] == 'EN') {?>
                        <a href="index.php?page=visualReflex">
                            <img src="pictures/EN/Visual-reflex-1.png" class="testIcon" alt="Visual-reflex-1"/>
                        </a>
                        <a href="index.php?page=soundReflex">
                            <img src="pictures/EN/Sound-reflex-1.png" class="testIcon" alt="Sound-reflex-1"/>
                        </a>
                        <br>
                        <a href="index.php?page=hearingTest">
                            <img src="pictures/EN/Hearing-test-1.png" class="testIcon" alt="Hearing-test-1"/>
                        </a>
                    <?php }?>
                </div>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
                <div class="container flexbox">
                    <a class="subpage" href="index.php?page=performTest"><h2><?php echo _PERFORMTEST;?></h2></a>
                    <?php
                    $id = getOrganismId($_SESSION["userId"])->fetchAll();
                    if(empty($id) == false){ ?>
                        <ul>
                            <?php $users = getUserInOrganism($id[0][0])->fetchAll();
                            foreach ($users as $user){?>
                                <li id="userList">
                                    <?= $user["mail"]?>
                                    <?= $user["firstName"]?>
                                    <?= $user["lastName"]?>
                                </li>

                            <?php } ?>
                        </ul>

                        <a href="index.php?page=performTest" class='bigButton' id="performTestButton" "><?php echo _PERFORMTEST ?> </a>

                    <?php }else{ echo _NOMEMBER; } ?>
                </div>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>
                <div class="container flexbox">
                    <a class="subpage" href="index.php?page=modifyResult"><h2><?php echo _MODIFYRESULT;?></h2></a>
                    <table id="resultTable" class="allResult">
                        <tr>
                            <th><?php echo _FIRSTNAME;?></th>
                            <th><?php echo _LASTNAME;?></th>
                            <th><?php echo _DATE;?></th>
                        </tr>

                        <?php
                        $results = getAllLastResults(10)->fetchAll();

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
                            </tr>
                        <?php }?>
                    </table>
                </div>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>

    <div class="container flexbox">
        <?php if($_SESSION["userTypeAccess"] == "user"){?>
            <a class="subpage" href="index.php?page=lastTest"><h2><?php echo _LASTTEST;?></h2></a>

            <table id="resultTable">
                <tr>
                    <th><?php echo _FIRSTNAME;?></th>
                    <th><?php echo _LASTNAME;?></th>
                    <th><?php echo _DATE;?></th>
                </tr>


                <?php $userId = getUserId($_SESSION["userId"])->fetchAll();
                $results = getLastResults($userId[0][0],10)->fetchAll();

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
                    </tr>
                <?php }?>
            </table>

        <?php }?>

        <?php if($_SESSION["userTypeAccess"] == "organism"){?>
            <a class="subpage" href="index.php?page=lastTest"><h2><?php echo _LASTTEST;?></h2></a>

            <table id="resultTable">
                <tr>
                    <th><?php echo _FIRSTNAME;?></th>
                    <th><?php echo _LASTNAME;?></th>
                    <th><?php echo _DATE;?></th>
                </tr>

            <?php $id = getOrganismId($_SESSION["userId"])->fetchAll();
            if(empty($id) == false){ ?>
                <?php $listId = getUserInOrganism((int) $id[0][0]);
                    $resultArray=array();
                    foreach ($listId as $list){
                        $results = getResults((int) $list [0])->fetchAll();

                        foreach ($results as $result){
                            array_push($resultArray,$result);
                        } }

                function cmp($a, $b){
                    return $a["testDate"] < $b["testDate"];
                }

                usort($resultArray, "cmp");

                $i=0;
                while ($i < 10 && $i < sizeof($resultArray)){
                    $personId =  getPersonId($resultArray[$i][1])->fetchAll();
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
                            <?php echo $resultArray[$i][2]?>
                        </td>
                    </tr>
                    <?php $i+=1;?>
                <?php } ?>
            </table>
            <?php } ?>

        <?php }?>

        <?php if($_SESSION["userTypeAccess"] == "admin"){?>
            <a class="subpage" href="index.php?page=tickets"><h2><?php echo _TICKETS;?></h2></a>

            <table class="dashboard" id="adminTable">
                <?php
                $tickets = getTicketsStatus("all")->fetchAll();
                foreach ($tickets as $ticket){?>
                    <tr>
                        <td class="dashboard" id="nomPrenom">
                            <i class="fas fa-user-circle"></i>
                            <?php
                            $info = getInfos($ticket["userId"])->fetchall();
                            echo $info[0][3]; ?>
                            <?php echo $info[0][4]; ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="dashboard" id="adminQuestion">
                            <?= $ticket["question"]; ?>
                        </td>

                        <td class="dashboard status">
                            <?php if($ticket["status"] == "new"){?>
                                <i class="fas fa-times-circle"></i>
                                <?php echo _UNPROCESSED ?>
                            <?php }else{ ?>
                                <i class="fas fa-check-circle"></i>
                                <?php echo _PROCESSED ?>
                            <?php } ?>
                        </td>
                    </tr>

                <?php } ?>
            </table>
        <?php }?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>