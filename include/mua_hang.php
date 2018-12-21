<?php
	if(isset($_GET["mh"])){
		if($_GET["mh"]=="sp"){
			$ten_sp = $_POST["ten_sp"];
			$id_sp = $_POST["id_sp"];
			$id_tbl = $_POST["id_tbl"];
			$ho_ten = $_POST["ho_ten"];
			$sdt = $_POST["sdt"];
			$dia_chi_nhan_hang = $_POST["dia_chi_nhan_hang"];
			$ghi_chu = $_POST["ghi_chu"];
			if(($_POST["ho_ten"]!="") && ($_POST["sdt"]) ){
				mysql_query("insert into mua_hang (ho_ten, sdt, dia_chi_nhan_hang, ghi_chu, ten_sp, id_sp, id_tbl)
				values('$ho_ten','$sdt','$dia_chi_nhan_hang','$ghi_chu','$ten_sp','$id_sp','$id_tbl')");
			}
			header("location: index.php?act=chitiet_sp&id_sp=".$id_sp);
		}
		if($_GET["mh"]=="pk"){z
			$ten_sp = $_POST["ten_pk"];
			$id_pk = $_POST["id_pk"];
			$id_tbl = $_POST["id_tbl"];
			$ho_ten = $_POST["ho_ten"];
			$sdt = $_POST["sdt"];
			$dia_chi_nhan_hang = $_POST["dia_chi_nhan_hang"];
			$ghi_chu = $_POST["ghi_chu"];
			if(($_POST["ho_ten"]!="") && ($_POST["sdt"]) ){
				mysql_query("insert into mua_hang (ho_ten, sdt, dia_chi_nhan_hang, ghi_chu, ten_sp, id_sp, id_tbl)
				values('$ho_ten','$sdt','$dia_chi_nhan_hang','$ghi_chu','$ten_sp','$id_pk','$id_tbl')");
			}
			header("location: index.php?act=chitiet_pk&id_pk=".$id_pk);
		}
		if($_GET["mh"]=="spk"){
			$ten_sp = $_POST["ten_spk"];
			$id_spk = $_POST["id_spk"];
			$id_tbl = $_POST["id_tbl"];
			$ho_ten = $_POST["ho_ten"];
			$sdt = $_POST["sdt"];
			$dia_chi_nhan_hang = $_POST["dia_chi_nhan_hang"];
			$ghi_chu = $_POST["ghi_chu"];
			if(($_POST["ho_ten"]!="") && ($_POST["sdt"]) ){
				mysql_query("insert into mua_hang (ho_ten, sdt, dia_chi_nhan_hang, ghi_chu, ten_sp, id_sp, id_tbl)
				values('$ho_ten','$sdt','$dia_chi_nhan_hang','$ghi_chu','$ten_sp','$id_spk','$id_tbl')");
			}
			header("location: index.php?act=chitiet_spk&id_spk=".$id_spk);
		}
	}
?>