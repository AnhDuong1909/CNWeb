<?php
	$tin_tuc = new XTemplate("views/tin_tuc.html");
	
	$query = mysql_query("select * from tin_tuc order by ngay_dang desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$query = mysql_query("SELECT * from tin_tuc order by ngay_dang desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		$tin_tuc->assign("id",$rows["id_tt"]);
		$tin_tuc->assign("tieu_de",$rows["tieu_de"]);
		$tin_tuc->assign("ngay_dang",$rows["ngay_dang"]);
		$tin_tuc->assign("anh_tt",$rows["anh_tt"]);
		$tin_tuc->assign("tom_tat",$rows["tom_tat"]);
		$tin_tuc->parse("list_tt.tin_tuc");
	}
	for($i=1;$i<=$sotrang;$i++){
		$tin_tuc->assign("stt",$i);
		if($i==$page) $tin_tuc->assign("page","#999"); else $tin_tuc->assign("page","#FFF");
		$tin_tuc->parse("list_tt.so_trang");
	}
	
	$tin_tuc->parse("list_tt");
	$tin_tuc = $tin_tuc->text("list_tt");
//-----------------------------------------------------------
	$show_tt = new XTemplate("views/tin_tuc.html");
	
	$query = mysql_query("select * from tin_tuc");
		while($rows = mysql_fetch_array($query)){
			$show_tt->assign("tieu_de",$rows["tieu_de"]);
			$show_tt->assign("ngay_dang",$rows["ngay_dang"]);
			$show_tt->assign("id",$rows["id_tt"]);
			$show_tt->parse("show_tt.tin_khac");
		}
	a
	
	if(isset($_GET["id"])){
		if(is_numeric($_GET["id"])) $id = $_GET["id"]; else $id = 1;
		$query = mysql_query("select * from tin_tuc where id_tt = $id");
		$num = mysql_num_rows($query);
		if($num==0) $id = 1;
		$query = mysql_query("select * from tin_tuc where id_tt = $id");
		while($rows = mysql_fetch_array($query)){
			$show_tt->assign("tieu_de",$rows["tieu_de"]);
			$show_tt->assign("ngay_dang",$rows["ngay_dang"]);
			$show_tt->assign("noi_dung",$rows["noi_dung"]);
		}
	}
	
	$show_tt->parse("show_tt");
	$show_tt = $show_tt->text("show_tt");
?>