<?php
define('br', '<br/>', true);
{ // set default nilai input dan err variable 
    $errNid = '';
    $nid = '';

    $errFull_nama = '';
    $full_nama = '';

    $errJenis_kl = '';
    $jenis_kl = '';
    $defaultKl = 'selected';
    $laki = '';
    $perempuan = '';

    $errAgama = '';
    $agama = '';
    $Islam = '';
    $kristen = '';
    $hindu = '';
    $budha = '';
    $defaultAgama = 'selected';

    $errTanggal_lahir = '';
    $tanggal_lahir = '';
    $hari_lahir = '';
    $bulan_lahir = '';
    $tahun_lahir = '';

    $errTempat_lahir = '';
    $tempat_lahir = '';

    $errProvinsi = '';
    $provinsi = '';

    $errTelepon = '';
    $telepon = '';

    $errHp = '';
    $hp = '';

    $errAlamat = '';
    $alamat = '';
} // akhir set default nilai input dan variable error


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array();
    parse_str($_POST['data'], $data);

    switch($data){
        case $data['hari_lahir'] == '' && $data['bulan_lahir'] == '' && $data['tahun_lahir'] == '' :
        $tanggal_lahir = '';
        break;
        default :
        $tanggal_lahir = array('hari_lahir' => $data['hari_lahir'], 
        'bulan_lahir' => $data['bulan_lahir'],
        'tahun_lahir' => $data['tahun_lahir']);
    }
    
    {// block code cek data input!!
        if(empty($data["nid"])) { // cek NID
            $errNid = "Nid harus di isi";
        } else {
            $nid = $data['nid'];
            if(!preg_match("/^[0-9]*$/", $data["nid"])) {
                $errNid = "Hanya angka saja yang di izinkan";
            } else {
                $nid = cekDataInsert($data["nid"]);
            }
        }

        if(empty($data['full_nama'])) { // cek FULL NAMA
            $errFull_nama = "Nama harus di isi";
        } else {
            $full_nama = $data['full_nama'];
            if(!preg_match("/^[a-zA-Z' ]*$/", $data['full_nama'])) {
                $errFull_nama = "Hanya huruf sepasi dan tanda <b>'</b> saja yang di izinkan";
            } else {
                $full_nama = ucwords($data['full_nama']);
                $full_nama = trim($full_nama);
            }
        }

        if(empty($data["jenis_kl"])) { // cek JENIS KELAMIN
            $errJenis_kl = "Jenis kelamin harus di pilih";
        } else {
            $jenis_kl = $data["jenis_kl"];
            switch($jenis_kl) {
                case $jenis_kl == "Laki-laki" :
                $laki = "selected";
                $perempuan = "";
                $defaultKl = "";
                break;
                case $jenis_kl == "Perempuan" :
                $perempuan = "selected";
                $laki = "";
                $defaultKl = "";
                break;
                default :
                $laki = "";
                $perempuan = "";
                $defaultKl = "selected";
            }
        }

        if(empty($data["agama"])) { // cek AGAMA
            $errAgama = "Agama harus di pilih";
        } else {
            $agama = $data["agama"];
            switch($agama) {
                case $agama == "Islam" :
                $Islam = "selected";
                $kristen = $hindu = $budha = $defaultAgama = "";
                break;
                case $agama == "Kristen" :
                $Islam = "";
                $kristen = "selected";
                $hindu = $budha = $defaultAgama = "";
                break;
                case $agama == "Hindu" :
                $Islam = "";
                $hindu = "selected";
                $budha = $kristen = $defaultAgama = "";
                break;
                case $agama == "Budha" :
                $Islam = "";
                $budha = "selected";
                $kristen = $hindu = $defaultAgama = "";
                break;
                default :
                $Islam = "";
                $defaultAgama = "selected";
                $kristen = $hindu = $budha = ""; 
            }
        }
        
        if(!empty($tanggal_lahir)) { // cek TANGGAL LAHIR!!!!!
            $hari_lahir = $tanggal_lahir['hari_lahir'];
            $bulan_lahir = $tanggal_lahir['bulan_lahir'];
            $tahun_lahir = $tanggal_lahir['tahun_lahir'];

            switch($tanggal_lahir) {
                case $tanggal_lahir['hari_lahir'] != "" && $tanggal_lahir['bulan_lahir'] != "" && $tanggal_lahir['tahun_lahir'] != "" :
                switch ($tanggal_lahir) {
                    case strlen($tanggal_lahir['bulan_lahir']) > 2 || strlen($tanggal_lahir['hari_lahir']) > 2 || strlen($tanggal_lahir['tahun_lahir']) > 4 :
                    $errTanggal_lahir = "*hari, bulan, dan tahun tidak boleh dari 2 karakter, 4 karakter untuk tahun, jika tidak ada harap kosongkan";
                    $tanggal_lahir = '';
                    break;
                    case !preg_match("/^[0-9]*$/", $tanggal_lahir['bulan_lahir']) || !preg_match("/^[0-9]*$/", $tanggal_lahir['hari_lahir']) || !preg_match("/^[0-9]*$/", $tanggal_lahir['tahun_lahir']) :
                    $errTanggal_lahir = "*hari, bulan, dan tahun harus angka, jika tidak harap kosongkan";
                    $tanggal_lahir = '';
                    break;
                    case $tanggal_lahir['hari_lahir'] > 31 || $tanggal_lahir['bulan_lahir'] > 12 || $tanggal_lahir['tahun_lahir'] > (date("Y")-15) :
                    $errTanggal_lahir = "*hari, bulan tidak boleh lebih dari 31 dan 12, dan tahun tidak boleh lebih dari ".(date("Y")-15).", jika tidak harap kosongkan";
                    $tanggal_lahir = '';
                    break;
                    case $tanggal_lahir['tahun_lahir'] < (date("Y")-70) :
                    $errTanggal_lahir = "*tahun tidak boleh kurang dari ".(date("Y")-70)." jika tidak harap kosongkan tanggal lahir";
                    $tanggal_lahir = '';
                    break;
                    default :
                    $bulan_masuk = cekDataInsert($tanggal_lahir['bulan_lahir']);
                    $hari_masuk = cekDataInsert($tanggal_lahir['hari_lahir']);
                    $tahun_lahir = cekDataInsert($tanggal_lahir['tahun_lahir']);
                    $tanggal_lahir = mktime(null,null,null, $bulan_lahir, $hari_lahir, $tahun_lahir);
                    $tanggal_lahir =  date("Y-m-d", $tanggal_lahir);
                }
                break;
                case $tanggal_lahir['hari_lahir'] == "" && $tanggal_lahir['bulan_lahir'] == "" && $tanggal_lahir['tahun_lahir'] == "" :
                $errTanggal_lahir = "";
                break;
                case $tanggal_lahir['hari_lahir'] == "" || $tanggal_lahir['bulan_lahir'] == "" || $tanggal_lahir['tahun_lahir'] == "" :
                $errTanggal_lahir = "*lengkapi hari, bulan, dan tahun untuk proses memasukan data, jika tidak harap kosongkan";
                break;
            }
        } else {
            $tanggal_lahir = '';
        }

        if(!empty($data['tempat_lahir'])) { // cek TEMPAT LAHIR
            $tempat_lahir = $data['tempat_lahir'];
            if(strlen($data['tempat_lahir']) < 3 ) {
                $errTempat_lahir = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else {
                if(!preg_match("/^[a-zA-Z ]*$/", $data['tempat_lahir'])) {
                    $errTempat_lahir = "Hanya huruf, sepasi saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $tempat_lahir = ucwords($data['tempat_lahir']);
                    $tempat_lahir = trim($tempat_lahir);
                }
            }
        } else {
            $errTempat_lahir = '';
        }

        if(!empty($data['provinsi'])){ // cek Provinsi
            $provinsi = $data['provinsi'];
            if(strlen($data['provinsi']) < 3 ) {
                $errProvinsi = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[a-zA-Z ]*$/", $data['provinsi'])) {
                    $errProvinsi = "Hanya huruf, sepasi saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $provinsi = ucwords($data['provinsi']);
                    $provinsi = trim($provinsi);
                }
            }
                   
        } else {
            $errProvinsi = "";
        }

        if(!empty($data['telepon'])){
            $telepon = $data['telepon'];
            if(strlen($data['telepon']) < 3 ) {
                $errTelepon = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[0-9+]*$/", $data['telepon'])) {
                    $errTelepon = "*hanya angka, dan tanda + saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $telepon = ucwords($data['telepon']);
                    $telepon = trim($telepon);
                }
            }
        } else {
            $errTelepon = "";
        }

        if(!empty($data['hp'])){
            $hp = $data['hp'];
            if(strlen($data['hp']) < 3 ) {
                $errHp = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[0-9+]*$/", $data['hp'])) {
                    $errHp = "*hanya angka, dan tanda + saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $hp = ucwords($data['hp']);
                    $hp = trim($hp);
                }
            }
        } else {
            $errHp = "";
        }

        
        if(!empty($data['alamat'])) {
            $alamat = $data['alamat'];
        } else {
            $errAlamat = '';
        }
        
    } /// akhir block cek Input


    if($nid != '' && 
        $full_nama != '' &&
        $jenis_kl != '' &&
        $agama != '' &&
        $errTanggal_lahir == '' &&
        $errTempat_lahir == '' &&
        $errTelepon == '' &&
        $errHp == '' &&
        $errAlamat == '') {

        echo "data yang akan dimasukan kedalam database:".br;
        echo cekDataInsert($nid).br;
        echo cekDataInsert($full_nama).br;
        echo $jenis_kl.br;
        echo $agama.br;
        if(!empty($tanggal_lahir)) {
            echo cekDataInsert($tanggal_lahir).br;
        }
        if(!empty($tempat_lahir)) {
            echo cekDataInsert($tempat_lahir).br;
        }
        if(!empty($provinsi)){
            echo cekDataInsert($provinsi).br;
        }
        if(!empty($telepon)){
            echo cekDataInsert($telepon).br;
        }
        if(!empty($hp)){
            echo cekDataInsert($hp).br;
        }
        if(!empty($alamat)){
            echo cekDataInsert($alamat).br;
        }

        { // reset nilai input
            $nid='';

            $full_nama = '';

            $jenis_kl = "";
            $defaultKl = "selected";
            $laki = "";
            $perempuan = "";

            $agama = '';
            $Islam = '';
            $kristen = '';
            $hindu = '';
            $budha = '';
            $defaultAgama = 'selected';

            $tanggal_lahir = '';
            $hari_lahir = '';
            $bulan_lahir = '';
            $tahun_lahir = '';

            $tempat_lahir = '';

            $provinsi = '';

            $telepon = '';

            $hp = '';

            $alamat = '';

        } // akhir block reset input

    }

}


function cekDataInsert($data) {
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<script>
        $(document).ready(function(){
            $("[name=formTambahDosen]").submit(function(){
                $.ajax({
                    url: "<?php echo $_SERVER['PHP_SELF'];?>",
                    method: 'POST',
                    data: {
                        data:$(this).serialize()
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

<script> // SCRIPT JS SEKURITI TINGKAT TINGGI!!!!!
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>