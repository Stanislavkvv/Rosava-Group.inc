<?php
    if (isset($_SESSION["isAdmin"])&&$_SESSION["isAdmin"]==true) {
        ?>
            <a class="signin" href="index.php?action=admin">Admin</a>
        <?php
    } else { 
?>
    <script>window.location.href = "index.php"</script> 
<?php
    }
?>