<?php
	$pk = new XTemplate("views/pk.html");
	
	if(isset($_GET["id_dm_pk"])){
		$id_dm = $_GET["id_dm_pk"];
		$query = mysql_query("select * from pk where id_dm_pk = $id_dm");
		while($rows = mysql_fetch_array($query)){
			$pk->assign("id",$rows["id_pk"]);
			$pk->assign("anh_pk",$rows["anh_pk"]);
			$pk->assign("ten_pk",$rows["ten_pk"]);
			$pk->assign("gia_pk",$rows["gia_pk"]);
			$pk->parse("pk.block.list_pk");
		}
		$query = mysql_query("select * from dm_pk where id_dm_pk = $id_dm");
		while($rows = mysql_fetch_array($query)){
			$pk->assign("title",$rows["ten_dm_pk"]);
		}
	$pk->assign("act","pk&id_dm_pk=".$id_dm);
	$pk->parse("pk.block");
	}
	else{
		$query = mysql_query("select * from dm_pk");
		while($rows = mysql_fetch_array($query)){
			$id_dm = $rows["id_dm_pk"];
			$query2 = mysql_query("select * from pk inner join dm_pk on pk.id_dm_pk = dm_pk.id_dm_pk 
									where dm_pk.id_dm_pk = $id_dm");
			$dem = 1;
			while($rows2 = mysql_fetch_array($query2)){
				$pk->assign("title",$rows2["ten_dm_pk"]);
				$pk->assign("id",$rows2["id_pk"]);
				$pk->assign("anh_pk",$rows2["anh_pk"]);
				$pk->assign("ten_pk",$rows2["ten_pk"]);
				$pk->assign("gia_pk",$rows2["gia_pk"]);
				$pk->parse("pk.block.list_pk");
				$dem++;
				if($dem>11) break;
			}
			$pk->assign("act","pk&id_dm_pk=".$id_dm);
			$pk->parse("pk.block");
		}
	}
	$pk->parse("pk");
	$pk = $pk->text("pk");
?>