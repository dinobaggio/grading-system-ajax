<?php 

require_once('../../_controllers/role_01_admin_controller/tambah_siswa.php');

?>
<div id="adminTambahSiswa" class="w3-section"> 
<script src="_asset/js/public_js.js"></script>
    <h2>Tambah Siswa</h2>
    <p>tambah siswa sudah done, sudah menampilkan detail siswa, tinggal merapikan style</p>
    <p class="w3-text-red">* harus diisi</p>
    <form method="POST" action="javascript:void(0)" name="formTambahSiswa">
        <table> 
        <tr><td>NIS: </td><td><input type="text" name="nis" placeholder="Nomor Induk Siswa" maxlength="11" value="<?php echo $nis; ?>" /> <span class="w3-text-red">*<?php echo $errNis; ?></span></td></tr>
        <tr><td>Nama: </td><td><input type="text" name="full_nama" placeholder="Full Nama" maxlength="50" value="<?php echo $full_nama; ?>" /> <span class="w3-text-red">*<?php echo $errFull_nama; ?></span></td></tr>
        <tr><td>Jenis Kelamin: </td> 
        <td><select name="jenis_kl">
            <option value="" <?php echo $defaultKl; ?>>Pilih Jenis Kelamin</option>
            <option value="Laki-laki" <?php echo $laki; ?> >Laki-laki</option>
            <option value="Perempuan" <?php echo $perempuan; ?> >Perempuan</option>
        </select> <span class="w3-text-red">*<?php echo $errJenis_kl; ?></span></td></tr>
        <tr><td>Agama: </td>
        <td><select name="agama">
            <option value="" <?php echo $defaultAgama; ?>>Pilih Agama</option>
            <option value="Islam" <?php echo $Islam; ?> >Islam</option>
            <option value="Kristen" <?php echo $kristen; ?> >Kristen</option>
            <option value="Hindu" <?php echo $hindu; ?> >Hindu</option>
            <option value="Budha" <?php echo $budha; ?> >Budha</option>
        </select> <span class="w3-text-red">*<?php echo $errAgama; ?></span></td></tr>
        <tr><td>Tahun Masuk: </td><td><input type="text" name="tahun_masuk" maxlength="4" size="4" value="<?php echo $tahun_masuk; ?>" placeholder="Tahun Masuk"/> <span class="w3-text-red">*<?php echo $errTahun_masuk; ?></span></td></tr>
        <tr><td></td><td class="w3-opacity">contoh: 2013</td></tr>
        <tr><td>Tanggal Masuk: </td><td>
            <input type="text" name="hari_masuk" maxlength="2" size="2" value="<?php echo $hari_masuk; ?>" placeholder="Hari"/> / 
            <input type="text" name="bulan_masuk" maxlength="2" size="3" value="<?php echo $bulan_masuk; ?>" placeholder="Bulan" /> / 
            <span name="thn_masuk" class="w3-opacity">Tahun</span> <span class="w3-text-red"><?php echo $errTanggal_masuk; ?></span>
        </td></tr>
        <tr><td></td><td class="w3-opacity">contoh: 01 / 12 / 2013</td></tr>
        <tr><td>Tanggal Lahir: </td><td>
            <input type="text" name="hari_lahir" maxlength="2" size="2" value="<?php echo $hari_lahir; ?>" placeholder="Hari"/> / 
            <input type="text" name="bulan_lahir" maxlength="2" size="3" value="<?php echo $bulan_lahir; ?>" placeholder="Bulan" /> / 
            <input type="text" name="tahun_lahir" maxlength="4" size="4" value="<?php echo $tahun_lahir; ?>" placeholder="Tahun"/> 
            <span class="w3-text-red"><?php echo $errTanggal_lahir; ?></span>
        </td></tr>
        <tr><td></td><td class="w3-opacity">contoh: 27 / 11 / 1995</td></tr>
        <tr><td>Tempat Lahir: </td><td><input type="text" name="tempat_lahir" maxlength="50" value="<?php echo $tempat_lahir; ?>" placeholder="Tempat Lahir" /> 
            <span class="w3-text-red"><?php echo $errTempat_lahir; ?></span></td></tr>
        <tr><td>Provinsi: </td><td><input type="text" name="provinsi" maxlength="50" value="<?php echo $provinsi; ?>" placeholder="Provinsi" />
            <span class="w3-text-red"><?php echo $errProvinsi; ?></span></td></tr>
        <tr><td>Asal SMU: </td><td><input type="text" name="asal_smu" maxlength="100" value="<?php echo $asal_smu; ?>" placeholder="Asal SMU" />
            <span class="w3-text-red"><?php echo $errAsal_smu; ?></span></td></tr>
        <tr><td>Telepon Rumah: </td><td><input type="text" name="telepon" maxlength="50" value="<?php echo $telepon; ?>" placeholder="Telepon Rumah" />
            <span class="w3-text-red"><?php echo $errTelepon; ?></span></td></tr>
        <tr><td>Nomor HP: </td><td><input type="text" name="hp" maxlength="50" value="<?php echo $hp; ?>" placeholder="Nomor HP" >
            <span class="w3-text-red"><?php echo $errHp; ?></span></td></tr>
        <tr><td>Foto: </td><td><input type="file" name="foto" class="w3-opacity" accept="image/*" /></td></tr>
        <tr><td>Alamat: </td>
        <td><textarea maxlength="50000" name="alamat" placeholder="Alamat ...."><?php echo $alamat; ?></textarea></td><span class="w3-text-red"><?php echo $errAlamat; ?></span></tr>
        </table>
        <input type="submit" value="Simpan" />
    </form>

</div>


<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>