<?php
require "class/BD.php";
$BD = new BD();
require "function.php";
//require 'class/pdo.php';
$bol = true;
$params = [];
require "URL.php";
//var_dump($_POST);

logged_only();
//var_dump($_SESSION['auth']);
/**
 * on a defini cette constant pour mentrer le nombre d'element afficher dans chaque page qui est 8 
 */

/**
 *  verifie si la page est dans l'url sinon il fait 1 par defaut
 */

/**
 *afficher les 8 articles correspondt a chaque page 
 */

/**
 * renvoi le nombre totale d'article afin de calculer le nombre de pages totale
 */
$counts =$BD->query2("SELECT  COUNT(id_article) as count FROM `article`")->count;


$article = $BD->query("SELECT * FROM article " );

// -------------------------------- sert a la recherche d'un produit par type -----------------------------------//
if(isset($_GET['q'])){
    $params['type'] = "%".$_GET['q']."%";
    $article = $BD->query("SELECT * FROM article  WHERE type LIKE :type " , $params);

}
//-------------------------verifier les champs d'entre de formulaire -------------------------//

if(!empty($_POST)){
    /**
     * @var array on stocke toute les erreus dans cette variable 
     */
    // dans les teste suivantes on a utiliser les expresions reguliere pour verifier les different champs
    $erros = array();
    if(empty($_POST['id_article']) || !preg_match('/^[0-9]/', $_POST['id_article'])){
        $erros['id'] = " id est incorrecte ";
    }
    if($_POST['type']!='sport' && $_POST['type']!='vetement' && $_POST['type']!='electronique' ){
        $erros['type'] = " Entrer Sport ou electronique ou Vetement dans type";

    }
    if(empty($_POST['type']) || !preg_match('/^[a-zA-A]/', $_POST['type'])){
        $erros['type'] = " type est incorrecte";
    
    }
    if(empty($_POST['prix']) || !preg_match('/^[0-9]/', $_POST['prix'])){
        $erros['prix'] = " prix est incorrecte ";
    }
    if(empty($_POST['name'])){
        $erros['name'] = "Description est incorrecte ";
    }
    // ------------------------------upload images -----------------------------//
    // dans le varibles suivant on a stocker les information de l'image entrer par l'admin
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpNape = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileEroor =  $_FILES['file']['error'];
    $fileType =  $_FILES['file']['type'];
    // fileExt contient le nom de l'image sans . 
    $fileExt = explode('.' , $fileName);
    // on pointe sur le derienier element de tableau qui est l'extension 
    $fileActualExt = strtolower(end($fileExt));
    $type = $_POST['type'];
    $allowed = ['jpg' , 'jpeg'];
    // dans les testes suivant on verifie :
    //1- Si l'extention de l'image est le existet dans notre table d'extension 
    // 2- si l'extension n'est pas valable on a un erreur sinon on teste si l'erreur est egal 0 c'est a dire il y a pas d'erreur
    // 3- par la suite on donne un neaveau nom a notre image 
    // 4- on utilise un switch case par la suite pour savoir ou on va mettre cette image d'apre le type qui va entrer l'admin
    // 5- puis on déplacer cette images vers un de dossier de notre projet corespondant a cette type 
    if(in_array($fileActualExt , $allowed))
    {
       if($fileEroor === 0){
           if($fileSize<1000000){
              $fileNamNew = $_POST['id_article'].'.'.$fileActualExt ;
              switch($type){
                  case 'sport':
              $fileDestination = 'C:\xampp\htdocs\Projet\projet_web_code\image_sport\\'.$fileNamNew;
              move_uploaded_file($fileTmpNape , $fileDestination);
              case 'vetement':
                $fileDestination = 'C:\xampp\htdocs\Projet\projet_web_code\image_vetements\\'.$fileNamNew;
              move_uploaded_file($fileTmpNape , $fileDestination);
              case 'electronique':
                $fileDestination = 'C:\xampp\htdocs\Projet\projet_web_code\image_electronique\\'.$fileNamNew;
                move_uploaded_file($fileTmpNape , $fileDestination);

              }
             
             
           }else{
               $erros['file'] ="ure file is to big ";
           }
       }else{
            $erros['file'] =  " Il y a un erreur";
       }

    }else{
        $erros['file'] =" Il faut choisir un extension .jpg ou .jpge";
    }
    try{
        if(empty($erros)){
    
           $BD->query3('INSERT INTO article VALUES(?,?,?,?,?) ' ,[$_POST['id_article'],$_POST['name'],$_POST['prix'] , $_POST['type'] , $_SESSION['auth']->id]);
            $_SESSION['ajouter'] ="votre produit a bien ajouter"; 
        
        
   }  
    }catch(Exception $e){
        $bol=false;
    }
   
    }

 
   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Maroc</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style3.css">
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="style/style5.css">
    <link rel="stylesheet" href="style/style6.css">
    <link rel="stylesheet" href="style/styleadmin.css">
    <link rel="shortcut icon" href="image/logo.PNG">

