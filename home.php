<?php
session_start();

if($_SESSION['uname'] == ''){
	echo "<script>alert('Silahkan login!')</script>";
    echo "<script>window.location.href='index.php'</script>";

}

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<title>KosAku - Pencatatan Pembayaran Kos</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">		
		<h1>KosAku</h1>
		<h2>Pencatatan Pembayaran Kos</h2>
	</div>
	<br/>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <!--<form action="input-aksi.php" method="post">-->		
				<table class="table">
					<tr>
						<input type="hidden" name="id" id="inputId">
						<td>Nama</td>
						<td><input type="text" name="nama" id="inputNama"></td>					
					</tr>	
					<tr>
						<td>Kamar</td>
						<td><input type="text" name="kamar" id="inputKamar"></td>					
					</tr>	
					<tr>
						<td>Bulan</td>
						<td><input type="text" name="bulan" id="inputBulan"></td>					
					</tr>	
					<tr>
						<td>Nominal</td>
						<td><input type="number" name="nominal" id="inputNominal"></td>					
					</tr>	
					<tr>
						<td></td>
						<td><button class="btn btn-success btn-sm" value="Simpan"  data-dismiss="modal" onclick="submitForm()">Submit</button></td>					
					</tr>				
				</table>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<div class="container">
		<div class="col-md-6">
			<button type="button" class="btn btn-success btn-sm" onclick="addDataModal()">+ Tambah Data</button>
		</div>

		<div class="col-md-6 form-inline" align="right">
			<input type="text" class="form-control" id="cariNama">
			<button type="button" class="btn btn-primary btn-sm" onclick="cariData()">Cari Data</button>
		</div>

		<div class="col-md-12">
			<h3>Data user</h3>
			<table border="1" class="table table-striped tampildata">
			</table>
			
		</div>

	</div>
	
</body>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script>

	function cariData(){
		var inputNama = $("#cariNama").val();

		$.ajax({
			type: 'POST',
			url: "tampilbynama.php",
			data: {
				nama : inputNama
			},
			success: function(response) {

				$('.tampildata').html(response);
			}
		});
	}

	function addDataModal(){
		$("#inputId").val("");
		$("#inputNama").val("");
		$("#inputKamar").val("");
		$("#inputBulan").val("");
		$("#inputNominal").val("");

		$('#myModal').modal('show');
	}

	function tampilData(){
		$.ajax({
			type: 'GET',
			url: "tampil.php",
			data: "",
			success: function(response) {

				$('.tampildata').html(response);
			}
		});
	}

	function submitForm(){
		var inputId = $("#inputId").val();
		var inputNama = $("#inputNama").val();
		var inputKamar = $("#inputKamar").val();
		var inputBulan = $("#inputBulan").val();
		var inputNominal = $("#inputNominal").val();

		if(inputId < 1){
			$.ajax({
				type: 'POST',
				url: "input-aksi.php",
				data: {
					nama : inputNama,
					kamar : inputKamar,
					bulan : inputBulan,
					nominal : inputNominal
				},
				success: function(response) {
					tampilData();
				}
			});
		}

		else{
			$.ajax({
				type: 'POST',
				url: "edit-aksi.php",
				data: {
					id: inputId,
					nama : inputNama,
					kamar : inputKamar,
					bulan : inputBulan,
					nominal : inputNominal
				},
				success: function(response) {
					tampilData();
				}
			});
		}
	}

	function hapusData(inputId){
		$.ajax({
			type: 'POST',
			url: "hapus.php",
			data: {
				id : inputId
			},
			success: function(response) {

				tampilData();
			}
		});
	}

	function detailData(inputId){

		$.ajax({
			type: 'POST',
			url: "detail.php",
			data: {
				id : inputId
			},
			success: function(response) {
				var res = jQuery.parseJSON(response);

				$("#inputId").val(res['id']);
				$("#inputNama").val(res['nama']);
				$("#inputKamar").val(res['kamar']);
				$("#inputBulan").val(res['bulan']);
				$("#inputNominal").val(res['nominal']);

				$('#myModal').modal('show');
			}
		});
	}

	$(document).ready(function(){
		tampilData();

	});
</script>
</html>