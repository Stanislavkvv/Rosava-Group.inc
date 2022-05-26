<main>
    <div class="container">
        <h1>asdasd</h1>
    </div>
    <script>
        setTimeout(() => {
            <?php
                if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true) {
                    ?>
                         window.location.href = "index.php?action=admin"
                    <?php
                } else { 
            ?>
                window.location.href = "index.php" 
            <?php
                }
            ?>
        }, 5000);
    </script>
</main>