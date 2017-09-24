<?php
date_default_timezone_set("Asia/Jakarta");
define("br", "<br/>", true);

{ $errNis = "";
    $errFull_nama = "";
    $errAgama = "";
    $errJenis_kl = "";
    $errTahun_masuk = "";
    $errTanggal_masuk = "";
    $errTanggal_lahir = "";
    $errTempat_lahir = "";
    $errProvinsi = "";
    $errAsal_smu = "";
    $errTelepon = "";
    $errHp = "";
    $errAlamat = "";

    $nis = "";
    $full_nama = "";

    $jenis_kl = "";
    $defaultKl = "selected";
    $laki = "";
    $perempuan = "";

    $agama = "";
    $Islam = "";
    $kristen = "";
    $hindu = "";
    $budha = ""; 
    $defaultAgama = "selected";

    $tahun_masuk = "";
    $tanggal_masuk = "";
    $hari_masuk = "";
    $bulan_masuk = "";

    $tanggal_lahir = "";
    $hari_lahir = "";
    $bulan_lahir = "";
    $tahun_lahir = "";

    $tempat_lahir = "";
    $provinsi = "";
    $asal_smu = "";
    $telepon = "";
    $hp = "";
    $alamat = "";
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nis"])) {
        $errNis = "Nis harus di isi";
    } else {
        if(!preg_match("/^[0-9]*$/", $_POST["nis"])) {
            $errNis = "Hanya angka saja yang di izinkan";
        } else {
            $file = require_once('../../config/dbset.php');
            
            $que = "SELECT nis FROM siswa WHERE nis=:nis";
            $tugas = $kon->prepare($que);
            $tugas->bindParam(':nis', $nis);
            $nis = $_POST['nis'];
            $tugas->execute();
            $cekNis = $tugas->rowCount();
            if ($cekNis == 1) {
                $errNis = "$nis sudah ada silahkan gunakan yang lain";
                $nis='';
            }else {
                $nis = cekDataInsert($_POST["nis"]);
            }
            
            $file = null;
        }
    }

    if(empty($_POST["full_nama"])) {
        $errFull_nama = "Nama harus di isi";
    } else {
        if(!preg_match("/^[a-zA-Z' ]*$/", $_POST["full_nama"])) {
            $errFull_nama = "Hanya huruf sepasi dan tanda <b>'</b> saja yang di izinkan";
        } else {
            $full_nama = ucwords($_POST["full_nama"]);
            $full_nama = trim($full_nama);
        }
    }

    if(empty($_POST["jenis_kl"])) {
        $errJenis_kl = "Jenis kelamin harus di pilih";
    } else {
        $jenis_kl = $_POST["jenis_kl"];

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

    if(empty($_POST["agama"])) {
        $errAgama = "Agama harus di pilih";
    } else {
        $agama = $_POST["agama"];
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

    if(empty($_POST["tahun_masuk"])) {
        $errTahun_masuk = "Tahun masuk harus di isi";
    } else {
         if(!preg_match("/^[0-9]*$/", $_POST["nis"])) {
            $errTahun_masuk = "Hanya angka saja yang di izinkan";
        } else {
            if(strlen($_POST["tahun_masuk"]) > 4) {
                $errTahun_masuk = "Tahun masuk tidak boleh lebih dari 4 karakter";
            } elseif($_POST["tahun_masuk"] > date("Y") ) {
                $errTahun_masuk = "Tahun masuk tidak boleh lebih dari ".date("Y");
            } elseif ($_POST["tahun_masuk"] < 1969) {
                $errTahun_masuk = "Tahun masuk tidak boleh lebih kecil dari 1969";
            } else {
                $tahun_masuk = cekDataInsert($_POST["tahun_masuk"]);
            }
        }
    }

    if($tahun_masuk != "") {
        if(isset($_POST["tanggal_masuk"])) {
           if($_POST["tanggal_masuk"]["bulan_masuk"] != "" && $_POST["tanggal_masuk"]["hari_masuk"] != "" ) {
                $hari_masuk = $_POST["tanggal_masuk"]["hari_masuk"];
                $bulan_masuk = $_POST["tanggal_masuk"]["bulan_masuk"];
                if (strlen($_POST["tanggal_masuk"]["bulan_masuk"]) > 2 && strlen($_POST["tanggal_masuk"]["hari_masuk"]) > 2 ) {
                    $errTanggal_masuk = "*Hari atau Bulan masuk tidak boleh lebih dari 2 karakter";
                } elseif(!preg_match("/^[0-9]*$/", $_POST["tanggal_masuk"]["bulan_masuk"]) && !preg_match("/^[0-9]*$/", $_POST["tanggal_masuk"]["hari_masuk"]) ) {
                    $errTanggal_masuk = "*hari dan bulan harus angka";
                } elseif(!preg_match("/^[0-9]*$/", $_POST["tanggal_masuk"]["bulan_masuk"])) {
                    $errTanggal_masuk = "*bulan harus angka";
                } elseif(!preg_match("/^[0-9]*$/", $_POST["tanggal_masuk"]["hari_masuk"])) {
                    $errTanggal_masuk = "*hari harus angka";
                } elseif($_POST["tanggal_masuk"]["bulan_masuk"] > 12 && $_POST["tanggal_masuk"]["hari_masuk"] > 31){
                    $errTanggal_masuk = "*bulan harus kurang dari 12 dan hari harus kurang dari 31";
                } elseif($_POST["tanggal_masuk"]["bulan_masuk"] > 12){
                    $errTanggal_masuk = "*bulan harus kurang dari 12";
                } elseif($_POST["tanggal_masuk"]["hari_masuk"] > 31){
                    $errTanggal_masuk = "*hari harus kurang dari 31";
                } else {
                    $bulan_masuk = cekDataInsert($_POST["tanggal_masuk"]["bulan_masuk"]);
                    $hari_masuk = cekDataInsert($_POST["tanggal_masuk"]["hari_masuk"]);
                    $tanggal_masuk = mktime(null,null,null, $bulan_masuk, $hari_masuk, $tahun_masuk);
                    $tanggal_masuk =  date("Y-m-d", $tanggal_masuk);
                }
           } elseif($_POST["tanggal_masuk"]["bulan_masuk"] == "" && $_POST["tanggal_masuk"]["hari_masuk"] == ""){
               $errTanggal_masuk = "";
           } elseif ($_POST["tanggal_masuk"]["bulan_masuk"] == "" || $_POST["tanggal_masuk"]["hari_masuk"] == "") {
                $hari_masuk = $_POST["tanggal_masuk"]["hari_masuk"];
                $bulan_masuk = $_POST["tanggal_masuk"]["bulan_masuk"];
                $errTanggal_masuk = "*lengkapi hari atau bulan untuk proses memasukan data, jika tidak ada harap kosongkan";
           }
        }
    }

    if(isset($_POST["tanggal_lahir"])) {
        $hari_lahir = $_POST["tanggal_lahir"]["hari_lahir"];
        $bulan_lahir = $_POST["tanggal_lahir"]["bulan_lahir"];
        $tahun_lahir = $_POST["tanggal_lahir"]["tahun_lahir"];

        switch($_POST["tanggal_lahir"]) {
            case $_POST["tanggal_lahir"]["hari_lahir"] != "" && $_POST["tanggal_lahir"]["bulan_lahir"] != "" && $_POST["tanggal_lahir"]["tahun_lahir"] != "" :
            switch ($_POST["tanggal_lahir"]) {
                case strlen($_POST["tanggal_lahir"]["bulan_lahir"]) > 2 || strlen($_POST["tanggal_lahir"]["hari_lahir"]) > 2 || strlen($_POST["tanggal_lahir"]["tahun_lahir"]) > 4 :
                $errTanggal_lahir = "*hari, bulan, dan tahun tidak boleh dari 2 karakter, 4 karakter untuk tahun, jika tidak ada harap kosongkan";
                break;
                case !preg_match("/^[0-9]*$/", $_POST["tanggal_lahir"]["bulan_lahir"]) || !preg_match("/^[0-9]*$/", $_POST["tanggal_lahir"]["hari_lahir"]) || !preg_match("/^[0-9]*$/", $_POST["tanggal_lahir"]["tahun_lahir"]) :
                $errTanggal_lahir = "*hari, bulan, dan tahun harus angka, jika tidak harap kosongkan";
                break;
                case $_POST["tanggal_lahir"]["hari_lahir"] > 31 || $_POST["tanggal_lahir"]["bulan_lahir"] > 12 || $_POST["tanggal_lahir"]["tahun_lahir"] > (date("Y")-15) :
                $errTanggal_lahir = "*hari, bulan tidak boleh lebih dari 31 dan 12, dan tahun tidak boleh lebih dari ".(date("Y")-15).", jika tidak harap kosongkan";
                break;
                case $_POST["tanggal_lahir"]["tahun_lahir"] < (date("Y")-70) :
                $errTanggal_lahir = "*tahun tidak boleh kurang dari ".(date("Y")-70)." jika tidak harap kosongkan tanggal lahir";
                break;
                default :
                $bulan_masuk = cekDataInsert($_POST["tanggal_lahir"]["bulan_lahir"]);
                $hari_masuk = cekDataInsert($_POST["tanggal_lahir"]["hari_lahir"]);
                $tahun_lahir = cekDataInsert($_POST["tanggal_lahir"]["tahun_lahir"]);
                $tanggal_lahir = mktime(null,null,null, $bulan_lahir, $hari_lahir, $tahun_lahir);
                $tanggal_lahir =  date("Y-m-d", $tanggal_lahir);
            }
            break;
            case $_POST["tanggal_lahir"]["hari_lahir"] == "" && $_POST["tanggal_lahir"]["bulan_lahir"] == "" && $_POST["tanggal_lahir"]["tahun_lahir"] == "" :
            $errTanggal_lahir = "";
            break;
            case $_POST["tanggal_lahir"]["hari_lahir"] == "" || $_POST["tanggal_lahir"]["bulan_lahir"] == "" || $_POST["tanggal_lahir"]["tahun_lahir"] == "" :
            $errTanggal_lahir = "*lengkapi hari, bulan, dan tahun untuk proses memasukan data, jika tidak harap kosongkan";
            break;
        }
    }

    if(isset($_POST["tempat_lahir"])) {
        if($_POST["tempat_lahir"] != "") {
            $tempat_lahir = $_POST["tempat_lahir"];
            if(strlen($_POST["tempat_lahir"]) < 3 ) {
                $errTempat_lahir = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
                } else {
                    if(!preg_match("/^[a-zA-Z ]*$/", $_POST["tempat_lahir"])) {
                        $errTempat_lahir = "Hanya huruf, sepasi saja yang di izinkan, jika tidak harap kosongkan";
                    } else {
                        $tempat_lahir = ucwords($_POST["tempat_lahir"]);
                        $tempat_lahir = trim($tempat_lahir);
                    }
            }
        } else {
            $errTempat_lahir = "";
        }
    }

    if(isset($_POST["provinsi"])) {
        if($_POST["provinsi"] != ""){
            $provinsi = $_POST["provinsi"];
            if(strlen($_POST["provinsi"]) < 3 ) {
                $errProvinsi = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[a-zA-Z ]*$/", $_POST["provinsi"])) {
                    $errProvinsi = "Hanya huruf, sepasi saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $provinsi = ucwords($_POST["provinsi"]);
                    $provinsi = trim($provinsi);
                }
            }
                   
        } else {
            $errProvinsi = "";
        }
    }

    if(isset($_POST["asal_smu"])){
        if($_POST["asal_smu"] != "" ){
            $asal_smu = $_POST["asal_smu"];
            if(strlen($_POST["asal_smu"]) < 3 ) {
                $errAsal_smu = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[a-zA-Z0-9 ]*$/", $_POST["asal_smu"])) {
                    $errProvinsi = "Hanya huruf, angka, dan spasi saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $asal_smu = ucwords($_POST["asal_smu"]);
                    $asal_smu = trim($asal_smu);
                }
            }
        } else {
            $errAsal_smu = "";
        }  
    }

    if(isset($_POST["telepon"])) {
        if(!empty($_POST["telepon"])){
            $telepon = $_POST["telepon"];
            if(strlen($_POST["telepon"]) < 3 ) {
                $errTelepon = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[0-9+]*$/", $_POST["telepon"])) {
                    $errTelepon = "*hanya angka, dan tanda + saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $telepon = ucwords($_POST["telepon"]);
                    $telepon = trim($telepon);
                }
            }
        } else {
            $errTelepon = "";
        }
    }

    if(isset($_POST["hp"])) {
        if(!empty($_POST["hp"])){
            $hp = $_POST["hp"];
            if(strlen($_POST["hp"]) < 3 ) {
                $errHp = "*Inputan tidak boleh kurang dari 3 character, jika tidak harap kosongkan";
            } else { 
                if(!preg_match("/^[0-9+]*$/", $_POST["hp"])) {
                    $errHp = "*hanya angka, dan tanda + saja yang di izinkan, jika tidak harap kosongkan";
                } else {
                    $hp = ucwords($_POST["hp"]);
                    $hp = trim($hp);
                }
            }
        } else {
            $hp = "";
        }
    }
    if(isset($_POST["alamat"])) {
        if(!empty($_POST["alamat"])) {
            $alamat = $_POST["alamat"];
        } else {
            $errAlamat = "";
        }
    }

    if($nis !="" && 
        $full_nama != "" && 
        $jenis_kl != "" && 
        $agama != "" && 
        $tahun_masuk != "" &&
        $errNis == "" &&
        $errFull_nama == "" &&
        $errJenis_kl == "" &&
        $errAgama == "" &&
        $errTahun_masuk == "" &&
        $errTanggal_masuk == "" &&
        $errTanggal_lahir == "" &&
        $errTempat_lahir == "" &&
        $errProvinsi == "" && 
        $errAsal_smu == "" &&
        $errTelepon == "" &&
        $errHp == "" &&
        $errAlamat == "") {

        $full_nama = cekDataInsert($full_nama);
        if ($tempat_lahir != ""){
            $tempat_lahir = cekDataInsert($tempat_lahir);
        }
        if($provinsi != "") {
            $provinsi = cekDataInsert($provinsi);
        }
        if($asal_smu != "") {
            $asal_smu = cekDataInsert($asal_smu);
        }
        if($telepon != "") {
            $telepon == cekDataInsert($telepon);
        }
        if($hp != "") {
            $hp = cekDataInsert($hp);
        }
        if($alamat != ""){
            $alamat = cekDataInsert($alamat);
        }

        echo "data yang akan di masukan ke dalam database:".br;
        echo $nis.br;
        echo $full_nama.br;
        echo $jenis_kl.br;
        echo $agama.br;
        echo $tahun_masuk.br;
        if ($tanggal_masuk != "") {
            //$tanggal_masuk = strtotime($tanggal_masuk);
            //echo date("d-M-Y", $tanggal_masuk).br ;
            echo $tanggal_masuk;
        }
        if($tanggal_lahir != ""){
           // $tanggal_lahir = strtotime($tanggal_lahir);
            //echo date("d-M-Y", $tanggal_lahir).br;
            echo $tanggal_lahir;
        }
        echo $tempat_lahir.br;
        echo $provinsi.br;
        echo $asal_smu.br;
        echo $telepon.br;
        echo $hp.br;
        echo $alamat.br;

        /* MODEL model DISINI */
        require_once('../../_models/role_01_admin_model/tambah_siswa_model.php');
        
        $nis = "";
        $full_nama = "";

        $jenis_kl = "";
        $defaultKl = "selected";
        $laki = "";
        $perempuan = "";

        $agama = "";
        $Islam = "";
        $kristen = "";
        $hindu = "";
        $budha = "";
        $defaultAgama = "selected";

        $tahun_masuk = "";
        $tanggal_masuk = "";
        $hari_masuk = "";
        $bulan_masuk = "";

        $tanggal_lahir = "";
        $hari_lahir = "";
        $bulan_lahir = "";
        $tahun_lahir = "";

        $tempat_lahir = "";
        $provinsi = "";
        $asal_smu = "";
        $telepon = "";
        $hp = "";
        $alamat = "";
    } 
}


