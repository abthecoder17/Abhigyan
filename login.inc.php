<?php
	
	if(isset($_POST['login'])){
		require 'connect.inc.php';
		
		$userid=$_POST['userid'];
		$password=$_POST['password'];
		
		if(empty($_POST['userid'])||empty($_POST['password'])){
			header("Location: ../index.php?error=invalidInput");
			exit();
		} else{
			$query="SELECT * FROM mess_reg WHERE uid=?";
			$stmt=mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$query)){
				header("Location: ../index.php?error=queryerror");
				exit();
			} else{
				mysqli_stmt_bind_param($stmt,"s",$userid);
				mysqli_stmt_execute($stmt);
				$result=mysqli_stmt_get_result($stmt);
				if($row=mysqli_fetch_assoc($result)){
					if($password==$row['Mess']){
						session_start();
						$_SESSION['userid']=$row['uid'];
						$_SESSION['name']=$row['Name'];
						header("Location: ../index.php?login=success");
						exit();
					} else{
						header("Location: ../index.php?error=mismatch");
						exit();
					}
				}
					
			}		
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}	else{
		header("Location: ../index.php");
	}
	
?>