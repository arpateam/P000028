<?php

	if($_GET['module']=='dashboard'){
		include("inc/dashboard.php");
	}elseif($_GET['module']=='data-admin'){
		include("inc/admin-data.php");
	}elseif($_GET['module']=='pengaturan'){
		include("inc/settings.php");
	}elseif($_GET['module']=='kasir'){
		include("inc/kasir.php");
	}elseif($_GET['module']=='menunggu-konfirmasi'){
		include("inc/menunggu-konfirmasi.php");
	}elseif($_GET['module']=='sedang-diproses'){
		include("inc/sedang-diproses.php");
	}elseif($_GET['module']=='sedang-dikirim'){
		include("inc/sedang-dikirim.php");
	}elseif($_GET['module']=='pesanan-selesai'){
		include("inc/pesanan-selesai.php");
	}elseif($_GET['module']=='produk'){
		include("inc/produk.php");
	}elseif($_GET['module']=='blog'){
		include("inc/blog.php");
	}elseif($_GET['module']=='testimoni'){
		include("inc/testimoni.php");
	}elseif($_GET['module']=='halaman'){
		include("inc/pages.php");
	}elseif($_GET['module']=='sitemap-one'){
		include("inc/sitemap1.php");
	}
	
	else{
		include("inc/logout-edit.php");
		// var_dump($_GET);
	}