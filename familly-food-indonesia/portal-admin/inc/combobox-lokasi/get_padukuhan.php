<?php
	include '../../functions/koneksi.php';
	$kelurahan = $_POST['kelurahan'];

	echo "<option value=''>--Pilih 1 Padukuhan--</option>";

	$Padukuhan = $pdo->query("SELECT * FROM padukuhan WHERE id_kelurahan='$kelurahan' ORDER BY nama_padukuhan ASC");
	while ($resultPadukuhan  = $Padukuhan->fetch(PDO::FETCH_ASSOC)) {
		echo "<option value='" . $resultPadukuhan['id_padukuhan'] . "'>" . $resultPadukuhan['nama_padukuhan'] . "</option>";
	}
?>