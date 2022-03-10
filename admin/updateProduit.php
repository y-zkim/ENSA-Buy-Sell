<?php
//require '../class/pdo.php';
// pour le pagiantion je fait la meme chose dans la pace ajouter meme pricipe est fonction
// on selectionne l'article on veur modifier puis on a un page conteint c est infos avec les possibilite de modifier
require "../class/BD.php";
require "../function.php";
$BD = new BD();
require "../URL.php";
define("PER_PAGE" , 8);
$page =(int)($_GET['p'] ?? 1); 
$offset = ($page-1)*PER_PAGE;
$counts =$BD->query2("SELECT  COUNT(id) as count FROM article")->count;
$pages = Ceil((int)$counts/ PER_PAGE);
$article = $BD->query("SELECT * FROM article LIMIT 8 OFFSET $offset");
if(isset($_GET['q'])){
    $params['type'] = "%".$_GET['q']."%";
    $article = $BD->query("SELECT * FROM article  WHERE type LIKE :type LIMIT 8 OFFSET $offset" , $params);

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Maroc</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/style4.css">
    <link rel="stylesheet" href="../style/style5.css">
    <link rel="stylesheet" href="../style/style6.css">
    <link rel="stylesheet" href="../style/styleadmin.css">
    <link rel="shortcut icon" href="image/logo.PNG">

</head>
<body>
<header class="top">
        
        <div class="top_bar"> 
        <a href="../index.php" ><img src="../image/logo.PNG" alt=""></a>
              <img src="../image/admin.png" alt="">
            <h1> Espace Administration -Modifier Article- </h1>
        </div>
        
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="base-donne update">


  <section class="container content-section">
            <h2> les  produits qui existent la base de données </h2>
                <form action="" >
                <br>
                <br>
                <input type="text" name="q" placeholder="Recherche par type" value="<?=htmlentities($_GET['q'] ?? null);?>">
                <button type="submit" >Recherche</button>
                </form>
                <div class="cart-row">
               <span class="cart-item cart-header cart-column">ID</span>
                <span class="cart-item cart-header cart-column">DESCRIPTION</span>
                <span class="cart-price cart-header cart-column">PRIX</span>
                <span class="cart-quantity cart-header cart-column">TYPE</span>
            </div>
            <?php foreach($article as $artic):?>
            <div class="cart-items">
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <?php if($artic->type == 'vetement'):?>
                        <p><?=$artic->id?></p>
                        <img class="cart-item-image " src="../image_vetements/<?= $artic->id; ?>.jpg" width="100" height="100">
                        <?php elseif($artic->type == 'electronique'):?>
                            <p class="id"><?=$artic->id?></p>
                        <img class="cart-item-image" src="../image_electronique/<?= $artic->id; ?>.jpg" width="100" height="100">
                        <?php else:?>
                            <p><?=$artic->id?></p>
                        <img class="cart-item-image" src="../image_sport/<?= $artic->id; ?>.jpg" width="100" height="100">
                        <?php endif;?>
                    </div>
                        <span class="cart-price cart-column"> <p><?= $artic->name?></p></span> 
                        <span class="cart-price cart-column"><?= number_format($artic->prix,2,',', ' ') ;?></span>
                        <span class="cart-price cart-column"> <p><?= $artic->type?></p><a href="update.php?id=<?= $artic->id;?>"><button class="btn btn-danger up" type="button">MODIFIER</button> </a></span>
                       

                </div> 
          

            </div>

            <?php endforeach;?>


        <?= Pagination_suivant($pages,$page);?>
        <?= Pagination_precedent($pages,$page);?>
              

</div>