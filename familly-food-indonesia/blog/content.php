<?php

	if($_GET['module']=='blog') { 
		include("blog.php");
	}elseif($_GET['module']=='read-blog') { 
		include("read.php");
	}else{
		echo "<script>window.location = '404';</script>";
	}

?>