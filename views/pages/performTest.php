<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _PERFORMTEST;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "organism"){?>

                <form method="post" action="index.php?action=performTest" enctype="multipart/form-data">
                    <p>
                        <label><?php echo _USERID;?> :<br>
                            <input class="userInput" type='text' name="userID" placeholder="<?php echo _USERID;?>" required>
                        </label>
                    </p>

                    <input class="bigButton" type="submit" value="<?php echo _SUBMIT;?>" >
                </form>

            <?php }else{ include "views/templates/accessDeny.php"; ?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>



