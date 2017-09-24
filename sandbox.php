
<?php 

if(isset($_POST['dataDosen'])){
    $dataDosen = array();
    parse_str($_POST['dataDosen'], $dataDosen);
    echo $dataDosen['nid'];
}

?>


<div id="indexAdmin">
<script src="_asset/js/jquery-3.2.1.js" ></script>
    <script>
        $(document).ready(function(){
            $("[name=formTambahDosen]").submit(function(){
                $.ajax({
                    url: "<?php echo $_SERVER['PHP_SELF'];?>",
                    method: 'POST',
                    data: {
                        dataDosen:$(this).serialize()
                    },
                    success: function(data){
                        $("#adminTambahDosen").html(data);
                    }
                })
            });
        
        { //input data
            if($("[name=nid]").val() == "") {
                $("[name=nid]").focus();
            } else {
                if($("[name=full_nama]").val() == ""){
                    $("[name=full_nama]").focus();
                } else {
                    if($("[name=jenis_kl]").val() == "") {
                        $("[name=jenis_kl]").focus();
                    } else {
                        if($("[name=agama]").val() == "" ) {
                            $("[name=agama]").focus();
                        }
                    }
                }
            }
            
            $("[name=nid]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[0-9|\n\r\b]/;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                },
            });

            $("[name=full_nama]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[a-z|A-Z|\n\r\b]|\'|\ /;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                },
            });

            $("[name=hari_lahir]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[0-9|\n\r\b]/;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                        
                    }
                },
                keyup : function(){
                    var nilai = $(this).val();
                    if (nilai > 31) {
                        $(this).val(31);
                    }
                },
            });

            $("[name=bulan_lahir]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[0-9|\n\r\b]/;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                        
                    }
                },
                keyup: function(){
                    var nilai = $(this).val();
                    if (nilai > 12) {
                        $(this).val(12);
                    }
                },
            });

            $("[name=tahun_lahir]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[0-9|\n\r\b]/;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                        
                    }
                },
                keyup: function(){
                    var nilai = $(this).val();
                    if (nilai > (<?php echo date("Y"); ?>-15) ) {
                        $(this).val(<?php echo date("Y"); ?>-15);
                    }
                },
                focusout : function(){
                    var nilai = $(this).val();
                    if (nilai != "") {
                            if (nilai < (<?php echo date("Y"); ?>-70)) {
                            $(this).val((<?php echo date("Y"); ?>-70));
                        }
                    }
                },
            });

            $("[name=tempat_lahir]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[a-z|A-Z|\n\r\b]|\ /;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            });

            $("[name=provinsi]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[a-z|A-Z|\n\r\b]|\ /;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            });
            
            $("[name=telepon]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[0-9|\n\r\b]|\+/;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                },
            });

            $("[name=hp]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[0-9|\n\r\b]|\+/;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                },
            });
        }
        
        
        });
    </script>



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
</div>