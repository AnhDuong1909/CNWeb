<?php
	$mua_hang = new XTemplate("views/mua_hang.html");
	if(isset($_GET["id"])){
		$id_mh = $_GET["id"];
		$query = mysql_query("select * from mua_hang where id_mh=$id_mh");
		while($rows = mysql_fetch_array($query)){
			$mua_hang->assign("ho_ten",$rows["ho_ten"]);
			$mua_hang->assign("sdt",$rows["sdt"]);
			$mua_hang->assign("dia_chi",$rows["dia_chi_nhan_hang"]);
			$mua_hang->assign("ghi_chu",$rows["ghi_chu"]);
			$id_sp = $rows["id_sp"];
			$id_tbl = $rows["id_tbl"];
			switch($rows["id_tbl"]){
				case "1": {
					$query2 = mysql_query("select * from chitiet_sp where id_sp=".$rows["id_sp"]);
					$row2 = mysql_fetch_array($query2);
					$mua_hang->assign("sp",$row2["ten_sp"]);
					break;
				}
				case "2": {
					$query2 = mysql_query("select * from pk where id_pk=".$rows["id_sp"]);
					$row2 = mysql_fetch_array($query2);
					$mua_hang->assign("sp",$row2["ten_pk"]);
					break;
				}
				case "3": {
					$query2 = mysql_query("select * from spk where id_spk=".$rows["id_sp"]); 
					$row2 = mysql_fetch_array($query2);
					$mua_hang->assign("sp",$row2["ten_spk"]);
					break;
				}
			}
		}
		$mua_hang->assign("title","CHI TIẾT ĐƠN HÀNG");
		$mua_hang->assign("act","mh");
	}
	$mua_hang->parse("mh_xem");
	$mh_xem = $mua_hang->text("mh_xem");
	//-------------------------------------
	$mua_hang = new XTemplate("views/mua_hang.html");
	
	$query = mysql_query("select * from mua_hang order by id_mh desc");
	$sobanghi = mysql_num_rows($query);
	$sobanghimoitrang = 6;
	if(isset($_GET["page"])) $page = $_GET["page"]; else $page = 1;
	$start = $sobanghimoitrang * ($page - 1);
	$sotrang = ceil($sobanghi/$sobanghimoitrang);
	$stt = $start + 1;
	$query = mysql_query("SELECT * from mua_hang order by id_mh desc LIMIT $start,$sobanghimoitrang");
	while($rows = mysql_fetch_array($query)){
		$mua_hang->assign("stt",$stt); $stt++;
		$mua_hang->assign("id",$rows["id_mh"]);
		$mua_hang->assign("ho_ten",$rows["ho_ten"]);
		$mua_hang->assign("sdt",$rows["sdt"]);
		switch($rows["id_tbl"]){
			case "1": {
				$query2 = mysql_query("select * from chitiet_sp where id_sp=".$rows["id_sp"]);
				$row2 = mysql_fetch_array($query2);
				$mua_hang->assign("ten_sp",$row2["ten_sp"]);
				break;
			}
			case "2": {
				$query2 = mysql_query("select * from pk where id_pk=".$rows["id_sp"]);
				$row2 = mysql_fetch_array($query2);
				$mua_hang->assign("ten_sp",$row2["ten_pk"]);
				break;
			}
			case "3": {
				$query2 = mysql_query("select * from spk where id_spk=".$rows["id_sp"]); 
				$row2 = mysql_fetch_array($query2);
				$mua_hang->assign("ten_sp",$row2["ten_spk"]);
				break;
			}
		}
		$mua_hang->parse("mua_hang.list_mh");
	}
	for($i=1;$i<=$sotrang;$i++){
		$mua_hang->assign("stt",$i);
		if($i==$page) $mua_hang->assign("page","#999"); else $mua_hang->assign("page","#FFF");
		$mua_hang->parse("mua_hang.so_trang");
	}
	$mua_hang->assign("title","DANH SÁCH MUA HÀNG");
	$mua_hang->parse("mua_hang");
	$list_mh = $mua_hang->text("mua_hang");
	//---------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "mh_del":{
				if(isset($_GET["id"])){
					$id = $_GET["id"];
					$query = mysql_query("delete from mua_hang where id_mh = $id");
				}
				header("location:index.php?act=mh");
				break;
			}
			case "del_all_mh":{
				$check = $_POST["check"];
				$str = implode(",",$check);
				$sql="delete from mua_hang where id_mh in($str)";
				mysql_query($sql);
				header("location:index.php?act=mh");
			}
		}//end switch
	}//end if(isset($_GET["act"]))
?>