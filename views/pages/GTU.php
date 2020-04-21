<?php include 'views/templates/headerUnsession.php'?>

<!DOCTYPE html>

<html>

<body>
<h1><?php echo _GTU;?></h1>

<?php
    $text = getGTU($_SESSION["language"])->fetchAll();
    foreach ($text as $value){
        ?>
        <p> <?= $value["text"]; ?> </p>
    <?php } ?>

<a href="index.php?page=inscription"><?php echo _BACK;?></a>

</body>

</html>

<?php include 'views/templates/footer.php'?>