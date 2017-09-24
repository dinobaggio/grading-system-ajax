<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["role"])) {
    if($_SESSION["role"] == "dosen" ) { ?>

<div id="homeDosen">
    <script src="_asset/js/public_js.js">//public JS</script>
    <script>
        $(document).ready(function() {
            $("#logoutBtn").click(function(){
                $("#ajaxIndex").load("_controllers/login/logout.php");
            });
        });
    </script>
    <h4>Selemat datang <b><?php echo $_SESSION["username"]; ?></b> </h4>
        <button id="logoutBtn" class="w3-button" >Logout</button>

</div>
    <?php } else {
        echo "anda bukan dosen"; ?> <script> window.open("../index.php", "_self"); </script> <?php
    }
} else { 
    echo "anda harus login"; ?> <script> window.open("../index.php", "_self"); </script> <?php 
}
?>

<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>