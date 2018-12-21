<?php
	$chitiet_pk = new XTemplate("views/chitiet_pk.html");
	if(isset($_GET["act"])){
		if( ($_GET["act"]=="chitiet_pk")&& isset($_GET["id_pk"]) ){
			if(is_numeric($_GET["id_pk"])) $id = $_GET["id_pk"]; else $id = 1;
			$query = mysql_query("select * from pk where id_pk = $id");
			$num = mysql_num_rows($query);
			if($num==0) $id = 1;
			$query = mysql_query("select * from pk where id_pk = $id");
			while($rows = mysql_fetch_array($query)){
				$chitiet_pk->assign("id_pk",$rows["id_pk"]);
				$chitiet_pk->assign("id_tbl",$rows["id_tbl"]);
				$chitiet_pk->assign("anh_pk",$rows["anh_pk"]);
				$chitiet_pk->assign("ten_pk",$rows["ten_pk"]);
				$chitiet_pk->assign("gia_pk",$rows["gia_pk"]);
				$chitiet_pk->assign("tinh_trang",$rows["tinh_trang"]);
				$chitiet_pk->assign("mau_sac",$rows["mau_sac"]);
				$chitiet_pk->assign("thiet_ke",$rows["thiet_ke"]);
				$chitiet_pk->assign("su_dung",$rows["su_dung"]);
				$chitiet_pk->assign("bao_hanh",$rows["bao_hanh"]);
				$chitiet_pk->assign("xuat_xu",$rows["xuat_xu"]);
				if($rows["anh1"]!=""){
					$chitiet_pk->assign("anh1",'<img src="img/pk/'.$rows["anh1"].'">');
					$chitiet_pk->assign("p1",$rows["p1"]);
				}
				if($rows["anh2"]!=""){
					$chitiet_pk->assign("anh2",'<img src="img/pk/'.$rows["anh2"].'">');
					$chitiet_pk->assign("p2",$rows["p2"]);
				}
				if($rows["anh3"]!=""){
					$chitiet_pk->assign("anh3",'<img src="img/pk/'.$rows["anh3"].'">');
					$chitiet_pk->assign("p3",$rows["p3"]);
				}
				if($rows["anh4"]!=""){
					$chitiet_pk->assign("anh4",'<img src="img/pk/'.$rows["anh4"].'">');
					$chitiet_pk->assign("p4",$rows["p4"]);
				}
			}
			
		}
	}
	$chitiet_pk->parse("chitiet_pk");
	$chitiet_pk = $chitiet_pk->text("chitiet_pk");
?>