<?php

	$Data 		= $pdo->query("SELECT * FROM invoice WHERE session='$_GET[session]'");
	$cekData	= $Data->rowCount(PDO::FETCH_ASSOC);

	if ($cekData>0) {
		$resultData = $Data->fetch(PDO::FETCH_ASSOC);
	}else{
		echo "<script>window.location = '404';</script>";
	    die();
	    exit();
	}

?>

<div class="container-fluid">
	<div class="container">
		<div class="row justify-content-center px-3 px-md-4 my-4">
			<div class="card border-0 border-top-2 col-md-11">
		  		<div class="row justify-content-end">
		  			<div class="col-2 col-sm-2 col-lg-1">
		  				<span class="ribbonTestimoni"><i class="fas fa-file-invoice fa-2x"></i></span>
		  			</div>
		  			<div class="col-10 col-sm-10 col-lg-11">

					<div class="card-body">
						<h1 class="text-success">Detail Transaksi</h1>
					</div>
				</div>
		  	</div>

		  	<div class="col-11 border-dotted-5"></div>
		</div>
	</div>
</div>

<div class="container my-5">
	<div class="row justify-content-center px-3 px-md-4">
	  	<div class="card col-md-11 bg-white text-dark rounded-100 border-top-7 shadow p-2 p-md-4 my-2">

	  		<?php if ($resultData['status']==="Menunggu Konfirmasi"): ?>

	  			<div class="alert alert-warning" role="alert">
				  	<h4 class="alert-heading"><i class="fas fa-exclamation-triangle"></i> PESANAN KAMI TERIMA!</h4>
				  	<h6>Selanjutnya kami akan menghubungi kembali <u>Via Nomor WhatsApp Anda</u></h6>
				  	<hr>
				  	<p class="mb-0">Atau silahkan hubungi kami di WhatsApp <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($nomorWhatsApp1); ?>&text=Hallo%20<?= $namaweb ?>...%0ASaya%20order%20produk%0ANo.%20Pesanan%3A%20*<?= urlencode($resultData['kode_invoice']); ?>*%0A%0ADetail%20Pesanan%20<?= $link1.'/transaksi-'.$resultData['session']; ?>" title="Nomor WhatsApp 1" class="btn btn-sm btn-success my-1"><i class="fab fa-whatsapp"></i> <?= $nomorWhatsApp1 ?></a> atau <a target="_blank" href="https://api.whatsapp.com/send?phone=<?= whatsApp($nomorWhatsApp2); ?>&text=Hallo%20<?= $namaweb ?>...%0ASaya%20order%20produk%0ANo.%20Pesanan%3A%20*<?= urlencode($resultData['kode_invoice']); ?>*%0A%0ADetail%20Pesanan%20<?= $link1.'/transaksi-'.$resultData['session']; ?>" title="Nomor WhatsApp 2" class="btn btn-sm btn-success my-1"><i class="fab fa-whatsapp"></i> <?= $nomorWhatsApp2 ?></a></p>
				</div>

	  			<div class="card-header bg-danger-2 rounded-top-100 py-3">
		  			<div class="row">
			  			<div class="col-md-6 text-light text-center-2">
			  				<h5>No. Pesanan:</h5>
			  				<small class="rounded border p-1"><?= $resultData['kode_invoice'] ?></small>
			  			</div>
			  			<div class="col-md-6 mt-4 mt-md-0 text-light text-center-2 text-end-2">
			  				<button type="button" class="btn btn-lg btn-outline-light text-uppercase"><?= $resultData['status'] ?></button>
			  			</div>
		  			</div>
		  		</div>
		  		<div class="card-header bg-transparent">
		  			<div class="position-relative mx-4 my-5">
					  	<div class="progress" style="height: 3px;">
					    	<div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					  	</div>

					  	<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-money-bill-wave fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-33 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="far fa-file-alt fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-66 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-shipping-fast fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-check fa-lg"></i>
					  	</button>
					</div>
		  		</div>
	  		<?php elseif ($resultData['status']==="Diproses"): ?>
	  			<div class="card-header bg-warning rounded-top-100 py-3">
		  			<div class="row">
			  			<div class="col-md-6 text-light text-center-2">
			  				<h6>No. Pesanan:</h6>
			  				<small class="rounded border p-1"><?= $resultData['kode_invoice'] ?></small>
			  			</div>
			  			<div class="col-md-6 mt-4 mt-md-0 text-light text-center-2 text-end-2">
			  				<button type="button" class="btn btn-lg btn-outline-light text-uppercase">PESANAN <?= $resultData['status'] ?></button>
			  			</div>
		  			</div>
		  		</div>
		  		<div class="card-header bg-transparent">
		  			<div class="position-relative mx-4 my-5">
					  	<div class="progress" style="height: 3px;">
					    	<div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
					  	</div>

					  	<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-money-bill-wave fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-33 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="far fa-file-alt fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-66 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-shipping-fast fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-check fa-lg"></i>
					  	</button>
					</div>
		  		</div>
	  		<?php elseif ($resultData['status']==="Dikirim"): ?>
	  			<div class="card-header bg-info rounded-top-100 py-3">
		  			<div class="row">
			  			<div class="col-md-6 text-light text-center-2">
			  				<h6>No. Pesanan:</h6>
			  				<small class="rounded border p-1"><?= $resultData['kode_invoice'] ?></small>
			  			</div>
			  			<div class="col-md-6 mt-4 mt-md-0 text-light text-center-2 text-end-2">
			  				<button type="button" class="btn btn-lg btn-outline-light text-uppercase">PESANAN <?= $resultData['status'] ?></button>
			  			</div>
		  			</div>
		  		</div>
		  		<div class="card-header bg-transparent">
		  			<div class="position-relative mx-4 my-5">
					  	<div class="progress" style="height: 3px;">
					    	<div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
					  	</div>

					  	<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-money-bill-wave fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-33 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="far fa-file-alt fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-66 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-shipping-fast fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-check fa-lg"></i>
					  	</button>
					</div>
		  		</div>
	  		<?php elseif ($resultData['status']==="Selesai"): ?>
	  			<div class="card-header bg-success rounded-top-100 py-3">
		  			<div class="row">
			  			<div class="col-md-6 text-light text-center-2">
			  				<h6>No. Pesanan:</h6>
			  				<small class="rounded border p-1"><?= $resultData['kode_invoice'] ?></small>
			  			</div>
			  			<div class="col-md-6 mt-4 mt-md-0 text-light text-center-2 text-end-2">
			  				<button type="button" class="btn btn-lg btn-outline-light text-uppercase">PESANAN <?= $resultData['status'] ?></button>
			  			</div>
		  			</div>
		  		</div>
		  		<div class="card-header bg-transparent">
		  			<div class="position-relative mx-4 my-5">
					  	<div class="progress" style="height: 3px;">
					    	<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
					  	</div>

					  	<button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-money-bill-wave fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-33 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="far fa-file-alt fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-66 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-shipping-fast fa-lg"></i>
					  	</button>
					  	<button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 3rem; height: 3rem;">
					  		<i class="fas fa-check fa-lg"></i>
					  	</button>
					</div>
		  		</div>
	  		<?php endif ?>

	  		<div class="card-header py-4">
	  			<div class="row">
	  				<div class="col-md-6 border-end-2 pb-0 pb-lg-3">
	  					<h5>Alamat Pengiriman</h5>

	  					<hr />
	  					
	  					<h6><i class="far fa-user"></i> <?= $resultData['nama_penerima'] ?></h6>
	  					<h6><i class="fab fa-whatsapp"></i> <?= $resultData['nomor_whatsapp'] ?></h6>
	  					<p>
	  						<i class="fas fa-map-marker-alt"></i> <?= $resultData['detail_alamat'] ?>, <span class="text-uppercase"><?= $resultData['kab_kota'] ?>, <?= $resultData['provinsi'] ?> - <?= $resultData['kode_pos'] ?></span>
	  					</p>
	  				</div>
	  				<hr class="d-block d-md-none" />
	  				<div class="col-md-6 text-end-3 pb-3">
	  					<h6 class="small">
	  						<p class="mb-2 text-decoration-underline">Waktu transaksi: </p>
	  						<i class="far fa-calendar-check"></i> <?= tgl2($resultData['date_transaksi']) ?>
	  						<br />
	  						<i class="far fa-clock"></i> <?= $resultData['time_transaksi'] ?> WIB
	  					</h6>

	  					<h6 class="small mt-2 mt-lg-4">
	  						<p class="mb-2 text-decoration-underline">Dikirim pada: </p>
	  						<?php
	  							if (empty($resultData['no_resi'])) {
	  								echo "<span class='text-danger-2'><i class='fas fa-ban'></i> Belum dikirim</span>";
	  							}else{
	  								echo "<i class='far fa-calendar-check'></i> ".tgl2($resultData['date_pengiriman']);
	  								echo "<br />";
	  								echo "<i class='far fa-clock'></i> ".$resultData['time_pengiriman']." WIB";
	  							}
	  						?>
	  					</h6>

	  					<?php if (!empty($resultData['date_selesai'])): ?>
		  					<h6 class="small mt-2 mt-lg-4">
		  						<p class="mb-2 text-decoration-underline">Selesai pada: </p>
		  						<i class='far fa-calendar-check'></i> <?= tgl2($resultData['date_selesai']) ?>
  								<br />
  								<i class='far fa-clock'></i> <?= $resultData['time_selesai'] ?> WIB
		  					</h6>
	  					<?php endif ?>
	  					
	  					<hr class="d-block d-md-none" />

	  					<h5 class="mt-2 mt-lg-4"><?= $resultData['ekspedisi'] ?></h5>
	  					<h6><?= $resultData['jenis_pengiriman'] ?></h6>
	  					<button type="button" class="btn btn-sm btn-outline-success">
	  						<?php
	  							if (empty($resultData['no_resi'])) {
	  								echo "No. Resi belum di input";
	  							}else{
	  								echo $resultData['no_resi'];
	  							}
	  						?>
	  					</button>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="card-body">
	  			<div class="row justify-content-center mt-2">

	  				<?php
			            $Keranjang 			= $pdo->query("SELECT nama_produk, harga, diskon, harga_final, berat, gambar, id_keranjang, qty, sub_harga FROM keranjang INNER JOIN produk ON keranjang.id_produk=produk.id_produk WHERE session='$resultData[session]' AND keranjang.status='Checkout' ORDER BY id_keranjang DESC");
			            while ($resultKeranjang 	= $Keranjang->fetch(PDO::FETCH_ASSOC)) {
			        ?>

			        <div class="col-3 col-lg-2">
	  					<img src="assets/images/produk/<?= $resultKeranjang['gambar'] ?>" alt="Gambar Produk <?= $resultKeranjang['nama_produk'] ?>" class="img-thumbnail">
	  				</div>
	  				<div class="col-9 col-lg-10">
	  					<h4 class="text-success"><?= $resultKeranjang['nama_produk'] ?></h4>
	  					<hr class="my-2" />
	  					<div class="row">
	  						<div class="col-9 col-md-10 d-block d-md-none">
		  						<?php if ($resultKeranjang['diskon']==="0" OR $resultKeranjang['diskon']===NULL OR empty($resultKeranjang['diskon'])): ?>
			  						<h6 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h6>
			  					<?php else: ?>
			  						<small><del class="text-muted">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</del> <span class="text-danger">Disc. <?=$resultKeranjang['diskon'] ?>%</span></small>
			  						<h6 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h6>
			  					<?php endif ?>
			  				</div>
	  						<div class="col-9 col-md-10 d-none d-md-block">
		  						<?php if ($resultKeranjang['diskon']==="0" OR $resultKeranjang['diskon']===NULL OR empty($resultKeranjang['diskon'])): ?>
			  						<h5 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h5>
			  					<?php else: ?>
			  						<h6><del class="text-muted">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</del> <span class="text-danger">Disc. <?=$resultKeranjang['diskon'] ?>%</span></h6>
			  						<h5 class="text-success">Rp <?= rp($resultKeranjang['harga_final']) ?>,00</h5>
			  					<?php endif ?>
			  				</div>
	  						<div class="col-3 col-md-2 text-end">
	  							<h6 class="text-danger">x<?= $resultKeranjang['qty'] ?></h6>
	  						</div>
	  					</div>
	  				</div>

	  				<div class="col-11 col-md-12 border-dotted-3 my-3"></div>

	  				<?php } ?>
	  			</div>
	  		</div>

	  		<div class="card-footer">
	  			<div class="row text-dark">
	  				<div class="col-7 col-md-8 py-1 text-end border-end">
	  					<small>Subtotal Produk (<?= rp($resultData["qty"]) ?>)</small>
	  				</div>
	  				<div class="col-5 col-md-4 py-1 text-end">
	  					<small>Rp<?= rp($resultData["sub_harga"]) ?>,00</small>
	  				</div>

	  				<div class="col-7 col-md-8 py-1 text-end border-top border-end">
	  					<small>Berat</small>
	  				</div>
	  				<div class="col-5 col-md-4 py-1 text-end border-top">
	  					<small><?= rp($resultData["berat"]) ?> g</small>
	  				</div>

	  				<div class="col-7 col-md-8 py-1 text-end border-top border-end">
	  					<small>Biaya Pengiriman</small>
	  				</div>
	  				<div class="col-5 col-md-4 py-1 text-end border-top">
	  					<small>Rp<?= rp($resultData["biaya_ekspedisi"]) ?>,00</small>
	  				</div>

	  				<div class="col-7 col-md-8 py-2 text-end border-top border-end">
	  					<h6 class="text-success"><i class="fas fa-money-bill-wave"></i> Total Pembayaran</h6>
	  				</div>
	  				<div class="col-5 col-md-4 py-2 text-end border-top">
	  					<h6 class="text-success">Rp<?= rp($resultData["total_pembayaran"]) ?>,00</h6>
	  				</div>

	  				<div class="col-7 col-md-8 py-1 text-end text-danger border-top border-end">
	  					<small><i class="fab fa-gratipay"></i> Metode Pembayaran</small>
	  				</div>
	  				<div class="col-5 col-md-4 py-1 text-end text-danger border-top">
	  					<small><?php if ($resultData["status"]!=="Menunggu Konfirmasi") { echo $resultData["metode_pembayaran"]; }else{ echo "-"; } ?></small>
	  				</div>

	  				<div class="col-7 col-md-8 py-1 text-end text-danger border-top border-end">
	  					<small><i class="fas fa-bell"></i> Status Pembayaran</small>
	  				</div>
	  				<div class="col-5 col-md-4 py-1 text-end text-danger border-top">
	  					<small><?php if ($resultData["status"]!=="Menunggu Konfirmasi") { echo "Berhasil"; }else{ echo "-"; } ?></small>
	  				</div>
	  			</div>
	  		</div>

	  	</div>
	</div>

	<div class="row justify-content-center my-4">
		<div class="col-11 border-dotted-5"></div>
	</div>
</div>