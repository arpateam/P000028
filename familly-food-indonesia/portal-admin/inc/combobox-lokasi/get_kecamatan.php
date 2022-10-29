<?php
	include '../../functions/koneksi.php';

	echo "<option value=''>--Pilih 1 Kecamatan--</option>";

	$Kecamatan = $pdo->query("SELECT * FROM kecamatan ORDER BY nama_kecamatan ASC");
	while ($resultKecamatan  = $Kecamatan->fetch(PDO::FETCH_ASSOC)) {
		echo "<option value='" . $resultKecamatan['no_kecamatan'] . "'>" . $resultKecamatan['nama_kecamatan'] . "</option>";
	}
?>