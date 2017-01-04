<html>
<?php
	if (isset($this->session->userdata['logged_in'])) {
		
		header("location:".base_url()."user_authentication/user_login_process");
	}
?>
<head>
	<title>Formulaire de connexion</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
		if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
		}
	?>
	<?php
		if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
		}
	?>
<div id="main">
	<div id="login">
		<h2>Formulaire de connexion</h2>
		<hr/>

		<?php echo form_open('user_authentication/user_login_process'); ?>


		<?php
			echo "<div class='error_msg'>";
			if (isset($error_message)) {
				echo $error_message;
			}
			echo validation_errors();
			echo "</div>";
		?>
	<label>Nom d'utilisateur :</label>
	<input type="text" name="username" id="name" placeholder="Nom d'utilisateur "/><br /><br />
	<label>Mot de passe :</label>
	<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
	<input type="submit" value=" Login " name="submit"/><br />

	<a href="<?php echo base_url() ?>user_authentication/user_registration_show">Cliquez ici pour s'inscrire</a>


		<?php echo form_close(); ?>

	</div>
</div>
</body>
</html>