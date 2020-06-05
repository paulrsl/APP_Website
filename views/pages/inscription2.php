<!DOCTYPE html>
<html>

<body>
<?php include 'views/templates/headerLogout.php'?>

<div class="page">
<?php if(isset($_SESSION["inscriptionTypeAccess"])){
    if($_SESSION["inscriptionTypeAccess"] == "user"){?>
        <h2 class="subpage"> <?php echo _USER;?><?php echo _INSCRIPTION;?> </h2>
        <form method="post" action="index.php?action=addPerson" enctype="multipart/form-data">

            <p>
                <a><?php echo _SEX;?> ?</a>
                <select class="userInput" type = 'text' name="sex">
                    <option value="man"><?php echo _MAN;?></option>
                    <option value="women"><?php echo _WOMEN;?></option>
                    <option value="other"><?php echo _OTHER;?></option>
                </select>
            </p>

            <p>
                <label><?php echo _BIRTHDATE;?> :<br>
                    <input class="userInput" type='date' name="birthdate" required>
                </label>
            </p>

            <p>
                <label><?php echo _COMMENT;?>
                    <br>
                    <textarea name="comment" rows="5" cols="50"></textarea>
                </label>
            </p>
            <br>

            <p>
                <a><?php echo _PRACTICESPORT;?></a>
                <?php $sports = getAll("infossport")->fetchAll();
                foreach ($sports as $sport){ ?>
                    <span class="space"></span>
                    <label class="checkboxContainer">
                        <input type="checkbox" name="handicaps[]" value=".<?php echo $sport["id"] ?>.">
                        <span class="checkmark"></span>
                    </label>
                    <?php
                    if($_SESSION["language"] == "FR"){
                        echo $sport["sportFR"];
                    }else{
                        echo $sport["sportEN"];
                    }
                } ?>
            </p>
            <br>
            <p>
                <a><?php echo _JOBS;?></a>

                <?php
                $jobs = getAll("infosjob")->fetchAll();
                foreach ($jobs as $job) { ?>
                    <span class="space"></span>
                    <label class="checkboxContainer">
                        <input type="checkbox" name="handicaps[]" value=".<?php echo $job["id"] ?>.">
                        <span class="checkmark"></span>
                    </label>
                    <?php
                    if($_SESSION["language"] == "FR"){
                        echo $job["jobFR"];
                    } else {
                        echo $job["jobEN"];
                    }
                }?>
            </p>
            <br>
            <p>
            <a><?php echo _HANDICAPS;?></a>
                <?php $handicaps = getAll("infoshandicap")->fetchAll();
                foreach ($handicaps as $handicap){ ?>
                    <span class="space"></span>
                    <label class="checkboxContainer">
                        <input type="checkbox" name="handicaps[]" value=".<?php echo $handicap["id"] ?>.">
                        <span class="checkmark"></span>
                    </label>
                    <?php
                    if($_SESSION["language"] == "FR"){
                        echo $handicap["handicapFR"];
                    }else{
                        echo $handicap["handicapEN"];
                    }
                } ?>

            </p>
            <br>
            <br>
            <input class="userInput blueButton" type="submit" value="<?php echo _SUBMIT;?>" >
        </form>

    <?php }elseif($_SESSION["inscriptionTypeAccess"] == "organismNoConfirmed"){ ?>
        <h2 class="subpage"><?php echo _ORGANISM;?><?php echo _INSCRIPTION;?></h2>
        <form method="post" action="index.php?action=addPerson" enctype="multipart/form-data">

            <p>
                <label><?php echo _ORGANISMNAME;?> :<br>
                    <input class="userInput" type='text' name="organismName" placeholder="<?php echo _ORGANISMNAME;?>" required>
                </label>
            </p>

            <p>
                <label><?php echo _ORGANISMMAIL;?> :<br>
                    <input class="userInput" type='text' name="contactMail" placeholder="<?php echo _ORGANISMMAIL;?>" required>
                </label>
            </p>

            <p>
                <label><?php echo _ADDRESS;?> :<br>
                    <input class="userInput" type='text' name="address" placeholder="<?php echo _ADDRESS;?>" required>
                </label>
            </p>

            <p>
                <label><?php echo _COUNTRY;?> :<br>
                    <input class="userInput" type='text' name="country" placeholder="<?php echo _COUNTRY;?>" required>
                </label>
            </p>

            <p>
                <label><?php echo _CITY;?> :<br>
                    <input class="userInput" type='text' name="city" placeholder="<?php echo _CITY;?>" required>
                </label>
            </p>

            <p>
                <label><?php echo _POSTALCODE;?> :<br>
                    <input class="userInput" type='text' name="postalCode" placeholder="<?php echo _POSTALCODE;?>" required>
                </label>
            </p>

            <p>
                <label><?php echo _PHONE;?> :<br>
                    <input class="userInput" type='text' name="phone" placeholder="<?php echo _PHONE;?>" required>
                </label>
            </p>

            <p>
                <a><?php echo _ORGANISMTYPE;?> ?</a>
                <select class="userInput" type ='text' name="organismType">
                    <option value="drivingSchool"><?php echo _DRIVINGSCHOOL;?></option>
                    <option value="army"><?php echo _ARMY;?></option>
                    <option value="NGO"><?php echo _NGO;?></option>
                    <option value="other"><?php echo _OTHER;?></option>
                </select>
            </p>
            <br>
            <br>
            <input class="userInput blueButton" type="submit" value="<?php echo _SUBMIT;?>" >
        </form>

    <?php }elseif($_SESSION["inscriptionTypeAccess"] == "adminNoConfirmed"){ ?>
        <h2 class="subpage"><?php echo _ADMIN;?><?php echo _INSCRIPTION;?></h2>
        <form method="post" action="index.php?action=addPerson" enctype="multipart/form-data">
            <br>
            <input class="userInput blueButton" type="submit" value="<?php echo _SUBMIT;?>" >
        </form>
    <?php }else{
    } ?>


    <?php }else{ ?>
        <?php include 'views/templates/accessDeny.php'?>
    <?php } ?>
    <h2>
        <a href="index.php?page=connection"><?php echo _BACK;?></a>
    </h2>
</div>

<?php include 'views/templates/footer.php'?>
</body>

</html>

