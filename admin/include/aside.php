<?php
	$aside = new XTemplate("views/aside.html");

	$query = mysql_query("select * from chitiet_sp order by do_hot desc");
	$i=1;
	while($rows = mysql_fetch_array($query)){
		if($i%2){
			$aside->assign("id_sp",$rows["id_sp"]);
			$aside->assign("anh_sp",$rows["anh_sp"]);
			$aside->assign("ten_sp",$rows["ten_sp"]);
			$aside->parse("aside.dang_hot1");
		}
		else{
			$aside->assign("id_sp",$rows["id_sp"]);
			$aside->assign("anh_sp",$rows["anh_sp"]);
			$aside->assign("ten_sp",$rows["ten_sp"]);
			$aside->parse("aside.dang_hot2");
		}
		$i++;
		if($i>6) break;
	}

//---------------------------------------------------------------------------------
	$query = mysql_query("select * from chitiet_sp");
	$i=1;
	while($rows = mysql_fetch_array($query)){
		if($i%2){
			$aside->assign("id_sp",$rows["id_sp"]);
			$aside->assign("anh_sp",$rows["anh_sp"]);
			$aside->assign("ten_sp",$rows["ten_sp"]);
			$aside->parse("aside.hang_moi_ve1");
		}
		else{
			$aside->assign("id_sp",$rows["id_sp"]);
			$aside->assign("anh_sp",$rows["anh_sp"]);
			$aside->assign("ten_sp",$rows["ten_sp"]);
			$aside->parse("aside.hang_moi_ve2");
		}
		$i++;
		if($i>6) break;
	}
//---------------------------------------------------------------------------------
	$query = mysql_query("select * from chitiet_sp where km=1");
	$i=1;
	while($rows = mysql_fetch_array($query)){
		if($i%2){
			$aside->assign("id_sp",$rows["id_sp"]);
			$aside->assign("anh_sp",$rows["anh_sp"]);
			$aside->assign("ten_sp",$rows["ten_sp"]);
			$aside->parse("aside.khuyen_mai1");
		}
		else{
			$aside->assign("id_sp",$rows["id_sp"]);
			$aside->assign("anh_sp",$rows["anh_sp"]);
			$aside->assign("ten_sp",$rows["ten_sp"]);
			$aside->parse("aside.khuyen_mai2");
		}
		$i++;
		if($i>6) break;
	}
//---------------------------------------------------------------------------------
	$aside->parse("aside");
	$aside = $aside->text("aside");
?>