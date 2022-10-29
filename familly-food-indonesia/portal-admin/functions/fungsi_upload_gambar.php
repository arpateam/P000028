<?php

function fileWajib($name_file){

	if(empty($name_file)){
		$_SESSION['_msg__'] = 'fileWajib';
		echo "<script>window.location(history.back(-1))</script>";
		exit();
	}

}

function cekFile($type_file){

	if ($type_file!="image/jpg" AND $type_file!="image/jpeg" AND $type_file!="image/png" AND $type_file!="application/pdf"){
		$_SESSION['_msg__'] = 'cekFile';
		echo "<script>window.location(history.back(-1))</script>";
		exit();
	}

}

function cekUkuranFile2mb($file_size){

	if($file_size>2000000 OR $file_size<=0){
		$_SESSION['_msg__'] = 'GagalUploadFile';
		echo "<script>window.location(history.back(-1))</script>";
		exit();
	}

}

function uploadGambarAsli($name_file, $type_file, $location_file, $location_upload){
	
	//direktori gambar
	$vfile_upload 	= $location_upload.$name_file;

	// Simpan gambar dalam ukuran sebenarnya
	move_uploaded_file($location_file, $vfile_upload);
	
}