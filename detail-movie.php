<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UNS MOVIE | NONTON MOVIE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto&display=swap');

    .head-text {
      font-family: 'Bebas Neue', cursive;
    }

    .body-text {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark head-text">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">UNS MOVIE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container py-4">
  <div class="row">

    <?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
      // Jika user sudah login
      if (isset($_GET['id'])) {
        require_once('config.php');
        $movies = $mysqli->query("SELECT * FROM movies WHERE id='" . $_GET["id"] . "'");
        while ($movie = $movies->fetch_assoc()) {
          echo '<iframe width="853" height="480" src="https://www.youtube.com/embed/' . $movie["video_id"] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
          echo "<h4>" . $movie['title'] . "</h4>";
          echo "<p>" . $movie['created_at'] . "</p>";
          echo "<p>" . $movie['category'] . "</p>";
          echo "<p>" . $movie['description'] . "</p>";
        }
        $mysqli->close();
      } else {
        header("location: index.php");
      }
    } else {
      // Jika user belum login
      echo "<h1>You need an account to watch movies</h1>";
    }
    ?>
  </div>
</div>