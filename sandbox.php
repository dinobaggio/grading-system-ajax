<?php

if(isset($_POST['nis'])) {
    echo $_POST['nis'];
}

$nis = 'res';
?>

<script src="_asset/js/jquery-3.2.1.js"></script>
<script>

$.ajax({
    url: 'sandbox.php',
    method: 'post',
    data: {
        nis: '<?php echo $nis;?>'
    },
    success:function(data){
        $("#wew").html(data);
    }
});

</script>

<div id="wew"></div>