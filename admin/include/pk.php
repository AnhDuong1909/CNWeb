<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$pk = new XTemplate("views/pk.html");
	
	$query = mysql_query("select * from dm_pk");
	while($rows = mysql_fetch_array($query)){
		$pk->assign("id_dm_pk",$rows["id_dm_pk"]);
		$pk->assign("ten_dm_pk",$rows["ten_dm_pk"]);
		$pk->parse("edit_pk.select_dm");
	}
	
	$pk->assign("title","THÊM pk");
	$pk->assign("act","add_pk");
	$pk->parse("edit_pk");
	$add_pk = $pk->text("edit_pk");
//-----------------------------------------------------------
	$pk = new XTemplate("views/pk.html");
	
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					
					$query = mysql_query("select * from dm_pk");
					while($rows = mysql_fetch_array($query)){
						$pk->assign("id_dm_pk",$rows["id_dm_pk"]);
						$pk->assign("ten_dm_pk",$rows["ten_dm_pk"]);
						$query2 = mysql_query("select * from pk where id_pk = $id");
						$rows2 = mysql_fetch_array($query2);
						if($rows["id_dm_pk"]==$rows2["id_dm_pk"]) $pk->assign("selected","selected");
							else $pk->assign("selected","");
						$pk->parse("edit_pk.select_dm");
					}
					
					$query = mysql_query("select * from pk where id_pk = $id");
					$rows = mysql_fetch_array($query);
					$pk->assign("title","CHỈNH SỬA");
					$pk->assign("act","edit_pk&id=$id");
					$pk->assign("ten_pk",$rows["ten_pk"]);
					$pk->assign("gia_pk",$rows["gia_pk"]);
					$pk->assign("tinh_trang",$rows["tinh_trang"]);
					$pk->assign("mau_sac",$rows["mau_sac"]);
					$pk->assign("thiet_ke",$rows["thiet_ke"]);
					$pk->assign("su_dung",$rows["su_dung"]);
					$pk->assign("bao_hanh",$rows["bao_hanh"]);
					$pk->assign("xuat_xu",$rows["xuat_xu"]);
					$pk->assign("p1",$rows["p1"]);
					$pk->assign("p2",$rows["p2"]);
					$pk->assign("p3",$rows["p3"]);
					$pk->assign("p4",$rows["p4"]);
					$pk->parse("edit_pk");
	}
	$edit_pk = $pk->text("edit_pk");
//-----------------------------------------------------------
	$pk = new XTemplate("views/pk.html");
	
	$query = mysql_query("select * from pk order by id_pk desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from pk order by id_pk desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		
		$pk->assign("stt",$stt); $stt++;
		$pk->assign("ten_pk",$rows["ten_pk"]);
		$pk->assign("gia_pk",$rows["gia_pk"]);
		$pk->assign("anh_pk",$rows["anh_pk"]);
		$pk->assign("id",$rows["id_pk"]);
		$pk->parse("list_pk.in_ra");
	}
	for($i=1;$i<=$sotrang;$i++){
		$pk->assign("stt",$i);
		if($i==$page) $pk->assign("page","#999"); else $pk->assign("page","#FFF");
		$pk->parse("list_pk.so_trang");
	}
	$pk->assign("title","DANH SÁCH PHỤ KIỆN");
	$pk->parse("list_pk");
	$list_pk = $pk->text("list_pk");
//-----------------------------------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_pk":{
				if(isset($_POST["submit"])){
					if(( $_POST["ten_pk"]!="") && ($_POST["gia_pk"]!="") && isset($_FILES["anh_pk"]) ){
						$ten_pk = $_POST["ten_pk"];
						$gia_pk = $_POST["gia_pk"];
						$dm = $_POST["dm"];
						$anh_pk = $_FILES["anh_pk"]["name"];
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
						mysql_query("insert into pk (ten_pk, gia_pk, anh_pk, anh1, anh2, anh3, anh4, id_dm_pk, tinh_trang, 
						mau_sac, thiet_ke, su_dung, bao_hanh, xuat_xu, p1, p2, p3, p4) values 
						('$ten_pk','$gia_pk','$anh_pk','$anh1','$anh2','$anh3','$anh4','$dm','$tinh_trang','$mau_sac', 
						'$thiet_ke','$su_dung','$bao_hanh','$xuat_xu','$p1','$p2','$p3','$p4')");
					}
					header("location:index.php?act=pk");
				}
				break;
			}
			case "edit_pk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					if(isset($_POST["submit"])){
						if(( $_POST["ten_pk"]!="") && ($_POST["gia_pk"]!="") && isset($_FILES["anh_pk"]) ){
							$ten_pk = $_POST["ten_pk"];
							$gia_pk = $_POST["gia_pk"];
							$anh_pk = $_FILES["anh_pk"]["name"];
							$dm = $_POST["dm"];
							if($_FILES["anh_pk"]["name"]!=""){
								move_uploaded_file($_FILES["anh_pk"]["tmp_name"],"../img/pk/".$_FILES["anh_pk"]["name"]);
								mysql_query("update pk set anh_pk='$anh_pk' where id_pk = $id");
							}
							mysql_query("update pk set ten_pk = '$ten_pk', gia_pk = '$gia_pk', id_dm_pk = '$dm' 
									where id_pk = $id");
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
							mysql_query("update pk set p1='$p1', p2='$p2', p3='$p3', p4='$p4', tinh_trang='$tinh_trang', 
							mau_sac='$mau_sac', thiet_ke='$thiet_ke', su_dung='$su_dung', bao_hanh='$bao_hanh', 
							xuat_xu='$xuat_xu' where id_pk = $id");
							//-----------
							$anh1 = $_FILES["anh1"]["name"];
							$anh2 = $_FILES["anh2"]["name"];
							$anh3 = $_FILES["anh3"]["name"];
							$anh4 = $_FILES["anh4"]["name"];
							if($_FILES["anh1"]["name"]!=""){
								move_uploaded_file($_FILES["anh1"]["tmp_name"],"../img/pk/".$_FILES["anh1"]["name"]);
								mysql_query("update pk set anh1='$anh1' where id_pk = $id");
							}
							if($_FILES["anh2"]["name"]!=""){
								move_uploaded_file($_FILES["anh2"]["tmp_name"],"../img/pk/".$_FILES["anh2"]["name"]);
								mysql_query("update pk set anh2='$anh2' where id_pk = $id");
							}
							if($_FILES["anh3"]["name"]!=""){
								move_uploaded_file($_FILES["anh3"]["tmp_name"],"../img/pk/".$_FILES["anh3"]["name"]);
								mysql_query("update pk set anh3='$anh3' where id_pk = $id");
							}
							if($_FILES["anh4"]["name"]!=""){
								move_uploaded_file($_FILES["anh4"]["tmp_name"],"../img/pk/".$_FILES["anh4"]["name"]);
								mysql_query("update pk set anh4='$anh4' where id_pk = $id");
							}
						}
					}
					header("location:index.php?act=pk");
				}
				break;
			}
			case "del_pk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from pk where id_pk = $id");
				}
				header("location:index.php?act=pk");
				break;
			}
			case "del_all_pk":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from pk where id_pk in($str)";
				mysql_query($sql);
				header("location:index.php?act=pk");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>