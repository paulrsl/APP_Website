<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8"/>
    <title>BIG-MAP Home</title>
    <link rel="icon" type="image/png" href="/APP_Website/pictures/Logo BIG-MAP.png"/>
    <link rel="stylesheet" href="/APP_Website/design/css/homeCSS.css "/>
    <link rel="stylesheet" href="/APP_Website/design/JavaScript/homeJS.js "/>
</head>

<body>
    <h1>Test</h1>

    <ul>
        <?php foreach ($users as $user) { ?>
            <li></br> <a>Nom : </a> <?= $user["surname"]; ?> </br> <a>Prénom : </a> <?= $user["name"]; ?> </br></li>
            </br>
        <?php } ?>
    </ul>

    <a href="index.php?page=connection">Go to connection</a>

    <script src="/APP_Website/design/JavaScript/homeJS.js"></script>
</body>

</html>