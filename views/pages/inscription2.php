<!DOCTYPE html>
<html>
<?php include 'views/templates/headerUnsession.php'?>

<head>
</head>

<body>
    <?php if(isset($_SESSION["inscriptionTypeAccess"])){
        if($_SESSION["inscriptionTypeAccess"] == "user"){?>
            <h2 class="subpage"> <?php echo _USER;?><?php echo _INSCRIPTION;?> </h2>
            <form method="post" action="index.php?action=addPerson" enctype="multipart/form-data">

                <p>
                    <a><?php echo _SEX;?> ?</a>
                    <select class="typeAccess" type = 'text' name="sex">
                        <option value="man"><?php echo _MAN;?></option>
                        <option value="women"><?php echo _WOMEN;?></option>
                        <option value="other"><?php echo _OTHER;?></option>
                    </select>
                </p>

                <p>
                    <label><?php echo _BIRTHDATE;?> :<br>
                        <input type='date' name="birthdate" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _COMMENT;?>
                        <br>
                        <textarea name="comment" rows="5" cols="50">
                        </textarea>
                    </label>
                </p>

                <p>
                    <label>
                        <a><?php echo _PRACTICESPORT;?></a>
                        <?php $sports = getAll("infossport")->fetchAll();
                        foreach ($sports as $sport){ ?>
                            <input type="checkbox" name="sports[]" value="<?php echo $sport["id"] ?>.">
                            <?php
                            if($_SESSION["language"] == "FR"){
                                echo $sport["sportFR"];
                            }else{
                                echo $sport["sportEN"];
                            }
                        } ?>
                    </label>
                </p>

                <p>
                    <a><?php echo _JOBS;?></a>

                    <?php
                    $jobs = getAll("infosjob")->fetchAll();
                    foreach ($jobs as $job) { ?>
                        <label>
                            <?php
                            if($_SESSION["language"] == "FR"){
                                echo $job["jobFR"];
                            } else {
                                echo $job["jobEN"];
                            } ?>
                        </label>
                        <input type="checkbox" name="jobs[]" value=".<?php echo $job["id"] ?>.">
                    <?php } ?>
                </p>

                <p>
                    <label>
                        <a><?php echo _HANDICAPS;?></a>
                        <?php $handicaps = getAll("infoshandicap")->fetchAll();
                        foreach ($handicaps as $handicap){ ?>
                            <input type="checkbox" name="handicaps[]" value=".<?php echo $handicap["id"] ?>."><?php
                            if($_SESSION["language"] == "FR"){
                                echo $handicap["handicapFR"];
                            }else{
                                echo $handicap["handicapEN"];
                            }
                        } ?>
                    </label>
                </p>
                <br>
                <input class="blueButton" type="submit" value="<?php echo _SUBMIT;?>" >

            </form>
        <?php }elseif($_SESSION["inscriptionTypeAccess"] == "organism"){ ?>
            <h2 class="subpage"><?php echo _ORGANISM;?><?php echo _INSCRIPTION;?></h2>
            <form method="post" action="index.php?action=addPerson" enctype="multipart/form-data">

                <p>
                    <label><?php echo _ORGANISMNAME;?> :<br>
                        <input type='text' name="organismName" placeholder="<?php echo _ORGANISMNAME;?>" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _ORGANISMMAIL;?> :<br>
                        <input type='text' name="contactMail" placeholder="<?php echo _ORGANISMMAIL;?>" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _ADDRESS;?> :<br>
                        <input type='text' name="address" placeholder="<?php echo _ADDRESS;?>" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _COUNTRY;?> :<br>
                        <input type='text' name="country" placeholder="<?php echo _COUNTRY;?>" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _CITY;?> :<br>
                        <input type='text' name="city" placeholder="<?php echo _CITY;?>" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _POSTALCODE;?> :<br>
                        <input type='text' name="postalCode" placeholder="<?php echo _POSTALCODE;?>" required>
                    </label>
                </p>

                <p>
                    <label><?php echo _PHONE;?> :<br>
                        <input type='text' name="phone" placeholder="<?php echo _PHONE;?>" required>
                    </label>
                </p>

                <p>
                    <a><?php echo _ORGANISMTYPE;?> ?</a>
                    <select class="typeAccess" type ='text' name="organismType">
                        <option value="drivingSchool"><?php echo _DRIVINGSCHOOL;?></option>
                        <option value="army"><?php echo _ARMY;?></option>
                        <option value="NGO"><?php echo _NGO;?></option>
                        <option value="other"><?php echo _OTHER;?></option>
                    </select>
                </p>

                <br>
                <input class="blueButton" type="submit" value="<?php echo _SUBMIT;?>" >

            </form>

        <?php }elseif($_SESSION["inscriptionTypeAccess"] == "admin"){ ?>
            <h2 class="subpage"><?php echo _ADMIN;?><?php echo _INSCRIPTION;?></h2>
            <form method="post" action="index.php?action=addPerson" enctype="multipart/form-data">

                <input class="blueButton" type="submit" value="<?php echo _SUBMIT;?>" >

            </form>
        <?php }else{ ?>

        <?php } ?>


    <?php }else{ ?>
        <?php include 'views/templates/accessDeny.php'?>
    <?php } ?>
    <h2>
        <a href="index.php?page=connection"><?php echo _BACK;?></a>
    </h2>

</body>

</html>

<?php include 'views/templates/footer.php'?>