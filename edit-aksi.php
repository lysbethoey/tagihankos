<?php 
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$kamar = $_POST['kamar'];
$bulan = $_POST['bulan'];
$nominal = $_POST['nominal'];

if($id != "" && $nama != "" && $kamar != "" && $bulan != "" && $nominal != ""){
	mysql_query("UPDATE user SET nama = '$nama', kamar = '$kamar', bulan = '$bulan', nominal = '$nominal' WHERE id = ".$id);	
}
?>