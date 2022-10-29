<?php

	class pagingTopik{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman, $linkTopik){
			$link_halaman = "";
			$link_halaman .= "<nav class='float-start' aria-label='Page navigation example'>";
			$link_halaman .= "<ul class='pagination'>";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				$link_halaman .= "";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "
								<a href='$linkTopik-page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
				$link_halaman .= "
									<li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-1' aria-label='First' title='First page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-double-left' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												  	<path fill-rule='evenodd' d='M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>First</span>
		                                </a>
		                            </li> 
									<li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-$prev' aria-label='Previous' title='Previous page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-left' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>Previous</span>
		                                </a>
		                            </li>
		                             ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " <li class='page-item'><a class='page-link' href=''>...</a></li> " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<li class='page-item'><a class='page-link' href='$linkTopik-page-$i'>$i</a></li> ";
				}
				$angka .= " <li class='page-item active'><span class='page-link'>$halaman_aktif</span></li>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  	break;
				  	$angka .= "<li class='page-item'><a class='page-link' href='$linkTopik-page-$i'>$i</a></li> ";
				}
				  	$angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='page-item'><a class='page-link' href=''>...</a></li> <li class='page-item'><a class='page-link' href='$linkTopik-page-$jmlhalaman'>$jmlhalaman</a></li> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= "  <li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-$next' aria-label='Next' title='Next page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='1.2rem' height='1.2rem' fill='currentColor' viewBox='0 0 512 512'>
		                                            <polyline points='184 112 328 256 184 400' style='fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/>
		                                        </svg>
		                                    </span>
		                                    <span class='visually-hidden'>Next</span>
		                                </a>
		                            </li>
								 	<li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-$jmlhalaman' aria-label='Last' title='Last page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-double-right' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z'/>
												  	<path fill-rule='evenodd' d='M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>Last</span>
		                                </a>
		                            </li>
								 ";
			}else{
				$link_halaman .= "";
			}

			$link_halaman .= "</ul>";
			$link_halaman .= "</nav>";
			$link_halaman .= "<span class='py-2 float-end'>Page $halaman_aktif of $jmlhalaman</span>";

			return $link_halaman;
		}
	}

	class pagingTopikPetisi{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman, $linkTopik){
			$link_halaman = "";
			$link_halaman .= "<nav class='float-start' aria-label='Page navigation example'>";
			$link_halaman .= "<ul class='pagination'>";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				$link_halaman .= "";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "
								<a href='$linkTopik-page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
				$link_halaman .= "
									<li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-1' aria-label='First' title='First page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-double-left' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												  	<path fill-rule='evenodd' d='M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>First</span>
		                                </a>
		                            </li> 
									<li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-$prev' aria-label='Previous' title='Previous page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-left' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>Previous</span>
		                                </a>
		                            </li>
		                             ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " <li class='page-item'><a class='page-link' href=''>...</a></li> " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<li class='page-item'><a class='page-link' href='$linkTopik-page-$i'>$i</a></li> ";
				}
				$angka .= " <li class='page-item active'><span class='page-link'>$halaman_aktif</span></li>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  	break;
				  	$angka .= "<li class='page-item'><a class='page-link' href='$linkTopik-page-$i'>$i</a></li> ";
				}
				  	$angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='page-item'><a class='page-link' href=''>...</a></li> <li class='page-item'><a class='page-link' href='$linkTopik-page-$jmlhalaman'>$jmlhalaman</a></li> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= "  <li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-$next' aria-label='Next' title='Next page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='1.2rem' height='1.2rem' fill='currentColor' viewBox='0 0 512 512'>
		                                            <polyline points='184 112 328 256 184 400' style='fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/>
		                                        </svg>
		                                    </span>
		                                    <span class='visually-hidden'>Next</span>
		                                </a>
		                            </li>
								 	<li class='page-item'>
		                                <a class='page-link' href='$linkTopik-page-$jmlhalaman' aria-label='Last' title='Last page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-double-right' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z'/>
												  	<path fill-rule='evenodd' d='M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>Last</span>
		                                </a>
		                            </li>
								 ";
			}else{
				$link_halaman .= "";
			}

			$link_halaman .= "</ul>";
			$link_halaman .= "</nav>";
			$link_halaman .= "<span class='py-2 float-end'>Page $halaman_aktif of $jmlhalaman</span>";

			return $link_halaman;
		}
	}

	class pagingPenulis{
		function cariPosisi($batas){
			if(empty($_GET['page'])){
				$posisi=0;
				$_GET['page']=1;
			}else{
				$posisi = ($_GET['page']-1) * $batas;
			}
			return $posisi;
		}

		// Fungsi untuk menghitung total page
		function jmlhalaman($jmldata, $batas){
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}

		// Fungsi untuk link halaman 1,2,3 (untuk admin)
		function navHalaman($halaman_aktif, $jmlhalaman, $linkPenulis){
			$link_halaman = "";
			$link_halaman .= "<nav class='float-start' aria-label='Page navigation example'>";
			$link_halaman .= "<ul class='pagination'>";

			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif == 1){
				$link_halaman .= "";
			}elseif($halaman_aktif > 1){
				$prev = $halaman_aktif-1;
				$link_halaman .= "
								<a href='$linkPenulis-page-$prev' title='Previous'><i class='fa fa-arrow-left' aria-hidden='true'></i></a> ";
				$link_halaman .= "
									<li class='page-item'>
		                                <a class='page-link' href='$linkPenulis-page-1' aria-label='First' title='First page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-double-left' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												  	<path fill-rule='evenodd' d='M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>First</span>
		                                </a>
		                            </li> 
									<li class='page-item'>
		                                <a class='page-link' href='$linkPenulis-page-$prev' aria-label='Previous' title='Previous page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-left' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>Previous</span>
		                                </a>
		                            </li>
		                             ";
			}

			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? " <li class='page-item'><a class='page-link' href=''>...</a></li> " : " "); 
			for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
				if ($i < 1)
					continue;
					$angka .= "<li class='page-item'><a class='page-link' href='$linkPenulis-page-$i'>$i</a></li> ";
				}
				$angka .= " <li class='page-item active'><span class='page-link'>$halaman_aktif</span></li>";
				  
				for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
				if($i > $jmlhalaman)
				  	break;
				  	$angka .= "<li class='page-item'><a class='page-link' href='$linkPenulis-page-$i'>$i</a></li> ";
				}
				  	$angka .= ($halaman_aktif+2<$jmlhalaman ? " <li class='page-item'><a class='page-link' href=''>...</a></li> <li class='page-item'><a class='page-link' href='$linkPenulis-page-$jmlhalaman'>$jmlhalaman</a></li> " : " ");

			$link_halaman .= "$angka";

			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman){
				$next = $halaman_aktif+1;
				$link_halaman .= "  <li class='page-item'>
		                                <a class='page-link' href='$linkPenulis-page-$next' aria-label='Next' title='Next page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='1.2rem' height='1.2rem' fill='currentColor' viewBox='0 0 512 512'>
		                                            <polyline points='184 112 328 256 184 400' style='fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px'/>
		                                        </svg>
		                                    </span>
		                                    <span class='visually-hidden'>Next</span>
		                                </a>
		                            </li>
								 	<li class='page-item'>
		                                <a class='page-link' href='$linkPenulis-page-$jmlhalaman' aria-label='Last' title='Last page'>
		                                    <span aria-hidden='true'>
		                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chevron-double-right' viewBox='0 0 16 16'>
												  	<path fill-rule='evenodd' d='M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z'/>
												  	<path fill-rule='evenodd' d='M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z'/>
												</svg>
		                                    </span>
		                                    <span class='visually-hidden'>Last</span>
		                                </a>
		                            </li>
								 ";
			}else{
				$link_halaman .= "";
			}

			$link_halaman .= "</ul>";
			$link_halaman .= "</nav>";
			$link_halaman .= "<span class='py-2 float-end'>Page $halaman_aktif of $jmlhalaman</span>";

			return $link_halaman;
		}
	}