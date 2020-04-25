<body>
<?php
if(isset($_SESSION["userTypeAccess"])){?>
    <a href="index.php?page=home"><h1>Infinite Measures</h1></a>
    <a href="index.php?page=dashboard"><h3><?php echo _DASHBOARD;?></h3></a>
    <a href="index.php?page=calendar"><h3><?php echo _CALENDAR;?></h3></a>

    <?php if($_SESSION["userTypeAccess"] == "user"){?>
        <a href="index.php?page=testResult"><h3><?php echo _TESTRESULT;?></h3></a>
        <a href="index.php?page=score"><h3><?php echo _SCORE;?></h3></a>
    <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
        <a href="index.php?page=userList"><h3><?php echo _USERLIST;?></h3></a>
        <a href="index.php?page=performTest"><h3><?php echo _PERFORMTEST;?></h3></a>
        <a href="index.php?page=testResult"><h3><?php echo _TESTRESULT;?></h3></a>
        <a href="index.php?page=score"><h3><?php echo _SCORE;?></h3></a>
    <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>
        <a href="index.php?page=modifyResult"><h3><?php echo _MODIFYRESULT;?></h3></a>
        <a href="index.php?page=manageAccessRight"><h3><?php echo _MANAGEACCESSRIGHT;?></h3></a>
    <?php }?>

    <a href="index.php?page=FAQ"><h3><?php echo _FAQ;?></h3></a>
    <a href="index.php?page=tickets"><h3><?php echo _TICKETS;?></h3></a>
    <a href="index.php?page=logout"><h3><?php echo _LOGOUT;?></h3></a>

<?php }else{ ?>

<?php } ?>
</body>
