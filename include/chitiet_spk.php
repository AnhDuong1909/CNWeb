<?php
	$chitiet_spk = new XTemplate("views/chitiet_spk.html");
	if(isset($_GET["act"])){
		if( ($_GET["act"]=="chitiet_spk")&& isset($_GET["id_spk"]) ){
			if(is_numeric($_GET["id_spk"])) $id = $_GET["id_spk"]; else $id = 1;
			$query = mysql_query("select * from spk where id_spk = $id");
			$num = mysql_num_rows($query);
			if($num==0) $id = 1;
			$query = mysql_query("select * from spk where id_spk = $id");
			while($rows = mysql_fetch_array($query)){
				$chitiet_spk->assign("id_spk",$rows["id_spk"]);
				$chitiet_spk->assign("id_tbl",$rows["id_tbl"]);
				$chitiet_spk->assign("anh_spk",$rows["anh_spk"]);
				$chitiet_spk->assign("ten_spk",$rows["ten_spk"]);
				$chitiet_spk->assign("gia_spk",$rows["gia_spk"]);
				$chitiet_spk->assign("tinh_trang",$rows["tinh_trang"]);
				$chitiet_spk->assign("mau_sac",$rows["mau_sac"]);
				$chitiet_spk->assign("thiet_ke",$rows["thiet_ke"]);
				$chitiet_spk->assign("su_dung",$rows["su_dung"]);
				$chitiet_spk->assign("bao_hanh",$rows["bao_hanh"]);
				$chitiet_spk->assign("xuat_xu",$rows["xuat_xu"]);
				if($rows["anh1"]!=""){
					$chitiet_spk->assign("anh1",'<img src="img/pk/'.$rows["anh1"].'">');
					$chitiet_spk->assign("p1",$rows["p1"]);
				}
				if($rows["anh2"]!=""){
					$chitiet_spk->assign("anh2",'<img src="img/pk/'.$rows["anh2"].'">');
					$chitiet_spk->assign("p2",$rows["p2"]);
				}
				if($rows["anh3"]!=""){
					$chitiet_spk->assign("anh3",'<img src="img/pk/'.$rows["anh3"].'">');
					$chitiet_spk->assign("p3",$rows["p3"]);
				}
				if($rows["anh4"]!=""){
					$chitiet_spk->assign("anh4",'<img src="img/pk/'.$rows["anh4"].'">');
					$chitiet_spk->assign("p4",$rows["p4"]);
				}
			}
			
		}
	}
	$chitiet_spk->parse("chitiet_spk");
	$chitiet_spk = $chitiet_spk->text("chitiet_spk");
?>