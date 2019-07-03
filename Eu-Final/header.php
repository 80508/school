<?php
	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);*/
	require_once("config.inc.php");
	if ($_POST["Logout"]) {
		session_start();
		session_destroy();
	}
	session_start();

	// Student
	// Partijleider ( 1 Nep partij om werking van de website uit te leggen. )
	// Administrator
	// Database indexes SCHOONMAKEN voor oplevering d.m.v. ALTER TABLE `tablename` AUTO_INCREMENT = 0

	$Posted_Username = htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST["Username"]));
	$Posted_Password = htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST["Password"]));
	$Usercount = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM EU_USERS"));
	
	if (empty($_SESSION["Username"]) && strlen($Posted_Username)>0 && strlen($Posted_Password)>0) {
		$ePassword = password_hash($Posted_Password, PASSWORD_BCRYPT, ['cost'=>9]);
		if ($Usercount == 0 && strlen($Posted_Username)>0 && strlen($Posted_Password)>0) {
			mysqli_query($mysqli, "INSERT INTO EU_USERS (ID, Username, Password, Access_Level) VALUES (NULL, \"$Posted_Username\", \"$ePassword\", 3)");
			$_SESSION["Username"] = $Posted_Username;
			$_SESSION["Access_Level"] = 3;
		} else {
			$row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_USERS WHERE Username='$Posted_Username'"));
			if (password_verify($Posted_Password, $row["Password"])) {
				$_SESSION["Username"] = $Posted_Username;
				$_SESSION["Access_Level"] = $row["Access_Level"];
			}
			if (is_int($Posted_Username) || is_numeric($Posted_Username)) {
				$row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE ID=".(int)$Posted_Username));
				if (password_verify($Posted_Password, $row["Password"])) {
					$_SESSION["Username"] = (int)$Posted_Username;
					$_SESSION["Access_Level"] = 2;
					if ($Posted_Password == "admin"){
						Header("Location: forcepwchange.php");
					}
				}
			}
		}
	}

	if (!empty($_SESSION["Username"])) {
		$Username = $_SESSION["Username"];
		$Access_Level = $_SESSION["Access_Level"];
	}
	
	/*if ($Access_Level == 2) {
		$row = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM EU_PARTIES WHERE ID=".$Username));
		if (password_verify("admin", $row["Password"])) {
			Header("Location: forcepwchange.php");
		}
	}*/
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand">EU Voting</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            	<a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            	<a class="nav-link" href="stemmen.php">Stemmen</a>
            </li>
			<li class="nav-item">
            	<a class="nav-link" href="resultaten.php">Resultaten</a>
            </li>

			<?php
				function EchoURL($URL, $Name) {
					echo('<li class="nav-item">
						<a class="nav-link" href="'.$URL.'">'.$Name.'</a>
					</li>');
				}

				if (!empty($Username)) {
					if ($Access_Level == 2) {
						EchoURL("paginabewerken.php", "Pagina bewerken.");
					}
					if ($Access_Level == 3) {
						EchoURL("partijtoevoegen.php", "Partij toevoegen");
					}
				}
			?>
        </ul>
    </div>

    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
        <?php
            if (!empty($Username) && $Usercount > 0) {
                echo '<span class="navbar-text status">Welcome, '.$Username.'.</span>';
                echo '<form class="form" role="form" action="index.php" method="post">
                        <button type="submit" class=" btn btn-danger" name="Logout" value="1">Log out</button>
                </form>';
            } else {
                if (!empty($Posted)) {
                    echo '<span class="navbar-text status">Incorrect logon data.</span>';
                }
                echo '<li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Login</button>
                    <ul class="dropdown-menu dropdown-menu-right mt-1">
                      <li class="p-3">
                            <form class="form" role="form" action="#" method="post">
                                <div class="form-group">
                                    <input name="Username" id="usernameInput" placeholder="Username" class="form-control form-control-sm" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input name="Password" id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" required>
                                </div>
                                <div class="form-group">
                                    <button name="Post" type="submit" class="btn btn-primary btn-block" value="1">Login</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>';
            }
        ?>
    </ul>
</nav>
