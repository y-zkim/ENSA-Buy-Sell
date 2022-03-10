<?php

//require '../class/pdo.php';
require "../class/BD.php";
$BD = new BD();
// on modifier toute les champs avec le controle par les expression reguliere sauf id 
$bol = true;
if(!empty($_POST)){
    $erros = array();
   
    if($_POST['type']!='sport' && $_POST['type']!='vetement' && $_POST['type']!='electronique' ){
        $erros['type'] = " Entrer Sport ou electronique ou Vetement dans type";

    }
    if(empty($_POST['type']) || !preg_match('/^[a-zA-Z]/', $_POST['type'])){
        $erros['type'] = " type est incorrecte";
    
    }
    if(empty($_POST['prix']) || !preg_match('/^[0-9]/', $_POST['prix'])){
        $erros['prix'] = " prix est incorrecte ";
    }
    if(empty($_POST['name'])){
        $erros['name'] = "Description est incorrecte ";
    }
    try{
        if(empty($erros)){
    
        $req = $BD->query('UPDATE  article SET name = ? , prix =? , type=? WHERE id= ?' ,[$_POST['name'],$_POST['prix'] , $_POST['type'],$_GET['id']] );
       // $req ->execute([$_POST['name'],$_POST['prix'] , $_POST['type'],$_GET['id']]);
        header('Location: updateProduit.php ');
        exit();
        
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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="stylesheet" href="../style/style3.css">
    <link rel="stylesheet" href="../style/style4.css">
    <link rel="stylesheet" href="../style/style5.css">
    <link rel="stylesheet" href="../style/style6.css">
    <link rel="stylesheet" href="../style/styleadmin.css">
    <link rel="shortcut icon" href="image/logo.PNG">

</head>
<body>
<header class="top">
        
        <div class="top_bar"> 
        <a href="../index.php" ><img src="../image/logo.PNG" alt=""></a>
              <img src="../image/admin.png" alt="">
            <h1> Espace Administration - Modifier Article- </h1>
        </div>
</header>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<?php if(!empty($erros)): ?>
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
<form action="" method="POST" class="ajouter-produit">
    <?php $arc = $BD->query2('SELECT * FROM  article WHERE id=?' , [$_GET['id']] );
      ?>
   <label for="id">(id est le nom de l'image ) ID=  <?=$arc->id?></label>
    
    <br>
    <br>
    <label for="name"> Descriptiom</label>
    <input type="text" name="name" id="name" value="<?=$arc->name?>">
    <br>
    <br>
    <label for="prix"> Prix</label>
    <input type="text" name="prix" id="prix" value="<?=$arc->prix?>">
    <br>
    <br>
    <label for="type"> Type</label>
    <input type="text" name="type" id="type" value="<?=$arc->type?>">
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
    <a href="updateProduit.php"><button class ="but-ajouter" type="submit"> MODIFIER</button></a>