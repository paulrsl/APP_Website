<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8"/>
    <title>BIG-MAP Connection</title>
	<link rel="icon" type="image/png" href="/APP_Website/pictures/Logo BIG-MAP.png"/>
    <link rel="stylesheet" href="/APP_Website/design/css/connectionCSS.css "/>
    <link rel="stylesheet" href="/APP_Website/design/JavaScript/connectionJS.js "/>
</head>

<body>

    <h1>Welcome to the BIG-MAP website</h1>

    <form method="post" action="../index.php?page=home">
        <h2>Connection :</h2>
        <p>
            <label>Mail :<br>
                <input type='text' name="mail" placeholder="Mail" required>
            </label>
        </p>

        <p>
            <label>Password :<br>
                <input type='password' name="password" placeholder="Password" required>
            </label>
        </p>

        <input type="submit" value="Connection"></br>

    </form>

    <p><a href="index.php?page=forgotPassword">Forgot password ?</a></p>

    <a href="index.php?page=inscription">Inscription</a></br>

    <script src="/APP_Website/design/JavaScript/connectionJS.js"></script>

</body>

</html>