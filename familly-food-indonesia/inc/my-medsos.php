<?php
	$myWhatsApp = array($nomorWhatsApp1,$nomorWhatsApp2);
	shuffle($myWhatsApp);
?>

<a href="<?= $linkTokopedia ?>" target="_blank" class="myMedsos myMedsosTokopedia"><i class="fas fa-shopping-cart"></i></a>
<a href="<?= $linkShopee ?>" target="_blank" class="myMedsos myMedsosShopee"><i class="fab fa-shopify"></i></a>
<a href="<?= $linkInstagram ?>" target="_blank" class="myMedsos myMedsosInstagram"><i class="fab fa-instagram"></i></a>
<a href="https://api.whatsapp.com/send?phone=<?= whatsApp($myWhatsApp[0]); ?>&text=Hallo%20<?= $namaweb ?>..." target="_blank" class="myMedsos myMedsosWhatsapp"><i class="fab fa-whatsapp"></i></a>
<a href="<?= $YouTube ?>" target="_blank" class="myMedsos myMedsosYoutube"><i class="fab fa-youtube"></i></a>
<a href="<?= $linkTikTok ?>" target="_blank" class="myMedsos myMedsosTiktok"><i class="fab fa-tiktok"></i></a>
<a href="<?= $linkFacebook ?>" target="_blank" class="myMedsos myMedsosFacebook"><i class="fab fa-facebook"></i></a>