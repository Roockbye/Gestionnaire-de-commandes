<?php
    include '../../server/reservation.php';
?>

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
    <h2 class="secondary"><u>Mes réservations</u></h2>

    <div class="container">
        <h2 class="secondary">La Tavola Felice</h2>
        <!--        boucle où on a toutes les commandes du client-->
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=restôt;charset=utf8;','root',"");
        $client = $bdd->prepare("SELECT id FROM clients WHERE mail=? AND mdp=?");
        $client->execute([$_SESSION['mail'], $_SESSION['mdp']]);
        $idClient = $client->fetchColumn();

        $reservations = $bdd->prepare("SELECT * FROM réservations WHERE id_restaurant=? and id_client=?");
        $reservations->execute([1, $idClient]);

        if ($reservations->rowCount() > 0) {
            while ($row = $reservations->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="box">';
                $dateObj = new DateTime($row['jour']);
                $date = $dateObj->format("l j F Y");
                echo "<h3>Ma réservation du ".$date."</h3>";
                $heureObj = new DateTime($row['heure']);
                $hour = $heureObj->format('H:i');
                echo "<p>Pour ".$row['nbr_personnes']." personnes à ".$hour."h. Réservé le ".$row['heure_reservation']."</p></div>";

                $commentaires = $bdd->prepare("SELECT description FROM commentaires WHERE id_réservation = ?");
                $commentaires->execute([$row['id']]);

                if ($commentaires->rowCount() > 0) {
                    echo "<div class='commentaires'>";
                    echo "<h4>Commentaires :</h4>";
                    while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>".$commentaire['description']."</p>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>Aucun commentaire pour cette réservation.</p>";
                }
                // Ajout de l'icône de commentaire ici
                echo "<button class='comment-icon' onclick='openCommentPopup()'>Commentaire</button>";
                echo "</div>";
            }
        } else {
            echo "<p style='margin-bottom: 20px'>Vous n'avez pas encore de réservation pour ce restaurant</p>";
        }

        ?>
    </div>

    <div class="container">
        <h2 class="secondary">Mariachi Grill</h2>
        <!--        boucle où on a toutes les commandes du client-->
        <?php
        $reservations = $bdd->prepare("SELECT * FROM réservations WHERE id_restaurant=? and id_client=?");
        $reservations->execute([4, $idClient]);

        if ($reservations->rowCount() > 0) {
            while ($row = $reservations->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="box">';
                $dateObj = new DateTime($row['jour']);
                $date = $dateObj->format("l j F Y");
                echo "<h3>Ma réservation du ".$date."</h3>";
                $heureObj = new DateTime($row['heure']);
                $hour = $heureObj->format('H:i');
                echo "<p>Pour ".$row['nbr_personnes']." personnes à ".$hour."h. Réservé le ".$row['heure_reservation']."</p></div>";

                $commentaires = $bdd->prepare("SELECT description FROM commentaires WHERE id_réservation = ?");
                $commentaires->execute([$row['id']]);

                if ($commentaires->rowCount() > 0) {
                    echo "<div class='commentaires'>";
                    echo "<h4>Commentaires :</h4>";
                    while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>".$commentaire['description']."</p>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>Aucun commentaire pour cette réservation.</p>";
                }

                // Ajout de l'icône de commentaire ici
                echo "<button class='comment-icon' onclick='openCommentPopup()'>Commentaire</button>";
                echo "</div>";
            }
        } else {
            echo "<p style='margin-bottom: 20px'>Vous n'avez pas encore de réservation pour ce restaurant</p>";
        }
        ?>
    </div>

    <div class="container">
        <h2 class="secondary">La Folie des Papilles</h2>
        <!--        boucle où on a toutes les commandes du client-->
        <?php
        $reservations = $bdd->prepare("SELECT * FROM réservations WHERE id_restaurant=? and id_client=?");
        $reservations->execute([2, $idClient]);

        if ($reservations->rowCount() > 0) {
            while ($row = $reservations->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="box">';
                $dateObj = new DateTime($row['jour']);
                $date = $dateObj->format("l j F Y");
                echo "<h3>Ma réservation du ".$date."</h3>";
                $heureObj = new DateTime($row['heure']);
                $hour = $heureObj->format('H:i');
                echo "<p>Pour ".$row['nbr_personnes']." personnes à ".$hour."h. Réservé le ".$row['heure_reservation']."</p></div>";

                $commentaires = $bdd->prepare("SELECT description FROM commentaires WHERE id_réservation = ?");
                $commentaires->execute([$row['id']]);

                if ($commentaires->rowCount() > 0) {
                    echo "<div class='commentaires'>";
                    echo "<h4>Commentaires :</h4>";
                    while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>".$commentaire['description']."</p>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>Aucun commentaire pour cette réservation.</p>";
                }

                // Ajout de l'icône de commentaire ici
                echo "<button class='comment-icon' onclick='openCommentPopup()'>Commentaire</button>";
                echo "</div>";
            }
        } else {
            echo "<p style='margin-bottom: 20px'>Vous n'avez pas encore de réservation pour ce restaurant</p>";
        }
        ?>
    </div>

    <div class="container"  style="margin-bottom: 50vh">
        <h2 class="secondary">Le Rêve du Panda</h2>
        <!--        boucle où on a toutes les commandes du client-->
        <?php
        $reservations = $bdd->prepare("SELECT * FROM réservations WHERE id_restaurant=? and id_client=?");
        $reservations->execute([3, $idClient]);

        if ($reservations->rowCount() > 0) {
            while ($row = $reservations->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="box">';
                $dateObj = new DateTime($row['jour']);
                $date = $dateObj->format("l j F Y");
                echo "<h3>Ma réservation du ".$date."</h3>";
                $heureObj = new DateTime($row['heure']);
                $hour = $heureObj->format('H:i');
                echo "<p>Pour ".$row['nbr_personnes']." personnes à ".$hour."h. Réservé le ".$row['heure_reservation']."</p></div>";

                $commentaires = $bdd->prepare("SELECT description FROM commentaires WHERE id_réservation = ?");
                $commentaires->execute([$row['id']]);

                if ($commentaires->rowCount() > 0) {
                    echo "<div class='commentaires'>";
                    echo "<h4>Commentaires :</h4>";
                    while ($commentaire = $commentaires->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p>".$commentaire['description']."</p>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>Aucun commentaire pour cette réservation.</p>";
                }
                
                // Ajout de l'icône de commentaire ici
                echo "<button class='comment-icon' onclick='openCommentPopup()'>Commentaire</button>";
                echo "</div>";
            }
        } else {
            echo "<p style='margin-bottom: 20px'>Vous n'avez pas encore de réservation pour ce restaurant</p>";
        }
        ?>
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
<script>
  function openCommentPopup() {
    // Ouvrir une nouvelle fenêtre pour le formulaire de commentaire
    window.open("commentaire.php", "Commentaire", "width=400,height=400");
  }
</script>
</body>
</html>
