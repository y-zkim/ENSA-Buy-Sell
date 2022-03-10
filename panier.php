<header>
<?php require 'header.php';?>
<?php global $p; 
    $p=true;  
?>  
</header>
<body>
    <div class="">
            
            <h1  style="color:white" class="panier_title"> Panier </h1>
            <br><br><br><br>
        </div>
        <form method="POST" action="panier.php">
            <section class="container content-section">        
                <div class="cart-row">
                    <span class="cart-item cart-header cart-column">Article</span>
                    <span class="cart-price cart-header cart-column">Prix</span>
                    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
                </div>
                <?php 
                $ids= array_keys($_SESSION['panier']);
                if(empty($ids)){
                    $article=array();
                }else{
                $article= $BD->query('SELECT * FROM article WHERE id IN('.implode(',',$ids).')');
                } 
                foreach($article as $artic):?>
                <div class="cart-items">
                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <?php if($artic->type == 'vetement'):?>
                            <img class="cart-item-image" src="image_vetements/<?= $artic->id; ?>.jpg" width="100" height="100">
                            <?php elseif($artic->type == 'electronique'):?>
                            <img class="cart-item-image" src="image_electronique/<?= $artic->id; ?>.jpg" width="100" height="100">
                            <?php else:?>
                            <img class="cart-item-image" src="image_sport/<?= $artic->id; ?>.jpg" width="100" height="100">
                            <?php endif;?>
                            <span class="cart-item-title"><?= $artic ->name;?> </span>
                        </div>
                        <span class="cart-price cart-column"><?= number_format($artic->prix,2,',', ' ') ;?> DH</span>
                        <div class="cart-quantity cart-column">
                            <span> <input class="cart-quantity-input quantity" name="panier[quantity][<?= $artic->id;?>]" type="numbre "value="<?= $_SESSION['panier'][$artic->id];?>" > </span>
                           <a href="panier.php?delPanier=<?= $artic->id;?>"><button class="btn btn-danger" type="button">REMOVE</button> </a>
                        </div>
                    </div>
            
                </div>
                <?php endforeach;?>
    
    
                <div class="cart-total">
                   
                    <strong class="cart-total-title">Totale à payer :</strong>
                    <span class="cart-total-price"><?= number_format($panier->total(),2,',', ' ') ;?> DH</span>
                </div>
                <button class="btn btn-primary btn-purchase" type="submit">Recalculate</button>
            </section>
            <div class="finaliser">
                <?php if(isset($_SESSION['auth'])):?>
                 <a href="finalisation1.php"><button type="button">Finaliser votre Commande</button> </a> 
                <?php else:?>
                <?php $p = false;?>
                <a href="connecter.php"><button type="button">Finaliser votre Commande</button> </a> 
                <?php endif;?>
                <?php if($p == false){
                $_SESSION['flash']['connecter']="bla";
                }
                ?> 
                <a href="index.php"><button type="button"> Porsuivre vos Achats  </button></a> 
            </div>
        </form>  
</body>

               
<?php require 'sidebar.php';?>
  <?php require 'footer.php';?>






























































<?php require 'header.php'; ?>



<main >


</main>    
<?php require_once 'sidebar.php';?>
<?php require 'footer.php';?>
 

   