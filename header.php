<?php 
 require_once 'class/BD.php';
 require 'class/addpanier.php';
$BD = new BD();
$panier= new panier($BD);
?>
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
    <link rel="stylesheet" href="style/header_others.css">
    <link rel="stylesheet" href="style/sidebar_copy.css">
    <link rel="stylesheet" href="style/produts.css">
    <link rel="stylesheet" href="style/explorebtn.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/Style_search.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style3.css">
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="style/style5.css">
    <link rel="stylesheet" href="style/style6.css">
    <link rel="shortcut icon" href="image/logo.PNG">
    <link rel="search icon" href="image/search.png" >
</head>

<div class="upbar">
  <a href="index.php"><img src="image/logon.PNG" alt="" class="logo"></a> 
  <div class="top-btns"> 
          
                     <?php if(isset($_SESSION['auth'])):?>
                     <a href="logout.php" class="">Se Déconnecter</a>
                     <a href="account.php">Mon compte</a>
                     <?php else: ?>
                     <a href="connecter.php">Se Connecter</a>
                     <a href="compte.php">Créer un compte</a>
                     <?php endif;?>
                     <div >
                     <form method="get" class="form_search" action="search_page.php" >
                          <input type="search" id="q" name="q">
                          <i type="submit" class="fa fa-search"><span class="resize1"><img src="image/search.svg"></span></i>
                     </form>
                      </div>
                    </div>
                    
                     
</div>

<head>
 
 </head>

  
       <br>
       <br>
       <br>
       <br>
       <br>
    <?php if(isset($_SESSION['flash']['succes'])): ?>    
        <div class="alert-succes">
                <p> un email de confirmation a ete envoyer</p>            
        </div>
            <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>





