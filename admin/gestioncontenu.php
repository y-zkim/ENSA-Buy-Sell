

<?php 
if(session_status()== PHP_SESSION_NONE){

    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Maroc</title>
    <link rel="stylesheet" href="../style/styleadmin.css">
    <link rel="stylesheet" href="../style/header.css">
    <link rel="stylesheet" href="../style/produts.css">
    <link rel="stylesheet" href="../style/explorebtn.css">
    <link rel="stylesheet" href="../style/sidebar.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/Style_search.css">
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/style4.css">
    <link rel="stylesheet" href="../style/style5.css">
    <link rel="stylesheet" href="../style/style6.css">
    <link rel="shortcut icon" href="../image/logo.PNG">
    <link rel="search icon" href="../image/search.png" >

</head>
<body>
    
<?php require 'header_admin.php';?>    
       
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <h3 style="text-align:center; color:white;font-size:40px;">Gestion des produits</h3>
  <div style="display:flex;flex-direction:row;">
    <div class="admin" style="display:flex; flex-direction:row;padding-left:5%;padding-top:4px" >
      <img src="../image/user.png" alt="" width=30px height=30px>  
      <a href="#usersec"><p style="color:white">Modifier les utilisateurs</p></a>
    </div>
    <div class="admin" style="display:flex; flex-direction:row;padding-left:5%;padding-top:4px">
      <img src="../image/product.png" alt="" width=30px height=30px>  
      <a href="#articlesec"><p style="color:white">Modifier les Article</p></a>
    </div>
</div>
  <div class="cart-row">
                
                <span class="cart-item cart-header cart-column">Ajouter</span>
                <span class="cart-price cart-header cart-column">Modifier</span>
                <span class="cart-quantity cart-header cart-column">Supprimer</span>
</div>
<section id="articlesec">  
            <div class="cart-items">
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <a href="ajouterproduit.php" target="_blank"><img class="cart-item-image" src="../image/ajouter.png" width="100" height="100" style="width: 65px; height:65px;"></a>
                        <span class="cart-item-title"></span>
                    </div>
                    <span class="cart-price cart-column"><a href="updateProduit.php" target="_blank"><img class="cart-item-image" src="../image/modifier.png" width="100" height="100"></a> </span>
                    <div class="cart-quantity cart-column">
                        <span> <a href="delete.php"><img class="cart-item-image" src="../image/supprimer.png" ></a> </span>
                    </div>
                </div>
            </div>
                 
 <div>
    <?php $BD = new BD();?>
    <?php  $article  = $BD ->query("SELECT * FROM article");
           $users = $BD ->query("SELECT * FROM user");  
               
    ?> 

    <table class="fl-table1">
      <thead>
        <tr>
          <th>Produit</th>
          <th>Déscription</th>
          <th>Prix</th>
          <th>Catégorie</th>
          <th>Propritaire</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody> 
    <?php  foreach($article as $artic): ?>
    <?php $owner = $BD ->query('SELECT * FROM user WHERE id=?',[$artic->user_article]);?>
      <tr>
                        <?php if($artic->type == 'vetement'):?>
                          <td><img class="cart-item-image" src="../image_vetements/<?= $artic->id; ?>.jpg" width="100" height="100"></td>
                        <?php elseif($artic->type == 'electronique'):?>
                          <td><img class="cart-item-image" src="../image_electronique/<?= $artic->id; ?>.jpg" width="100" height="100"></td>
                          <?php elseif($artic->type == 'sport'):?>
                          <td><img class="cart-item-image" src="../image_sport/<?= $artic->id; ?>.jpg" width="100" height="100"></td>
                        <?php endif;?>
                        <td><?= $artic ->name;?> </span></td>
                        <td><span><?=$artic ->prix;?>,00  DH</span></td>
                        <td><p style="text-transform: uppercase"><?= $artic ->type;?></p></td>
                        <td><p style="text-transform: uppercase"><?= $owner[0]->nom;?></p></td>
                        <td>
                            <a href="updateProduit.php"><img src="../image/modifier.png" width="20px" height="20px"></a>
                          <a href="delete_user.php?id=<?php $artic ->id ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée? La suppression d\'un utilisateur supprimera tous ses produits de la base de données.'));"><img src="../image/supprimer.png" width="20px" height="20px"></a>
                          
                        </td>
      </tr>
    <?php endforeach ?>
      </tbody>
    </table>
    </section> 
    <section id="usersec">
      <table class="fl-table1">
        <thead>
          <tr>
            <th>ID Utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody> 
      <?php  foreach($users as $usr): ?>
        <tr>
                          <td><?= $usr ->id;?></td>
                          <td><p style="text-transform: uppercase"><?= $usr -> nom;?></p></td>
                          <td><p style="text-transform: uppercase"><?= $usr -> prenom;?></p></td>
                          <td><?= $usr ->email?></td>
                          <td>
                              <a href="updateProduit.php"><img src="../image/modifier.png" width="20px" height="20px"></a>
                              <a href="delete_user.php?id=<?php $artic ->id ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée? \nLa suppression d\'un utilisateur supprimera tous ses produits de la base de données.'));"><img src="../image/supprimer.png" width="20px" height="20px"></a>
                          </td>
        </tr>
      <?php endforeach ?>
        </tbody>
      </table> 
    </section>
 </div>
            
<script src="script.js"></script>
</body>

    

</html>