function cekDataInsert($data) {
    $data = trim($data);
    $data = addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
<script src="_asset/js/public_js.js">//made home</script>
<script> // made home
    $(document).ready(function(){
        $("[name=formTambahSiswa]").submit(function(){
            var nis = $("[name=nis]").val();
            var full_nama = $("[name=full_nama]").val();
            var jenis_kl = $("[name=jenis_kl]").val();
            var agama = $("[name=agama]").val();
            var tahun_masuk = $("[name=tahun_masuk]").val();
            var tanggal_masuk = {
                hari_masuk:$("[name=hari_masuk]").val(), 
                bulan_masuk:$("[name=bulan_masuk]").val()
            }
            var tanggal_lahir = {
                hari_lahir: $("[name=hari_lahir]").val(),
                bulan_lahir:$("[name=bulan_lahir]").val(),
                tahun_lahir:$("[name=tahun_lahir]").val()
            }
            var tempat_lahir = $("[name=tempat_lahir]").val();
            var provinsi = $("[name=provinsi]").val();
            var asal_smu = $("[name=asal_smu]").val();
            var telepon = $("[name=telepon]").val();
            var hp = $("[name=hp]").val();
            var alamat = $("[name=alamat]").val();
            /* $.post("role_01_admin/tambah_siswa.php", {
                nis : nis,
                full_nama : full_nama,
                jenis_kl : jenis_kl,
                agama : agama,
                tahun_masuk : tahun_masuk,
                tanggal_masuk : tanggal_masuk, 
                tanggal_lahir : tanggal_lahir,
                tempat_lahir : tempat_lahir,
                provinsi : provinsi,
                asal_smu : asal_smu,
                telepon : telepon,
                hp : hp,
                alamat : alamat,
            }, function(data){
                $("#indexAdmin").html(data);
            }); */

            $.ajax({
                url: "_views/role_01_admin_view/tambah_siswa.php",
                data: {
                    nis : nis,
                    full_nama : full_nama,
                    jenis_kl : jenis_kl,
                    agama : agama,
                    tahun_masuk : tahun_masuk,
                    tanggal_masuk : tanggal_masuk, 
                    tanggal_lahir : tanggal_lahir,
                    tempat_lahir : tempat_lahir,
                    provinsi : provinsi,
                    asal_smu : asal_smu,
                    telepon : telepon,
                    hp : hp,
                    alamat : alamat,
                }, 
                method : "POST",
                
            }).done(function(data){
                $("#indexAdmin").html(data);
            });
            // $.ajax({}).done();

        });

        { //input data
            if($("[name=nis]").val() == "") {
                $("[name=nis]").focus();
            } else {
                if($("[name=full_nama]").val() == ""){
                    $("[name=full_nama]").focus();
                } else {
                    if($("[name=jenis_kl]").val() == "") {
                        $("[name=jenis_kl]").focus();
                    } else {
                        if($("[name=agama]").val() == "" ) {
                            $("[name=agama]").focus();
                        } else {
                            if($("[name=tahun_masuk]").val() == "") {
                                $("[name=tahun_masuk]").focus();
                            }
                        }
                    }
                }
            }
            
            $("[name=nis]").on({
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

            $("[name=tahun_masuk]").on({
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
                    if(nilai > <?php echo date("Y"); ?>) {
                        $(this).val(<?php echo date("Y"); ?>);
                    }

                    $("[name=thn_masuk]").text($(this).val());
                    $("[name=thn_masuk]").removeClass("w3-opacity");
                    if ($(this).val() == "") {
                        $("[name=thn_masuk]").text("Tahun");
                        $("[name=thn_masuk]").addClass("w3-opacity");
                    }
                }, 
                focusout : function() {
                    var nilai = $(this).val();
                    if (nilai != "") {
                        if(nilai < 1969) {
                            $(this).val(1969);
                            $("[name=thn_masuk]").text(1969);
                        }
                    }
                },
            });

            $("[name=thn_masuk]").text(function(){
                if($("[name=tahun_masuk]").val() == ""){
                    return "Tahun";
                } else {
                    $(this).removeClass("w3-opacity");
                    return $("[name=tahun_masuk]").val();
                }
            });

            $("[name=hari_masuk]").on({
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

            $("[name=bulan_masuk]").on({
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

            $("[name=asal_smu]").on({
                keypress : function(evt){
                    var theEvent = evt || window.event;
                    var key = theEvent.keyCode || theEvent.which;
                    key = String.fromCharCode( key );
                    var regex = /[a-z|A-Z|0-9|\n\r\b]|\ /;
                    if( !regex.test(key) ) {
                        theEvent.returnValue = false;
                        if(theEvent.preventDefault) theEvent.preventDefault();
                    }
                },
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

<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>