<header>
    <?php require 'header.php';?>    
</header>
<body>
    <h1 style="color:white; text-align:center; font-family:'Arial'; font-weight:Initial"> Finalisation de la commande ( Coordonées ) </h1>
    <form class="box" action="" method="POST" style="margin-top:12%">
                        <h1>Coordonées de livraison</h1>
                        <p><input type="text" id="nom" name="nom" placeholder="Nom" required></p>
                        <p><input type="text" id="prenom"name="prenom" placeholder="Prénom" required></p>
                        <p><input type="text" id="Tel"name="Tel" placeholder="Tel" value="+212" maxlength="13" required></p>
                        <p><input type="text" id="ville"name="ville" placeholder="Ville" required></p>
                        <p><input type="text" id="region"name="region" placeholder="Région"  required></p>
                        <p><input type="text" id="zip"name="zip" placeholder="Code postal" maxlength="5" required></p>
                        <textarea name="Adress" id="Adress" cols="30" rows="2" placeholder="Adresse de livraison" required></textarea>
                        <a href="finalisation2.php"> <button type="button" name="Valider" onclick="validerfinaliser()" > Enregistrer </button> </a>
                        <a href="finalisation2.php"><p><input type="submit" name="valider" value="Submit" placeholder='OK' onclick="validerfinaliser()"></p></a>
                        <a href="compte.php" > <p style="color:#ffffff6e">Annuller</p></a>
    </form>
    
    <?php require 'sidebar.php';?>
</body>