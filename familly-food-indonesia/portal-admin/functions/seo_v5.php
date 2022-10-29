<?php

if(($_GET['module']=='home') OR ($_GET['module']=='page')){
	$tseo = $pdo->query("SELECT id_page, title, keyword, description FROM page WHERE id_page='$_GET[id]'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);
	
	$title = "Informasi $seo[title] - ceerduad.com";
	$keyword = "$seo[keyword]";
	$description = "$seo[description]";
	
	$imageshare = "assets/img/default-share.jpg";
	$urlshare = $linkWeb1;
}elseif($_GET['module']=='topik'){
	$tseo = $pdo->query("SELECT id_page, view FROM page WHERE id_page='$_GET[id]'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$Topik = $pdo->query("SELECT topik, link_topik_artikel, keyword, description FROM topik_artikel WHERE link_topik_artikel='$_GET[link_topik]'");
	$tTopik = $Topik->fetch(PDO::FETCH_ASSOC);

	$title = "Berita dan Informasi Terkini Tentang $tTopik[topik] Hari Ini - Kabar Terbaru Terkini | $linkWeb3";
	$keyword = "$tTopik[keyword]";
	$description = "$tTopik[description]";
	
	$imageshare = "assets/img/default-share.jpg";
	$urlshare = "$linkWeb1/topik/$tTopik[link_topik_artikel]";
	
}elseif($_GET['module']=='topik-petisi'){
	$tseo = $pdo->query("SELECT id_page, view FROM page WHERE id_page='$_GET[id]'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$Topik = $pdo->query("SELECT topik, link_topik_petisi, keyword, description FROM topik_petisi WHERE link_topik_petisi='$_GET[link_topik]'");
	$tTopik = $Topik->fetch(PDO::FETCH_ASSOC);

	$title = "Tanda Tangan Petisi Online Tentang $tTopik[topik] - $linkWeb3";
	$keyword = "$tTopik[keyword]";
	$description = "$tTopik[description]";
	
	$imageshare = "assets/img/default-share.jpg";
	$urlshare = "$linkWeb1/topik-petisi/$tTopik[link_topik_petisi]";
	
}elseif($_GET['module']=='penulis'){
	$tseo = $pdo->query("SELECT id_page, view FROM page WHERE id_page='$_GET[id]'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$username = explode("@", $_GET['username']);

	$Penulis = $pdo->query("SELECT username,nama_lengkap,avatar,tentang_saya FROM akun WHERE username='$username[1]'");
	$tPenulis = $Penulis->fetch(PDO::FETCH_ASSOC);

	$title = "Akun @$tPenulis[username] - $tPenulis[nama_lengkap] | Penulis $linkWeb3";
	$keyword = "Informasi Penulis $linkWeb3 @$tPenulis[username] - $tPenulis[nama_lengkap] | $tPenulis[tentang_saya]";
	$description = "@$tPenulis[username] - $tPenulis[nama_lengkap] | $tPenulis[tentang_saya]";
	
	$imageshare = "assets/img/avatar/$tPenulis[avatar]";
	$urlshare = "$linkWeb1/penulis/@$tPenulis[username]";
	
}elseif($_GET['module']=='read'){
	$tseo = $pdo->query("SELECT view FROM page WHERE id_page='12'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$BlogBaca = $pdo->query("SELECT judul,link_artikel,gambar,keyword,description FROM artikel WHERE link_artikel='$_GET[kode_artikel]'");
	$tBlogBaca = $BlogBaca->fetch(PDO::FETCH_ASSOC);
	
	$des = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$tBlogBaca["description"])));
	$des2 = substr($des,0,strrpos(substr($des,0,177)," "));

	$title = "$tBlogBaca[judul]";
	$keyword = "$tBlogBaca[keyword]";
	$description = "$des2";
	
	$imageshare = "assets/img/artikel/medium/$tBlogBaca[gambar]";
	$urlshare = "$linkWeb1/read/$tBlogBaca[link_artikel]";
	
}elseif($_GET['module']=='detail-petisi'){
	$tseo = $pdo->query("SELECT view FROM page WHERE id_page='16'");
	$seo = $tseo->fetch(PDO::FETCH_ASSOC);

	$BlogBaca = $pdo->query("SELECT judul,link_petisi,gambar,keyword,description FROM petisi WHERE link_petisi='$_GET[kode_petisi]'");
	$tBlogBaca = $BlogBaca->fetch(PDO::FETCH_ASSOC);
	
	$des = htmlentities(strip_tags(preg_replace("/&#?[a-z0-9]+;/i","",$tBlogBaca["description"])));
	$des2 = substr($des,0,strrpos(substr($des,0,177)," "));

	$title = "Tandatangani Petisi : $tBlogBaca[judul]";
	$keyword = "$tBlogBaca[keyword]";
	$description = "$des2";
	
	$imageshare = "assets/img/petisi/medium/$tBlogBaca[gambar]";
	$urlshare = "$linkWeb1/detail-petisi/$tBlogBaca[link_petisi]";
	
}else{
	$title = "Error 404! Maaf halaman yang anda cari tidak ada";
	$keyword = "Error 404! - $author";
	$description = "Error 404! - $author";
	
	$imageshare = "assets/img/default-share.jpg";
	$urlshare = $linkWeb1;
}
?>
    <!--Required Meta Tags-->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">

   	<meta name="author" content="<?= $author; ?>">

	<meta name="googlebot" content="index,follow">
	<meta name="googlebot-news" content="index,follow">
	<meta name="robots" content="index,follow">
	<meta name="Slurp" content="all">

	<!-- Tempat verivikasi search console -->

		<!-- index ke google, bing & yahoo saja -->

	<!-- Tempat verivikasi search console -->

	<title><?= $title; ?></title>

	<meta name="keywords" content="<?= $keyword; ?>">
	<meta name="description" content="<?= $description; ?>">

	<!-- Untuk Facebook -->
	<meta property="fb:app_id" content="184663602948248">
	<!-- Untuk Facebook -->

	<!-- Untuk Twitter -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="<?= $namaWeb; ?>" />
	<meta name="twitter:creator" content="<?= $author; ?>" />
	<!-- Untuk Twitter -->

	<meta property="og:url" content="<?= $urlshare; ?>">
	<meta property="og:type" content="article">
	<meta property="og:title" content="<?= $title; ?>">
	<meta property="og:description" content="<?= $description; ?>">
	<meta property="og:site_name" content="<?= $namaWeb; ?>">
	  
	<meta name="image_src" content="<?= $linkWeb1; ?>/<?= $imageshare; ?>">
	<meta property="og:image" content="<?= $linkWeb1; ?>/<?= $imageshare; ?>">
	<meta property="og:image:alt" content="Gambar <?= $title; ?>">
		
	<link rel="canonical" href="<?= $urlshare; ?>">
	<link rel="shortlink" href="<?= $linkWeb3; ?>">