<?php

    switch ($_GET['act']) {
        case 'view':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-newspaper"></i> BLOG</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-secondary fw-bold">Daftar Blog</h2>
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                <a href="tambah-blog" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah Blog</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabelData" class="table table-striped table-bordered py-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" width="130px">Aksi</th>
                                        <th scope="col" width="300px">Judul Blog</th>
                                        <th scope="col" width="125px">Gambar</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Tanggal Update</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        $Data = $pdo->query("SELECT * FROM blog ORDER BY tgl_update DESC");
                                        while($resultData = $Data->fetch(PDO::FETCH_ASSOC)){
                                    ?>

                                    <tr>
                                        <td>
                                            <a target="_blank" href="<?= $link1; ?>/blog/<?= $resultData['judul_seo']; ?>.html" role="button" class="btn btn-sm btn-success">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                            <a href="ubah-blog-<?= $resultData['id_blog']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a onclick="confirmHapusBlog('<?= $resultData['id_blog']; ?>')" class="btn btn-sm btn-danger text-light"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                        <td><?= $resultData['judul']; ?></td>
                                        <td><img src="../assets/images/blog/small/<?= $resultData['gambar']; ?>" alt="<?= $resultData['gambar']; ?>" class="img-thumbnail my-2"></td>
                                        <td><button class="btn btn-sm btn-warning"><?= $resultData['dikunjungi']; ?>x</button></td>
                                        <td><span class="text-muted"><?= tgl2($resultData['tgl_update']); ?></span></td>
                                    </tr>

                                    <?php } ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th scope="col" width="130px">Aksi</th>
                                        <th scope="col" width="300px">Judul Blog</th>
                                        <th scope="col" width="125px">Gambar</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Tanggal Update</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        break;
        case 'add':
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="blog" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Blog</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-newspaper"></i> TAMBAH BLOG</h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionTambahBlog" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
                            <div class="row">

                                <div class="col-12">
                                    <div class="alert alert-warning text-warning" role="alert">
                                        <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                                        <hr>
                                        <p class="mb-0">Mohon isi form dibawah ini dengan lengkap dan benar!</p>
                                    </div>
                                </div>

                                <!-- Data Utama -->
                                    <div class="col-12 my-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Judul Blog</label>
                                            <input id="judul" name="___in_judul_special_SEMANAK" type="text" class="form-control input-border-bottom" placeholder="Cth: Joko Widodo Terpilih Sebagai Presiden Indonesia Periode 2019-2024" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Judul Blog!
                                            </div>
                                        </div>
                                    </div>

                                <!-- Gambar Blog -->
                                    <div class="col-12 mt-4">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-image"></i> Gambar Blog</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning d-flex align-items-center mt-2" role="alert">
                                            <div>
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                Maksimal ukuran gambar <strong>2MB</strong>
                                                <hr />
                                                <i class="fas fa-exclamation-triangle"></i>
                                                Dimensi gambar <u>harus</u> <strong>HD</strong> atau <strong>1920 pixel x 1080 pixel</strong>
                                            </div>
                                        </div>

                                        <div class="image-upload-wrap">

                                            <input type="file" class="file-upload-input" name="___in_gambar_special_SEMANAK" accept="image/jpeg, image/jpg, image/png, image/gif" onchange="readURL(this);" required />

                                            <div class="drag-text">
                                                <h3>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                                    </svg>
                                                    <br />
                                                    Drag & Drop your files or <u>Browse</u>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="file-upload-content">

                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    Gambar anda siap di upload
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <span class="message-alert-validation-file"></span>
                                                </div>
                                            </div>

                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="#" alt="Gambar <?= $hal; ?>" />

                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                    Ubah Gambar
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback fw-bold">
                                            Mohon pilih gambar untuk <?= $hal; ?> anda
                                        </div>
                                    </div>
                                <!-- End Gambar Blog -->

                                <!-- Deskripsi Blog -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-newspaper"></i> Deskripsi Blog</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <textarea id="deskripsi" name="___in_deskripsi_special_SEMANAK" class="form-control input-border-bottom" required></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon masukkan Deskripsi!
                                            </div>
                                        </div>
                                    </div>

                                <!-- Pengaturan SEO -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fab fa-searchengin"></i> Pengaturan SEO</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning" role="alert">
                                            <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> APA ITU SEO?</h2>
                                            <hr>
                                            <ul>
                                                <li><strong>SEO</strong> adalah suatu cara agar postingan artikel kita lebih mudah dikenal oleh <u>Mesin Pencari (Google)</u></li>
                                                <li><strong>Kosongkan</strong> saja jika tidak ingin diisi</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="keyword" class="placeholder font-weight-bold text-primary">Keyword</label>
                                            <textarea id="keyword" name="___in_keyword_special_SEMANAK" class="form-control input-border-bottom" rows="3" placeholder="Cth: #2019GantiPresiden, Jokowi, JokoWidodo, Presiden2019, Pemilu2019, Dst."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="description" class="placeholder font-weight-bold text-primary">Description</label>
                                            <textarea id="description" name="___in_description_special_SEMANAK" class="form-control input-border-bottom" rows="3" placeholder="Cth: Selamat dan Sukses atas pelantikan Bpk. Ir.H.Joko Widodo dan Bpk. Prof. Dr. K.H. Ma???ruf Amin Sebagai Presiden dan Wakil Presiden Republik Indonesia Periode 2019-2024"></textarea>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        break;
        case 'edit':

        $Data       = $pdo->query("SELECT id_blog, judul, gambar, deskripsi, keyword, description, id_sitemap_1  FROM blog WHERE id_blog='$_GET[kode]'");
        $resultData = $Data->fetch(PDO::FETCH_ASSOC);
        $jmlData    = $Data->rowCount(PDO::FETCH_ASSOC);

        if ($jmlData===0) {
            echo "<script>window.location = 'blog';</script>";
            die();
            exit();
        }
?>

<div class="content">
    <div class="panel-header bg-primary-gradient pb-5">
        <div class="page-inner py-5">
            <div class="text-center">
                <h5>
                    <a href="blog" class="text-light" style="text-decoration: none;"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Blog</a>
                </h5>
                <h1 class="text-white pb-2 fw-bold"><i class="fas fa-newspaper"></i> Mengubah Blog <hr /><u>"<?= $resultData['judul'] ?>"</u></h1>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center mt--5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body tab-content pb-0" id="pills-without-border-tabContent">
                        <form method="POST" action="actionEditBlog" enctype="multipart/form-data" class="text-left needs-validation" novalidate>
                            <div class="row">

                                <div class="col-12">
                                    <div class="alert alert-warning text-warning" role="alert">
                                        <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> PERHATIAN!</h2>
                                        <hr>
                                        <p class="mb-0">Mohon isi form dibawah ini dengan lengkap dan benar!</p>
                                    </div>
                                </div>

                                <!-- Data Utama -->
                                    <div class="col-12 my-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-file-alt"></i> Data Utama</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <label class="font-weight-bold">Judul Blog</label>
                                            <input id="judul" name="___in_judul_special_SEMANAK" type="text" class="form-control input-border-bottom" placeholder="Cth: Joko Widodo Terpilih Sebagai Presiden Indonesia Periode 2019-2024" value="<?= $resultData['judul']; ?>" required>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon Masukkan Judul Blog!
                                            </div>
                                        </div>
                                    </div>

                                <!-- Gambar Blog -->
                                    <div class="col-12 mt-4">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-image"></i> Gambar Blog</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning d-flex align-items-center mt-2" role="alert">
                                            <div>
                                                <i class="fas fa-exclamation-triangle"></i> 
                                                Maksimal ukuran gambar <strong>2MB</strong>
                                                <hr />
                                                <i class="fas fa-exclamation-triangle"></i>
                                                Dimensi gambar <u>harus</u> <strong>HD</strong> atau <strong>1920 pixel x 1080 pixel</strong>
                                            </div>
                                        </div>

                                        <div class="image-upload-wrap">
                                            <input type="file" class="file-upload-input" name="___in_gambar_special_SEMANAK" accept="image/jpeg, image/jpg, image/png, image/gif" onchange="readURL(this);" />

                                            <div class="drag-text">
                                                <h3>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                                                        <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                                    </svg>
                                                    <br />
                                                    Drag & Drop your files or <u>Browse</u>
                                                </h3>
                                            </div>
                                        </div>

                                        <div class="file-upload-content">

                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    Gambar anda siap di upload
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <span class="message-alert-validation-file"></span>
                                                </div>
                                            </div>

                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="#" alt="<?= $resultData['judul']; ?>" />

                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                    Ubah Gambar
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="file-upload-content-edit text-center">

                                            <div class="alert alert-success alert-validation-success mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-check-fill" viewBox="0 0 16 16">
                                                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 4.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    Gambar anda siap di upload
                                                </div>
                                            </div>

                                            <div class="alert alert-danger alert-validation-file mx-2 mt-2 mx-md-4 mt-md-4" role="alert">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </svg>
                                                    <span class="message-alert-validation-file"></span>
                                                </div>
                                            </div>

                                            <img class="file-upload-image px-2 pt-2 px-md-4" src="../assets/images/blog/<?= $resultData['gambar']; ?>" alt="<?= $resultData['judul']; ?>" />

                                            <div class="image-title-wrap px-2 py-2 px-md-4 py-md-4">
                                                <button type="button" onclick="removeUpload()" class="col-12 btn btn-sm ubah-gambar">
                                                    Ubah Gambar
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="invalid-feedback fw-bold">
                                            Mohon pilih gambar untuk Blog anda
                                        </div>
                                    </div>

                                <!-- Deskripsi Blog -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fas fa-newspaper"></i> Deskripsi Blog</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group-default">
                                            <textarea id="deskripsi" name="___in_deskripsi_special_SEMANAK" class="form-control input-border-bottom" required><?= $resultData['deskripsi']; ?></textarea>
                                            <div class="invalid-feedback fw-bold">
                                                <i class="fas fa-exclamation-triangle"></i> Mohon masukkan Deskripsi!
                                            </div>
                                        </div>
                                    </div>

                                <!-- Pengaturan SEO -->
                                    <div class="col-12 mt-4 mb-2">
                                        <div class="alert alert-primary shadow-sm pb-2" role="alert">
                                            <h4 class="fw-bold text-primary"><i class="fab fa-searchengin"></i> Pengaturan SEO</h4>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="alert alert-warning text-warning" role="alert">
                                            <h2 class="alert-heading fw-bold"><i class="fas fa-exclamation-triangle"></i> APA ITU SEO?</h2>
                                            <hr>
                                            <ul>
                                                <li><strong>SEO</strong> adalah suatu cara agar postingan artikel kita lebih mudah dikenal oleh <u>Mesin Pencari (Google)</u></li>
                                                <li><strong>Kosongkan</strong> saja jika tidak ingin diisi</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="keyword" class="placeholder font-weight-bold text-primary">Keyword</label>
                                            <textarea id="keyword" name="___in_keyword_special_SEMANAK" class="form-control input-border-bottom" rows="10" placeholder="Cth: #2019GantiPresiden, Jokowi, JokoWidodo, Presiden2019, Pemilu2019, Dst."><?= $resultData['keyword']; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group-default">
                                            <label for="description" class="placeholder font-weight-bold text-primary">Description</label>
                                            <textarea id="description" name="___in_description_special_SEMANAK" class="form-control input-border-bottom" rows="10" placeholder="Cth: Selamat dan Sukses atas pelantikan Bpk. Ir.H.Joko Widodo dan Bpk. Prof. Dr. K.H. Ma???ruf Amin Sebagai Presiden dan Wakil Presiden Republik Indonesia Periode 2019-2024"><?= $resultData['description']; ?></textarea>
                                        </div>
                                    </div>

                                <div class="col-12 border-top mt-2"></div>

                                <div class="col-12 my-4">
                                    <input type="hidden" name="___in_id_blog_special_SEMANAK" value="<?= $resultData['id_blog']; ?>">
                                    <input type="hidden" name="___in_gambar_lama_special_SEMANAK" value="<?= $resultData['gambar']; ?>">
                                    <input type="hidden" name="___in_id_sitemap_1_special_SEMANAK" value="<?= $resultData['id_sitemap_1']; ?>">
                                    <button type="submit" name="_submit_special_SEMANAK_" class="btn btn-block btn-lg btn-secondary"><i class="fas fa-check"></i> SIMPAN PERUBAHAN</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>