<!DOCTYPE html>
<?php include "views/templates/headerSession.php"; ?>
<html>

<body>
<?php include "views/templates/lefter.php"; ?>

<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h1><?php echo _HOME;?></h1>

    <p id="user">
    <?php if($_SESSION["userTypeAccess"] == "user"){


    ?>
        <a href="index.php?page=testResult">TestResult</a></br>
        <a href="index.php?page=calendar">Calendar</a></br>

        </p>
    <p id="organism">
    <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?></p>

    <p id="admin">
    <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?></p>

    <?php }?>

<?php }else{ ?>

<?php } ?>

</body>

</html>

<?php include 'views/templates/footer.php'?>