<div id="adminTambahMatkul"> 
<h2>Tambah Matkul</h2>
<p>Tambah matkul masih tahap pengembangan</p>
<script src="_asset/js/public_js.js"></script>
<form method="post" action="javascript:void(0)">
<table>
    <tr><td>Kode Matkul: </td><td><input type="text" name="kode_matkul" maxlength="11" value="" placeholder="Kode Mata Kuliah..." /></td></tr>
    <tr><td>Nama Matkul: </td><td><input type="text" name="nama_matkul" maxlength="50" value="" placeholder="Nama Mata Kuliah..." /></td></tr>
    <tr><td>Semeseter: </td><td>
    <select name="semester">
    <option value="" >Pilih Semester</option>
    <option value="ganjil">Ganjil</option>
    <option value="genap">Genap</option>
    </select>
    </td></tr>
    <tr><td><input type="submit" value="Simpan" /></td></tr>
</table>
</form>

</div>


<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>