<header> 
  <?php 
  require 'header.php';
  require "URL.php";
  $page =(int)($_GET['p'] ?? 1); 
  $offset = ($page-1)* 8;
  $pages = 2;
  ?>  
</header>

<body>
<div class="page-wrapper">
      <h1 color=white font-family="Geometos"> Decouvrer nos deals </h1>
      <?php  $article  = $BD ->query("SELECT * FROM article WHERE type ='vetement'");?>         
      <?php  foreach($article as $artic): ?>
        <div class="page-inner">
          <div class="el-wrapper">
            <div class="box-up">
              <img class="img" src="image_vetements/<?= $artic->id; ?>.jpg" alt="">
              <div class="img-info">
                <div class="info-inner">
                  <span class="p-name"><?= $artic ->name;?></span><br>
                  <span class="p-company">Vendeur Certifié</span>
                </div>
                <div class="a-size">
                  Livraision : <span class="size">Standard , DHL , ARAMEX</span>
                </div>
              </div>
            </div>
            <div class="box-down">
              <div class="h-bg">
                <div class="h-bg-inner"></div>
              </div>
              <div class="cart">
                <?php if($artic->id ==1)  : ?>
                <p class="desc"> <span>220DH</span> </p>
                <?php endif ?>
                <?php if($artic->id ==3)  : ?>
                <p class="desc"> <span>300DH</span> <span class="solde">-33%</span> </p>
                <?php endif ?>
                <p class="price ">  <?= number_format($artic->prix,2,',', ' ') ;?> DH </p>
                <a class="add-to-cart" href="class/addp.php?id=<?= $artic->id;?>&type=<?=$artic->type;?>">
                  <span class="txt ">Ajouter au panier</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach?>
    </div>
</body>       

<?php require_once 'sidebar.php';?>
