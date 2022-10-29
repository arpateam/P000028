<?php
	include '../../functions/koneksi.php';
	$kecamatan = $_POST['kecamatan'];

	echo "<option value=''>--Pilih 1 Kelurahan--</option>";

	$Kelurahan = $pdo->query("SELECT * FROM kelurahan WHERE no_kecamatan='$kecamatan' ORDER BY nama_kelurahan ASC");
	while ($resultKelurahan  = $Kelurahan->fetch(PDO::FETCH_ASSOC)) {
		echo "<option value='" . $resultKelurahan['id_kelurahan'] . "'>" . $resultKelurahan['nama_kelurahan'] . "</option>";
	}
?>