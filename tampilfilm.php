<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Film</font></center>
		<hr>
		<a href="index.php?page=tambah_film"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NO.</th>
					<th>ID</th>
					<th>TITLE</th>
					<th>CATEGORY</th>
					<th>DESCRIPTION</th>
					<th>LINK FILM</th>
					<th>IMAGE</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel movies urut berdasarkan id yang paling besar
				$sql = mysqli_query($mysqli, "SELECT * FROM movies ORDER BY id DESC") or die(mysqli_error($mysqli));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['id'].'</td>
							<td>'.$data['title'].'</td>
							<td>'.$data['category'].'</td>
							<td>'.$data['description'].'</td>
							<td>'.$data['video_id'].'</td>
							<td>'.$data['img_url'].'</td>
							<td>
								<a href="index.php?page=edit_film&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deletefilm.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
