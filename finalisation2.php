<header>
<?php require 'header.php';?>    
</header>
<main >
<body>
    <h1 style="color:white; text-align:center; font-family:'Arial'; font-weight:Initial"> Finalisation de la commande ( Paiement )</h1>
    <div class="final2">

<div class="Box" style="width:70%">
 <p>Sous Total           : <span><?= number_format($panier->total(),2,',', ' ') ;?> DH</span></p>
 <p>Montant de livraison : <span> <?php $livraison=20; echo $livraison; ?> DH</span></p>
 <p><strong>TOTAL TTC :<?= number_format($panier->total()+$livraison,2,',', ' ');?> DH</span> </strong></p>



</div>
</div>
<div class="mode">
<p>Mode de paiment</p>
<div>
 <input type="radio" id="" name="a" value=""
        checked>
 <label for="huey">Paiement par carte bancaire <img src="image/visa.png" alt=""> <img src="image/card.png" alt=""></label>
</div>

<div>
 <input type="radio" id="dewey" name="a" value="dewey">
 <label for="dewey">Paiement cash à la livraison <img src="image/cash.png" alt=""></label>
</div>


</div>
<div>

</div>
</body>
<div class="view_port"style="margin-buttom:-500px">

<div class="cylon_eye" > <p>Paiement par carte bancaire (pour éviter tout contact )
 Recommandation sanitaire dans le contexte du COVID-19</p></div>
</div>

<div class="finaliser">
<a href="payement.php"> <button type="bottom"> Confirmer la commande </button> </a>
<a href="finalisation1.php"> <button type="button">Retour  </button> </a>
</div>





<?php require 'footer.php';?>

       