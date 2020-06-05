<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <h2 class="subpage"><?php echo _SCORE;?></h2>

        <?php
        if(isset($_SESSION["userTypeAccess"])){?>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>

                <?php $userId = getUserId($_SESSION["userId"])->fetchAll();?>


                <p><?php echo _SCORECOMMENTUSER;?></p>
                <br>
                <img src="pictures/trophy-solid-red.png" class="scoreIcon" alt="trophy-solid-red"/>
                <img src="pictures/trophy-solid-purple.png" class="scoreIcon" alt="trophy-solid-purple"/>
                <img src="pictures/trophy-solid-yellow.png" class="scoreIcon" alt="trophy-solid-yellow"/>


                <br>

                <div class="scoreName" id="red">
                    <?php echo _VISUALREFLEX;?>
                </div>
                <div class="scoreName" id="purple">
                    <?php echo _SOUNDREFLEX;?>
                </div>
                <div class="scoreName" id="yellow">
                    <?php echo _HEARINGTEST;?>
                </div>

                <br><br>

                <div class="scoreName" id="red">
                    <?php echo _SCORE;?>
                    <?php $averageList = getAllAverage((int)$userId[0][0])->fetchAll();?>
                    <div class="bigNumber">
                        <?php echo round($averageList[0][0])?>
                    </div>
                </div>

                <div class="scoreName" id="purple">
                    <?php echo _SCORE;?>
                    <?php $averageList = getAllAverage((int)$userId[0][0])->fetchAll();?>
                    <div class="bigNumber">
                        <?php echo round($averageList[0][1])?>
                    </div>
                </div>

                <div class="scoreName" id="yellow">
                    <?php echo _SCORE;?>
                    <?php $averageList = getAllAverage((int)$userId[0][0])->fetchAll();?>
                    <div class="bigNumber">
                        <?php echo round($averageList[0][2])?>
                    </div>
                </div>

                <br><br>

                <div class="scoreName" id="red">
                    <?php echo _AVERAGE;
                    $organismId=getOrganismIdUser($_SESSION["userId"])->fetchAll();
                    $users = getUserInOrganism((int)$organismId[0][0])->fetchAll();

                    $averageList=array();
                    foreach ($users as $user) {
                        $userAverage=getAllAverage((int)$user[0])->fetchAll();
                        array_push($averageList,(int)$userAverage[0][0]);
                    }?>

                    <div class="bigNumber">
                        <?php echo round(avg($averageList))?>
                    </div>
                </div>
                <div class="scoreName" id="purple">
                    <?php echo _AVERAGE;
                    $organismId=getOrganismIdUser($_SESSION["userId"])->fetchAll();
                    $users = getUserInOrganism((int)$organismId[0][0])->fetchAll();

                    $averageList=array();
                    foreach ($users as $user) {
                    $userAverage=getAllAverage((int)$user[0])->fetchAll();
                    array_push($averageList,(int)$userAverage[0][1]);
                    }?>

                    <div class="bigNumber">
                        <?php echo round(avg($averageList))?>
                    </div>
                </div>
                <div class="scoreName" id="yellow">
                    <?php echo _AVERAGE;
                    $organismId=getOrganismIdUser($_SESSION["userId"])->fetchAll();
                    $users = getUserInOrganism((int)$organismId[0][0])->fetchAll();

                    $averageList=array();
                    foreach ($users as $user) {
                    $userAverage=getAllAverage((int)$user[0])->fetchAll();
                    array_push($averageList,(int)$userAverage[0][2]);
                    }?>

                    <div class="bigNumber">
                        <?php echo round(avg($averageList))?>
                    </div>
                </div>



            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

                <p><?php echo _SCORECOMMENTORGANISM;?></p>

                <?php $userId = getUserId($_SESSION["userId"])->fetchAll();?>
                <?php $organismId = getOrganismId($_SESSION["userId"])->fetchAll();?>


                <br>
                <img src="pictures/trophy-solid-red.png" class="scoreIcon" alt="trophy-solid-red"/>
                <img src="pictures/trophy-solid-purple.png" class="scoreIcon" alt="trophy-solid-purple"/>
                <img src="pictures/trophy-solid-yellow.png" class="scoreIcon" alt="trophy-solid-yellow"/>


                <br>

                <div class="scoreName" id="red">
                    <?php echo _VISUALREFLEX;?>
                </div>
                <div class="scoreName" id="purple">
                    <?php echo _SOUNDREFLEX;?>
                </div>
                <div class="scoreName" id="yellow">
                    <?php echo _HEARINGTEST;?>
                </div>

                <br><br>

                <div class="scoreName" id="red">
                    <?php echo _SCORE;?>
                    <?php $users = getUserInOrganism((int)$organismId[0][0])->fetchAll();

                    $averageList=array();
                    foreach ($users as $user) {
                        $userAverage=getAllAverage((int)$user[0])->fetchAll();
                        array_push($averageList,(int)$userAverage[0][0]);
                    }?>

                    <div class="bigNumber">
                        <?php echo round(avg($averageList))?>
                    </div>
                </div>

                <div class="scoreName" id="purple">
                    <?php echo _SCORE;?>
                    <?php $users = getUserInOrganism((int)$organismId[0][0])->fetchAll();

                    $averageList=array();
                    foreach ($users as $user) {
                        $userAverage=getAllAverage((int)$user[0])->fetchAll();
                        array_push($averageList,(int)$userAverage[0][1]);
                    }?>

                    <div class="bigNumber">
                        <?php echo round(avg($averageList))?>
                    </div>
                </div>

                <div class="scoreName" id="yellow">
                    <?php echo _SCORE;?>
                    <?php $users = getUserInOrganism((int)$organismId[0][0])->fetchAll();

                    $averageList=array();
                    foreach ($users as $user) {
                        $userAverage=getAllAverage((int)$user[0])->fetchAll();
                        array_push($averageList,(int)$userAverage[0][2]);
                    }?>

                    <div class="bigNumber">
                        <?php echo round(avg($averageList))?>
                    </div>
                </div>

                <br><br>

                <div class="scoreName" id="red">
                    <?php echo _AVERAGE;?>
                    <?php $averageList = getGlobalAverage()->fetchAll();?>
                    <div class="bigNumber">
                        <?php echo round($averageList[0][0])?>
                    </div>
                </div>
                <div class="scoreName" id="purple">
                    <?php echo _AVERAGE;?>
                    <?php $averageList = getGlobalAverage()->fetchAll();?>
                    <div class="bigNumber">
                        <?php echo round($averageList[0][1])?>
                    </div>
                </div>
                <div class="scoreName" id="yellow">
                    <?php echo _AVERAGE;?>
                    <?php $averageList = getGlobalAverage()->fetchAll();?>
                    <div class="bigNumber">
                        <?php echo round($averageList[0][2])?>
                    </div>
                </div>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>

    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>




