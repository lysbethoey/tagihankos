<?php 
include 'koneksi.php';
$id = $_POST['id'];
mysql_query("DELETE FROM user WHERE id='$id'")or die(mysql_error());

?>