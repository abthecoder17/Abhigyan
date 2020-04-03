<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		
		<title> Mess Entry Portal </title>
	</head>
	<body>
		<header>
			<div>
				<?php
					if(!isset($_SESSION['userid'])){
						echo "<form action='inc/login.inc.php' method='POST'>
						<input type='text' name='userid' placeholder='Userid'><br/>
						<input type='password' name='password' placeholder='Password'><br/>
						<button type='submit' name='login'> Login </button>
						</form>";
					}
					else
					{
						
					}
				?>
					
			</div>
		</header>
	</body>
</html> 