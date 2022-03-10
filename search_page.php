<?php 
require_once 'header.php';
require_once 'function.php';


if(isset($_GET['q'])){
  $requette="'%".$_GET['q']."%'";  
  //var_dump($requette);
  $article = $BD->query("SELECT * FROM article  WHERE name LIKE $requette ");
}
?>


<table class="fl-table" style="font-family:'Comfortaa'">
      <thead>
        <tr>
          <th>Produit</th>
          <th>Déscription</th>
          <th>Prix</th>
          <th>Catégorie</th>
          <th>Acheter</th>
        </tr>
      </thead>
      <tbody> 
    <?php  foreach($article as $artic): ?>
      <tr>
                        <?php if($artic->type == 'vetement'):?>
                          <td><img class="cart-item-image" src="image_vetements/<?= $artic->id; ?>.jpg" width="100" height="100"></td>
                        <?php elseif($artic->type == 'electronique'):?>
                          <td><img class="cart-item-image" src="image_electronique/<?= $artic->id; ?>.jpg" width="100" height="100"></td>
                          <?php elseif($artic->type == 'sport'):?>
                          <td><img class="cart-item-image" src="image_sport/<?= $artic->id; ?>.jpg" width="100" height="100"></td>
                        <?php endif;?>
                        <td><?= $artic ->name;?> </span></td>
                        <td><span><?=$artic ->prix;?>,00  DH</span></td>
                        <td><p style="text-transform: uppercase"><?= $artic ->type;?></p></td>
                        <td>
                            <a href="class/addp.php?id=<?= $artic->id;?>&type=<?=$artic->type;?>" style="color:white">Ajouter au panier</a>
                          
                          
                        </td>
      </tr>
    <?php endforeach ?>
      </tbody>
    </table> 

</body>