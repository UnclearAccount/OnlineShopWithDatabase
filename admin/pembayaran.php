<center><h2>Data Pembayaran</h2></center>
<?php

//mendapatkan id pembelian dari url
$id_pembelian=$_GET['id'];
//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian ='$id_pembelian'");
$detail = $ambil->fetch_assoc();

 ?>

 <div class="roq">
 	<div class="col-md-6">
 		<table class="table">
 			<tr>
 				<th>NAMA</th>
 				<td><?php echo $detail['nama'] ?></td>
 			</tr>
 			<tr>
 				<th>BANK</th>
 				<td><?php echo $detail['bank'] ?></td>
 			</tr>
 			<tr>
 				<th>JUMLAH</th>
 				<td><?php echo number_format($detail['jumlah']) ?></td>
 			</tr>
 			<tr>
 				<th>TANGGAL</th>
 				<td><?php echo $detail['tanggal'] ?></td>
 			</tr>
 		</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
 	</div>
 	<form method="POST">
 		<div class="form-group">
 			<label>No Resi Pengiriman</label>
 			<input type="text" class="form-control" name="resi">
 		</div>
 		<div class="form-group">
 			<label>Status</label>
 			<select class="form-control" name="status">
 				<option value="">Pilih Status</option>
 				<option value="lunas">Lunas</option>
 				<option value="barang dikirim">Barang Dikirim</option>
 				<option value="batal">Batal</option>
 			</select>
 		</div>
 		<button class="btn btn-primary" name="proses">Proses</button>
 	</form>

 	<?php 

 	if (isset($_POST['proses'])) 
 	{
 		$resi = $_POST["resi"];
 		$status = $_POST["status"];
 		$koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status'
 			WHERE id_pembelian='$id_pembelian'");

 		echo "<script>alert('Data Pembelian Ter-Update');</script>";
		echo "<script>location='index.php?halaman=pembelian';</script>";
 	}

 	 ?>

 </div>