<?php
	session_start();
	require_once('config.php');
	$sql = mysqli_query($mysqli, "SELECT * FROM movies") or die(mysqli_error($mysqli));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UNS MOVIE | WELCOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap');
		.head-text{
			font-family: 'Bebas Neue', cursive;
		}
		.body-text{
			font-family: 'Roboto', sans-serif;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark head-text">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">UNS MOVIE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          	<?php
          		if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
          			<li class="nav-item">
	              		<a class="nav-link" href="/reset-password.php">Reset Password</a>
	            	</li> 
				  	<li class="nav-item">
	              		<a class="nav-link" href="/logout.php">Logout</a>
	            	</li>  
          	<?php } else { ?>
				<li class="nav-item">
					<a class="nav-link" href="/login.php">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/register.php">Register</a>
				</li>
        	<?php } ?>
          </ul>
        </div>
      </div>
    </nav>
	<?php
	if(mysqli_num_rows($sql) > 0){
		while($data = mysqli_fetch_assoc($sql)){ ?>
			<div class="container">
				<div class="row">
					<div class="col">
						<img src="<?= $data['img_url'] ?>">
					</div> 
					<div class="col">
						<h5><?= $data['title'] ?></h5>
						<p class="text-muted"><?= $data['category'] ?></p>
						<p><?= $data['description'] ?></p>
						<a class="btn btn-danger" href="/detail-movie.php?id=<?= $data['id'] ?>">WATCH</a>
					</div>
				</div>	
			</div>
	<?php }} ?>
</body>
</html>