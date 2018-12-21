<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$dm_spk = new XTemplate("views/dm_spk.html");
	
	$dm_spk->assign("title","THÊM DANH MỤC SPK");
	$dm_spk->assign("act","add_dm_spk");
	$dm_spk->parse("edit_dm_spk");
	$add_dm_spk = $dm_spk->text("edit_dm_spk");
//-----------------------------------------------------------
	$dm_spk = new XTemplate("views/dm_spk.html");
	
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("select * from dm_spk where id_dm_spk = $id");
					$rows = mysql_fetch_array($query);
					$dm_spk->assign("title","CHỈNH SỬA");
					$dm_spk->assign("act","edit_dm_spk&id=$id");
					$dm_spk->assign("ten_dm_spk",$rows["ten_dm_spk"]);
					$dm_spk->parse("edit_dm_spk");
	}
	$edit_dm_spk = $dm_spk->text("edit_dm_spk");
//-----------------------------------------------------------
	$dm_spk = new XTemplate("views/dm_spk.html");
	
	$query = mysql_query("select * from dm_spk order by id_dm_spk desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from dm_spk order by id_dm_spk desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		
		$dm_spk->assign("stt",$stt); $stt++;
		$dm_spk->assign("ten_dm_spk",$rows["ten_dm_spk"]);
		$dm_spk->assign("id",$rows["id_dm_spk"]);
		$dm_spk->parse("list_dm_spk.in_ra");
	}
	for($i=1;$i<=$sotrang;$i++){
		$dm_spk->assign("stt",$i);
		if($i==$page) $dm_spk->assign("page","#999"); else $dm_spk->assign("page","#FFF");
		$dm_spk->parse("list_dm_spk.so_trang");
	}
	$dm_spk->assign("title","DANH MỤC SẢN PHẨM KHÁC");
	$dm_spk->parse("list_dm_spk");
	$list_dm_spk = $dm_spk->text("list_dm_spk");
//-----------------------------------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_dm_spk":{
				if(isset($_POST["submit"])){
					if(( $_POST["ten_dm_spk"]!="")){
						$ten_dm_spk = $_POST["ten_dm_spk"];
						mysql_query("insert into dm_spk (ten_dm_spk) values ('$ten_dm_spk')");
						
					}
					header("location:index.php?act=dm_spk");
				}
				break;
			}
			case "edit_dm_spk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];					
					if(isset($_POST["submit"])){
						if(( $_POST["ten_dm_spk"]!="")){
							$ten_dm_spk = $_POST["ten_dm_spk"];
							mysql_query("update dm_spk set ten_dm_spk = '$ten_dm_spk' where id_dm_spk = $id");
						}
					}
					header("location:index.php?act=dm_spk");
				}
				break;
			}
			case "del_dm_spk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from dm_spk where id_dm_spk = $id");
				}
				header("location:index.php?act=dm_spk");
				break;
			}
			case "del_all_dm_spk":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from dm_spk where id_dm_spk in($str)";
				mysql_query($sql);
				header("location:index.php?act=dm_spk");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>