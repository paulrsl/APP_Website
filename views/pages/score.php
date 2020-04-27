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
                <p><?php echo _SCORECOMMENTUSER;?></p>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
                <p><?php echo _SCORECOMMENTORGANISM;?></p>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
        <br>
        <img src="pictures/trophy-solid-red.png" class="scoreIcon" alt="trophy-solid-red"/>
        <img src="pictures/trophy-solid-green.png" class="scoreIcon" alt="trophy-solid-green"/>
        <img src="pictures/trophy-solid-purple.png" class="scoreIcon" alt="trophy-solid-purple"/>
        <img src="pictures/trophy-solid-yellow.png" class="scoreIcon" alt="trophy-solid-yellow"/>

        <br>

        <div class="scoreName" id="red">
            <?php echo _HEARTBEAT;?>
        </div>
        <div class="scoreName" id="green">
            <?php echo _VISUALREFLEX;?>
        </div>
        <div class="scoreName" id="purple">
            <?php echo _HEARINGTEST;?>
        </div>
        <div class="scoreName" id="yellow">
            <?php echo _SOUNDREFLEX;?>
        </div>

        <br><br>

        <div class="scoreName" id="red">
            <?php echo _SCORE;?>
        </div>
        <div class="scoreName" id="green">
            <?php echo _SCORE;?>
        </div>
        <div class="scoreName" id="purple">
            <?php echo _SCORE;?>
        </div>
        <div class="scoreName" id="yellow">
            <?php echo _SCORE;?>
        </div>

        <br><br>

        <div class="scoreName" id="red">
            <?php echo _AVERAGE;?>
        </div>
        <div class="scoreName" id="green">
            <?php echo _AVERAGE;?>
        </div>
        <div class="scoreName" id="purple">
            <?php echo _AVERAGE;?>
        </div>
        <div class="scoreName" id="yellow">
            <?php echo _AVERAGE;?>
        </div>



    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>




