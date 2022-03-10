<?php
require 'function.php';
session_start();

unset($_SESSION['auth']);

header('Location: connecter.php');
?>
