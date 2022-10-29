<?php

	$data_deteksi_keyword = array();

	$jumlah_bank_keyword=0;
	$BankKeyword = $pdo->query("SELECT keyword FROM bank_keyword ORDER BY keyword ASC");
	while ($resultBankKeyword = $BankKeyword->fetch(PDO::FETCH_ASSOC)) {
		$data_bank_keyword[$jumlah_bank_keyword++] = strtolower($resultBankKeyword['keyword']);
	}

	function multiexplode($delimiters,$string) {
	    $ready = str_replace($delimiters, $delimiters[0], $string);
	    $launch = explode($delimiters[0], $ready);
	    return $launch;
	}

	function prosesDeteksiKeywordJudul($data_bank_keyword, $jumlah_bank_keyword, $data_keyword, $jumlah_data_keyword){
		global $jumlah_data_deteksi_keyword;
		global $data_deteksi_keyword;
		$jumlah_data_deteksi_keyword=0;

		for ($i=0; $i < $jumlah_data_keyword; $i++) { 
			for ($j=0; $j < $jumlah_bank_keyword; $j++) {
				if (strtolower($data_keyword[$i])==$data_bank_keyword[$j]) {
					$data_deteksi_keyword[$jumlah_data_deteksi_keyword++] = $data_keyword[$i];
				}
			}
		}
	}

	function jumlahDataDeteksiKeywordJudul(){
		global $jumlah_data_deteksi_keyword;
		return $jumlah_data_deteksi_keyword;
	}

	function prosesDeteksiKeyword($data_bank_keyword, $jumlah_bank_keyword, $data_keyword, $jumlah_data_keyword){
		global $jumlah_data_deteksi_keyword;
		global $data_deteksi_keyword;
		$jumlah_data_deteksi_keyword=0;

		for ($i=0; $i < $jumlah_data_keyword; $i++) { 
			for ($j=0; $j < $jumlah_bank_keyword; $j++) {
				if (strtolower($data_keyword[$i])==$data_bank_keyword[$j]) {
					$data_deteksi_keyword[$jumlah_data_deteksi_keyword++] = $data_keyword[$i];
				}
			}
		}
	}

	function jumlahDataDeteksiKeyword(){
		global $jumlah_data_deteksi_keyword;
		return $jumlah_data_deteksi_keyword;
	}