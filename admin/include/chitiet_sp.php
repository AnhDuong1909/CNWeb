<?php
	$chitiet_sp = new XTemplate("views/chitiet_sp.html");
	if(isset($_GET["act"])){
		if( ($_GET["act"]=="chitiet_sp")&& isset($_GET["id_sp"]) ){
			if(is_numeric($_GET["id_sp"])) $id = $_GET["id_sp"]; else $id = 1;
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$num = mysql_num_rows($query);
			if($num==0) $id = 1;
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("id_sp",$rows["id_sp"]);
			$chitiet_sp->assign("id_tbl",$rows["id_tbl"]);
			$chitiet_sp->assign("ten_sp",$rows["ten_sp"]);
			$chitiet_sp->assign("gia_sp",$rows["gia_sp"]);
			$chitiet_sp->assign("anh_sp",$rows["anh_sp"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("mang_2g",$rows["mang_2g"]);
			$chitiet_sp->assign("mang_3g",$rows["mang_3g"]);
			$chitiet_sp->assign("ra_mat",$rows["ra_mat"]);
			$chitiet_sp->assign("co_hang",$rows["co_hang"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("kich_thuoc",$rows["kich_thuoc"]);
			$chitiet_sp->assign("trong_luong",$rows["trong_luong"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("loai_mh",$rows["loai_mh"]);
			$chitiet_sp->assign("kich_thuoc_mh",$rows["kich_thuoc_mh"]);
			$chitiet_sp->assign("khac_mh",$rows["khac_mh"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("kieu_chuong",$rows["kieu_chuong"]);
			if($rows["jack35mm"]==1) $chitiet_sp->assign("jack35mm","Có"); else $chitiet_sp->assign("jack35mm","Không");
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("danh_ba",$rows["danh_ba"]);
			$chitiet_sp->assign("nhat_ky",$rows["nhat_ky"]);
			$chitiet_sp->assign("bo_nho",$rows["bo_nho"]);
			$chitiet_sp->assign("ram",$rows["ram"]);
			$chitiet_sp->assign("the_nho",$rows["the_nho"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			if($rows["gprs"]==1) $chitiet_sp->assign("gprs","Có"); else $chitiet_sp->assign("gprs","Không");
			if($rows["nfc"]==1) $chitiet_sp->assign("nfc","Có"); else $chitiet_sp->assign("nfc","Không");
			if($rows["hong_ngoai"]==1) $chitiet_sp->assign("hong_ngoai","Có"); else $chitiet_sp->assign("hong_ngoai","Không");
			$chitiet_sp->assign("edge",$rows["edge"]);
			$chitiet_sp->assign("3g",$rows["3g"]);
			$chitiet_sp->assign("wlan",$rows["wlan"]);
			$chitiet_sp->assign("bluetooth",$rows["bluetooth"]);
			$chitiet_sp->assign("usb",$rows["usb"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("camera_chinh",$rows["camera_chinh"]);
			$chitiet_sp->assign("camera_phu",$rows["camera_phu"]);
			$chitiet_sp->assign("quay_phim",$rows["quay_phim"]);
			$chitiet_sp->assign("dac_diem_camera",$rows["dac_diem_camera"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("he_dieu_hanh",$rows["he_dieu_hanh"]);
			$chitiet_sp->assign("bo_xu_ly",$rows["bo_xu_ly"]);
			$chitiet_sp->assign("chipset",$rows["chipset"]);
			$chitiet_sp->assign("tin_nhan",$rows["tin_nhan"]);
			$chitiet_sp->assign("trinh_duyet",$rows["trinh_duyet"]);
			$chitiet_sp->assign("radio",$rows["radio"]);
			$chitiet_sp->assign("tro_choi",$rows["tro_choi"]);
			$chitiet_sp->assign("mau_sac",$rows["mau_sac"]);
			$chitiet_sp->assign("dinh_vi",$rows["dinh_vi"]);
			$chitiet_sp->assign("ngon_ngu",$rows["ngon_ngu"]);
			$chitiet_sp->assign("java",$rows["java"]);
			$chitiet_sp->assign("khac_dd",$rows["khac_dd"]);
		//-------------
			$query = mysql_query("select * from chitiet_sp where id_sp=$id");
			$rows = mysql_fetch_array($query);
			$chitiet_sp->assign("loai_pin",$rows["loai_pin"]);
			$chitiet_sp->assign("time_cho",$rows["time_cho"]);
			$chitiet_sp->assign("time_goi",$rows["time_goi"]);
		//-------------
		}
	}
	$chitiet_sp->parse("chitiet_sp");
	$chitiet_sp = $chitiet_sp->text("chitiet_sp");
?>