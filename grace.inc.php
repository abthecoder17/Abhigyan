<?php
	require 'connect.inc.php';
	$query="SELECT * FROM mess_grace WHERE uid=? date=?";
		$todate=date("Y,m,d");
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$query)){
				header("Location: ../index.php?error=queryerror");
				exit();
			} else{
				mysqli_stmt_bind_param($stmt,"ss",$_SESSION['userid'],$todate);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				if($row=mysqli_fetch_assoc($result)){
					session_start();
					$_SESSION['grace']=$row['Grace_id'];
					$_SESSION['todate']=$todate;
					header("Location: ../index.php?msg=gracefound");
					exit();
				} else{
					header("Location: ../index.php?msg=gracenotfound");
					exit();
				}
			}
			mysqli_stmt_close($stmt);
		mysqli_close($conn);
								
?>