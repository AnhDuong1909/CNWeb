<?php
	$spk = new XTemplate("views/spk.html");
	
	if(isset($_GET["id_dm_spk"])){
		$id = $_GET["id_dm_spk"];
		$query = mysql_query("select * from spk where id_dm_spk = $id");
		while($rows = mysql_fetch_array($query)){
			$spk->assign("id",$rows["id_spk"]);
			$spk->assign("anh_spk",$rows["anh_spk"]);
			$spk->assign("ten_spk",$rows["ten_spk"]);
			$spk->assign("gia_spk",$rows["gia_spk"]);
			$spk->parse("spk.block.list_spk");
		}
		$query = mysql_query("select * from dm_spk where id_dm_spk = $id");
		while($rows = mysql_fetch_array($query)){
			$spk->assign("title",$rows["ten_dm_spk"]);
			$spk->assign("act","spk&id_dm_spk=$id");
		}
	$spk->parse("spk.block");
	}
	else{.
		$query = mysql_query("select * from dm_spk");
		while($rows = mysql_fetch_array($query)){
			$id_dm = $rows["id_dm_spk"];
			$query2 = mysql_query("select * from spk inner join dm_spk on spk.id_dm_spk = dm_spk.id_dm_spk 
									where dm_spk.id_dm_spk = $id_dm");
			$dem = 1;
			while($rows2 = mysql_fetch_array($query2)){
				$spk->assign("act","spk&id_dm_spk=$id_dm");
				$spk->assign("title",$rows2["ten_dm_spk"]);
				$spk->assign("id",$rows2["id_spk"]);
				$spk->assign("anh_spk",$rows2["anh_spk"]);
				$spk->assign("ten_spk",$rows2["ten_spk"]);
				$spk->assign("gia_spk",$rows2["gia_spk"]);
				$spk->parse("spk.block.list_spk");
				$dem++;
				if($dem>11) break;
			}
			$spk->parse("spk.block");
		}
	}
	$spk->parse("spk");
	$spk = $spk->text("spk");
?>