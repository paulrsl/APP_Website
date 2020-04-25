<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>BIG-MAP</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/BigMap_Logo.png"/>
    <link rel="stylesheet" href="design/css/globalUnsession.css" />
</head>

<body>
<header>
    <div id="header">
        <?php
            if(isset($_SESSION["language"])){
                switch($_SESSION["language"]) {
                    case "FR" :
                        include("language/fr.inc");
                        break;
                    case "EN" :
                        include("language/en.inc");
                        break;
                }
            }else{
                include("language/en.inc");
            }

        ?>
        <h1><?php echo _WELCOME;?></h1>
    </div>
</header>
<br>

<?php echo _LANGUAGE;?>
<div id ="EN-FR">
    <?php
    if(isset($_GET["page"])){
        echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=EN") . ">EN</a>";
        echo " / ";
        echo "<a href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=FR") . ">FR</a>";
    } else {
        echo "<a href=" . htmlspecialchars("index.php?page=connection&language=EN") . ">EN</a>";
        echo " / ";
        echo "<a href=" . htmlspecialchars("index.php?page=connection&language=FR") . ">FR</a>";
    }
    ?>
</div>

</body>

</html>