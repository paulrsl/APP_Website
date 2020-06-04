<!DOCTYPE html>
<html>

<head>
    <script src="package/dist/chart.js"></script>
</head>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _HEARINGTEST;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <table class="result" id="hearingTestTable">
                    <tr>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _VALUE;?></th>
                        <th><?php echo _TEMPERATURE;?></th>
                        <th><?php echo _HEARTBEAT;?></th>
                    </tr>

                    <?php $userId = getUserId($_SESSION["userId"])->fetchAll();
                    $results = getResults($userId[0][0])->fetchAll();

                    foreach ($results as $result) { ?>
                        <tr>
                            <td><?php echo $result["testDate"];?></td>
                            <td><?php echo $result["averageTone"];?></td>
                            <td><?php echo $result["averageToneTemperature"];?></td>
                            <td><?php echo $result["averageToneHeartBeat"];?></td>
                        </tr>
                    <?php }?>

                </table>

        <br>
        <br>

        <?php
        $hearingTest = getResultsAsc($userId[0][0])->fetchAll();
        $date = array();
        $value = array();

        foreach ($hearingTest as $hearing) {

            array_push($date, $hearing["testDate"]);
            array_push($value, $hearing["averageTone"]);
        }

        $dateJSON = json_encode($date);
        $valueJSON = json_encode($value);
        ?>

            <div style="width: 85%">
                <canvas id="hearingGraph"></canvas>
            </div>

            <script>
                var contexte = document.getElementById('hearingGraph').getContext('2d');

                var data = {
                    labels: <?php echo $dateJSON ?>,
                    datasets: [
                        {
                            borderColor: "#FFDF00",
                            data: <?php echo $valueJSON ?>
                        }
                    ]
                };
                var options = {
                    responsive: true,
                    title:{
                        display: true,
                        text: "<?php echo _VISUALREFLEXGRAPH?>",
                        fontSize: 17,
                        fontFamily: "Segoe UI",
                    },
                    elements:{
                        point:{
                            radius: 5,
                            backgroundColor: "black",
                        }
                    },
                    legend:{
                        display: false,
                    }
                };

                var configuration = {

                    type: 'line',
                    data: data,
                    options: options
                };
                var graphic = new Chart(contexte, configuration);
            </script>

            <?php }elseif($_SESSION["userTypeAccess"] == "organism"){?>
                <table class="result" id="hearingTestTable">
                    <tr>
                        <th><?php echo _FIRSTNAME;?></th>
                        <th><?php echo _LASTNAME;?></th>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _AVERAGETONE;?></th>
                    </tr>

                    <?php $id = getOrganismId($_SESSION["userId"])->fetchAll();
                    if(empty($id) == false){ ?>
                        <?php $listId = getUserInOrganism((int) $id[0][0]);?>


                        <?php foreach ($listId as $list){
                            $results = getResults((int) $list [0][0])->fetchAll();

                            foreach ($results as $result){
                                $personId =  getPersonId($result['userId'])->fetchAll();
                                $info = getInfos((int) $personId[0][0])->fetchAll();
                                $info = $info[0]; ?>

                                <tr>
                                    <td>
                                        <?php echo $info['firstName']?>
                                    </td>
                                    <td>
                                        <?php echo $info['lastName']?>
                                    </td>
                                    <td>
                                        <?php echo $result['testDate']?>
                                    </td>
                                    <td>
                                        <?php echo $result["averageTone"];?>
                                    </td>
                                    <td>
                                        <?php echo $result["averageToneTemperature"];?>
                                    </td>
                                    <td>
                                        <?php echo $result["averageToneHeartBeat"];?>
                                    </td>
                                </tr>

                            <?php } }?>

                    <?php }else{ echo _NOMEMBER; } ?>
                </table>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }else{ ?>

        <?php } ?>
    </div>
</div>

</div> <!--fin du bloc main-->

</body>

</html>



