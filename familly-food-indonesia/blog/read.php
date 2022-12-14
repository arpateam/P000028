<?php

    $Detail = $pdo->query("SELECT judul, gambar, deskripsi, dikunjungi, tgl_update, nama FROM blog INNER JOIN data_admin ON blog.id_data_admin = data_admin.id_data_admin WHERE judul_seo='$_GET[judul_seo]'");
    $resultDetail = $Detail->fetch(PDO::FETCH_ASSOC);

    if ($resultDetail == FALSE) {
        echo "<script>window.location = '../404'</script>";
        exit();
        die();
    }

    // Tambah kunjungan

    $dikunjungi = $resultDetail["dikunjungi"]+1;
            
    $sql2 = "UPDATE blog SET dikunjungi = :dikunjungi WHERE judul_seo = :judul_seo";
                  
    $statement = $pdo->prepare($sql2);
    $statement->bindParam(":dikunjungi", $dikunjungi, PDO::PARAM_INT);
    $statement->bindParam(":judul_seo", $_GET["judul_seo"], PDO::PARAM_STR);
    $count = $statement->execute();

?>

<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-3 px-md-4 my-4">
            <div class="card border-0 border-top-2 col-md-11">
                <div class="row justify-content-end">
                    <div class="col-2 col-sm-2 col-lg-1">
                        <span class="ribbonTestimoni"><i class="fab fa-readme fa-2x"></i></span>
                    </div>
                    <div class="col-10 col-sm-10 col-lg-11">

                    <div class="card-body">
                        <h2 class="text-success"><?= $resultDetail['judul'] ?></h2>
                    </div>
                </div>
            </div>

            <div class="col-11 border-dotted-5"></div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center px-3 px-md-4 my-4">
            <div class="col-lg-11">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <figure class="figure">
                            <img src="../assets/images/blog/<?= $resultDetail['gambar'] ?>" class="figure-img img-fluid rounded" alt="Gambar <?= $resultDetail['judul'] ?>">
                            <figcaption class="figure-caption">Gambar <?= $resultDetail['judul'] ?></figcaption>
                        </figure>
                        <?= $resultDetail['deskripsi'] ?>
                        <div class="card mx-2 mx-lg-0 mt-4 border-0">
                            <div class="card-header card-header-success text-light">
                                <span><i class="fas fa-user-edit"></i> <?= $resultDetail['nama'] ?></span>
                                <br />
                                <span><i class="fas fa-calendar-alt"></i> <?= tgl2(date($resultDetail['tgl_update'])) ?></span>
                                <br />
                                <span><i class="fas fa-eye"></i> <?= $resultDetail['dikunjungi'] ?>x</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>