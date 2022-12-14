<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-3 px-md-4 my-4">
            <div class="card border-0 border-top-2 col-md-11">
                <div class="row justify-content-end">
                    <div class="col-2 col-sm-2 col-lg-1">
                        <span class="ribbonTestimoni"><i class="far fa-newspaper fa-2x"></i></span>
                    </div>
                    <div class="col-10 col-sm-10 col-lg-11">

                    <div class="card-body">
                        <h1 class="text-success">Blog Family Food</h1>
                    </div>
                </div>
            </div>

            <div class="col-11 border-dotted-5"></div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-0 px-md-4 my-4">
            <div class="col-lg-7">
                <div class="card mb-5">
                    <h5 class="card-header card-header-success text-light"><i class="far fa-newspaper"></i> Blog</h5>
                    <div class="card-body">
                        <div class="row">
                            <?php

                                $page   = new pagingBlog;
                                $batas  = 6;
                                $posisi = $page->cariPosisi($batas);

                                $Data   = $pdo->query("SELECT judul, judul_seo, gambar, deskripsi, tgl_update FROM blog ORDER BY tgl_update DESC LIMIT $posisi,$batas");
                                $Data2  = $pdo->query("SELECT judul, judul_seo, gambar, deskripsi, tgl_update FROM blog ORDER BY tgl_update DESC");
                                while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <div class="col-md-12 my-3">
                                <div class="card h-100 produk-hover">
                                    <a href="<?= $resultData['judul_seo'] ?>.html" class="gambar-hover">
                                        <img src="../assets/images/blog/small/<?= $resultData['gambar'] ?>" class="card-img-top" alt="<?= $resultData['judul'] ?>">
                                    </a>
                                    <div class="card-body">
                                        <a href="<?= $resultData['judul_seo'] ?>.html" class="text-decoration-none judul-hover">
                                            <h4 class="card-title"><?= $resultData['judul'] ?></h4>
                                        </a>
                                        <p class="small text-warning"><i class="fas fa-calendar-alt"></i> <?= tgl2(date($resultData['tgl_update'])) ?></p>
                                        <small class="text-muted"><?= substr(preg_replace('/<[^<]+?>/', ' ', $resultData['deskripsi']), 0, 125) ?> ...</small>
                                    </div>
                                    <div class="card-footer card-footer-success">
                                        <a href="<?= $resultData['judul_seo'] ?>.html" role="button" class="btn btn-block btn-success">
                                            <small>Selengkapnya <i class="fas fa-arrow-right fa-sm"></i></small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }

                                $jmldata = $Data2->rowCount();
                                $jmlhalaman  = $page->jmlhalaman($jmldata, $batas);
                                $linkHalaman = $page->navHalaman($_GET['page'], $jmlhalaman);
                                           
                                if($jmldata>$batas){
                            ?>

                            <div class="col-12 mt-3 pt-3 border-top">
                                <div class="wp-pagenavi">
                                    <center><?php echo $linkHalaman; ?></center>
                                </div>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php require 'sidebar.php'; ?>
        </div>
    </div>
</div>