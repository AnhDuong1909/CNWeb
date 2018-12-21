<?php
	$sp = new XTemplate("views/san_pham.html");
	mysql_connect("localhost","root","");
	mysql_select_db("project");

	$query = mysql_query("select * from nsx");
	while($rows = mysql_fetch_array($query)){
		$sp->assign("id",$rows["id_nsx"]);
		$sp->assign("ten_nsx",$rows["ten_nsx"]);
		$sp->parse("edit.select_nsx");
	}
	for($i=0;$i<=10;$i++){
		$sp->assign("hot",$i);
		$sp->parse("edit.hot");
	}
	
	$sp->assign("title","THÊM SẢN PHẨM");
	$sp->assign("act","add_sp");
	$sp->parse("edit");
	$add_sp = $sp->text("edit");
//-----------------------------------------------------------------
	$sp = new XTemplate("views/san_pham.html");
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					
					$query = mysql_query("select * from nsx");
					while($rows = mysql_fetch_array($query)){
						$sp->assign("id",$rows["id_nsx"]);
						$sp->assign("ten_nsx",$rows["ten_nsx"]);
						$query2 = mysql_query("select * from chitiet_sp where id_sp = $id");
						$rows2 = mysql_fetch_array($query2);
						if($rows2["id_nsx"]==$rows["id_nsx"]) $sp->assign("selected","selected");
							else $sp->assign("selected","");
						$sp->parse("edit.select_nsx");
					}
					
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					for($i=0;$i<=10;$i++){
						$sp->assign("hot",$i);
						if($i==$rows["do_hot"]) $sp->assign("selected","selected");
							else $sp->assign("selected","");
						$sp->parse("edit.hot");
					}
					
					if($rows["km"]==1){
						$sp->assign("km","checked");
						$sp->assign("gia_km",$rows["gia_km"]);
						$sp->assign("batdau_km",$rows["batdau_km"]);
						$sp->assign("ketthuc_km",$rows["ketthuc_km"]);
					}
					$sp->assign("act","edit_sp&id=$id");
					$sp->assign("title","CHỈNH SỬA");
					$sp->assign("ten_sp",$rows["ten_sp"]);
					$sp->assign("gia_sp",$rows["gia_sp"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("mang_2g",$rows["mang_2g"]);
					$sp->assign("mang_3g",$rows["mang_3g"]);
					$sp->assign("ra_mat",$rows["ra_mat"]);
					$sp->assign("co_hang",$rows["co_hang"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("kich_thuoc",$rows["kich_thuoc"]);
					$sp->assign("trong_luong",$rows["trong_luong"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("loai_mh",$rows["loai_mh"]);
					$sp->assign("kich_thuoc_mh",$rows["kich_thuoc_mh"]);
					$sp->assign("khac_mh",$rows["khac_mh"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("kieu_chuong",$rows["kieu_chuong"]);
					if($rows["jack35mm"]==1) $sp->assign("jack35mm","checked");
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("danh_ba",$rows["danh_ba"]);
					$sp->assign("nhat_ky",$rows["nhat_ky"]);
					$sp->assign("bo_nho",$rows["bo_nho"]);
					$sp->assign("ram",$rows["ram"]);
					$sp->assign("the_nho",$rows["the_nho"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					if($rows["gprs"]==1) $sp->assign("gprs","checked");
					$sp->assign("edge",$rows["edge"]);
					$sp->assign("3g",$rows["3g"]);
					if($rows["nfc"]==1) $sp->assign("nfc","checked");
					$sp->assign("wlan",$rows["wlan"]);
					$sp->assign("bluetooth",$rows["bluetooth"]);
					if($rows["hong_ngoai"]==1) $sp->assign("hong_ngoai","checked");
					$sp->assign("usb",$rows["usb"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("camera_chinh",$rows["camera_chinh"]);
					$sp->assign("camera_phu",$rows["camera_phu"]);
					$sp->assign("quay_phim",$rows["quay_phim"]);
					$sp->assign("dac_diem_camera",$rows["dac_diem_camera"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("he_dieu_hanh",$rows["he_dieu_hanh"]);
					$sp->assign("bo_xu_ly",$rows["bo_xu_ly"]);
					$sp->assign("chipset",$rows["chipset"]);
					$sp->assign("tin_nhan",$rows["tin_nhan"]);
					$sp->assign("trinh_duyet",$rows["trinh_duyet"]);
					$sp->assign("radio",$rows["radio"]);
					$sp->assign("tro_choi",$rows["tro_choi"]);
					$sp->assign("mau_sac",$rows["mau_sac"]);
					$sp->assign("ngon_ngu",$rows["ngon_ngu"]);
					$sp->assign("dinh_vi",$rows["dinh_vi"]);
					$sp->assign("java",$rows["java"]);
					$sp->assign("khac_dd",$rows["khac_dd"]);
					//------------
					$query = mysql_query("select * from chitiet_sp where id_sp = $id");
					$rows = mysql_fetch_array($query);
					$sp->assign("loai_pin",$rows["loai_pin"]);
					$sp->assign("time_cho",$rows["time_cho"]);
					$sp->assign("time_goi",$rows["time_goi"]);
					//------------
					$sp->parse("edit");
	}
	$edit_sp = $sp->text("edit");
	
//--------------------------------------------------------------
	$sp = new XTemplate("views/san_pham.html");
	$query = mysql_query("select * from chitiet_sp order by id_sp desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query2 = mysql_query("SELECT * from chitiet_sp order by id_sp desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query2)){
		$sp->assign("stt",$stt); $stt++;
		$sp->assign("ten_sp",$rows["ten_sp"]);
		$sp->assign("gia_sp",$rows["gia_sp"]);
		$sp->assign("anh_sp",$rows["anh_sp"]);
		$sp->assign("id",$rows["id_sp"]);
		$sp->parse("list_sp.in_sp");
	}
	for($i=1;$i<=$sotrang;$i++){
		$sp->assign("stt",$i);
		if($i==$page) $sp->assign("page","#999"); else $sp->assign("page","#FFF");
		$sp->parse("list_sp.so_trang");
	}
	$sp->assign("title","DANH SÁCH SẢN PHẨM");
	$sp->parse("list_sp");
	$list_sp = $sp->text("list_sp");
	
//-------------------------------------------------------------------

	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_sp":{
				if(isset($_POST["submit"])){
					if(( $_POST["ten_sp"]!="") && ($_POST["gia_sp"]!="") && isset($_FILES["anh_sp"]) ){
						$ten_sp = $_POST["ten_sp"];
						$gia_sp = $_POST["gia_sp"];
						$anh_sp = $_FILES["anh_sp"]["name"];
						$nsx = $_POST["nsx"];
						$do_hot = $_POST["hot"];
						$km = $_POST["khuyen_mai"];
						$gia_km = $_POST["gia_km"];
						$batdau_km = $_POST["batdau_km"];
						$ketthuc_km = $_POST["ketthuc_km"];
						mysql_query("insert into chitiet_sp 
						(ten_sp, gia_sp, anh_sp, id_nsx, do_hot, km, gia_km, batdau_km, ketthuc_km) values 
						('$ten_sp','$gia_sp','$anh_sp','$nsx','$do_hot','$km','$gia_km','$batdau_km','$ketthuc_km')");
						$id = mysql_insert_id();
					//------------
						$mang_2g = $_POST["mang_2g"];
						$mang_3g = $_POST["mang_3g"];
						$ra_mat = $_POST["ra_mat"];
						$co_hang = $_POST["co_hang"];
						mysql_query("update chitiet_sp set mang_2g='$mang_2g', mang_3g='$mang_3g', 
									ra_mat='$ra_mat', co_hang='$co_hang' where id_sp = $id");
					//------------
						$kich_thuoc = $_POST["kich_thuoc"];
						$trong_luong = $_POST["trong_luong"];
						mysql_query("update chitiet_sp set kich_thuoc='$kich_thuoc', trong_luong='$trong_luong' 
									where id_sp = $id");
					//------------
						$loai_mh = $_POST["loai_mh"];
						$kich_thuoc_mh = $_POST["kich_thuoc_mh"];
						$khac_mh = $_POST["khac_mh"];
						mysql_query("update chitiet_sp set loai_mh='$loai_mh', kich_thuoc_mh='$kich_thuoc_mh', 
									khac_mh='$khac_mh' where id_sp = $id");
					//------------
						$kieu_chuong = $_POST["kieu_chuong"];
						$jack35mm = $_POST["jack35mm"];
						mysql_query("update chitiet_sp set kieu_chuong='$kieu_chuong', jack35mm='$jack35mm'
									where id_sp = $id");
					//------------
						$danh_ba = $_POST["danh_ba"];
						$nhat_ky = $_POST["nhat_ky"];
						$bo_nho = $_POST["bo_nho"];
						$ram = $_POST["ram"];
						$the_nho = $_POST["the_nho"];
						mysql_query("update chitiet_sp set danh_ba='$danh_ba', nhat_ky='$nhat_ky', bo_nho='$bo_nho', 
									ram='$ram', the_nho='$the_nho' where id_sp = $id");
					//------------
						$gprs = $_POST["gprs"];
						$edge = $_POST["edge"];
						$ba_g = $_POST["3g"];
						$nfc = $_POST["nfc"];
						$wlan = $_POST["wlan"];
						$bluetooth = $_POST["bluetooth"];
						$hong_ngoai = $_POST["hong_ngoai"];
						$usb = $_POST["usb"];
						mysql_query("update chitiet_sp set gprs='$gprs', edge='$edge', 3g='$ba_g', nfc='$nfc', 
								wlan='$wlan', bluetooth='$bluetooth', hong_ngoai='$hong_ngoai', usb='$usb' where id_sp = $id");
					//------------
						$camera_chinh = $_POST["camera_chinh"];
						$camera_phu = $_POST["camera_phu"];
						$quay_phim = $_POST["quay_phim"];
						$dac_diem_camera = $_POST["dac_diem_camera"];
						mysql_query("update chitiet_sp set camera_chinh='$camera_chinh', camera_phu='$camera_phu', 
									quay_phim='$quay_phim', dac_diem_camera='$dac_diem_camera' where id_sp = $id");
					//------------
						$he_dieu_hanh = $_POST["he_dieu_hanh"];
						$bo_xu_ly = $_POST["bo_xu_ly"];
						$chipset = $_POST["chipset"];
						$tin_nhan = $_POST["tin_nhan"];
						$trinh_duyet = $_POST["trinh_duyet"];
						$radio = $_POST["radio"];
						$tro_choi = $_POST["tro_choi"];
						$mau_sac = $_POST["mau_sac"];
						$ngon_ngu = $_POST["ngon_ngu"];
						$dinh_vi = $_POST["dinh_vi"];
						$java = $_POST["java"];
						$khac_dd = $_POST["khac_dd"];
						mysql_query("update chitiet_sp 
							set he_dieu_hanh='$he_dieu_hanh', bo_xu_ly='$bo_xu_ly', chipset='$chipset', tin_nhan='$tin_nhan', 
							trinh_duyet='$trinh_duyet', radio='$radio', tro_choi='$tro_choi', mau_sac='$mau_sac', 
							ngon_ngu='$ngon_ngu', dinh_vi='$dinh_vi', java='$java', khac_dd='$khac_dd' where id_sp = $id");
					//------------
						$loai_pin = $_POST["loai_pin"];
						$time_cho = $_POST["time_cho"];
						$time_goi = $_POST["time_goi"];
						mysql_query("update chitiet_sp set loai_pin='$loai_pin', time_cho='$time_cho', time_goi='$time_goi' 
								where id_sp = $id");
					//------------
					}
					header("location:index.php?act=sp");
				}
				
				break;
			}
			case "edit_sp":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					if(isset($_POST["submit"])){
						if(( $_POST["ten_sp"]!="") && ($_POST["gia_sp"]!="") && isset($_FILES["anh_sp"]) ){
							$ten_sp = $_POST["ten_sp"];
							$gia_sp = $_POST["gia_sp"];
							$anh_sp = $_FILES["anh_sp"]["name"];
							$nsx = $_POST["nsx"];
							$do_hot = $_POST["hot"];
							$km = $_POST["khuyen_mai"];
							$gia_km = $_POST["gia_km"];
							$batdau_km = $_POST["batdau_km"];
							$ketthuc_km = $_POST["ketthuc_km"];
							if($_FILES["anh_sp"]["name"]!=""){
								move_uploaded_file($_FILES["anh_sp"]["tmp_name"],"../img/dienthoai/".$_FILES["anh_sp"]["name"]);
								mysql_query("update chitiet_sp set anh_sp='$anh_sp' where id_sp = $id");
							}
							mysql_query("update chitiet_sp set ten_sp = '$ten_sp', gia_sp = '$gia_sp', id_nsx = '$nsx',
									 do_hot='$do_hot', km = '$km', gia_km = '$gia_km', batdau_km = '$batdau_km', 
									 ketthuc_km = '$ketthuc_km' where id_sp = $id");
						//------------
							$mang_2g = $_POST["mang_2g"];
							$mang_3g = $_POST["mang_3g"];
							$ra_mat = $_POST["ra_mat"];
							$co_hang = $_POST["co_hang"];
							mysql_query("update chitiet_sp set mang_2g='$mang_2g', mang_3g='$mang_3g', 
									ra_mat='$ra_mat', co_hang='$co_hang' where id_sp = $id");
						//------------
							$kich_thuoc = $_POST["kich_thuoc"];
							$trong_luong = $_POST["trong_luong"];
							mysql_query("update chitiet_sp set kich_thuoc='$kich_thuoc', trong_luong='$trong_luong' 
									where id_sp = $id");
						//------------
							$loai_mh = $_POST["loai_mh"];
							$kich_thuoc_mh = $_POST["kich_thuoc_mh"];
							$khac_mh = $_POST["khac_mh"];
							mysql_query("update chitiet_sp set loai_mh='$loai_mh', kich_thuoc_mh='$kich_thuoc_mh', 
									khac_mh='$khac_mh' where id_sp = $id");
						//------------
							$kieu_chuong = $_POST["kieu_chuong"];
							$jack35mm = $_POST["jack35mm"];
							mysql_query("update chitiet_sp set kieu_chuong='$kieu_chuong', jack35mm='$jack35mm'
									where id_sp = $id");
						//------------
							$danh_ba = $_POST["danh_ba"];
							$nhat_ky = $_POST["nhat_ky"];
							$bo_nho = $_POST["bo_nho"];
							$ram = $_POST["ram"];
							$the_nho = $_POST["the_nho"];
							mysql_query("update chitiet_sp set danh_ba='$danh_ba', nhat_ky='$nhat_ky', bo_nho='$bo_nho', 
									ram='$ram', the_nho='$the_nho' where id_sp = $id");
						//------------
							$gprs = $_POST["gprs"];
							$edge = $_POST["edge"];
							$ba_g = $_POST["3g"];
							$nfc = $_POST["nfc"];
							$wlan = $_POST["wlan"];
							$bluetooth = $_POST["bluetooth"];
							$hong_ngoai = $_POST["hong_ngoai"];
							$usb = $_POST["usb"];
							mysql_query("update chitiet_sp set gprs='$gprs', edge='$edge', 3g='$ba_g', nfc='$nfc', 
								wlan='$wlan', bluetooth='$bluetooth', hong_ngoai='$hong_ngoai', usb='$usb' where id_sp = $id");
						//------------
							$camera_chinh = $_POST["camera_chinh"];
							$camera_phu = $_POST["camera_phu"];
							$quay_phim = $_POST["quay_phim"];
							$dac_diem_camera = $_POST["dac_diem_camera"];
							mysql_query("update chitiet_sp set camera_chinh='$camera_chinh', camera_phu='$camera_phu', 
									quay_phim='$quay_phim', dac_diem_camera='$dac_diem_camera' where id_sp = $id");
						//------------
							$he_dieu_hanh = $_POST["he_dieu_hanh"];
							$bo_xu_ly = $_POST["bo_xu_ly"];
							$chipset = $_POST["chipset"];
							$tin_nhan = $_POST["tin_nhan"];
							$trinh_duyet = $_POST["trinh_duyet"];
							$radio = $_POST["radio"];
							$tro_choi = $_POST["tro_choi"];
							$mau_sac = $_POST["mau_sac"];
							$ngon_ngu = $_POST["ngon_ngu"];
							$dinh_vi = $_POST["dinh_vi"];
							$java = $_POST["java"];
							$khac_dd = $_POST["khac_dd"];
							mysql_query("update chitiet_sp 
							set he_dieu_hanh='$he_dieu_hanh', bo_xu_ly='$bo_xu_ly', chipset='$chipset', tin_nhan='$tin_nhan', 
							trinh_duyet='$trinh_duyet', radio='$radio', tro_choi='$tro_choi', mau_sac='$mau_sac', 
							ngon_ngu='$ngon_ngu', dinh_vi='$dinh_vi', java='$java', khac_dd='$khac_dd' where id_sp = $id");
						//------------
							$loai_pin = $_POST["loai_pin"];
							$time_cho = $_POST["time_cho"];
							$time_goi = $_POST["time_goi"];
							mysql_query("update chitiet_sp set loai_pin='$loai_pin', time_cho='$time_cho', time_goi='$time_goi' 
								where id_sp = $id");
						//------------
						}
					}
					header("location:index.php?act=sp&page=$page");
				}
				break;
			}
			case "del_sp":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					mysql_query("delete from chitiet_sp where id_sp = $id");
					mysql_query("delete from thong_tin_co_ban where id_sp = $id");
					mysql_query("delete from thong_tin_chung where id_sp = $id");
					mysql_query("delete from kich_thuoc where id_sp = $id");
					mysql_query("delete from hien_thi where id_sp = $id");
					mysql_query("delete from am_thanh where id_sp = $id");
					mysql_query("delete from bo_nho where id_sp = $id");
					mysql_query("delete from truyen_du_lieu where id_sp = $id");
					mysql_query("delete from camera where id_sp = $id");
					mysql_query("delete from dac_diem where id_sp = $id");
					mysql_query("delete from pin where id_sp = $id");
				}
				header("location:index.php?act=sp");
				break;
			}
			case "del_all_sp":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from chitiet_sp where id_sp in($str)";
				mysql_query($sql);
				mysql_query("delete from thong_tin_co_ban where id_sp in($str)");
				mysql_query("delete from thong_tin_chung where id_sp in($str)");
				mysql_query("delete from kich_thuoc where id_sp in($str)");
				mysql_query("delete from hien_thi where id_sp in($str)");
				mysql_query("delete from am_thanh where id_sp in($str)");
				mysql_query("delete from bo_nho where id_sp in($str)");
				mysql_query("delete from truyen_du_lieu where id_sp in($str)");
				mysql_query("delete from camera where where id_sp in($str)");
				mysql_query("delete from dac_diem where id_sp in($str)");
				mysql_query("delete from pin where id_sp in($str)");
				header("location:index.php?act=sp");
			}
		}//end switch
	}//end if(isset($_GET["act"]))

?>
