<?php
define('br', '<br/>', true);
{
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
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array();
    parse_str($_POST['data'], $data);

    if(empty($data["nid"])) {
        $errNid = "Nid harus di isi";
    } else {
        $nid = $data['nid'];
        if(!preg_match("/^[0-9]*$/", $data["nid"])) {
            $errNid = "Hanya angka saja yang di izinkan";
        } else {
            $nid = cekDataInsert($data["nid"]);
        }
    }

    if(empty($data['full_nama'])) {
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

    if(empty($data["jenis_kl"])) {
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

    if(empty($data["agama"])) {
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

    if($nid != '' && 
        $full_nama != '' &&
        $jenis_kl != '' &&
        $agama != '') {

        echo "data yang akan dimasukan kedalam database:".br;
        echo cekDataInsert($nid).br;
        echo cekDataInsert($full_nama).br;
        echo $jenis_kl.br;
        echo $agama.br;

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





<script>
    if (document.getElementById("ajaxIndex") == null) {
        window.open("../index.php","_self")
    }
</script>