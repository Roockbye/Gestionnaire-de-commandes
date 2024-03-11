<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location: ../static/templates/inscription.php');
?>