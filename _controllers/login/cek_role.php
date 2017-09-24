<?php
session_start();
define("br", "<br/>", true);
if($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once("../../config/dbset.php");
        $que = "SELECT * FROM pengguna WHERE username=:username AND password=:password ";
        $lihat = $kon -> prepare($que);
        $lihat -> bindParam(":username", $username);
        $lihat -> bindParam(":password", $password);
        $username = cekData($_POST["username"]);
        $password = cekData($_POST["password"]);
        $password = md5($password);
        $lihat -> execute();
        $login = $lihat -> rowCount();
        if($login == 1) {
            $data = $lihat -> fetch();
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $data["role"]; 
            switch($_SESSION["role"]) {
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
            echo "<span class='w3-text-red'>*data tidak ada</span>";
        }

    } catch (PDOException $e) {
        echo "error database: ".$e -> getMessage(); 
    }
}
?>