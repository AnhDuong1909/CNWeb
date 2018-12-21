<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	include "xtemplate.class.php";
	$tpl = new XTemplate("home.html");
	include "include/header.php";
	include "include/home_slides.php";
	include "include/aside.php";
	include "include/footer.php";
	include "include/san_pham.php";
	include "include/chitiet_sp.php";
	include "include/tin_tuc.php";
	include "include/pk.php";
	include "include/chitiet_pk.php";
	include "include/spk.php";
	include "include/chitiet_spk.php";
	include "include/mua_hang.php";
	include "include/search.php";
//----------------------------------------------------------
	$content_main = $hmv.$dh.$km;
	$tpl->assign("header",$header);
	$tpl->assign("home_slides",$home_slides);
	$tpl->assign("content_main",$content_main);
	$tpl->assign("aside",$aside);
	$tpl->assign("footer",$footer);
//----------------------------------------------------------
	if(isset($_GET["act"])){
		switch($_GET["act"]){
			case "khuyenmai": $tpl->assign("content_main",$khuyen_mai);break;
			case "danghot": $tpl->assign("content_main",$dang_hot);break;
			case "hangmoive": $tpl->assign("content_main",$hang_moi_ve);break;
			case "maycu": $tpl->assign("content_main",$may_cu);break;
			case "dt": $tpl->assign("content_main",$dt);break;
			case "mtb": $tpl->assign("content_main",$mtb);break;
			case "chitiet_sp": $tpl->assign("content_main",$chitiet_sp);break;
			case "pk": $tpl->assign("content_main",$pk);break;
			case "chitiet_pk": $tpl->assign("content_main",$chitiet_pk);break;
			case "spk": $tpl->assign("content_main",$spk);break;
			case "chitiet_spk": $tpl->assign("content_main",$chitiet_spk);break;
			case "tintuc": $tpl->assign("content_main",$tin_tuc); $tpl->assign("tintuc","border-right:1px solid #999;"); break;
			case "show_tt": $tpl->assign("content_main",$show_tt); $tpl->assign("tintuc","border-right:1px solid #999;"); break;
		}
	}
	if(isset($_GET["search"])) $tpl->assign("content_main",$search);

//----------------------------------------------------------	
	$tpl->parse("main.header");
	$tpl->parse("main.home_slides");
	$tpl->parse("main.content_main");
	$tpl->parse("main.aside");
	$tpl->parse("main.footer");

	$tpl->parse("main");
	$tpl->out("main");
?>