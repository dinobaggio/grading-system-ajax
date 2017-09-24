<?php
session_start();
define("br", "<br/>", true);

if(isset($_SESSION["username"]) && isset($_SESSION["role"])) {
    require_once("../../config/dbset.php");
    $que = "SELECT username, role FROM pengguna WHERE username=:username AND role=:role";
    $lihat = $kon -> prepare($que);
    $lihat -> bindParam(":username", $username);
    $lihat -> bindParam(":role", $role);
    $username = cekData($_SESSION["username"]);
    $role = cekData($_SESSION["role"]);
    $lihat -> execute();
    $cek = $lihat -> rowCount();
    if ($cek == 1) {
        switch($role) {
            case "admin" : ?>
                <script>
                    $("#ajaxIndex").load("_views/role_01_admin_view/home_admin.php");
                </script> <?php
                break;
            case "siswa" : ?>
                <script>
                    $("#ajaxIndex").load("_views/role_02_siswa_view/home_siswa.php");
                </script> <?php
                break;
            case "dosen" : ?>
                <script>
                    $("#ajaxIndex").load("_views/role_03_dosen_view/home_dosen.php");
                </script> <?php
                break;
            default : 
            echo "data tidak ada";
        }

    } else {
        echo "data tidak ada";
    }
} else { ?>
    <script>
        $("#ajaxIndex").load("_views/login/login.php");
    </script>
<?php } ?>

<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>