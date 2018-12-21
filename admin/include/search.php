<?php
	$num = 0;
	$sp = new XTemplate("views/san_pham.html");
	if(isset($_GET["search"])){
		$key = $_GET["search"]; 
		$key = str_replace("'","\'",$key);
		$query = mysql_query("select * from chitiet_sp where ten_sp like'%$key%'");
		if(mysql_num_rows($query)!=0){
			$num++;
			while($rows = mysql_fetch_array($query)){
				$sp->assign("id_sp",$rows["id_sp"]);
				$ten_sp = $rows["ten_sp"];
				$gia_sp = $rows["gia_sp"];
				$anh_sp = $rows["anh_sp"];
				$sp->assign("ten_sp",$ten_sp);
				$sp->assign("gia_sp",$gia_sp);
				$sp->assign("anh_sp",$anh_sp);
				$sp->parse("san_pham.block.list_sp");
			}
			$sp->assign("title",'Các sản phẩm liên quan đến "'.$key.'"');
			$sp->assign("act","&search=".$key);
			$sp->assign("end","");
			$sp->parse("san_pham.block");
			$sp->parse("san_pham");
			$search_sp = $sp->text("san_pham");	
		}
		//-----------------
		$pk = new XTemplate("views/pk.html");
		$query = mysql_query("select * from pk where ten_pk like'%$key%'");
		if(mysql_num_rows($query)!=0){
			$num++;
			while($rows = mysql_fetch_array($query)){
				$pk->assign("id",$rows["id_pk"]);
				$pk->assign("anh_pk",$rows["anh_pk"]);
				$pk->assign("ten_pk",$rows["ten_pk"]);
				$pk->assign("gia_pk",$rows["gia_pk"]);
				$pk->parse("pk.block.list_pk");
			}
			$pk->assign("title",'Các phụ kiện liên quan đến "'.$key.'"');
			$pk->assign("act","&search=".$key);
			$pk->parse("pk.block");
			$pk->parse("pk");
			$search_pk = $pk->text("pk");
		}
		//-----------------
		$spk = new XTemplate("views/spk.html");
		$query = mysql_query("select * from spk where ten_spk like'%$key%'");
		if(mysql_num_rows($query)!=0){
			$num++;
			while($rows = mysql_fetch_array($query)){
				$spk->assign("id",$rows["id_spk"]);
				$spk->assign("anh_spk",$rows["anh_spk"]);
				$spk->assign("ten_spk",$rows["ten_spk"]);
				$spk->assign("gia_spk",$rows["gia_spk"]);
				$spk->parse("spk.block.list_spk");
			}
			$spk->assign("title",'Các sản phẩm khác liên quan đến "'.$key.'"');
			$spk->assign("act","&search=".$key);
			$spk->parse("spk.block");
			$spk->parse("spk");
			$search_spk = $spk->text("spk");
		}
	}// end if(isset($_GET["search"]))
	if($num>0) @$search=$search_sp.$search_pk.$search_spk; else $search="Không tìm thấy dữ liệu nào";
	
?>