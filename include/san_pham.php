<?php
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp");

	$sanpham->assign("title","KHUYẾN MÃI");
	$i = 1;
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
		$i++;
		if($i>17) break;
	}
	$sanpham->assign("end","Xem tiếp...");
	$sanpham->assign("act","khuyenmai");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$km = $sanpham->text("san_pham");
//------------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp order by do_hot desc");
	$sanpham->assign("title","ĐANG HOT");
	$i = 1;
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
		$i++;
		if($i>17) break;
	}
	$sanpham->assign("end","Xem tiếp...");
	$sanpham->assign("act","danghot");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$dh = $sanpham->text("san_pham");
//-------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp");
	$sanpham->assign("title","HÀNG MỚI VỀ");
	$i = 1;
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
		$i++;
		if($i>17) break;
	}
	$sanpham->assign("end","Xem tiếp...");
	$sanpham->assign("act","hangmoive");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$hmv = $sanpham->text("san_pham");
//-------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp order by id_sp desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 48;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$query = mysql_query("SELECT * from chitiet_sp order by id_sp desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
	}
	for($i=1;$i<=$sotrang;$i++){
		$sanpham->assign("stt",$i);
		if($i==$page) $sanpham->assign("page","#999"); else $sanpham->assign("page","#FFF");
		$sanpham->assign("act","khuyenmai");
		$sanpham->parse("san_pham.block.so_trang");
	}
	$sanpham->assign("title","SẢN PHẨM ĐANG KHUYẾN MÃI");
	$sanpham->assign("end","");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$khuyen_mai = $sanpham->text("san_pham");
//-------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp order by id_sp desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 48;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$query = mysql_query("SELECT * from chitiet_sp order by do_hot desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
	}
	for($i=1;$i<=$sotrang;$i++){
		$sanpham->assign("stt",$i);
		if($i==$page) $sanpham->assign("page","#999"); else $sanpham->assign("page","#FFF");
		$sanpham->assign("act","danghot");
		$sanpham->parse("san_pham.block.so_trang");
	}
	$sanpham->assign("title","SẢN PHẨM ĐANG HOT");
	$sanpham->assign("end","");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$dang_hot = $sanpham->text("san_pham");
//---------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp order by id_sp desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 48;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$query = mysql_query("SELECT * from chitiet_sp order by id_sp desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
	}
	for($i=1;$i<=$sotrang;$i++){
		$sanpham->assign("stt",$i);
		if($i==$page) $sanpham->assign("page","#999"); else $sanpham->assign("page","#FFF");
		$sanpham->assign("act","hangmoive");
		$sanpham->parse("san_pham.block.so_trang");
	}
	$sanpham->assign("title","HÀNG MỚI VỀ");
	$sanpham->assign("end","");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$hang_moi_ve = $sanpham->text("san_pham");
//---------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp order by id_sp desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 48;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$query = mysql_query("SELECT * from chitiet_sp order by id_sp desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		$ten_sp = $rows["ten_sp"];
		$gia_sp = $rows["gia_sp"];
		$anh_sp = $rows["anh_sp"];
		$sanpham->assign("id_sp",$rows["id_sp"]);
		$sanpham->assign("ten_sp",$ten_sp);
		$sanpham->assign("gia_sp",$gia_sp);
		$sanpham->assign("anh_sp",$anh_sp);
		$sanpham->parse("san_pham.block.list_sp");
	}
	for($i=1;$i<=$sotrang;$i++){
		$sanpham->assign("stt",$i);
		if($i==$page) $sanpham->assign("page","#999"); else $sanpham->assign("page","#FFF");
		$sanpham->assign("act","khuyenmai");
		$sanpham->parse("san_pham.block.so_trang");
	}
	$sanpham->assign("title","MÁY ĐÃ QUA SỬ DỤNG");
	$sanpham->assign("end","");
	$sanpham->parse("san_pham.block");
	$sanpham->parse("san_pham");
	$may_cu = $sanpham->text("san_pham");
