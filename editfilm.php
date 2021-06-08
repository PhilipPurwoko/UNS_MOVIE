<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel movies berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM movies WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$title			  = $_POST['title'];
			$category	= $_POST['category'];
			$description	= $_POST['description'];
			$video_id		= $_POST['video_id'];
			$img_url		= $_POST['img_url'];

			$sql = mysqli_query($koneksi, "UPDATE movies SET title='$title', category='$category', description='$description', video_id='$video_id', img_url='$img_url' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_film";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_film&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Title</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="title" class="form-control" value="<?php echo $data['title']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
				<div class="col-md-6 col-sm-6">
					<select name="category" class="form-control" required>
						<option value="">Change category</option>
						<option value="Action" <?php if($data['category'] == 'Action'){ echo 'selected'; } ?>>Action</option>
						<option value="Adventure" <?php if($data['category'] == 'Adventure'){ echo 'selected'; } ?>>Adventure</option>
						<option value="Horror" <?php if($data['category'] == 'Horror'){ echo 'selected'; } ?>>Horror</option>
						<option value="Romance" <?php if($data['category'] == 'Romance'){ echo 'selected'; } ?>>Romance</option>
						<option value="Comedy" <?php if($data['category'] == 'Comedy'){ echo 'selected'; } ?>>Comedy</option>
						<option value="Drama" <?php if($data['category'] == 'Drama'){ echo 'selected'; } ?>>Drama</option>
						<option value="Fantasy" <?php if($data['category'] == 'Fantasy'){ echo 'selected'; } ?>>Fantasy</option>
						<option value="Thriller" <?php if($data['category'] == 'Thriller'){ echo 'selected'; } ?>>Thriller</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="description" class="form-control" value="<?php echo $data['description']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Link Video</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="video_id" class="form-control" value="<?php echo $data['video_id']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="img_url" class="form-control" value="<?php echo $data['img_url']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_film" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
