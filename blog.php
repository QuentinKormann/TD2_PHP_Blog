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

				date_default_timezone_set ( 'Europe/Paris' );
				$_POST['Date']=date('d').'/'.date('m').'/'.date('y').' '.date('H').':'.date('i');
				$_POST['Pseudo']=$_SESSION['Pseudo'];

				if(!empty($_POST['Message']) AND !empty($_POST['Titre']) AND !empty($_POST['Pseudo']))
				{
					fputs($BlogC,'<strong>Titre: </strong>');
					fputs($BlogC,$_POST['Titre']);
					fputs($BlogC,'<br/>');
					fputs($BlogC,'<strong>Date: </strong>');
					fputs($BlogC,$_POST['Date']);
					fputs($BlogC,'<br/>');
					fputs($BlogC,'<strong>Pseudo: </strong>');
					fputs($BlogC,$_POST['Pseudo']);
					fputs($BlogC,'<br/>');
					fputs($BlogC,'<strong>Message: </strong><br/>');
					fputs($BlogC,$_POST['Message']);
					fputs($BlogC,'<br/>');
					fputs($BlogC,'<br/>');
				}

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
			<p>
			<?php
				echo $_SESSION['Pseudo'];
			?>
			</p>

			<textarea id="Titre" name="Titre" placeholder="Titre" rows="1"></textarea>
			<br/>
			<textarea id="Message" name="Message" placeholder="Message" rows="8" cols="100"></textarea>
			<input type="submit" value="Envoyer"/>
		</form>

		<form action="Deconnexion.php">
			<input type="submit" value="Déonnexion"/>
		</form>
	</footer>
</html>



