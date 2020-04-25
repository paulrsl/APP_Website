<!DOCTYPE html>
<?php include "views/templates/headerSession.php"; ?>
<html>
<head>
    <link rel="stylesheet" href="design/css/testResults.css" />
</head>
<body>
<?php include "views/templates/lefter.php"; ?>

<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <h1><?php echo _TESTRESULTS;?></h1>

    <?php if($_SESSION["userTypeAccess"] == "user") {
    ?>

    <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

    <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

    <?php }?>

<?php }else{ ?>

<?php } ?>

</body>

</html>

<?php include 'views/templates/footer.php'?>


