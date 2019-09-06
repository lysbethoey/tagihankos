<?php 
session_start();

if($_SESSION['uname'] == ''){
	echo "<script>alert('Silahkan login!')</script>";
    echo "<script>window.location.href='index.php'</script>";

}
include "koneksi.php";
$query_mysql = mysql_query("SELECT * FROM user")or die(mysql_error());
$strHead = "";
$strBody = "";

$strHead = $strHead . "<thead>";
$strHead = $strHead . "<tr>";
$strHead = $strHead . "<th>No</th>";
$strHead = $strHead . "<th>Nama</th>";
$strHead = $strHead . "<th>Kamar</th>";
$strHead = $strHead . "<th>Bulan</th>";
$strHead = $strHead . "<th>Nominal</th>";
$strHead = $strHead . "<th>Opsi</th>";
$strHead = $strHead . "</tr>";		
$strHead = $strHead . "</thead>" ;
echo $strHead;

$strBody = $strBody . "<tbody>";
while($data = mysql_fetch_array($query_mysql)){

	$strBody = $strBody . "<tr>";
	$strBody = $strBody .	"<td>". $data['id'] . "</td>";
	$strBody = $strBody .	"<td>". $data['nama'] . "</td>";
	$strBody = $strBody .	"<td>". $data['kamar'] . "</td>";
	$strBody = $strBody .	"<td>". $data['bulan'] . "</td>";
	$strBody = $strBody .	"<td>". $data['nominal'] . "</td>";
	$strBody = $strBody .	"<td>";
	$strBody = $strBody .	"<a class='btn btn-warning btn-sm' onclick='detailData(".$data['id'].")'>Edit</a> &nbsp";
	$strBody = $strBody .	"<a class='btn btn-danger btn-sm' onclick='hapusData(".$data['id'].")'>Hapus</a>";
	$strBody = $strBody . "</td></tr>";

	
}
$strBody = $strBody . "</tbody";
echo $strBody;

?>