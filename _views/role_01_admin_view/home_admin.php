<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["role"])) {
    if($_SESSION["role"] == "admin" ) { ?>

<div id="homeAdmin">
    <script src="_asset/js/public_js.js">//public JS</script>
    <script>
        $(document).ready(function() {
            $("#home").click(function(){
                $("#indexPost").show();
                $("#ajaxIndex").load("_views/role_01_admin_view/home_admin.php");
            });
            $("#lihatSiswa").click(function(){
                $("#indexPost").hide();
                $("#indexAdmin").load("_views/role_01_admin_view/lihat_siswa.php");
            });
            $("#lihatDosen").click(function(){
                $("#indexPost").hide();
                $("#indexAdmin").load("_views/role_01_admin_view/lihat_dosen.php");
            });
            $("#lihatMatkul").click(function(){
                $("#indexPost").hide();
                $("#indexAdmin").load("_views/role_01_admin_view/lihat_matkul.php");
            });
            $("#tambahSiswa").click(function(){
                $("#indexPost").hide();
                $("#indexAdmin").load("_views/role_01_admin_view/tambah_siswa.php");
            });
            $("#tambahDosen").click(function(){
                $("#indexPost").hide();
                $("#indexAdmin").load("_views/role_01_admin_view/tambah_dosen.php");
            });
            $("#tambahMatkul").click(function(){
                $("#indexPost").hide();
                $("#indexAdmin").load("_views/role_01_admin_view/tambah_matkul.php");
            });
            $("#logoutBtn").click(function(){
                $("#indexPost").show();
                $("#ajaxIndex").load("_controllers/login/logout.php");
            });

        });
    </script>
    <h4>Selemat datang <b><?php echo $_SESSION["username"]; ?></b> </h4>
    <div id="tombolAdmin">
        <button id="home">Home</button> 
        <button id="lihatSiswa">Lihat Siswa</button> 
        <button id="lihatDosen">Lihat Dosen</button> 
        <button id="lihatMatkul">Lihat Matkul</button> 
        <button id="tambahSiswa">Tambah Siswa</button>
        <button id="tambahDosen">Tambah Dosen</button> 
        <button id="tambahMatkul">Tambah Matkul</button> 
        <button id="logoutBtn">Logout</button>
    </div>
    <div id="indexAdmin">
        tambah siswa module admin yang sedang dikerjakan 
    </div>

</div>
    <?php } else {
        echo "anda bukan admin"; ?> <script> window.open("../index.php", "_self"); </script> <?php
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