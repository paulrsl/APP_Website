<<<<<<< HEAD
<!DOCTYPE html>
<html>

<head>
    <title>BIG-MAP</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/BigMap_Logo.png"/>
</head>

<body>

<header>
    <div id="header">
        <?php echo _LANGUAGE;?>
        <div id="EN-FR">
            <?php
            if(isset($_GET["page"])){
                echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=EN") . ">EN</a>";
                echo " / ";
                echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=FR") . ">FR</a>";
            } else {
                echo "<a href=" . htmlspecialchars("index.php?page=home&language=EN") . ">EN</a>";
                echo " / ";
                echo "<a href=" . htmlspecialchars("index.php?page=home&language=FR") . ">FR</a>";
            }
            ?>
        </div>

        <?php if(isset($_SESSION["userTypeAccess"])){
        if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism") || ($_SESSION["userTypeAccess"] == "admin")){?>
            <a id="profilText" href="index.php?page=myProfil">
                <?php echo _MYPROFIL;?>
            </a>
            <a href="index.php?page=myProfil">
                <i id="profilIcon" class="fas fa-user-circle"></i>
            </a>

            <?php }else{
                include 'views/templates/accessDeny.php';
            }
        }else{
            include 'views/templates/accessDeny.php';
        } ?>
    </div>
</header>
</body>

=======
<!DOCTYPE html>
<html>

<head>
    <title>BIG-MAP</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/BigMap_Logo.png"/>
    <link rel="stylesheet" href="design/css/headerSession.css" />
    <link rel="stylesheet" href="design/css/generalSession.css" />
</head>

<body>

<header>
    <div id="header">

        <h1 id="EN-FR">
        <?php
        if(isset($_GET["page"])){
            echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=EN") . ">EN</a>";
            echo " / ";
            echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=FR") . ">FR</a>";
        } else {
            echo "<a href=" . htmlspecialchars("index.php?page=home&language=EN") . ">EN</a>";
            echo " / ";
            echo "<a href=" . htmlspecialchars("index.php?page=home&language=FR") . ">FR</a>";
        }
        ?>
        </h1>

        <?php if(isset($_SESSION["userTypeAccess"])){
        if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism") || ($_SESSION["userTypeAccess"] == "admin")){?>
            <a id="profilText" href="index.php?page=myProfil"><?php echo _MYPROFIL;?></a>
            <img id="profilPicture" src="pictures/profilPicture/<?= $_SESSION["userPicture"]; ?>"/></image1>
            <?php }else{
                include 'views/templates/accessDeny.php';
            }
        }else{
            include 'views/templates/accessDeny.php';
        } ?>
    </div>
</header>
</body>

>>>>>>> eade9b217a854d1552c52ae7f2abfca102448b99
</html>