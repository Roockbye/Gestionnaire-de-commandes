<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: inscription.php');
}

?>