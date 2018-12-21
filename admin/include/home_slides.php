<?php
	$home_slides = new XTemplate("views/home_slides.html");
	
	$query = mysql_query("select * from tin_tuc");
	$i = 1;
	while($rows = mysql_fetch_array($query)){
		$id = $rows["id_tt"];
		$tieu_de = $rows["tieu_de"];
		$ngay_dang = $rows["ngay_dang"];
		$anh_tt = $rows["anh_tt"];
		$home_slides->assign("id",$id);
		$home_slides->assign("tieu_de",$tieu_de);
		$home_slides->assign("ngay_dang",$ngay_dang);
		$home_slides->assign("anh_tt",$anh_tt);
		$home_slides->parse("home_slides.ds_tt");
		$i++;
		if($i>10) break;
	}
	$home_slides->parse("home_slides");
	$home_slides = $home_slides->text("home_slides");
?>