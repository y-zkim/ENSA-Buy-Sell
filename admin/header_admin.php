<?php 
 require_once '../class/BD.php';
?>
<!DOCTYPE html>
<html lang="fr">
<style>

</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Maroc</title>
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

<div class="upbar">
  <a href="gestioncontenu.php"><img src="../image/logon.PNG" alt="" class="logo"></a> 
  <div class="top-btns"> 
          
                     <?php if(isset($_SESSION['admin'])):?>
                     <a href="admin__.php" class="">Se Déconnecter</button></a>
                     <a href="gestioncontenu.php"class="">Mon espace</button></a>
                     <?php else: ?>
                     <a href="admin__.php">Se Connecter</a>
                     <?php endif;?>
                     <div >
                      <form method="GET" class="form_search">
                        
                          <input type="search">
                          <i class="fa fa-search" ><span class="resize1"><img src="../image/search.svg"></span></i>
                     </form>
                      </div>
                    </div>
                     
</div>

</header>

       </div>
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
