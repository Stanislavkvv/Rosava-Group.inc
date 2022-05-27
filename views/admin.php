<?php
    if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true) {
        ?>
            <main id="admin">
                <div class="container">
                    <aside>
                        <a href="index.php" class="logo">
                            <img src="img/Logo.png" alt="Logo">
                        </a>
                        <ul class="actions">
                            <li><button class="buttn"><i class='bx bx-notepad'></i>Applications</button></li>
                            <li><button class="buttn"><i class='bx bx-cog'></i>Site Settings</button></li>
                        </ul>
                    </aside>
                    <section class="content"></section>
                </div>
            </main>
            <script src="admin.js"></script>
        <?php
    } else { 
?>
    <script>window.location.href = "index.php"</script> 
<?php
    }
?>