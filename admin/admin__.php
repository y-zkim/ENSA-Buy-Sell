<?php
  // a cause de cette varaible on va affichier un message d'erreur si le mot de passe ou email est incorrecte
   $bol= true;
   // notre class BD qui contient tout les fonctions qui ont un relation avec notre base de donnés
   require '../class/BD.php';
   $BD = new BD();

   #$password = password_hash('youssef' , PASSWORD_BCRYPT);
   #$req = $BD->query("INSERT INTO admin VALUES(?,?,?)" ,[3 , 'yzkim@gmail.com',$password ] ); 


  //-----------------------------------------------------------------Connexion-----------------------------------------
  // dans les tests suivantes on a vait la procedure suivante :
  // 1- on tester si les informations sont poster
  // 2- on selectioner l'admin correspond a cette email 
  //3- si l 'email existe on verifie le password sinon on affiche un message d'erreur 
  // 4- si le password est correte on passe a la page gestion contenue qui contient toute les options qui l'admin a le droit de faire 
  if(!empty($_POST) && !empty($_POST['Email']) && !empty($_POST['password'])){
    //var_dump($_POST['Email']);
    //var_dump($_POST['password']);
    $admin = $BD->query2("SELECT * FROM admin WHERE email=? " ,[$_POST['Email']] );
    //debug($admin)
    //var_dump($password);
    //var_dump($admin->password);
    
    if($admin){
        if(password_verify(  $_POST['password'] , $admin->password) ){
      session_start();
      $bol=true;
      $_SESSION['admin'] = $admin;
      header('Location: gestioncontenu.php'); 
      exit();
    }else{
      $bol=false;   
    } 
    }else{
      $bol =false;
    }

  
  }
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
    <link rel="stylesheet" href="../style/styleadmin.css">
</head>
<body>

       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
   <?php if(!empty($_POST) && !empty($_POST['Email']) && !empty($_POST['password'])): ?>
      <?php if($bol == false): ?>
       <div class="alert-danger">
         <p> email ou mot de passe est incorrecte </p>
       </div>
    <?php endif;?>
  <?php endif;?>
    <div> 

        
            
<form action="" class="box" method="POST">
            <h1>Login - ADMINISTRATION</h1>
  <input type="text" name="Email" id="Email" placeholder="Username">
  <input type="password" name="password" id="password"placeholder="Password">
  
  <a href="gestioncontenu.php"><input type="submit" name="Valider" value="Se connecter"></a>
             <a href="forget.php" > <p style="color:#ffffff6e">mot de passe oublie ?</p></a>
           
            </form>
   
        </div>  
<script src="script.js"></script>
</body>

    

</html>