</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<?php if(isset($_SESSION['ajouter'])):?>
<div class="alert-succes">
    <p> <?=$_SESSION['ajouter'];?></p>

</div>
<?php endif;?>
<?php if(!empty($erros) ): ?>
            <div class="alert-danger">
                <p> Vous n'avez pas remple le formulaire correctement</p>
                <ul>
                    <?php foreach($erros as $error): ?>
                    <li> <?= $error;?> </li>
                    <?php if($bol==false):?>
                    <li> Cet id est déja existe</li>
                    <?php endif;?>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php endif;?>    
            <?php if($bol==false):?>
                <div class="alert-danger">
                <p> Vous n'avez pas remple le formulaire correctement</p>
                  <ul>
                    <li> Cet id est déja existe</li>
                    </ul>  
                </div>
             <?php endif;?>    
<form action="" method="POST" class="ajouter-produit" enctype="multipart/form-data">
    <input type="file"  name="file" id="file">
    <br>
    <br>
    <label for="id_article"> ID(id est le nom de l'image )</label>
    <input type="text" name="id_article" id="id_article">
    <br>
    <br>
    <label for="name"> Descriptiom</label>
    <input type="text" name="name" id="name">
    <br>
    <br>
    <label for="prix"> Prix</label>
    <input type="text" name="prix" id="prix">
    <br>
    <br>
    <label for="type"> Type</label>
    <input type="text" name="type" id="type">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <button class ="but-ajouter" type="submit"> Ajouter</button>
</form>
<div class="base-donne">
  <section class="container content-section">
  <form action="" >
  <br>
  <br>
  <input type="text" name="q" placeholder="Recherche par type" value="<?=htmlentities($_GET['q'] ?? null);?>">
  <button type="submit" >Recherche</button>
  </form>
            <h2> les  produits qui existent la base de données </h2>
            <div class="cart-row">
               <span class="cart-item cart-header cart-column">ID</span>
                <span class="cart-item cart-header cart-column">DESCRIPTION</span>
                <span class="cart-price cart-header cart-column">PRIX</span>
                <span class="cart-quantity cart-header cart-column">TYPE</span>
            </div>
            <?php foreach($article as $artic):?>
            <div class="cart-items">
                <div class="cart-row">
                    <div class="cart-item cart-column">
                        <?php if($artic->type == 'vetement'):?>
                        <p style="color:white; font-size:15px;"><?=$artic->id_article?></p>
                        <img class="cart-item-image " src="image_vetements/<?= $artic->id_article; ?>.jpg" width="100" height="100">
                        <?php elseif($artic->type == 'electronique'):?>
                            <p class="id"><?=$artic->id_article?></p>
                        <img class="cart-item-image" src="image_electronique/<?= $artic->id_article; ?>.jpg" width="100" height="100">
                        <?php else:?>
                            <p><?=$artic->id_article?></p>
                        <img class="cart-item-image" src="image_sport/<?= $artic->id_article; ?>.jpg" width="100" height="100">
                        <?php endif;?>
                    </div>
                        <span class="cart-price cart-column"> <p><?= $artic->name?></p></span> 
                        <span class="cart-price cart-column"><?= number_format($artic->prix,2,',', ' ') ;?></span>
                        <span class="cart-price cart-column"> <p><?= $artic->type?></p></span>
                </div>
            </div>
            <?php endforeach;?>
        <?= Pagination_suivant($pages,$page);?>
        <?= Pagination_precedent($pages,$page);?>
</div>