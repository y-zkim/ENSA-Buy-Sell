<header>
<?php require 'header.php';?>  
</header>
<body>
    <!--sidebar end-->
    <div class="contain">
          <div class="left">
                <p class="paragrapheh1">ENSA Buy&Sell</p><br>
                <p class="paragrapheh2">1er dans le marché depuis 2018</p>
                <p class="paragrapheh3">Explorer les annonces déposées chaques jours par nos membres certifiés.<br><br>Livraison à domicile offerte!</p>
          </div>
          <div class="float">
              <img src="image/bg1.png" >
          </div>
    </div>
    <section id="sec-1">
      <div class="scroll-down">
        <a href="#sec2"><b>Explorer</b></a>
      </div>
    </section><br><br><br><br><br><br><br><br><br>   
<main > 
  <section id="sec2">
    <div class="page-wrapper">
      <h1 style="color:white; font-family:'Geometos';margin-left:-6%"> Decouvrer nos deals </h1>
      <?php  $article  = $BD->query('SELECT * FROM article WHERE type ="electronique"');?>          
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
                <?php if($artic->id ==1)  : ?>
                  <span class="desc">120 Dhs</span>
                <?php endif ?>
                <?php if($artic->id ==3) : ?>
                  <span class="desc">120 Dhs</span><span class="solde">-10%</span> 
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
  </section>   
</main>

               
<?php require 'sidebar.php';?>
  <?php require 'footer.php';?>

