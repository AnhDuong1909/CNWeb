<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$spk = new XTemplate("views/spk.html");
	
	$query = mysql_query("select * from dm_spk");
	while($rows = mysql_fetch_array($query)){
		$spk->assign("id_dm_spk",$rows["id_dm_spk"]);
		$spk->assign("ten_dm_spk",$rows["ten_dm_spk"]);
		$spk->parse("edit_spk.select_dm");
	}
	
	$spk->assign("title","THÊM SPK");
	$spk->assign("act","add_spk");
	$spk->parse("edit_spk");
	$add_spk = $spk->text("edit_spk");
//-----------------------------------------------------------
	$spk = new XTemplate("views/spk.html");
	
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					
					$query = mysql_query("select * from dm_spk");
					while($rows = mysql_fetch_array($query)){
						$spk->assign("id_dm_spk",$rows["id_dm_spk"]);
						$spk->assign("ten_dm_spk",$rows["ten_dm_spk"]);
						$query2 = mysql_query("select * from spk where id_spk = $id");
						$rows2 = mysql_fetch_array($query2);
						if($rows["id_dm_spk"]==$rows2["id_dm_spk"]) $spk->assign("selected","selected");
							else $spk->assign("selected","");
						$spk->parse("edit_spk.select_dm");
					}
					
					$query = mysql_query("select * from spk where id_spk = $id");
					$rows = mysql_fetch_array($query);
					$spk->assign("title","CHỈNH SỬA");
					$spk->assign("act","edit_spk&id=$id");
					$spk->assign("ten_spk",$rows["ten_spk"]);
					$spk->assign("gia_spk",$rows["gia_spk"]);
					$spk->assign("tinh_trang",$rows["tinh_trang"]);
					$spk->assign("mau_sac",$rows["mau_sac"]);
					$spk->assign("thiet_ke",$rows["thiet_ke"]);
					$spk->assign("su_dung",$rows["su_dung"]);
					$spk->assign("bao_hanh",$rows["bao_hanh"]);
					$spk->assign("xuat_xu",$rows["xuat_xu"]);
					$spk->assign("p1",$rows["p1"]);
					$spk->assign("p2",$rows["p2"]);
					$spk->assign("p3",$rows["p3"]);
					$spk->assign("p4",$rows["p4"]);
					$spk->parse("edit_spk");
	}
	$edit_spk = $spk->text("edit_spk");
//-----------------------------------------------------------
	$spk = new XTemplate("views/spk.html");
	
	$query = mysql_query("select * from spk order by id_spk desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from spk order by id_spk desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		
		$spk->assign("stt",$stt); $stt++;
		$spk->assign("ten_spk",$rows["ten_spk"]);
		$spk->assign("gia_spk",$rows["gia_spk"]);
		$spk->assign("anh_spk",$rows["anh_spk"]);
		$spk->assign("id",$rows["id_spk"]);
		$spk->parse("list_spk.in_ra");
	}
	for($i=1;$i<=$sotrang;$i++){
		$spk->assign("stt",$i);
		if($i==$page) $spk->assign("page","#999"); else $spk->assign("page","#FFF");
		$spk->parse("list_spk.so_trang");
	}
	$spk->assign("title","DANH SÁCH SẢN PHẨM KHÁC");
	$spk->parse("list_spk");
	$list_spk = $spk->text("list_spk");
