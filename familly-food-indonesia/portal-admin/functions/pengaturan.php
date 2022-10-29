<?php

	$pengaturan = $pdo->query("SELECT id_pengaturan, nama, deskripsi, gambar FROM pengaturan ORDER BY id_pengaturan ASC");
	while($tpengaturan = $pengaturan->fetch(PDO::FETCH_ASSOC)) {

		if ($tpengaturan['id_pengaturan'] == 0) {
			$arrayWeb 	= explode(",", $tpengaturan['deskripsi']);
			$namaWeb	= $arrayWeb[0];
			$seoWeb		= $arrayWeb[1];
			$linkWeb1	= $arrayWeb[2];
			$linkWeb2 	= $arrayWeb[3];
			$author 	= $arrayWeb[4];
			$namaEmail_e 	= $arrayWeb[5];
			$email_ee		= $arrayWeb[6];
			$host_e			= $arrayWeb[7];
			$password_e 	= $arrayWeb[8];
			$port_e 		= $arrayWeb[9];
			$site_key_reCAPTCHA 	= $arrayWeb[10];
			$secret_key_reCAPTCHA 	= $arrayWeb[11];
		}elseif ($tpengaturan['id_pengaturan'] == 1) {
			$iconWebsite		= $tpengaturan['gambar'];
		}elseif ($tpengaturan['id_pengaturan'] == 2) {
			$logoVersiDesktop		= $tpengaturan['gambar'];
			$judulLogoVersiDesktop	= $tpengaturan['nama'];
		}elseif ($tpengaturan['id_pengaturan'] == 3) {
			$logoVersiMobile		= $tpengaturan['gambar'];
			$judulLogoVersiMobile	= $tpengaturan['nama'];
		}elseif ($tpengaturan['id_pengaturan'] == 4) {
			$nomorWhatsApp		= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 5) {
			$nomorTelpSms		= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 6) {
			$linkInstagram		= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 7) {
			$linkFacebook		= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 8) {
			$linkTwitter		= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 9) {
			$linkYouTube		= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 10) {
			$email				= $tpengaturan['deskripsi'];
			$email_e			= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 11) {
			$googleMaps			= $tpengaturan['deskripsi'];
		}elseif ($tpengaturan['id_pengaturan'] == 12) {
			$banner				= $tpengaturan['gambar'];
			$judulBanner		= $tpengaturan['nama'];
		}elseif ($tpengaturan['id_pengaturan'] == 13) {
			$Gambarprogress	 		= $tpengaturan['gambar'];
			$judulGambarprogress 	= $tpengaturan['nama'];
		}elseif ($tpengaturan['id_pengaturan'] == 14) {
			$Alamat				= $tpengaturan['deskripsi'];
		}

	}

?>