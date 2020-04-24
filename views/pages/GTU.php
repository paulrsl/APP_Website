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

<?php include 'views/templates/footer.php'?>