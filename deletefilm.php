<?php
// Ngecek jika user admin
require_once('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id = $_GET['id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($mysqli, "SELECT * FROM movies WHERE id='$id'") or die(mysqli_error($mysqli));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($mysqli, "DELETE FROM movies WHERE id='$id'") or die(mysqli_error($mysqli));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="admin.php?page=tampil_film";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="admin.php?page=tampil_film";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="admin.php?page=tampil_film";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="admin.php?page=tampil_film";</script>';
}

?>
