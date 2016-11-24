<?php session_start(); ?>

<!doctype html>
<html lang="fr">
	<head>
		
		<meta charset="utf-8">
		<title>Blog</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="script.js"></script>
		
	</head>

	<body>	

		<center><h1><p>Blog</p></h1></center><br/>	

		<p>
			<?php
				
				$BlogC = fopen('Blog.txt', 'a+');

				fseek($BlogC, 0);

				while(FALSE!=($Affichage=fgets($BlogC)))
				{
					echo $Affichage;
				}

				fclose($BlogC);
				
			?>
			
		</p>
		
	</body>

	<footer>
		<form action="" method="POST">
			
			<input id="Pseudo" name="Pseudo" placeholder="Pseudo" rows="1"></input>
			<br/>
			<input id="MotdePasse" name="MotdePasse" placeholder="Mot de Passe" rows="1" type="password"></input>
			<br/>
			<input type="submit" value="Connexion"></input>
			<p>
			<?php

				if(empty($_POST['Pseudo']) OR empty($_POST['MotdePasse']))
				{
					$_POST['Pseudo']="A";
					$_POST['MotdePasse']="A";
				}

				$User = fopen('User.txt','r');

				$Log=$_POST['Pseudo']." ".$_POST['MotdePasse'];

				fseek($User, 0);

				$Log=trim($Log);

				while(FALSE!=($Test=fgets($User)))
				{
					$Test=trim($Test);

					if ($Log==$Test)
					{
						$_SESSION['Pseudo']=$_POST['Pseudo'];
						header("Location: Blog.php");
					}
				}

				fclose($User)
			?>
			</p>	
		</form>
	</footer>
</html>