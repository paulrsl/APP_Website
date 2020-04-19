<head>
    <title>BIG-MAP</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/BigMap_Logo.png"/>
</head>

<header>
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

    <?php
    if(isset($_GET["page"])){
        echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=EN") . ">EN</a>";
        echo "<a>/</a>";
        echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=FR") . ">FR</a>";
    }else{
        echo "<a href=" . htmlspecialchars("index.php?page=connection&language=EN") . ">EN</a>";
        echo "<a>/</a>";
        echo "<a href=" . htmlspecialchars("index.php?page=connection&language=FR") . ">FR</a>";
    }

    if(isset($_SESSION["userTypeAccess"])){?>

        <?php if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism") || ($_SESSION["userTypeAccess"] == "admin")){?>
            <a href="index.php?page=myProfil"><?php echo _MYPROFIL;?></a>
            <img src="pictures/profilPicture/<?= $_SESSION["userPicture"]; ?>"/>
        <?php }else{
            include 'views/templates/accessDeny.php';
        }
    }else{
        include 'views/templates/accessDeny.php';
     } ?>
</header>