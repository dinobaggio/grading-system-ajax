<?php
session_start();
session_destroy();
?>
<script>
    $("#ajaxIndex").load("_controllers/login/home.php");
</script>