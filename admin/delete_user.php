<?php
require "../class/BD.php";
$BD = new BD();
require "../URL.php";
require "../function.php";
$bol = true;
    if(!empty($_GET['id'])){
           $BD->query('DELETE FROM  `article` WHERE user_article = ? ' , [$_GET['id']]);
           $BD->query('DELETE FROM  user WHERE id = ? ' , [$_GET['id']]);
        
        header('Location: gestioncontenu.php');
        exit();
    }



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Maroc</title>
    <link rel="stylesheet" href="style/header_others.css">
    <link rel="stylesheet" href="style/sidebar_copy.css">
    <link rel="stylesheet" href="style/modifier.css">
    <link rel="stylesheet" href="style/explorebtn.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/Style_search.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style3.css">
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="style/style5.css">
    <link rel="stylesheet" href="style/style6.css">
    <link rel="shortcut icon" href="image/logo.PNG">
    <link rel="search icon" href="image/search.png" >

</head>
<header >
        <?php include "header_admin.php" ?>
</header>
