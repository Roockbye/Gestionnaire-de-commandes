<?php
session_start();
if (!isset($_SESSION['mail_connexion']) || empty($_SESSION['mail_connexion'])) {
    header('Location: inscription.php');
}
?>