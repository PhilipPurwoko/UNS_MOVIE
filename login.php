<?php
session_start();

// If user is logged in, redirect to main page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

require_once "config.php";
$username = $password = "";
$username_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate user data
    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            if ($stmt->execute()) {
                $stmt->store_result();

                // If username exists verify password
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                    	// Check password
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            header("location: index.php");
                        } else {
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Error occured on server";
            }
            $stmt->close();
        }
    }
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UNS MOVIE | LOGIN</title>
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
	<main class="m-3">
	    <h2 class="head-text">Login</h2>

	    <?php
	    if (!empty($login_err)) {
	        echo '<div class="alert alert-danger">' . $login_err . '</div>';
	    }
	    ?>

	    <form class="body-text" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	        <div class="form-group">
	            <label>Username</label>
	            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
	            <span class="invalid-feedback"><?php echo $username_err; ?></span>
	        </div>
	        <div class="form-group">
	            <label>Password</label>
	            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
	            <span class="invalid-feedback"><?php echo $password_err; ?></span>
	        </div>
	        <button type="submit" class="btn btn-danger btn-block">Login</button>
	        <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
	    </form>
	</main>
</body>
</html>