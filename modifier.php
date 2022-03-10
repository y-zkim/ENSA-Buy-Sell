<?php

//require 'class/pdo.php';
require "class/BD.php";
$BD = new BD();
// on modifier toute les champs avec le controle par les expression reguliere sauf id 
$bol = true;
if(!empty($_POST)){
    $erros = array();
   
    if($_POST['type']!='sport' && $_POST['type']!='vetement' && $_POST['type']!='electronique' ){
        $erros['type'] = " Entrer Sport ou electronique ou Vetement dans type";

    }
    if(empty($_POST['type']) || !preg_match('/^[a-zA-Z]/', $_POST['type'])){
        $erros['type'] = " type est incorrecte";
    
    }
    if(empty($_POST['prix']) || !preg_match('/^[0-9]/', $_POST['prix'])){
        $erros['prix'] = " prix est incorrecte ";
    }
    if(empty($_POST['name'])){
        $erros['name'] = "Description est incorrecte ";
    }
    try{
        if(empty($erros)){
    
        $req = $BD->query('UPDATE  article SET name =? , prix =? , type=? WHERE id= ?' ,[$_POST['name'],$_POST['prix'] , $_POST['type'],$_GET['id']] );
       // $req ->execute([$_POST['name'],$_POST['prix'] , $_POST['type'],$_GET['id']]);
        header('Location: account.php ');
        exit();
        
   }  
    }catch(Exception $e){
        $bol=false;
    }
   
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

<body>  
    <?php if(!empty($erros)): ?>
        <div class="alert-danger">
            <p> Vous n'avez pas remple le formulaire correctement</p>
            <ul>
                <?php foreach($erros as $error): ?>
                    <li> <?= $error;?> </li>
                    <?php if($bol==false):?>
                        <li> Cet id est déja existe</li>
                    <?php endif;?>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>    
    <?php if($bol==false):?>
        <div class="alert-danger">
            <p> Vous n'avez pas remple le formulaire correctement</p>
            <ul>
                <li> Cet id est déja existe</li>
            </ul>  
        </div>
    <?php endif;?>  
                
    <div class="login-box">
        
        <?php $arc = $BD->query2('SELECT * FROM  article WHERE id=?' , [$_GET['id']] );?>
        <?php $person = $BD->query('SELECT nom,prenom FROM `user` JOIN `article` ON user.id=article.user_article AND article.id=?' , [$_GET['id']] );?>
        <?php if ($arc->type == "vetement"){$typ="vetements";}else{$typ=$arc->type;}?>
        <?php $image_path="image_$typ/$arc->id.jpg"?>
        <form action="" method="POST" >
            <div>
                <h2>Modification : <?=$arc ->name?></h2>
                <div>
                    <img src=<?=$image_path?> height="500" width="500" style="border-radius:10px; align-item:center">
                </div>
                <div>
                    <h2>Description Actuelle : <?= $arc->name?></h2>
                    <h2>Proprietere : <?=$person[0] ->nom?> <?=$person[0] ->prenom?></h2>
                    <h3><label for="id">ID   ( Inchangable ) : <?=$arc->id?></label></h3>
                    <h3><label for="id">Type ( Inchangable ) : <?=$arc->type?></label></h3>
                </div><br><br><br><br><br>
            </div>
            <div>
                <div class="user-box">
                    <label for="name">Description : </label>
                    <input type="text" name="name" id="name" value="<?=$arc->name?>"required="">
                </div>
                </div><div class="user-box">
                    <label for="type">Type ( Non modifiable ) :  </label>
                    <input type="text" name="type" id="type" value="<?=$arc->type?>" disabled>
                </div>
                <div class="user-box">
                    <label for="prix">Prix (En MAD): </label>
                    <input type="text" name="prix" id="prix" value="<?=$arc->prix?>"required="">
                </div>
                <input type="submit"  value="Modifier" class="btn">
            </div>
        </form>
    </div>
</body>