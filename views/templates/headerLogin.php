<div id="main">
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
                    echo "<a href=" . htmlspecialchars("index.php?page=dashboard&language=EN") . ">EN</a>";
                    echo " / ";
                    echo "<a href=" . htmlspecialchars("index.php?page=dashboard&language=FR") . ">FR</a>";
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