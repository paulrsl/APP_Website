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

</html>