<?php

$filedb = require_once('../../config/dbset.php');

try {

    $que = "INSERT INTO dosen (nid, full_nama, jenis_kl, agama, telepon, hp, provinsi,
        tempat_lahir, tanggal_lahir, alamat) VALUES 
        (:nid, :full_nama, :jenis_kl, :agama, :telepon, :hp, :provinsi, :tempat_lahir, :tanggal_lahir,
        :alamat)";
    $tugas = $kon->prepare($que);
    $tugas->bindParam(':nid', $nid);
    $tugas->bindParam(':full_nama', $full_nama);
    $tugas->bindParam(':jenis_kl', $jenis_kl);
    $tugas->bindParam(':agama', $agama);
    $tugas->bindParam(':telepon', $telepon);
    $tugas->bindParam(':hp', $hp);
    $tugas->bindParam(':provinsi', $provinsi);
    $tugas->bindParam(':tempat_lahir', $tempat_lahir);
    $tugas->bindParam(':tanggal_lahir', $tanggal_lahir);
    $tugas->bindParam(':alamat', $alamat);
    $tugas->execute();
    echo "data berhasil dimasukan, cek databse".br;
    
    $que = "INSERT INTO pengguna (username, password, role) VALUES (:username, :password, :role)";
    $tugas = $kon->prepare($que);
    $tugas->bindParam(':username', $nid);
    $tugas->bindParam(':password', $password);
    $tugas->bindParam(':role', $role);
    $password = md5($nid);
    $role = 'dosen';
    $tugas->execute();
    echo "dan data telah dibuat usernya".br;
} catch (PDOException $e) {
    echo "error: ".$e->getMessage();
}





unset($filedb);
unset($kon);
?>





<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../../index.php","_self")
    }
</script>