

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/index.css">
    </head>
    <body>
    <div class="login-box">
        <h1>Welcome To My Online Shop</h1>
        <h2>Login</h2>
        <form action="login.php" method="post" class="login_form">

            <div class="user-box">
                <input type = 'text' name = 'login'>
                <label for="">Username</label>
            </div>
            <div class="user-box">
                <input type = 'text' name = 'password'>
                <label for="">Password</label>
            </div>
                <button>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </button>
		</form>
    </div>






		<?php
		session_start();
		if (isset($_SESSION['error'])) {
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}

		?>



    </body>
</html>