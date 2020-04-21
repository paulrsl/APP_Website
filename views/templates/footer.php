<head>
    <link rel="stylesheet" href="design/css/footer.css" />
</head>

<body>
<footer>
    <div id="footer">
        <p><?php echo _COPYRIGHT?></p>
    </div>



    <?php
    if(isset($_SESSION["userTypeAccess"])){

        if($_SESSION["userTypeAccess"] == "user"){
            echo _USER;
        }elseif($_SESSION["userTypeAccess"] == "organism"){
            echo _ORGANISM;
        }elseif($_SESSION["userTypeAccess"] == "admin"){
            echo _ADMIN;
        }

        }else{

    } ?>
</footer>
</body>