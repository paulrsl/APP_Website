<!DOCTYPE html>
<html>

<div id="main-nav">
    <head>
        <script src="https://kit.fontawesome.com/9621ee1f22.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="design/css/globalSession.css" />
    </head>

    <body>

    <?php

    if (isset($_SESSION["language"])) {
        switch ($_SESSION["language"]) {
            case "FR" :
                include("language/fr.inc");
                break;
            case "EN" :
                include("language/en.inc");
                break;
        }
    } else {
        include("language/en.inc");
    }
    ?>

    <a id="siteName" href="index.php?page=home"><h1>Infinite Measures</h1></a>
    <ul class="main-nav-list">
    <div class="main-nav1">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="nav-text"> <?php echo _DASHBOARD;?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=calendar">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="nav-text"><?php echo _CALENDAR;?></span>
                    </a>
                </li>
    </div>

    <div class="main-nav2">
        <?php if($_SESSION["userTypeAccess"] == "user"){?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=testResult">
                <i class="fas fa-heartbeat"></i>
                <span class="nav-text"> <?php echo _TESTRESULT;?></span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=score">
                <i class="fas fa-trophy"></i>
                <span class="nav-text"> <?php echo _SCORE;?></span>
            </a>
        </li>


        <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=userList">
                    <i class="fas fa-users"></i>
                    <span class="nav-text"> <?php echo _USERLIST;?></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?page=performTest">
                    <i class="fas fa-stopwatch"></i>
                    <span class="nav-text"> <?php echo _PERFORMTEST;?></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?page=testResult">
                    <i class="fas fa-heartbeat"></i>
                    <span class="nav-text"> <?php echo _TESTRESULT;?></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?page=score">
                    <i class="fas fa-trophy"></i>
                    <span class="nav-text"> <?php echo _SCORE;?></span>
                </a>
            </li>

        <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=modifyResult">
                    <i class="fas fa-heartbeat"></i>
                    <span class="nav-text"> <?php echo _MODIFYRESULT;?></span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?page=manageAccessRight">
                    <i class="fas fa-cog"></i>
                    <span class="nav-text"> <?php echo _MANAGEACCESSRIGHT;?></span>
                </a>
            </li>
        <?php }?>
    </div>

    <div class="main-nav3">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=FAQ">
                <i class="fas fa-question"></i>
                <span class="nav-text"> <?php echo _FAQ;?></span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=tickets">
                <i class="fas fa-ticket-alt"></i>
                <span class="nav-text"> <?php echo _TICKETS;?></span>
            </a>
        </li>

        <?php if($_SESSION["userTypeAccess"] != "admin"){?>
            <li class="nav-item">
                <a class="nav-link" >  <!--href="index.php?page=contactUs" -> 2ème page à coder -->
                    <i class="fas fa-paper-plane"></i>
                    <span class="nav-text"> <?php echo _CONTACTUS;?></span>
                </a>
            </li>
        <?php }?>

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=connection">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-text"> <?php echo _LOGOUT;?></span>
            </a>
        </li>
    </div>
    </ul>

    <?php }else{ ?>
    <?php } ?>

    <div id="userType">
        <?php
        if(isset($_SESSION["userTypeAccess"])){
            if($_SESSION["userTypeAccess"] == "user"){
                echo _USER;
            }elseif($_SESSION["userTypeAccess"] == "organism"){
                echo _ORGANISM;
            }elseif($_SESSION["userTypeAccess"] == "admin"){
                echo _ADMIN;
            }
        }else{
        } ?>
    </div>

    </body>
</div>

</html>
