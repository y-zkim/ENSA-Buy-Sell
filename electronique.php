<header>
<?php require 'header.php';
?>
</header>
<body >    
  <div class="">
    <h1>Electronique</h1>
  </div>
  <div class="page-wrapper">
    <h1 color=white font-family="Geometos"> Decouvrer nos deals </h1>
    <?php  $article  = $BD ->query("SELECT * FROM article WHERE type='electronique'");?>         
    <?php  foreach($article as $artic): ?>
    <div class="page-inner">
      <div class="el-wrapper">
        <div class="box-up">
          <img class="img" src="image_electronique/<?= $artic->id; ?>.jpg" alt="">
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
            <?php if($artic->id ==8)  : ?>
            <p class="desc"> <span>999DH</span> </p>
            <?php endif ?>
            <?php if($artic->id ==9)  : ?>
            <p class="desc"> <span>1499DH</span> <span class="solde">-10%</span> </p>
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





















<?php require 'footer.php';?>