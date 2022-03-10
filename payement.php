
<?php require 'header.php';
$livraison=20; ?>    
    <nav class="navbar">
        <a href="panier.php">Panier<img src="image/panier.png" alt="oanier"> <span id="count"> <?= $panier->count() ;?> </span> </a>
        <a href="Vetement.php">Vetements et chaussures</a>
        <a href="">Electronique</a>
        <a href="">Sport et loisir</a>
    </nav>
    <main >

        <header class="vetements">
            <h1> Payement</h1>
         
        </header>
        <div class="final2 payement">

               <div class="livraison">
                <h4>Sous Total   : <?= number_format($panier->total()+$livraison,2,',', ' ');?> DH</span></h4> <br> <br><br>
            </div>
        </div>
        <form action="" class="formulaire_payement">
            <p>Carte banciare: <img src="image/visa.png" alt=""> <img src="image/card.png" alt=""></p>

            <input type="text" placeholder="numero de care crédit/débit">
            <input type="text" placeholder="CVV">
            <div>
                <p>date d'experation</p>
                <select  name="" id="">
                    <option value="">MM</option>
                </select>
                <select  name="" id="">
                    <option value="">AA</option>
                </select>
            </div>
         <div class="finaliser">
            <a href=""> <button type="button"> Payer </button> </a>
            <a href="finalisation2.php"> <button type="button">Retour  </button> </a>
        </div>
        </form>
        
        
     

        
      
     
<?php require 'footer.php';?>