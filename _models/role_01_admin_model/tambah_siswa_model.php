<?php
$file = require_once('../../config/dbset.php');
try {
    $que = "INSERT INTO siswa (nis, full_nama, jenis_kl, agama, telepon, hp, provinsi, asal_smu,
        tempat_lahir, tanggal_lahir, tanggal_masuk, tahun_masuk, alamat) VALUES 
        (:nis, :full_nama, :jenis_kl, :agama, :telepon, :hp, :provinsi, :asal_smu, :tempat_lahir, :tanggal_lahir,
        :tanggal_masuk, :tahun_masuk, :alamat)";
    $tugas = $kon->prepare($que);
    $tugas->bindParam(':nis', $nis);
    $tugas->bindParam(':full_nama', $full_nama);
    $tugas->bindParam(':jenis_kl', $jenis_kl);
    $tugas->bindParam(':agama', $agama);
    $tugas->bindParam(':telepon', $telepon);
    $tugas->bindParam(':hp', $hp);
    $tugas->bindParam(':provinsi', $provinsi);
    $tugas->bindParam(':asal_smu', $asal_smu);
    $tugas->bindParam(':tempat_lahir', $tempat_lahir);
    $tugas->bindParam(':tanggal_lahir', $tanggal_lahir);
    $tugas->bindParam(':tanggal_masuk', $tanggal_masuk);
    $tugas->bindParam(':tahun_masuk', $tahun_masuk);
    $tugas->bindParam(':alamat', $alamat);
    $tugas->execute();
    echo "data berhasil dimasukan, cek databse".br;
    
    $que = "INSERT INTO pengguna (username, password, role) VALUES (:username, :password, :role)";
    $tugas = $kon->prepare($que);
    $tugas->bindParam(':username', $nis);
    $tugas->bindParam(':password', $password);
    $tugas->bindParam(':role', $role);
    $password = md5($nis);
    $role = 'siswa';
    $tugas->execute();
    echo "dan data telah dibuat usernya".br; ?>

<script>
    /* $("#indexAdmin").load("_views/role_01_admin_view/detail_siswa.php",{
        nis : "<?php //echo $nis; ?>"
    }) */;
    
        $.ajax({
            url : '_views/role_01_admin_view/detail_siswa.php',
            method: "POST",
            data : { nis: "<?php echo $nis;?>"}
        }).done(function(data){
            $("#indexAdmin").html(data);
        });
    
</script>





<?php

} catch(PDOException $e){
    echo $que . "<br/>" . $e->getMessage();
} 

$file = null;
?>


<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>