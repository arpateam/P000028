<?php
	
	error_reporting(0);

	require "../system/koneksi.php";
	require "../system/fungsi_indotgl.php";
	require "../system/fungsi_modul.php";
    require "../system/fungsi_rupiah.php";
    require "../system/fungsi_seo.php";
    require "../system/fungsi_telp.php";
    require "../system/z_setting.php";
    require "../system/fungsi_session.php";

    if ($_SESSION['_msg__']==="Gagal") {
        $_SESSION['_alert__']   = 0;
        $_SESSION['_msg__']     = NULL;
    }elseif ($_SESSION['_msg__']==="Berhasil") {
        $_SESSION['_alert__']   = 1;
        $_SESSION['_msg__']     = NULL;
    }else{
        $_SESSION['_alert__']   = NULL;
        $_SESSION['_msg__']     = NULL;
    }
?>

<!DOCTYPE html>
<html lang="id, in">
<head> 
	<?php require "../system/seo_v4.php";?>

	<link rel="icon" type="image/x-icon" href="../assets/images/<?= $iconWebsite; ?>" />

    <!-- Fonts and icons -->
    <link href="../assets/plugins/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Fugaz+One&display=swap');</style>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid">
		<?php require "../inc/headerV2.php"; ?>
		<?php require "content.php"; ?>
		<?php require "../inc/footerV2.php"; ?>
	</div>

	<?php require "../inc/my-medsos.php"; ?>

	<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>

	<!-- Asset -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
	<script src="../assets/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
		// ===== Scroll to Top ==== 
		$(window).scroll(function() {
			if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			    $('#return-to-top').fadeIn(200);    // Fade in the arrow
			} else {
				$('#return-to-top').fadeOut(200);   // Else fade out the arrow
			}
		});
		$('#return-to-top').click(function() {      // When arrow is clicked
			$('body,html').animate({
				scrollTop : 0                       // Scroll to top of body
			}, 500);
		});
		// ===== Scroll to Top ==== 
	</script>

	<!-- Read -->
    <?php if (($_GET['module']=='read-produk')): ?>
        <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
        <?php if ($_SESSION['_alert__']===0): ?>
        	<script>swal("GAGAL!", "Sistem kami sepertinya sedang error!", "error");</script>
        <?php elseif ($_SESSION['_alert__']===1): ?>
        	<script>swal("BERHASIL!", "Perubahan telah disimpan!", "success");</script>
	    <?php endif ?>
    <?php endif ?>
    <!-- END Read -->

	<script type="text/javascript">
		function googleTranslateElementInit() {
			new google.translate.TranslateElement(
				{pageLanguage: 'id, in'},
				'google_translate_element'
			);
		}
	</script>
	
	<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?
		cb=googleTranslateElementInit">
	</script>
	<!-- Asset -->

</body>
</html>