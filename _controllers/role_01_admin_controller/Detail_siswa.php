<?php


if(isset($_POST['nis'])) {
    $nis = $_POST['nis'];
    try {
        $file = require_once('../../config/dbset.php');
        $que = "SELECT * FROM siswa WHERE nis=:nis";
        $tugas = $kon->prepare($que);
        $tugas->bindParam(':nis', $nis);
        $tugas->execute();
        $data = $tugas->fetch();
        $nis = $data['nis'];
        $full_nama = $data['full_nama'];
        $jenis_kl = $data['jenis_kl'];
        $agama = $data['agama'];
        $tahun_masuk = $data['tahun_masuk'];
        $tanggal_masuk = $data['tanggal_masuk'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $tempat_lahir = $data['tempat_lahir'];
        $provinsi = $data['provinsi'];
        $asal_smu = $data['asal_smu'];
        $telepon = $data['telepon'];
        $hp = $data['hp'];
        $alamat = $data['alamat'];

    } catch(PDOException $e) {
        echo "erro: <br/>".$e->getMessage();
    }
}

$file = null;
$kon = null;


?>



<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>