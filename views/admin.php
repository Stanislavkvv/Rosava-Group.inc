<?php
    if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true){
        if(isset($_GET["view"])&&$_GET["view"]=="applications"){
            $_POST["action"]="applications";
        }
        ?>
        <main id="admin" class="admin">
            <div class="container">
                <aside>
                    <a href="index.php" class="logo">
                        <img src="img/Logo.png" alt="Logo">
                    </a>
                    <ul class="actions">
                        <li><button class="buttn" action="applications"><i class='bx bx-notepad'></i>Applications</button></li>
                        <li><button class="buttn" action="settings"><i class='bx bx-cog'></i>Site Settings</button></li>
                        <li><button class="buttn" action="personalSettings"><i class='bx bxs-user-account'></i>Personal Settings</button></li>
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
                            } else if($_POST["action"]=="settings") {
                                ADMIN::SetSettings($_POST);
                            } else if($_POST["action"]=="personalSettings") {
                                ADMIN::SetUsername($_POST);
                                $oldPasswordSimilarity = ADMIN::CheckOldPassword($_POST["oldPassword"]);
                                if($oldPasswordSimilarity==true){
                                    ADMIN::SetPassword($_POST["newPassword"]);
                                }
                            }
                        }
                    }
                    ?>
                    <div class="content__block <?php if(empty($_POST["action"])){ echo 'active';} ?>" id="getStarted">
                        <h2 class="title">GET STARTED!</h2>
                        <h3>Now, you are ADMIN , and you can <br> see applications and change site settings!</h3>
                        <p>For navigate, click on any button.</p>
                        <div class="btns">
                            <button class="buttn" action="applications"><i class='bx bx-notepad'></i>Applications</button>
                            <button class="buttn" action="settings"><i class='bx bx-cog'></i>Site Settings</button>
                            <button class="buttn" action="personalSettings"><i class='bx bxs-user-account'></i>Personal Settings</button>
                        </div>
                    </div>
                    <div class="content__block <?php if(isset($_POST["action"])&&$_POST["action"]=="applications"){ echo 'active';} ?>" id="applications">
                        <?php 
                            if (!isset($_GET['page']) ) {  
                                $page = 1;  
                            } else {  
                                $page = $_GET['page'];  
                            } 
                            $results_per_page = 50;  
                            $page_first_result = ($page-1) * $results_per_page;  
                            $applications = ADMIN::getApplications($page_first_result,$results_per_page);
                            $allApplications = ADMIN::getAllApplications();
                            if(count($applications)>0){
                        ?>
                        <h2 class="title">APPLICATIONS</h2>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td style="text-align:center;">№</td>
                                    <td class="name">Name</td>
                                    <td class="mail">Mail</td>
                                    <td class="phone">Phone</td>
                                    <td class="exp" style="text-align:center;">Driver exp.</td>
                                    <td class="date" style="text-align:center;">Time</td>
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
                                        <td class="exp" style="text-align:center;"><?php echo $applications[$i]["App_Driving_Experience"]?></td>
                                        <td class="date" style="text-align:center;">
                                            <?php 
                                                $date = date_create($applications[$i]["App_DateTime"]);
                                                echo date_format($date, 'm-d-Y h:i:s A')
                                            ?>
                                        </td>
                                        <td class="act" style="text-align:center;">
                                            <a class="view" href="index.php?action=viewApplication&id=<?php echo $applications[$i]["App_ID"]?>"><img src="img/assets/eye.png" alt="View"></a>
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
                            $results = ceil(count($allApplications) / $results_per_page);
                            if($results>1){
                            ?>
                            <div class="paginationBtns">
                                <?php 
                                if($page==$results&&$page-2>0){
                                    ?>
                                    <button link="index.php?action=admin&view=applications&page=<?php echo $page-2?>"><?php echo $page-2?></button>
                                    <?php
                                }
                                if($page>1){
                                    ?>
                                    <button link="index.php?action=admin&view=applications&page=<?php echo $page-1?>"><?php echo $page-1?></button>
                                    <?php
                                }   
                                ?>
                                <button class="noactive"><?php echo $page?></button>
                                <?php 
                                if($page<$results){
                                    ?>
                                    <button link="index.php?action=admin&view=applications&page=<?php echo $page+1?>"><?php echo $page+1?></button>
                                    <?php
                                }
                                if($page==1&&$results>2){
                                    ?>
                                    <button link="index.php?action=admin&view=applications&page=<?php echo $page+2?>"><?php echo $page+2?></button>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            }
                        } else{
                            ?>
                                <h2 class="title">YOU DON`T HAVE APPLICATIONS</h2>
                            <?php
                        } 
                        ?>
                    </div>
                    <div class="content__block <?php if(isset($_POST["action"])&&$_POST["action"]=="settings"){ echo 'active';} ?>" id="settings">
                        <?php $settings = ADMIN::GetSettings();?>
                        <h2 class="title">SITE SETTINGS</h2>
                        <form action="index.php?action=admin" method="post" id="settingsForm">
                            <input type="hidden" name="action" value="settings">
                            <div class="content__block__child">
                                <p><img src="img/assets/phone.png" alt="Phone">Phone Number 1</p>
                                <input type="text" minlength="10" value="<?php echo $settings[0]["config_value"]?>" placeholder="Phone Number , example <?php echo $settings[0]["config_value"]?>" required name="phone1" pattern="+1[0-9]{10}">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/phone.png" alt="Phone">Phone Number 2</p>
                                <input type="text" minlength="10" value="<?php echo $settings[1]["config_value"]?>" placeholder="Phone Number , example <?php echo $settings[1]["config_value"]?>" required name="phone2" pattern="+1[0-9]{10}">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/fax.png" alt="Fax">Fax</p>
                                <input type="text" minlength="10" value="<?php echo $settings[2]["config_value"]?>" placeholder="Fax , example <?php echo $settings[2]["config_value"]?>" required name="fax" pattern="+1[0-9]{10}">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/gmail.png" alt="Email">Email</p>
                                <input type="email" value="<?php echo $settings[4]["config_value"]?>" placeholder="Email Address" required name="mail">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/location.png" alt="Address">Address</p>
                                <input type="text" value="<?php echo $settings[3]["config_value"]?>" placeholder="Address" required name="location">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/facebook.png" alt="Facebook">Facebook</p>
                                <input type="text" value="<?php echo $settings[5]["config_value"]?>" placeholder="Facebook link" required name="facebook">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/instagram.png" alt="Instagram">Instagram</p>
                                <input type="text" value="<?php echo $settings[6]["config_value"]?>" placeholder="Instagram link" required name="instagram">
                            </div>
                            <div class="content__block__child">
                                <p><img src="img/assets/description.png" alt="Description">Description</p>
                                <textarea name="siteDescription" placeholder="Site Description min. 50 symbols" minlength="50"><?php echo $settings[7]["config_value"]?></textarea>
                            </div>
                            <button type="submit" class="buttn">Save Changes</button>
                        </form>
                    </div>
                    <div class="content__block <?php if(isset($_POST["action"])&&$_POST["action"]=="personalSettings"){ echo 'active';} ?>" id="personalSettings">
                        <?php $adminUsername = ADMIN::GetUsername();?>
                        <h2 class="title">Personal Settings!</h2>
                        <form action="" method="post" id="personalSettings">
                            <input type="hidden" name="action" value="personalSettings">
                            <div class="content__block__child">
                                <p><img src="img/assets/login.png" alt="User">Username</p>
                                <input type="text" name="login" required minlength="4" placeholder="Username" id="login" value="<?php echo $adminUsername[0]["username"]?>">
                            </div>
                            <div class="content__block__child passwordRecovery">
                                <div class="head">
                                    <p><img src="img/assets/lock.png" alt="Password">Password</p>
                                    <a class="passwordRecoveryOpen"><img src="img/assets/pencil.png" alt="Password">Change Password</a>
                                </div>
                                <div class="passwordRecovery <?php if(isset($oldPasswordSimilarity)&&$oldPasswordSimilarity==false){ echo "active" ;}?>">
                                    <div class="inputBlock">
                                        <p <?php if(isset($oldPasswordSimilarity)&&$oldPasswordSimilarity==false){ echo "class='error'"; }?>><?php if(isset($oldPasswordSimilarity)&&$oldPasswordSimilarity==false){ echo "Invalid"; }?> Old Password</p>
                                        <div class="input">
                                            <input type="password" name="oldPassword" minlength="8" maxlength="32" placeholder="Old Password" <?php if(isset($oldPasswordSimilarity)&&$oldPasswordSimilarity==false){ echo "class='error'"; }?>>
                                            <i class='bx bx-low-vision passwordImg'></i>
                                            <img src="img/assets/eye.png" alt="Password" class="passwordImg active">
                                        </div>
                                    </div>
                                    <div class="inputBlock">
                                        <p>New Password</p>
                                        <div class="input">
                                            <input type="password" name="newPassword" minlength="8" maxlength="32" placeholder="New Password">
                                            <i class='bx bx-low-vision passwordImg'></i>
                                            <img src="img/assets/eye.png" alt="Password" class="passwordImg active">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="buttn">Save Changes</button>
                        </form>
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