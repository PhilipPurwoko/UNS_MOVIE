<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id				= $_POST['id'];
			$title			= $_POST['title'];
			$category		= $_POST['category'];
			$description	= $_POST['description'];
			$video_id		= $_POST['video_id'];
			$img_url		= $_POST['img_url'];

			$cek = mysqli_query($koneksi, "SELECT * FROM movies WHERE id='$id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO movies(id, title, category, description, video_id, img_url) VALUES('$id', '$title', '$category', '$description', '$video_id', '$img_url')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_film";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_film" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="title" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
				<div class="col-md-6 col-sm-6">
					<select name="category" class="form-control" required>
						<option value="">Change category</option>
						<option value="Action">Action</option>
						<option value="Adventure">Adventure</option>
						<option value="Horror">Horror</option>
						<option value="Romance">Romance</option>
						<option value="Comedy">Comedy</option>
						<option value="Drama">Drama</option>
						<option value="Fantasy">Fantasi</option>
						<option value="Thriller">Thriller</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="description" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Link Video</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="video_id" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="img_url" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