//-----------------------------------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_spk":{
				if(isset($_POST["submit"])){
					if(( $_POST["ten_spk"]!="") && ($_POST["gia_spk"]!="") && isset($_FILES["anh_spk"]) ){
						$ten_spk = $_POST["ten_spk"];
						$gia_spk = $_POST["gia_spk"];
						$anh_spk = $_FILES["anh_spk"]["name"];
						$dm = $_POST["dm"];
						$anh1 = $_FILES["anh1"]["name"];
						$anh2 = $_FILES["anh2"]["name"];
						$anh3 = $_FILES["anh3"]["name"];
						$anh4 = $_FILES["anh4"]["name"];
						$p1 = $_POST["p1"];
						$p2 = $_POST["p2"];
						$p3 = $_POST["p3"];
						$p4 = $_POST["p4"];
						$tinh_trang = $_POST["tinh_trang"];
						$mau_sac = $_POST["mau_sac"];
						$thiet_ke = $_POST["thiet_ke"];
						$su_dung = $_POST["su_dung"];
						$bao_hanh = $_POST["bao_hanh"];
						$xuat_xu = $_POST["xuat_xu"];
						mysql_query("insert into spk (ten_spk, gia_spk, anh_spk, anh1, anh2, anh3, anh4, id_dm_spk, tinh_trang, 
							mau_sac, thiet_ke, su_dung, bao_hanh, xuat_xu, p1, p2, p3, p4) 
						values ('$ten_spk','$gia_spk','$anh_spk','$anh1','$anh2','$anh3','$anh4','$dm','$tinh_trang',
							'$mau_sac','$thiet_ke','$su_dung','$bao_hanh','$xuat_xu','$p1','$p2','$p3','$p4')");
					}
					header("location:index.php?act=spk");
				}
				break;
			}
			case "edit_spk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					if(isset($_POST["submit"])){
						if(( $_POST["ten_spk"]!="") && ($_POST["gia_spk"]!="") && isset($_FILES["anh_spk"]) ){
							$ten_spk = $_POST["ten_spk"];
							$gia_spk = $_POST["gia_spk"];
							$anh_spk = $_FILES["anh_spk"]["name"];
							$dm = $_POST["dm"];
							if($_FILES["anh_spk"]["name"]!=""){
								move_uploaded_file($_FILES["anh_spk"]["tmp_name"],"../img/spk/".$_FILES["anh_spk"]["name"]);
								mysql_query("update spk set anh_spk='$anh_spk' where id_spk = $id");
							}
							mysql_query("update spk set ten_spk = '$ten_spk', gia_spk = '$gia_spk', id_dm_spk = '$dm' 
									where id_spk = $id");
							//-----------
							$p1 = $_POST["p1"];
							$p2 = $_POST["p2"];
							$p3 = $_POST["p3"];
							$p4 = $_POST["p4"];
							$tinh_trang = $_POST["tinh_trang"];
							$mau_sac = $_POST["mau_sac"];
							$thiet_ke = $_POST["thiet_ke"];
							$su_dung = $_POST["su_dung"];
							$bao_hanh = $_POST["bao_hanh"];
							$xuat_xu = $_POST["xuat_xu"];
							mysql_query("update spk set p1='$p1', p2='$p2', p3='$p3', p4='$p4', tinh_trang='$tinh_trang', 
							mau_sac='$mau_sac', thiet_ke='$thiet_ke', su_dung='$su_dung', bao_hanh='$bao_hanh', 
							xuat_xu='$xuat_xu' where id_spk = $id");
							//-----------
							$anh1 = $_FILES["anh1"]["name"];
							$anh2 = $_FILES["anh2"]["name"];
							$anh3 = $_FILES["anh3"]["name"];
							$anh4 = $_FILES["anh4"]["name"];
							if($_FILES["anh1"]["name"]!=""){
								move_uploaded_file($_FILES["anh1"]["tmp_name"],"../img/pk/".$_FILES["anh1"]["name"]);
								mysql_query("update spk set anh1='$anh1' where id_spk = $id");
							}
							if($_FILES["anh2"]["name"]!=""){
								move_uploaded_file($_FILES["anh2"]["tmp_name"],"../img/pk/".$_FILES["anh2"]["name"]);
								mysql_query("update spk set anh2='$anh2' where id_spk = $id");
							}
							if($_FILES["anh3"]["name"]!=""){
								move_uploaded_file($_FILES["anh3"]["tmp_name"],"../img/pk/".$_FILES["anh3"]["name"]);
								mysql_query("update spk set anh3='$anh3' where id_spk = $id");
							}
							if($_FILES["anh4"]["name"]!=""){
								move_uploaded_file($_FILES["anh4"]["tmp_name"],"../img/pk/".$_FILES["anh4"]["name"]);
								mysql_query("update spk set anh4='$anh4' where id_spk = $id");
							}
						}
					}
					header("location:index.php?act=spk");
				}
				break;
			}
			case "del_spk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from spk where id_spk = $id");
				}
				header("location:index.php?act=spk");
				break;
			}
			case "del_all_spk":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from spk where id_spk in($str)";
				mysql_query($sql);
				header("location:index.php?act=spk");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>