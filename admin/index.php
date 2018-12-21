<?php
	session_start();
	//unset($_SESSION["username"]);
	if(!isset($_SESSION["username"])) header("location: login.php");
	
	include "xtemplate.class.php";
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$admin = new XTemplate("views/home.html");
	include "include/tk.php";
	include "include/san_pham.php";
	include "include/tin_tuc.php";
	include "include/nsx.php";
	include "include/spk.php";
	include "include/dm_spk.php";
	include "include/pk.php";
	include "include/dm_pk.php";
	include "include/mua_hang.php";
	
	
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "tk": $admin->assign("content",$tk); $admin->assign("tai_khoan","background:#FFF;"); break;
			case "doi_mk": $admin->assign("content",$doi_mk); $admin->assign("tai_khoan","background:#FFF;"); break;
			case "changed": $admin->assign("content",$changed); $admin->assign("tai_khoan","background:#FFF;"); break;
			case "regi": $admin->assign("content",$regi); $admin->assign("tai_khoan","background:#FFF;"); break;
			case "dang_ki": $admin->assign("content",$dang_ki); $admin->assign("tai_khoan","background:#FFF;"); break;
			
			case "sp": $admin->assign("content",$list_sp); $admin->assign("san_pham","background:#FFF;"); break;
			case "sp_add": $admin->assign("content",$add_sp); $admin->assign("san_pham","background:#FFF;"); break;
			case "sp_edit": $admin->assign("content",$edit_sp); $admin->assign("san_pham","background:#FFF;"); break;
			
			case "tt": $admin->assign("content",$list_tt); $admin->assign("tin_tuc","background:#FFF;"); break;
			case "tt_add": $admin->assign("content",$add_tt); $admin->assign("tin_tuc","background:#FFF;"); break;
			case "tt_edit": $admin->assign("content",$edit_tt); $admin->assign("tin_tuc","background:#FFF;"); break;
			
			case "nsx": $admin->assign("content",$list_nsx); $admin->assign("nsx","background:#FFF;"); break;
			case "nsx_add": $admin->assign("content",$add_nsx); $admin->assign("nsx","background:#FFF;"); break;
			case "nsx_edit": $admin->assign("content",$edit_nsx); $admin->assign("nsx","background:#FFF;"); break;
			
			case "spk": $admin->assign("content",$list_spk); $admin->assign("spk","background:#FFF;"); break;
			case "spk_add": $admin->assign("content",$add_spk); $admin->assign("spk","background:#FFF;"); break;
			case "spk_edit": $admin->assign("content",$edit_spk); $admin->assign("spk","background:#FFF;"); break;
			
			case "dm_spk": $admin->assign("content",$list_dm_spk); $admin->assign("dm_spk","background:#FFF;"); break;
			case "dm_spk_add_dm": $admin->assign("content",$add_dm_spk); $admin->assign("dm_spk","background:#FFF;"); break;
			case "dm_spk_edit_dm": $admin->assign("content",$edit_dm_spk); $admin->assign("dm_spk","background:#FFF;"); break;
			
			case "pk": $admin->assign("content",$list_pk); $admin->assign("pk","background:#FFF;"); break;
			case "pk_add": $admin->assign("content",$add_pk); $admin->assign("pk","background:#FFF;"); break;
			case "pk_edit": $admin->assign("content",$edit_pk); $admin->assign("pk","background:#FFF;"); break;
			
			case "dm_pk": $admin->assign("content",$list_dm_pk); $admin->assign("dm_pk","background:#FFF;"); break;
			case "dm_pk_add_dm": $admin->assign("content",$add_dm_pk); $admin->assign("dm_pk","background:#FFF;"); break;
			case "dm_pk_edit_dm": $admin->assign("content",$edit_dm_pk); $admin->assign("dm_pk","background:#FFF;"); break;
			
			case "mh": $admin->assign("content",$list_mh); $admin->assign("mua_hang","background:#FFF;"); break;
			case "mh_xem": $admin->assign("content",$mh_xem); $admin->assign("mua_hang","background:#FFF;"); break;
		}	
	}
	else {
		$admin->assign("content",$tk); 
		$admin->assign("tai_khoan","background:#FFF;");
	}
	$admin->parse("main_admin");
	$admin->out("main_admin");
?>
