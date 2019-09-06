<?php 
include "koneksi.php";
$id = $_POST['id'];
$res = array();

$query_mysql = mysql_query("SELECT * FROM user where id = ".$id)or die(mysql_error());

while($data = mysql_fetch_array($query_mysql)){
	$res['id'] = $data['id'];
	$res['nama'] = $data['nama'];
	$res['kamar'] = $data['kamar'];
	$res['bulan'] = $data['bulan'];
	$res['nominal'] = $data['nominal'];
}

echo json_encode($res);

?>