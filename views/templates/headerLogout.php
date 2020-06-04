<head>
    <meta charset="utf-8" />
    <title>BIG-MAP</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/BigMap_Logo.png"/>
    <link rel="stylesheet" type="text/css" href="design/css/globalLogout.css" />
    <link rel="stylesheet" href="design/JavaScript/inscription.js" />
</head>

<header>
    <div id="header">
        <?php
        if(isset($_SESSION["language"])){
            switch($_SESSION["language"]) {
                case "FR" :
                    include("language/fr.inc"); ?>
                    <style>
                        .EN{
                            text-decoration: none;
                        }
                        .FR{
                            text-decoration: underline;
                        }
                    </style>
                    <?php break;
                case "EN" :
                    include("language/en.inc"); ?>
                    <style>
                        .EN{
                            text-decoration: underline;
                        }
                        .FR{
                            text-decoration: none;
                        }
                    </style>
                    <?php break;
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
        echo "<a class='EN' href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=EN") . ">EN</a>";
        echo " / ";
        echo "<a class='FR' href=" . htmlspecialchars("index.php?page=" . $_GET["page"] . "&language=FR") . ">FR</a>";
    } else {
        echo "<a class='EN' href=" . htmlspecialchars("index.php?page=connection&language=EN") . ">EN</a>";
        echo " / ";
        echo "<a class='FR' =" . htmlspecialchars("index.php?page=connection&language=FR") . ">FR</a>";
    }
    ?>
</div>