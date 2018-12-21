<?php
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$tk = new XTemplate("views/tk.html");
	$tk->assign("title","Chúc mừng!!! Bạn đã đăng nhập");
	$tk->parse("tai_khoan");
	$tk = $tk->text("tai_khoan");
	//--------------------
	$doi_mk = new XTemplate("views/tk.html");
	
	$doi_mk->parse("doi_mk");
	$doi_mk = $doi_mk->text("doi_mk");
	//--------------------
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$changed = new XTemplate("views/tk.html");
	if(isset($_GET["kq"])){
		if($_GET["kq"]==1) $changed->assign("title","Bạn đã đổi mật khẩu thành công");
		else $changed->assign("title","Thay đổi mật khẩu thất bại");
	}
	$changed->parse("tai_khoan");
	$changed = $changed->text("tai_khoan");
	//--------------------
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	$regi = new XTemplate("views/tk.html");
	if(isset($_GET["kq"])){
		if($_GET["kq"]==1) $regi->assign("title","Bạn đã đăng kí thành công");
		else $regi->assign("title","Đăng kí thất bại");
	}
	$regi->parse("tai_khoan");
	$regi = $regi->text("tai_khoan");
	//--------------------
	$dang_ki = new XTemplate("views/tk.html");
	
	$dang_ki->parse("dang_ki");
	$dang_ki = $dang_ki->text("dang_ki");
	//---------------------
	if(isset($_GET["tk"])){
		if($_GET["tk"]=="thoat"){ 
			unset($_SESSION["username"]);
			header("location: index.php");
		}
		if($_GET["tk"]=="regi"){ 
			$user = strtolower($_POST["user"]);
			$pass2 = $_POST["pass2"];
			$pass3 = $_POST["pass3"];
			$ho_ten = $_POST["ho_ten"];
			$ngay_sinh = $_POST["ngay_sinh"];
			$dia_chi = $_POST["dia_chi"];
			$sdt = $_POST["sdt"];
			$email = $_POST["email"];
			$query=mysql_query("select * from tai_khoan where user='$user'");
			if(mysql_num_rows($query)==0){
				if($pass2!="" && $pass2==$pass3){
					mysql_query("insert into tai_khoan (user, pass, ho_ten, ngay_sinh, dia_chi, sdt, email)
					values ('$user','$pass2','$ho_ten','$ngay_sinh','$dia_chi','$sdt','$email')");
					header("location: index.php?act=regi&kq=1");
				}
				else header("location: index.php?act=regi&kq=0");
			}
			else header("location: index.php?act=regi&kq=0");
			
		}
		if($_GET["tk"]=="doi_mk"){ 
			$pass1 = $_POST["pass1"];echo $pass1;
			$pass2 = $_POST["pass2"];echo $pass2;
			$pass3 = $_POST["pass3"];echo $pass3;
			$id = $_SESSION["username"];
			$query = mysql_query("select * from tai_khoan where id_tk=$id");
			$row = mysql_fetch_array($query);
			if($pass1==$row["pass"]){
				if($pass2==$pass3) mysql_query("update tai_khoan set pass='$pass2' where id_tk=$id");
				header("location: index.php?act=changed&kq=1");
			}
			else header("location: index.php?act=changed&kq=0");
		}
	}
?>