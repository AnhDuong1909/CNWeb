<?php
	session_start();
	if(isset($_SESSION["username"]))
	header("location: index.php?act=tk");
	mysql_connect("localhost","root","");
	mysql_select_db("project");
	
	$dangnhap = $_POST["dangnhap"];
	if($dangnhap=="ok"){
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		$query = mysql_query("select * from tai_khoan where user='$user'");
		$num = mysql_num_rows($query);
		if(mysql_num_rows($query)==1){
			$rows = mysql_fetch_array($query);
			if($pass == $rows["pass"]) $_SESSION["username"]=$rows['id_tk'];
				else unset($_SESSION["username"]);
		}
	}
	
	if(isset($_SESSION["username"])) header("location: index.php?act=tk"); else header("location: login.php?act=miss")
?>