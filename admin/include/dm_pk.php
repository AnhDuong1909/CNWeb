<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$dm_pk = new XTemplate("views/dm_pk.html");
	
	$dm_pk->assign("title","THÊM DANH MỤC PK");
	$dm_pk->assign("act","add_dm_pk");
	$dm_pk->parse("edit_dm_pk");
	$add_dm_pk = $dm_pk->text("edit_dm_pk");
//-----------------------------------------------------------
	$dm_pk = new XTemplate("views/dm_pk.html");
	
	if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("select * from dm_pk where id_dm_pk = $id");
					$rows = mysql_fetch_array($query);
					$dm_pk->assign("title","CHỈNH SỬA");
					$dm_pk->assign("act","edit_dm_pk&id=$id");
					$dm_pk->assign("ten_dm_pk",$rows["ten_dm_pk"]);
					$dm_pk->parse("edit_dm_pk");
	}
	$edit_dm_pk = $dm_pk->text("edit_dm_pk");
//-----------------------------------------------------------
	$dm_pk = new XTemplate("views/dm_pk.html");
	
	$query = mysql_query("select * from dm_pk order by id_dm_pk desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from dm_pk order by id_dm_pk desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		
		$dm_pk->assign("stt",$stt); $stt++;
		$dm_pk->assign("ten_dm_pk",$rows["ten_dm_pk"]);
		$dm_pk->assign("id",$rows["id_dm_pk"]);
		$dm_pk->parse("list_dm_pk.in_ra");
	}
	for($i=1;$i<=$sotrang;$i++){
		$dm_pk->assign("stt",$i);
		if($i==$page) $dm_pk->assign("page","#999"); else $dm_pk->assign("page","#FFF");
		$dm_pk->parse("list_dm_pk.so_trang");
	}
	$dm_pk->assign("title","DANH MỤC PHỤ KIỆN");
	$dm_pk->parse("list_dm_pk");
	$list_dm_pk = $dm_pk->text("list_dm_pk");
//-----------------------------------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "add_dm_pk":{
				if(isset($_POST["submit"])){
					if(( $_POST["ten_dm_pk"]!="")){
						$ten_dm_pk = $_POST["ten_dm_pk"];
						mysql_query("insert into dm_pk (ten_dm_pk) values ('$ten_dm_pk')");
						
					}
					header("location:index.php?act=dm_pk");
				}
				break;
			}
			case "edit_dm_pk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];					
					if(isset($_POST["submit"])){
						if(( $_POST["ten_dm_pk"]!="")){
							$ten_dm_pk = $_POST["ten_dm_pk"];
							mysql_query("update dm_pk set ten_dm_pk = '$ten_dm_pk' where id_dm_pk = $id");
						}
					}
					header("location:index.php?act=dm_pk");
				}
				break;
			}
			case "del_dm_pk":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from dm_pk where id_dm_pk = $id");
				}
				header("location:index.php?act=dm_pk");
				break;
			}
			case "del_all_dm_pk":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from dm_pk where id_dm_pk in($str)";
				mysql_query($sql);
				header("location:index.php?act=dm_pk");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>