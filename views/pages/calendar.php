<!DOCTYPE html>
<?php include "views/templates/headerSession.php"; ?>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="design/JavaScript/calendar.js" />
    <link rel="stylesheet" href="design/css/calendar.css" />
</head>

<body>
<?php include "views/templates/lefter.php"; ?>

<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h1><?php echo _CALENDAR;?></h1>

    <?php if($_SESSION["userTypeAccess"] == "user"){

        ?>

    <div id="calendar" class="calendar"></div>
    <script src="design/JavaScript/calendar.js"></script>

    <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

    <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

    <?php }?>

<?php }else{ ?>

<?php } ?>

</body>

</html>

<?php include 'views/templates/footer.php'?>


