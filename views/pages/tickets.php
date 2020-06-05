<!DOCTYPE html>
<html>

<body>
<?php include "views/templates/main-nav.php"; ?>
<?php include "views/templates/headerLogin.php"; ?>

<div class="page">
    <div class="container">
        <?php
        if(isset($_SESSION["userTypeAccess"])){?>
            <h2 class="subpage"><?php echo _TICKETS;?></h2>

            <?php if(($_SESSION["userTypeAccess"] == "user") || ($_SESSION["userTypeAccess"] == "organism")){?>
                <table id="userTable">
                <?php $tickets = getUserTickets($_SESSION["userId"])->fetchAll();
                if($tickets != null){
                    foreach ($tickets as $ticket){ ?>
                        <tr>
                            <td id="userQuestion">
                                <?= $ticket["question"];?>
                            </td>
                            <td class="date">
                                <?php echo _SENDON;
                                echo $ticket["questionDate"]; ?>
                            </td>
                        </tr>

                        <tr>
                            <td id="userAnswer">
                                <i class="fas fa-angle-double-right"></i>
                                <?= $ticket["answer"];?>
                            </td>
                            <td class="date">
                                <?php if($ticket["status"] != "new"){
                                    echo _RECEIVED;
                                    echo $ticket["answerDate"];
                                }else{echo _NOREPLY;} ?>
                            </td>
                        </tr>

                    <?php }
                }else{
                    echo _NOTICKET;
                } ?>
                </table>

                <form method="post" action="index.php?action=addTicket" enctype="multipart/form-data">

                    <p>
                        <label><?php echo _QUESTION;?><br>
                            <textarea name="question" rows="3" cols="60" required></textarea>
                        </label>
                    </p>

                    <input class="bigButton" type="submit" value="<?php echo _SEND;?>" >

                </form>

            <?php }elseif($_SESSION["userTypeAccess"] == "admin"){?>
            <table id="adminTable">
                    <?php
                    $tickets = getTicketsStatus("all")->fetchAll();
                    foreach ($tickets as $ticket){?>
                        <tr>
                            <td id="nomPrenom">
                                <i class="fas fa-user-circle"></i>
                                <?php
                                $info = getInfos($ticket["userId"])->fetchall();
                                echo $info[0][3]; ?>
                                <?php echo $info[0][4]; ?>
                            </td>
                            <td class="date">
                                <?php echo _RECEIVED;
                                echo $ticket["questionDate"]; ?>
                            </td>
                            <td>
                                <a href="index.php?action=deleteMessageTickets&amp;IDMessage=<?= $ticket['id'] ?>" class='smallButton'><?php echo _DELETE?></a>
                            </td>
                        </tr>

                        <tr>
                            <td id="adminQuestion">
                                <?= $ticket["question"]; ?>
                            </td>

                            <td class="status">
                                <?php if($ticket["status"] == "new"){?>
                                    <i class="fas fa-times-circle"></i>
                                    <?php echo _UNPROCESSED ?>
                                <?php }else{ ?>
                                        <i class="fas fa-check-circle"></i>
                                        <?php echo _PROCESSED ?>
                                <?php } ?>
                            </td>

                            <td id="answerButton">
                                <a href="index.php?page=tickets&IDMessage=<?= $ticket['id'] ?>" class='smallButton'><?php echo _ANSWER2 ?></a>
                            </td>
                        </tr>

                        <tr>
                            <td id="adminAnswer">
                                <i class="fas fa-angle-double-right"></i>
                                <?= $ticket["answer"]; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <?php if(isset($_GET['IDMessage'])){ ?>

                    <form method="post" action="index.php?action=manageTickets&amp;IDMessage=<?= $_GET['IDMessage'] ?>" enctype="multipart/form-data">

                        <p><?php echo (getIdTickets($_GET["IDMessage"])->fetchAll())[0][6]; ?></p>

                        <p>
                            <label><?php echo _ANSWER;?><br>
                                <textarea name="answer" rows="3" cols="60" required></textarea>
                            </label>
                        </p>


                        <input class="bigButton" type="submit" value="<?php echo _SEND;?>" >
                    </form>

                <?php }else{ ?>

                <?php } ?>



            <?php } ?>


        <?php }else{ ?>

        <?php } ?>
    </div>

</div> <!--fin du bloc main-->

</div>

</body>

</html>