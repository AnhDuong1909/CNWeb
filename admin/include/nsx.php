<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$nsx = new XTemplate("views/nsx.html");
	
	$nsx->assign("title","THÊM NHÀ SẢN XUẤT");
	$nsx->assign("act","add_nsx");
	$nsx->parse("edit_nsx");
	$add_nsx = $nsx->text("edit_nsx");
//-----------------------------------------------------------
	$nsx = new XTemplate("views/nsx.html");
	
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("select * from nsx where id_nsx = $id");
					$rows = mysql_fetch_array($query);
					$nsx->assign("title","CHỈNH SỬA");
					$nsx->assign("act","edit_nsx&id=$id");
					$nsx->assign("ten_nsx",$rows["ten_nsx"]);
					$nsx->assign("gioi_thieu",$rows["gioi_thieu"]);
					if($rows["dien_thoai"]==1) $nsx->assign("dien_thoai","checked");
					if($rows["may_tinh_bang"]==1) $nsx->assign("may_tinh_bang","checked");
					$nsx->parse("edit_nsx");
	}
	$edit_nsx = $nsx->text("edit_nsx");
//-----------------------------------------------------------
	$nsx = new XTemplate("views/nsx.html");
	
	$query = mysql_query("select * from nsx order by id_nsx desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from nsx order by id_nsx desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		
		$nsx->assign("stt",$stt); $stt++;
		$nsx->assign("ten_nsx",$rows["ten_nsx"]);
		$nsx->assign("gioi_thieu",$rows["gioi_thieu"]);
		$nsx->assign("id",$rows["id_nsx"]);
		$nsx->parse("list_nsx.in_nsx");
	}
	for($i=1;$i<=$sotrang;$i++){
		$nsx->assign("stt",$i);
		if($i==$page) $nsx->assign("page","#999"); else $nsx->assign("page","#FFF");
		$nsx->parse("list_nsx.so_trang");
	}
	$nsx->assign("title","DANH SÁCH NHÀ SẢN XUẤT");
	$nsx->parse("list_nsx");
	$list_nsx = $nsx->text("list_nsx");
//-----------------------------------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_nsx":{
				if(isset($_POST["submit"])){
					if(( $_POST["ten_nsx"]!="")){
						$ten_nsx = $_POST["ten_nsx"];
						$gioi_thieu = $_POST["gioi_thieu"];
						$dien_thoai = $_POST["dien_thoai"];
						$may_tinh_bang = $_POST["may_tinh_bang"];
						mysql_query("insert into nsx (ten_nsx, gioi_thieu, dien_thoai, may_tinh_bang) 
									values ('$ten_nsx','$gioi_thieu','$dien_thoai','$may_tinh_bang')");
						
					}
					header("location:index.php?act=nsx");
				}
				break;
			}
			case "edit_nsx":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];					
					if(isset($_POST["submit"])){
						if(( $_POST["ten_nsx"]!="")){
							$ten_nsx = $_POST["ten_nsx"];
							$gioi_thieu = $_POST["gioi_thieu"];
							$dien_thoai = $_POST["dien_thoai"];
							$may_tinh_bang = $_POST["may_tinh_bang"];
							mysql_query("update nsx set ten_nsx = '$ten_nsx', gioi_thieu = '$gioi_thieu',
								dien_thoai = '$dien_thoai',  may_tinh_bang = '$may_tinh_bang' where id_nsx = $id");
						}
					}
					header("location:index.php?act=nsx");
				}
				break;
			}
			case "del_nsx":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from nsx where id_nsx = $id");
				}
				header("location:index.php?act=nsx");
				break;
			}
			case "del_all_nsx":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from nsx where id_nsx in($str)";
				mysql_query($sql);
				header("location:index.php?act=nsx");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>