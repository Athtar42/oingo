<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
		<?php
		session_start();
    	if(!isset($_SESSION['userid']))
		{
		?>
			<form name="login" action="login.php" method="post">
					<p>Email: <input type="text" name="email"></p>
					<p>Password: <input type="password" name="password"></p>
					<p><input type="submit" name="submit" value="Login"></p>
					<a href="http://localhost/PROJECT/signup.html">Signup</a>
			</form>
		<?php
		}
		else
		{
			echo"<script type='text/javascript'>;location='homepage.php';</script>";
		}
        ?>      
    </body>
</html>