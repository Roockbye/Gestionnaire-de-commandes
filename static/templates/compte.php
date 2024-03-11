<?php
    include '../../server/compte.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compte</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/home.css" />
    <link rel="stylesheet" href="../css/compte.css" />
</head>
<body>

<!-- header -->
<header class="menu">
    <nav>
        <label class="logo">Restôt</label>
        <ul>
            <li><a href="home.php">Accueil</a></li>
            <li><a href="reservations.php">Mes réservations</a></li>
            <li><a href="compte.php" class="active">Compte</a></li>
            <a href="../../server/deconnexion.php"><li><img src="../image/se-deconnecter.png" class="deconnexion"></li></a>
        </ul>
    </nav>
</header>
<!-- End header -->

<!-- Account Section -->
<div class="section flex" id="account-section">
    <div class="text">
        <h1 class="primary">
            Manage your account, <br />
            Stay connected with <span style="color: var(--clr-primary)">Restôt</span>
        </h1>
    </div>
</div>
<!-- End Account Section -->

<!-- Account Details -->
<div class="section" id="account-details">
    <h2 class="secondary">Vos Informations</h2>

    <div class="container flex">
        <form action="compte.php" method="post" class="box">
            <h3>Profil</h3>
            <p>
                Consultez et mettez à jour vos informations personnelles ici.</br>
            </p>
            <!--toutes les info de l'user (possibilité to update)-->
            <div style="margin-top: 25px">
                    <div class="info">
                <label>Nom</label></br>
                <input type="text" name="nom" value="<?php echo !empty($lastName)? $lastName : '';?>"></br>
                        <?php
                        if (isset($_POST['updateClient']) && empty($lastName)) {
                            echo "<h10>Veuillez rentrer votre nom</h10>";
                        }
                        ?>
                    </div>
                    <div class="info">
                    <label>Prénom</label></br>
                <input type="text" name="prenom" value="<?php echo !empty($firstName) ? $firstName : '';?>"></br>
                        <?php
                        if (isset($_POST['updateClient']) && empty($firstName)) {
                            echo "<h10>Veuillez rentrer votre prénom</h10>";
                        }
                        ?>
                    </div>
                    <div class="info">
                <label>Email</label></br>
                <input type="email" name="email" value="<?php echo !empty($email) ? $email : '';?>"></br>
                        <?php
                        if (isset($_POST['updateClient']) && empty($email)) {
                            echo "<h10>Veuillez rentrer votre mail</h10>";
                        }
                        ?>
                    </div>
                    <div class="info">
                <label>Numéro de téléphone</label></br>
                <input type="tel" name="tel" value="<?php echo !empty($tel) ? $tel : '';?>"></br>
                        <?php
                        if (isset($_POST['updateClient']) && empty($tel)) {
                            echo "<h10>Veuillez rentrer votre numéro de téléphone</h10>";
                        }
                        ?>
                    </div>
            </div>
            <input type="submit" name="updateClient" value="Enregistrer">
                <!--option de déconnexion-->
        </form>

        <form action="" method="post" class="box">
            <h3>Mot de passe</h3>
            <p>
                Changez votre mot de passe pour assurer la sécurité de votre compte.
            </p>
            <!--possibilité de changé de mot de passe-->
            <div style="margin-top: 25px">
            <div class="info">
                <label>Nouveau mot de passe</label>
                <input type="password" name="password"></br>
            </div>
            <div class="info">
                <label>Confirmation du mot de passe</label>
                <input type="password" name="checkPassword"></br>
            </div>
                <p style="margin-top: 10px"><?php echo isset($isUpdate) ? $isUpdate : '';?></p>
            </div>
            <input type="submit" name="updatePassword" value="Enregistrer">
        </form>
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
