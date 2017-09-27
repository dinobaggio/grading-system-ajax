<?php
require_once("../../_controllers/role_01_admin_controller/detail_dosen.php");

?>

<h1>Detail Dosen</h1>

<h3><?php echo $full_nama;?></h3>
<p>NID:<?php echo $nid;?></p>
<p>Jenis Kelamin: <?php echo $jenis_kl;?></p>
<p>Agama: <?php echo $agama;?></p>
<?php 
if($tanggal_lahir != "0000-00-00") {
    echo "<p>Tanggal Lahir: ".$tanggal_lahir."</p>";
}

if(!empty($tempat_lahir)){
    echo "<p>Tempat Lahir: ".$tempat_lahir."</p>";
}

if(!empty($provinsi)){
    echo "<p>Provinsi: ".$provinsi."</p>";
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