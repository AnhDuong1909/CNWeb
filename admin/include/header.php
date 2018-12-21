<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$header = new XTemplate("views/header.html");
	
	$query = mysql_query("select * from nsx where dien_thoai=1");
	$tong_nsx = mysql_num_rows($query);
	$sobanghimoids = ceil($tong_nsx/2);
	$query = mysql_query("select * from nsx where dien_thoai=1 LIMIT 0,$sobanghimoids");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_nsx",$rows["id_nsx"]);
		$header->assign("ten_nsx",$rows["ten_nsx"]);
		$header->parse("header.ds1_nsx");
	}
	$query = mysql_query("select * from nsx where dien_thoai=1 LIMIT $sobanghimoids,$sobanghimoids");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_nsx",$rows["id_nsx"]);
		$header->assign("ten_nsx",$rows["ten_nsx"]);
		$header->parse("header.ds2_nsx");
	}

//--------------------------------------------------------------------------------
	$query = mysql_query("select * from nsx where may_tinh_bang=1");
	$tong_nsx = mysql_num_rows($query);
	$sobanghimoids = ceil($tong_nsx/2);
	$query = mysql_query("select * from nsx where may_tinh_bang=1 LIMIT 0,$sobanghimoids");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_nsx",$rows["id_nsx"]);
		$header->assign("ten_nsx",$rows["ten_nsx"]);
		$header->parse("header.ds3_nsx");
	}
	$query = mysql_query("select * from nsx where may_tinh_bang=1 LIMIT $sobanghimoids,$sobanghimoids");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_nsx",$rows["id_nsx"]);
		$header->assign("ten_nsx",$rows["ten_nsx"]);
		$header->parse("header.ds4_nsx");
	}

//--------------------------------------------------------------------------------
	$query = mysql_query("select * from dm_spk");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_dm_spk",$rows["id_dm_spk"]);
		$header->assign("ten_dm_spk",$rows["ten_dm_spk"]);
		$header->parse("header.dm_spk");
	}

//---------------------------------------------------------------------------------
	$query = mysql_query("select * from dm_pk");
	$tong_dm_pk = mysql_num_rows($query);
	$sobanghimoids = ceil($tong_dm_pk/2);
	$query = mysql_query("select * from dm_pk LIMIT 0,$sobanghimoids");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_dm_pk",$rows["id_dm_pk"]);
		$header->assign("ten_dm_pk",$rows["ten_dm_pk"]);
		$header->parse("header.ds1_dm_pk");
	}
	$query = mysql_query("select * from dm_pk LIMIT $sobanghimoids,$sobanghimoids");
	while($rows = mysql_fetch_array($query)){
		$header->assign("id_dm_pk",$rows["id_dm_pk"]);
		$header->assign("ten_dm_pk",$rows["ten_dm_pk"]);
		$header->parse("header.ds2_dm_pk");
	}

//--------------------------------------------------------------------------------

	$header->parse("header");
	$header = $header->text("header");


?>