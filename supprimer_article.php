<?php
require "class/BD.php";
$BD = new BD();
require "URL.php";
require "function.php";
$bol = true;
    if(!empty($_GET['id'])){
           $BD->query('DELETE FROM  article WHERE id = ? ' , [$_GET['id']]);
        
        header('Location: account.php');
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
        <?php include "header.php" ?>
</header>
<?/*
<body>  
        <?php $arc = $BD->query2('SELECT * FROM  article WHERE id=?' , [$_GET['id']] );?>
        <?php $person = $BD->query('SELECT nom,prenom FROM `user` JOIN `article` ON user.id=article.user_article AND article.id=?' , [$_GET['id']] );?>
        <?php if ($arc->type == "vetement"){$typ="vetements";}else{$typ=$arc->type;}?>
        <?php $image_path="image_$typ/$arc->id.jpg"?>

</body>
*/?>