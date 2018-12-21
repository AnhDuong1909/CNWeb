<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập Hệ thống</title>
<?php
	session_start();
	if(isset($_SESSION["username"])) header("location: index.php");
?>
<style>
	*{
		margin:0px;
		padding:0px;
	}
	form{
		border:1px solid;
		width:500px;
		margin:100px auto;
		padding-bottom:20px;
		padding-top:30px;
		background:#EEF7EE;
	}
	form > h3{
		text-align:center;
		font-family:Arial, Helvetica, sans-serif;
		font-size:1.4em;
		padding-bottom:20px;
	}
	.rows{
		height:35px;
	}
	form > .rows label{
		width: 100px;
		display:inline-block;
		margin-left:50px;
	}
	input{
		width:200px;
		height:20px;
	}
	input[type="submit"]{
		width:100px;
		height:20px;
		margin-left:25px;
	}
</style>
</head>

<body>
	<div class="dang_nhap">
        <form name="frm" action="checklogin.php" method="post">
            <h3>ĐĂNG NHẬP HỆ THỐNG</h3>
            <div class="rows">
            <label>Tài khoản</label><input type="text" name="user">
            </div>
            <div class="rows">
            <label>Mật khẩu</label><input type="password" name="pass">
            </div>
            <input type="hidden" name="dangnhap" value="ok">
            <div class="rows">
            <label></label><input type="submit" name="submit">
            </div>
        </form>
    </div>
</body>
</html>
