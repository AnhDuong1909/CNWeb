<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$news = new XTemplate("views/tin_tuc.html");
	
	$news->assign("title","THÊM BÀI VIẾT");
	$news->assign("act","add_tt");
	$news->parse("edit_tt");
	$add_tt = $news->text("edit_tt");
//--------------------------------------------------------
	$news = new XTemplate("views/tin_tuc.html");
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("select * from tin_tuc where id_tt = $id");
					$rows_tt = mysql_fetch_array($query);
					$news->assign("title","CHỈNH SỬA");
					$news->assign("act","edit_tt&id=$id");
					$news->assign("tieu_de",$rows_tt["tieu_de"]);
					$news->assign("tac_gia",$rows_tt["tac_gia"]);
					$news->assign("ngay_dang",$rows_tt["ngay_dang"]);
					$news->assign("tom_tat",$rows_tt["tom_tat"]);
					$news->assign("noi_dung",$rows_tt["noi_dung"]);
					$news->parse("edit_tt");
	}
	$edit_tt = $news->text("edit_tt");
//--------------------------------------------------------
	$news = new XTemplate("views/tin_tuc.html");
	
	$query = mysql_query("select * from tin_tuc order by ngay_dang desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from tin_tuc order by ngay_dang desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		
		$news->assign("stt",$stt); $stt++;
		$news->assign("tieude",$rows["tieu_de"]);
		$news->assign("ngaydang",$rows["ngay_dang"]);
		$news->assign("id",$rows["id_tt"]);
		$news->parse("tin_tuc.list_tt");
	}
	for($i=1;$i<=$sotrang;$i++){
		$news->assign("stt",$i);
		if($i==$page) $news->assign("page","#999"); else $news->assign("page","#FFF");
		$news->parse("tin_tuc.so_trang");
	}
	$news->assign("title","DANH SÁCH TIN TỨC");
	$news->parse("tin_tuc");
	$list_tt = $news->text("tin_tuc");
//-------------------------------------------------------

	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_tt":{
				if(isset($_POST["submit"])){
					if(( $_POST["tieu_de"]!="") && ($_POST["ngay_dang"]!="") && isset($_FILES["anh_tt"]) ){
						$tieu_de = $_POST["tieu_de"];
						$ngay_dang = $_POST["ngay_dang"];
						$tac_gia = $_POST["tac_gia"];
						$anh_tt = $_FILES["anh_tt"]["name"];
						$tom_tat = $_POST["tom_tat"];
						$noi_dung = $_POST["noi_dung"];
						mysql_query("insert into tin_tuc (tieu_de, ngay_dang, anh_tt, tac_gia, tom_tat, noi_dung) 
									values ('$tieu_de','$ngay_dang','$anh_tt','$tac_gia','$tom_tat','$noi_dung')");
					}
					header("location:index.php?act=tt");
				}
				break;
			}
			case "edit_tt":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];					
					if(isset($_POST["submit"])){
						if(( $_POST["tieu_de"]!="") && ($_POST["tac_gia"]!="") && isset($_FILES["anh_tt"]) ){
							$tieu_de = $_POST["tieu_de"];
							$ngay_dang = $_POST["ngay_dang"];
							$tac_gia = $_POST["tac_gia"];
							$anh_tt = $_FILES["anh_tt"]["name"];
							$tom_tat = $_POST["tom_tat"];
							$noi_dung = $_POST["noi_dung"];
							if($_FILES["anh_tt"]["name"]!=""){
								move_uploaded_file($_FILES["anh_tt"]["tmp_name"],"../img/tintuc/".$_FILES["anh_tt"]["name"]);
								mysql_query("update tin_tuc set anh_tt='$anh_tt' where id_tt = $id");
							}
							mysql_query("update tin_tuc set tieu_de = '$tieu_de', ngay_dang = '$ngay_dang', 
										tac_gia = '$tac_gia', tom_tat = '$tom_tat', noi_dung = '$noi_dung'
										where id_tt = $id");
						}
					}
					header("location:index.php?act=tt");
				}
				break;
			}
			case "del_tt":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from tin_tuc where id_tt = $id");
				}
				header("location:index.php?act=tt");
				break;
			}
			case "del_all_tt":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from tin_tuc where id_tt in($str)";
				mysql_query($sql);
				header("location:index.php?act=tt");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>