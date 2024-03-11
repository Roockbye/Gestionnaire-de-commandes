<?php
  include "../../server/inscription.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de login</title>
  <link rel="stylesheet" href="../css/inscription.css">
</head>
<body>
  <div class="wrapper">
    <div class="form8">

      <button class="form8__btncircle">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <div class="form8__log">
        <span class="form8__text">
          <span>Se connecter</span>
        </span>
        <form method="post">
          <input type="text" name="mail_connexion" autocomplete="off" class="form8__inpt" placeholder="Mail">
          <input type="password" name="mdp_connexion" autocomplete="off" class="form8__inpt" placeholder="Mot de passe">
          <button class="form8__btn" type="submit" name='submit'>Connexion</button>
        </form>
      </div>

      <div class="form8__reg">
        <span class="form8__text">
          <span>S'inscrire</span>
        </span>
        <form method="post">
          <input type="text" name="mail_inscription" autocomplete="off" class="form8__inpt" placeholder="Mail">
          <input type="password" name="mdp_inscription" autocomplete="off" class="form8__inpt" placeholder="Mot de passe">
          <input type="password" name="mdp_confirm" autocomplete="off" class="form8__inpt" placeholder="Confirmation mot de passe">
          <button class="form8__btn" type="submit" name='submit'>Inscription</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $('.form8__btncircle').click(function () {
	$(this).toggleClass('active');
	$('.form8').toggleClass('register__bg');
	$('.form8__log, .form8__reg').toggleClass('slided');
	if ($('.form8__reg').hasClass("slided")) {
		$('.form8').animate({
				'height': $('.form8__reg').height()
			}, 10);
	} else if (!$('.form8__reg').hasClass("slided")) {
		$('.form8').animate({
				'height': $('.form8__log').height()
			}, 10);
	}
});
  </script>
</body>
</html>
