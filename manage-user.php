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
  </div>
</nav>
<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  // Jika user sudah login
  require_once('config.php');
  $users = $mysqli->query("SELECT * FROM users WHERE username='" . $_SESSION["username"] . "'");
  $isAdmin = $users->fetch_assoc()['is_admin'] == 1;
  if ($isAdmin == false) {
    header("location: /");
  }

  // Jika user admin
  $users = $mysqli->query("SELECT * FROM users"); ?>
  <table class='table' width='80%' border=1>

    <tr>
      <th>Username</th>
      <th>Is Admin</th>
    </tr>
    <?php while ($user = $users->fetch_assoc()) { ?>
      <tr>
        <td><?= $user['username'] ?></td>
        <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
      </tr>
  <?php
    }
    echo "</table>";
    $mysqli->close();
  } else {
    // Jika user belum login
    header("location: /");
  }

  ?>