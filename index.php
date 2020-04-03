<?php
	require 'header.php';
?>

		<main>
			<div>
				
				<?php
					if(isset($_SESSION['userid'])){
						echo '<p>Welcome '. $_SESSION['name'] .'</p><br/>';
						
						$today=getdate(time());
						
						if(!isset($_SESSION['grace'])){
							require 'Inc/grace.inc.php';
							if($_GET['msg']='gracefound')
							{
								echo '<p>You got grace son!</p>';
								echo "<form action=Inc/override.inc.php method='POST'>
								<input type='radio' id='yes' name='override' value='yes'>
								<label for='yes'>Yes</label><br>
								<input type='radio' id='no' name='override' value='no'>
								<label for='no'>No</label><br>
								<button type='submit' value='submit'>Submit</button>
								</form>";
							}
						}
						
						echo "<form action='Inc/logout.inc.php' method='GET'>
							<button type='submit' name='logout'>Logout</button>
						</form>";
					}
				?>
				
			</div>
		</main>
		
<?php
	require 'footer.php';
?>