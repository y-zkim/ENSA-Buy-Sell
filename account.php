<header>

<?php
  require_once 'header.php';
  
  if(!empty($_POST)){
    if( empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'])
    {
      echo "les mots de passe ne correspondent pas";
    }
    else{
      $user_id= $_SESSION['auth']->id;
      $password= password_hash($_POST['password'],PASSWORD_BCRYPT);
      require_once 'class/pdo.php';
      $req= $pdo->prepare('UPDATE user SET password = ? WHERE id = ?')->execute([$password,$user_id]);
    }
  }
?> 
</header>
<body>
<div>
    <?php $BD = new BD();
    $match_id=$_SESSION['auth']->id;
    //var_dump($_SESSION['auth']);
    //echo($match_id);
    ?>
    <?php  $article  = $BD ->query("SELECT  id, name, prix, type FROM `article` WHERE user_article=$match_id");?>
    
    <h1 style="color:white; font-family:'Comfortaa'; text-transform:uppercase">Bonjour <?= $_SESSION['auth']->nom;?></h1>
    <table class="fl-table">
      <thead>
        <tr>
          <th>Produit</th>
          <th>ID</th>
          <th>Déscription</th>
          <th>Prix</th>
          <th>Catégorie</th>
          <th>Action</th>
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
                        <td><?= $artic ->id;?> </span></td>
                        <td><?= $artic ->name;?> </span></td>
                        <td><span><?=$artic ->prix;?>,00  DH</span></td>
                        <td><p style="text-transform: uppercase"><?= $artic ->type;?></p></td>
                        <td>
                          <a href="modifier.php?id=<?php $artic ->id ?>"><img src="image/modifier.png" width="20px" height="20px"></a>
                          <a href="supprimer_article.php?id=<?= $artic ->id ?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"><img src="image/supprimer.png" width="20px" height="20px"></a>
                        </td>
      </tr>
    <?php endforeach ?>
      </tbody>
    </table> 
 </div>
 <br><br><br>
<a href="account_change_password.php"><p style="text-align:right;margin-right:30px; color:white;">Cliquer ici pour changer votre mot de passe</p></a>
</body>
<?php require 'sidebar.php';?>
<?php require 'footer.php';?>

