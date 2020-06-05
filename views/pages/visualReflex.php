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
            <h2 class="subpage"><?php echo _VISUALREFLEX;?></h2>

            <?php if($_SESSION["userTypeAccess"] == "user"){?>
                <table class="result" id="visualReflexTable">
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
                                <td><?php echo $result["averageVisualStimulus"];?></td>
                                <td><?php echo $result["averageVisualTemperature"];?></td>
                                <td><?php echo $result["averageVisualHeartBeat"];?></td>
                            </tr>
                    <?php }?>

                </table>

        <br>
        <br>

        <?php
        $visualReflex = getResultsAsc($userId[0][0])->fetchAll();
        $date = array();
        $value = array();

        foreach ($visualReflex as $visual) {

            array_push($date, $visual["testDate"]);
            array_push($value, $visual["averageVisualStimulus"]);
        }

        $dateJSON = json_encode($date);
        $valueJSON = json_encode($value);
        ?>

            <div style="width: 85%">
                <canvas id="visualGraph"></canvas>
            </div>

                <script>
                    var contexte = document.getElementById('visualGraph').getContext('2d');

                    var data = {
                        labels: <?php echo $dateJSON ?>,
                        datasets: [
                            {
                                borderColor: "#D80909",
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
                <table class="result" id="visualReflexTable">
                    <tr>
                        <th><?php echo _FIRSTNAME;?></th>
                        <th><?php echo _LASTNAME;?></th>
                        <th><?php echo _DATE;?></th>
                        <th><?php echo _AVERAGEVISUALSTIMULUS;?></th>
                        <th><?php echo _TEMPERATURE;?></th>
                        <th><?php echo _HEARTBEAT;?></th>

                    </tr>

                    <?php $id = getOrganismId($_SESSION["userId"])->fetchAll();
                    if(empty($id) == false){ ?>
                        <?php $listId = getUserInOrganism((int) $id[0][0]);
                        $resultArray=array();
                        foreach ($listId as $list){

                            $results = getResults((int) $list [0])->fetchAll();
                            foreach ($results as $result){

                                array_push($resultArray,$result);
                            } }

                        function cmp($a, $b){
                            return $a["testDate"] < $b["testDate"];
                        }

                        usort($resultArray, "cmp");

                        $i=0;
                        while ($i < sizeof($resultArray)){
                            $personId =  getPersonId($resultArray[$i][1])->fetchAll();
                            $info = getInfos((int) $personId[0][0])->fetchAll();
                            $info = $info[0]; ?>

                                <tr>
                                    <td><?php echo $info['firstName']?></td>
                                    <td><?php echo $info['lastName']?></td>
                                    <td><?php echo $resultArray[$i][2]?></td>
                                    <td><?php echo $resultArray[$i][6];?></td>
                                    <td><?php echo $resultArray[$i][9];?></td>
                                    <td><?php echo $resultArray[$i][10];?></td>
                                </tr>

                            <?php $i+=1;?>
                        <?php }?>

                    <?php }else{ echo _NOMEMBER; } ?>
                </table>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>

            <?php }?>

        <?php }?>
    </div>

</div> <!--fin du bloc main-->

</body>

</html>