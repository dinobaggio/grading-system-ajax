<?php
require_once("../../_controllers/role_01_admin_controller/detail_siswa.php");

?>

<h1>Detail Siswa</h1>

<h3><?php echo $full_nama;?></h3>
<p>NIS:<?php echo $nis;?></p>
<p>Jenis Kelamin: <?php echo $jenis_kl;?></p>
<p>Agama: <?php echo $agama;?></p>
<p>Tahun Masuk: <?php echo $tahun_masuk;?></p>
<?php 
if($tanggal_masuk != "0000-00-00") {
    echo "<p>Tanggal Masuk: ".$tanggal_masuk."</p>";
}

if($tanggal_lahir != "0000-00-00") {
    echo "<p>Tanggal Lahir: ".$tanggal_lahir."</p>";
}

if(!empty($tempat_lahir)){
    echo "<p>Tempat Lahir: ".$tempat_lahir."</p>";
}

if(!empty($provinsi)){
    echo "<p>Provinsi: ".$provinsi."</p>";
}

if(!empty($asal_smu)){
    echo "<p>Asal SMU: ".$asal_smu."</p>";
}

if(!empty($telepon)){
    echo "<p>Telepon: ".$telepon."</p>";
}

if(!empty($hp)){
    echo "<p>Nomor HP: ".$hp."</p>";
}

if(!empty($alamat)){
    echo "<p>Alamat: ".$alamat."</p>";
}

?>



<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>