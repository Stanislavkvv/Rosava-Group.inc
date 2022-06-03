<?php
    if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true){
        ?>
        <main id="admin">
            <div class="container">
                <aside>
                    <a href="index.php" class="logo">
                        <img src="img/Logo.png" alt="Logo">
                    </a>
                    <ul class="actions">
                        <li><a class="buttn" href="index.php?action=admin&view=applications"><img src="img/assets/left-arrow.png" alt="Arrow"> Go Back</a></li>
                    </ul>
                </aside>
                <section class="content">
                    <?php
                    if(!empty($_POST)){
                        if(isset($_POST["action"])){
                            if($_POST["action"]=="applications"){
                                if(isset($_POST["isCheck"])&&$_POST["isCheck"]=="true"){
                                    ADMIN::CheckApplicationById($_POST["check"]);
                                }
                            }
                        }
                    }
                    if(isset($_GET["id"])){
                        $ID = $_GET["id"];
                    }
                    ?>
                    <div class="content__block active" id="applications">
                        <?php $application = ADMIN::getApplicationById($ID);
                            if($application!=null){
                            var_dump($application);
                        ?>
                        <h2 class="title">APPLICATIONS ( <?php echo count($applications)?> )</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td style="text-align:center;">ID</td>
                                    <td class="name">Name</td>
                                    <td class="mail">Mail</td>
                                    <td class="phone">Phone</td>
                                    <td class="need" style="text-align:center;">Need</td>
                                    <td class="exp" style="text-align:center;">Driver exp.</td>
                                    <td class="date" style="text-align:center;">Date</td>
                                    <td class="act" style="text-align:center;">Actions</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($applications); $i++) { 
                                ?>  
                                    <tr>
                                        <td style="text-align:center;"><?php echo $applications[$i]["App_ID"]?></td>
                                        <td class="name"><?php echo $applications[$i]["App_Name"]?></td>
                                        <td class="mail"><a href="mailto:<?php echo $applications[$i]["App_Mail"]?>"><?php echo $applications[$i]["App_Mail"]?></a></td>
                                        <td class="phone"><a href="tel:<?php echo $applications[$i]["App_Phone"]?>"><?php echo $applications[$i]["App_Phone"]?></a></td>
                                        <td class="need" style="text-align:center;"><?php echo $applications[$i]["App_Services"]?></td>
                                        <td class="exp" style="text-align:center;"><?php echo $applications[$i]["App_Driving_Experience"]?></td>
                                        <td class="date" style="text-align:center;"><?php echo $applications[$i]["App_DateTime"]?></td>
                                        <td class="act" style="text-align:center;">
                                            <a href="index.php&action=viewApplication=1"></a>
                                            <?php if($applications[$i]["App_Checked"]==1){?>
                                                <img src="img/assets/checked.png" alt="Checked">
                                            <?php } else { ?>
                                                <form action="" method="post" class="applicationCheckedForm">
                                                    <input type="hidden" name="action" value="applications">
                                                    <input type="hidden" name="check" value="<?php echo $applications[$i]["App_ID"]?>">
                                                    <input type="hidden" name="isCheck" value="false">
                                                    <button type="submit">
                                                        <img src="img/assets/checked.png" alt="Checked">
                                                    </button>
                                                </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        } else{
                            ?>
                                <script>window.location.href = "index.php?action=admin"</script> 
                            <?php
                        } 
                        ?>
                    </div>
                </section>
            </div>
            <script src="js/admin.js"></script>
        </main>
        <?php        
    } else { 
?>
    <script>window.location.href = "index.php"</script> 
<?php
    }
?>