<?php
    include "../../server/reservation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/resto.css" />
</head>
<body>

<!-- header -->
<header class="menu">
    <nav>
        <label class="logo">Restôt</label>
        <ul>
            <li><a href="home.php" class="active">Accueil</a></li>
            <li><a href="reservations.php">Mes réservations</a></li>
            <li><a href="compte.php">Compte</a></li>
            <a href="../../server/deconnexion.php"><li><img src="../image/se-deconnecter.png" class="deconnexion"></li></a>
        </ul>
    </nav>
</header>
<!-- End header -->

<!-- Hero Section -->
<div class="section flex" id="hero-section">
    <div class="text">
        <h1 class="primary">
            Réservez votre table, <br />
            à la <span style="color: var(--clr-primary)">Mariachi Grill</span>
        </h1>
    </div>
</div>
<!-- End Hero Section -->

<!-- How It Works -->
<div class="section" id="how-it-works">
    <h2 class="secondary">Réservez ici</h2>

    <div class="container flex">
            <div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form>
								<div class="form-group">
									<span class="form-label" name="nom">Nom</span>
									<input class="form-control" type="text" placeholder="Nom">
								</div>
                                <div class="form-group">
									<span class="form-label" name="nom">Prénom</span>
									<input class="form-control" type="text" placeholder="Prénom">
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Date de réservation</span>
											<input class="form-control" type="date" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Heure de réservation</span>
											<input class="form-control" type="time" id="heure-reservation" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Nombre de personnes</span>
											<input class="" type="number" min="1" max="20">
											<span class="select-arrow"></span>
										</div>
									</div>
                                </div>
								<div class="form-btn">
									<button class="submit-btn" name="submit">Réserver</button>
								</div>
							</form>
						</div>
					</div>
    </div>
</div>
<!-- End How It Works -->

<!-- Footer -->
<div class="footer">
    <div class="container flex">
        <div class="footer-about">
            <h2>About</h2>
            <p>
                Nous sommes l'entreprise de restauration Restôt,
                nous avons lancé un site web pour les commandes en ligne après une campagne réussie.
                Une base de données relationnelle a été mise en place pour optimiser la gestion des commandes,
                menus et clients, renforçant ainsi la position de Restôt sur le marché.
            </p>
        </div>

        <div class="footer-category">
            <h2>Our Menu</h2>

            <ul>
                <li>Biryani</li>
                <li>Chicken</li>
                <li>Pizza</li>
                <li>Burger</li>
                <li>Pasta</li>
            </ul>
        </div>

        <div class="get-in-touch">
            <h2>Get in touch</h2>
            <ul>
                <li>Account</li>
                <li>Support Center</li>
                <li>Feedback</li>
                <li>Suggession</li>
            </ul>
        </div>
    </div>

    <div class="copyright">
        <p>Copyright &copy; 2024. All Rights Reserved.</p>
    </div>
</div>
<!-- End Footer -->
<script>
var inputHeure = document.getElementById('heure-reservation');
    inputHeure.addEventListener('input', function() {
        var heure = inputHeure.value;
        var heuresAutorisees = ['11', '12', '13', '14', '18', '19', '20', '21'];
        var heureValide = false;
        
        // Vérifier si l'heure sélectionnée est valide
        if (heuresAutorisees.includes(heure.substr(0, 2))) {
            heureValide = true;
        }
        
        // Afficher un message d'erreur si l'heure n'est pas valide
        if (!heureValide) {
            alert('Veuillez choisir une heure valide (entre 11h et 15h, et entre 18h et 21h)');
            inputHeure.value = '';
        }
});
  // Récupérez le bouton "Réserver"
  var btn = document.querySelector(".submit-btn");

  // Lorsque l'utilisateur clique sur le bouton "Réserver"
  btn.onclick = function() {
    // Ouvrez une nouvelle fenêtre avec votre page de formulaire de paiement
    window.open("bancaire.php", "Payment", "width=400,height=400");
}
</script>
</body>
</html>
