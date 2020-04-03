<?php
	if(isset($_POST['submit']))
	{
		if($_POST['override']=='no')
		{	
			echo '<p>Grace saved. No entry.</p>';
			header("Location: logout.inc.php");
			exit();
		}
		else if($_POST['override']=='yes')
		{
			require 'connect.inc.php';
			$query="DELETE FROM mess_grace WHERE uid=_SESSION['userid'] AND date=_SESSION['todate']";
			mysqli_query($conn,$query);
			echo '<p>Grace overriden. You may enter.</p>';
			header("Location: logout.inc.php");
		}
	}
	mysqli_stmt_close($stmt);
		mysqli_close($conn);
?>