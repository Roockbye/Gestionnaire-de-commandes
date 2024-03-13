<?php
    include "../../server/home.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Accueil</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/home.css" />
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

<!-- Phrase Section -->
<div class="section flex" id="phrase-section">
    <div class="text">
        <h1 class="primary">
            It's Not Just Food, <br />
            It's an <span style="color: var(--clr-primary)">Experience...</span>
        </h1>
    </div>
</div>
<!-- End Phrase Section -->

<!-- Reservation section -->
<div class="section" id="reservation-section">
    <h2 class="secondary">Nos Restaurants</h2>

    <div class="container flex">
        <div class="box">
            <a href="LaTavolaFelice.php">
            <h3>La Tavola Felice</h3>
            <img src="../image/italien.jpg" class="resto">
            <p>
                Vous êtes tenté par notre restaurant <strong>italien</strong>?
                Cliquer ici pour commander !
            </p>
            </a>
        </div>

        <div class="box">
            <a href="MariachiGrill.php">
            <h3>Mariachi Grill</h3>
            <img src="../image/mexicain.jpg" class="resto">
            <p>
                Vous êtes tenté par notre restaurant <strong>mexicain</strong>?
                Cliquer ici pour commander !
            </p>
            </a>
        </div>

        <div class="box">
            <a href="LaFoliedesPapilles.php">
            <h3>La Folie des Papilles</h3>
            <img src="../image/français.jpg" class="resto">
            <p>
                Vous êtes tenté par notre restaurant <strong>français</strong>?
                Cliquer ici pour commander !
            </p>
        </a>
        </div>

        <div class="box">
            <a href="LeRêveduPanda.php">
            <h3>Le Rêve du Panda</h3>
            <img src="../image/chinois.jpg" class="resto">
            <p>
                Vous êtes tenté par notre restaurant <strong>chinois</strong>?
                Cliquer ici pour commander !
            </p>
        </a>
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
            <h2>What you can discover</h2>

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

</body>
</html>