//---------------------------------------------------------------
	$sanpham = new XTemplate("views/san_pham.html");
	if(isset($_GET["id_nsx"])){
		$id = $_GET["id_nsx"];
		$query = mysql_query("select * from nsx where id_nsx = $id");
		while($rows = mysql_fetch_array($query)) {
			$id_nsx = $rows["id_nsx"];
			$sanpham->assign("title",$rows["ten_nsx"]);
			$sanpham->assign("act","dt&id_nsx=$id_nsx");
		}
		
		$query = mysql_query("select * from chitiet_sp where id_nsx = $id");
		while($rows = mysql_fetch_array($query)){
			$ten_sp = $rows["ten_sp"];
			$gia_sp = $rows["gia_sp"];
			$anh_sp = $rows["anh_sp"];
			$sanpham->assign("id_sp",$rows["id_sp"]);
			$sanpham->assign("ten_sp",$ten_sp);
			$sanpham->assign("gia_sp",$gia_sp);
			$sanpham->assign("anh_sp",$anh_sp);
			$sanpham->parse("san_pham.block.list_sp");
		}
	$sanpham->parse("san_pham.block");
	}
	else{
		$query = mysql_query("select * from nsx");
		while($rows = mysql_fetch_array($query)){
			$id_nsx = $rows["id_nsx"];
			$query2 = mysql_query("select * from nsx inner join chitiet_sp on nsx.id_nsx = chitiet_sp.id_nsx 
									where nsx.id_nsx = $id_nsx");
			$dem = 1;
			while($rows2 = mysql_fetch_array($query2)){
				$sanpham->assign("title",$rows2["ten_nsx"]);
				$sanpham->assign("id_sp",$rows2["id_sp"]);
				$sanpham->assign("anh_sp",$rows2["anh_sp"]);
				$sanpham->assign("ten_sp",$rows2["ten_sp"]);
				$sanpham->assign("gia_sp",$rows2["gia_sp"]);
				$sanpham->parse("san_pham.block.list_sp");
				$dem++;
				if($dem>11) break;
			}
			$sanpham->assign("act","dt&id_nsx=$id_nsx");
			$sanpham->assign("end","Xem tiếp...");
			$sanpham->parse("san_pham.block");
		}
	}
	$sanpham->parse("san_pham");
	$dt = $sanpham->text("san_pham");
//---------------------------------------------------------------

	$sanpham = new XTemplate("views/san_pham.html");
	if(isset($_GET["id_nsx"])){
		$id = $_GET["id_nsx"];
		$query = mysql_query("select * from nsx where id_nsx = $id");
		while($rows = mysql_fetch_array($query)) {$sanpham->assign("title",$rows["ten_nsx"]);}
		
		$query = mysql_query("select * from chitiet_sp where id_nsx = $id");
		while($rows = mysql_fetch_array($query)){
			$ten_sp = $rows["ten_sp"];
			$gia_sp = $rows["gia_sp"];
			$anh_sp = $rows["anh_sp"];
			$sanpham->assign("id_sp",$rows["id_sp"]);
			$sanpham->assign("ten_sp",$ten_sp);
			$sanpham->assign("gia_sp",$gia_sp);
			$sanpham->assign("anh_sp",$anh_sp);
			$sanpham->parse("san_pham.block.list_sp");
		}
	$sanpham->assign("act","dt&id_nsx=$id_nsx");
	$sanpham->parse("san_pham.block");
	}
	else{
		$query = mysql_query("select * from nsx");
		while($rows = mysql_fetch_array($query)){
			$id_nsx = $rows["id_nsx"];
			$query2 = mysql_query("select * from nsx inner join chitiet_sp on nsx.id_nsx = chitiet_sp.id_nsx 
									where nsx.id_nsx = $id_nsx");
			$dem = 1;
			while($rows2 = mysql_fetch_array($query2)){
				$sanpham->assign("title",$rows2["ten_nsx"]);
				$sanpham->assign("id_sp",$rows2["id_sp"]);
				$sanpham->assign("anh_sp",$rows2["anh_sp"]);
				$sanpham->assign("ten_sp",$rows2["ten_sp"]);
				$sanpham->assign("gia_sp",$rows2["gia_sp"]);
				$sanpham->parse("san_pham.block.list_sp");
				$dem++;
				if($dem>11) break;
			}
			$sanpham->assign("act","dt&id_nsx=$id_nsx");
			$sanpham->assign("end","Xem tiếp...");
			$sanpham->parse("san_pham.block");
		}
	}
	$sanpham->parse("san_pham");
	$mtb = $sanpham->text("san_pham");
//--------------------------------------------------------------- 
?>