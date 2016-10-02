<?php 
session_start(); // Commence session

include_once('inc/db_connect.inc.php');

// If connexion
if (isset($_POST['btn']))
{
	$email = trim($_POST['email']);
	$pwd   = trim($_POST['pwd']);
	
	$email = strip_tags($email);
	$pwd   = strip_tags($pwd);
	
	// Control email
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($pwd)) 
	{
		// Requête pour chercher champ (id, email, nom, pwd)
		# Code à mettre
		$query= $bdTest->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$user->$query->fetchAll();

		
		// Control pwd
		if(count($user) > 0 && password_verify($pwd, $user[0][password]))
		{
			# TODO : continer pour faire session + cookie
			$_SESSION['user'] = $user[0]['id'];
			$_SESSION['user_name'] = $user[0]['name'];
		
		}

		else
		{
			//Email non trouvé ou mot de passe incorrect.
			echo 'Votre email ou votre mot de passe n\'est pas correcte.';
		}

	} // End if avec filter

	else 
	{
		// Informations de connexion incorrectes.
	}
} // End if(isset($_POST))
?>


<!-- :::::::::::::: VIEW ::::::::::::::: -->
<?php 
require_once('inc/init.inc.php');
require_once('inc/top.inc.php');
?>

<form action="post" action="" style="margin-top:10em;">
	<fieldset>
		<legend>Connexion</legend>

		<label for="email">Votre Email</label>
		<input type="text" name="email" id="email" placeholder="adresse@email.com">
		
		<label for="pwd">Mot de passe</label>
		<input type="password" name="pwd" id="pwd" placeholder="************">

		<input type="submit" name = "btn" value="Se connecter">
	</fieldset>
</form>

<?php 
require_once('inc/bottom.inc.php');
 ?>
