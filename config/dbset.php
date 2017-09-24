<?php
$host = "localhost";
$userdb = "root";
$pass = "";
$dbnama = "grading_system_belajar";

try {
    $kon = new PDO("mysql:host=$host;dbname=$dbnama", $userdb, $pass);
    $kon -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: ".$e -> getMessage();
}

function cekData($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

?>