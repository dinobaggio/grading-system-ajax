<div id="adminTambahDosen" class="w3-section"> 
    <h2>Tambah Dosen</h2>
    <p>tambah dosen masih dalam tahap pengembangan</p>
    <p class="w3-text-red">* harus diisi</p>
    <form method="POST" action="javascript:void(0)" name="formTambahDosen">
        <table> 
        <tr><td>NID: </td><td><input type="text" name="nid" placeholder="Nomor Induk Dosen" value="" /> <span class="w3-text-red">*</span></td></tr>
        <tr><td>Nama: </td><td><input type="text" name="full_nama" placeholder="Full Nama" value="" /> <span class="w3-text-red">*</span></td></tr>
        <tr><td>Jenis Kelamin: </td> 
        <td><select name="jenis_kl">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki-laki" >Laki-laki</option>
            <option value="Perempuan" >Perempuan</option>
        </select> <span class="w3-text-red">*</span></td></tr>
        <tr><td>Agama: </td>
        <td><select name="agama">
            <option value="">Pilih Agama</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
        </select> <span class="w3-text-red">*</span></td></tr>
        <tr><td>Tanggal Lahir: </td><td>
            <input type="text" name="hari_lahir" maxlength="2" size="2" value="" placeholder="Hari"/> / 
            <input type="text" name="bulan_lahir" maxlength="2" size="3" value="" placeholder="Bulan" /> / 
            <input type="text" name="tahun_lahir" maxlength="4" size="4" value="" placeholder="Tahun"/> 
            <span class="w3-text-red"></span>
        </td></tr>
        <tr><td></td><td class="w3-opacity">contoh: 27 / 11 / 1995</td></tr>
        <tr><td>Tempat Lahir: </td><td><input type="text" name="tempat_lahir" value="" placeholder="Tempat Lahir" /> 
            <span class="w3-text-red"></span></td></tr>
        <tr><td>Provinsi: </td><td><input type="text" name="provinsi" value="" placeholder="Provinsi" />
            <span class="w3-text-red"></span></td></tr>
        <tr><td>Telepon Rumah: </td><td><input type="text" name="telepon" value="" placeholder="Telepon Rumah" />
            <span class="w3-text-red"></span></td></tr>
        <tr><td>Nomor HP: </td><td><input type="text" name="hp" value="" placeholder="Nomor HP" >
            <span class="w3-text-red"></span></td></tr>
        <tr><td>Foto: </td><td><input type="file" name="foto" class="w3-opacity" accept="image/*" /></td></tr>
        <tr><td>Alamat: </td>
        <td><textarea name="alamat"></textarea></td><span class="w3-text-red"></span></tr>
        </table>
        <input type="submit" value="Simpan" />
    </form>


</div>


<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>