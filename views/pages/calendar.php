<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<script type="text/javascript" src="design/JavaScript/calendar.js"></script>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _CALENDAR;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>

        <script type="text/javascript">
            calendrier();
        </script>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>

            <script type="text/javascript">
                calendrier();
            </script>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>

<?php function calendar(){
    $day = date('j');
    $monthDate = date('m');
    $year = date('Y');

    if ($year <= 200){
        $year += 1900;
    }

    $totalMonth = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $monthDay = array("31","28","31","30","31","30","31","31","30","31","30","31");
    $total = $monthDay[$monthDate];
    $todayDate = $day. ' ' .$totalMonth[$monthDate]. ' ' .$year;
    $week = 0;

    echo "<table class='calendar'><tbody id='calendarBody'><tr><th colspan='7'>" .$todayDate. "</th></tr>";
    echo "<tr class='weekCalendar'><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr><tr>";

    if ($year % 4 == 0 && $year != 1900){
        $monthDay["1"] = 29;
    }

    $date = date('N');

    if ($date == 7){
        $date = 0;
    }

    for ($i = 0; $i < $date; $i++){
        if($week == 0) {
            echo "<tr>";
        }

        echo "<td></td>";
        $week++;

        if ($week == 7){
            echo '</tr>';
            $week = 0;
        }
    }

    for ($i = 1; $i < $total; $i++){
        if ($week == 0){
            echo "<tr>";
        }
        if ($week == $i){
            echo '<td class="todayCalendar" onclick="location.href=\'calendar.php?t=true&d=' .$i. '&m=' .$totalMonth[$monthDate]. '&a=' .$year. '#cal\'">' .$i. '</td>';
        }else {
            echo '<td onclick="location.href=\'calendar.php?t=true&d=' .$i.  '&m=' .$totalMonth[$monthDate]. '&a=' .$year. '#cal\'">' .$i. '</td>';
        }

        $week++;

        if ($week == 7){
            echo '</tr>';
        }
    }

    if ($week != 7){
        for ($i = 1; $i < (7 - $week); $i++){
            echo '<td></td>';
        }
    }

    echo "</tbody></table>";
    return true;
}?>

