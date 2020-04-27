<!DOCTYPE html>
<html>

<body>
<?php include 'views/templates/headerLogout.php'?>

<form method="post" action="index.php?page=inscription2&action=save" enctype="multipart/form-data">
    <p>
        <label><?php echo _FIRSTNAME;?> :<br>
            <input class="userInput" type='text' name="firstname" placeholder="<?php echo _FIRSTNAME;?>" required>
        </label>
    </p>

    <p>
        <label><?php echo _LASTNAME;?> :<br>
            <input class="userInput" type='text' name="lastname" placeholder="<?php echo _LASTNAME;?>" required>
        </label>
    </p>

    <p>
        <label><?php echo _MAIL;?> :<br>
            <input class="userInput" type='email' name="mail" placeholder="<?php echo _MAIL;?>" required>
        </label>
    </p>

    <p>
        <label><?php echo _REGISTERON;?> ?</label>
        <br>
        <select class="userInput" type = 'text' name="typeAccess">
            <option value="user" id="user"><?php echo _USER;?></option>
            <option value="organism" id="organism"><?php echo _ORGANISM;?></option>
            <option value="admin" id="admin"><?php echo _ADMIN;?></option>
        </select>
    </p>

    <p>
        <label><?php echo _PASSWORD;?> :
    <p id="password"></p>
    <input class="userInput" id="firstPassword" type="password" placeholder="<?php echo _PASSWORD;?>" onkeyup="PasswordSize()" required>
    <br>
    <input class="userInput" id="secondPassword" name="password" type="password" placeholder="<?php echo _PASSWORDCONFIRMATION;?>" onkeyup="PasswordSize()" required>
    </label>
    </p>
    <br>

    <p >
        <label class="checkboxContainer"><a href="index.php?page=GTU"> <?php echo _ACCEPTGTU;?> </a>
            <input type="checkbox" required>
            <span class="checkmark"></span>
        </label>
    </p>

    <br>
    <input class="userInput blueButton" type="submit" value="<?php echo _SUBMIT;?>" ></br></br>

</form>
    <h2>
        <a href="index.php?page=connection"><?php echo _BACK;?></a>
    </h2>

<script src="design/JavaScript/inscription.js"></script>

<?php include 'views/templates/footer.php'?>
</body>

</html>