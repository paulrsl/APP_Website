<<<<<<< HEAD
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

=======
<!DOCTYPE html>
<html>
<?php include 'views/templates/headerUnsession.php'?>

<body>
<h2 class="subpage"><?php echo _GTU;?></h2>

<?php
    $text = getGTU($_SESSION["language"])->fetchAll();
    foreach ($text as $value){
        ?>
        <p> <?= $value["text"]; ?> </p>
    <?php } ?>
<h2>
    <a href="index.php?page=inscription"><?php echo _BACK;?></a>
</h2>
<br>

</body>

</html>

>>>>>>> master
<?php include 'views/templates/footer.php'?>