<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
$kamar = $_POST['kamar'];
$bulan = $_POST['bulan'];
$nominal = $_POST['nominal'];

if($nama != "" && $kamar != "" && $bulan != "" && $nominal != ""){
	mysql_query("INSERT INTO user (nama, kamar, bulan, nominal) VALUES('$nama','$kamar','$bulan','$nominal')");	
}
?>