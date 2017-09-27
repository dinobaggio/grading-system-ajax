<?php
if(isset($_POST['nid'])) {
    $nid = $_POST['nid'];
    try {
        $file = require_once('../../config/dbset.php');
        $que = "SELECT * FROM dosen WHERE nid=:nid";
        $tugas = $kon->prepare($que);
        $tugas->bindParam(':nid', $nid);
        $tugas->execute();
        $data = $tugas->fetch();
        $nid = $data['nid'];
        $full_nama = $data['full_nama'];
        $jenis_kl = $data['jenis_kl'];
        $agama = $data['agama'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $tempat_lahir = $data['tempat_lahir'];
        $provinsi = $data['provinsi'];
        $telepon = $data['telepon'];
        $hp = $data['hp'];
        $alamat = $data['alamat'];
    } catch(PDOException $e) {
        echo "erro: <br/>".$e->getMessage();
    }
}

unset($file);
unset($kon);


?>



<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../../index.php","_self")
    }
</script>