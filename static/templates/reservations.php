<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mes réservations</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/reservation.css" />
</head>
<body>

<!-- header -->
<header class="menu">
    <nav>
        <label class="logo">Restôt</label>
        <ul>
            <li><a href="home.php">Accueil</a></li>
            <li><a href="reservations.php" class="active">Mes réservations</a></li>
            <li><a href="compte.php">Compte</a></li>
            <a href="../../server/deconnexion.php"><li><img src="../image/se-deconnecter.png" class="deconnexion"></li></a>
        </ul>
    </nav>
</header>
<!-- End header -->

<!-- Account Section -->
<div class="section flex" id="account-section">
    <div class="text">
        <h1 class="primary">
            Explore your reservations, <br />
            Elevate your dining <span style="color: var(--clr-primary)">experience</span>
        </h1>
    </div>
</div>
<!-- End Account Section -->

<!-- Account Details -->
<div class="section" id="account-details">
    <h2 class="secondary">Mes réservations</h2>

    <div class="container flex">

<!--        boucle où on a toutes les commandes du client-->
        <div class="box">
            <h3>Ma commande de tel date</h3>
            <p>
                blablabla
            </p>
        </div>
    </div>
</div>
<!-- End Account Details -->


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
