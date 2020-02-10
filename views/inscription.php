<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8"/>
    <title>BIG-MAP Inscription</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/Logo BIG-MAP.png"/>
    <link rel="stylesheet" href="/APP_Website/design/css/inscriptionCSS.css" />
    <link rel="stylesheet" href="/APP_Website/design/JavaScript/inscriptionJS.js" />
</head>

<body>
<h1>Inscription</h1>

        <form method="post" action="index.php?page=add_user" enctype="multipart/form-data">

        <p>
            <label>Name :<br>
                <input type='text' name="name" placeholder="Name" required>
            </label>
        </p>

        <p>
            <label>Surname :<br>
                <input type='text' name="surname" placeholder="Surname" required>
            </label>
        </p>

        <p>
            <label>Mail :<br>
                <input type='email' name="mail" placeholder="Mail" required>
            </label>
        </p>

        <p>
            <label>Birthdate :<br>
                <input type='date' name="birthdate" required>
            </label>
        </p>

        <p>
            <label>Profil picture : <br>
                <input type="file" name="picture">
            </label>
        </p>

        <p>
            <label>Password :
                <p id="password"></p>
                <input id="firstPassword" type="password" placeholder="Password" onkeyup="PasswordSize()" required>
                <input id="secondPassword" name="password" type="password" placeholder="Password confirmation" onkeyup="PasswordSize()" required>
            </label>
        </p>

        <p>
            <label><a id="gtuT"> Accept GTU </a>
                <input type="checkbox" onclick="GTU()" required>
            </label>
        </p>

        <input disabled=true id="add" type="submit" value="Add" ></br></br>

    </form>

    <a href="index.php?page=connection">Back</a>

    <script src="/APP_Website/design/JavaScript/inscriptionJS.js"></script>


</body>

</html>