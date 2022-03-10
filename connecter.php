
<?php
   $bol= true;
  require_once 'function.php';   
  if(!empty($_POST) && !empty($_POST['Email']) && !empty($_POST['password'])){
   require_once 'class/pdo.php';
    $req = $pdo->prepare('SELECT * FROM user WHERE email=? ');
    $req ->execute([$_POST['Email']]);
    $user = $req->fetch();
    var_dump($user);
    if(password_verify( $_POST['password'] , $user->password ) ){
     session_start();
      $bol=true;
      $_SESSION['auth'] = $user;
      header('Location: index.php'); 
      exit();
    }else{
      $bol=false;
      die('aucun utilisateur n\'est enregistré avec ces identifiants');
    } 
  }
?> 
<?php
 require 'header.php';
?>

  <?php if(isset($_SESSION['flash']['connecter'])): ?>
             
             <div class="alert-succes">
     
                     <p> Créer un compte ou Se connecter pour finitialiser votre achats</p>            
             </div>
     
                 <?php unset($_SESSION['flash']); ?>
         <?php endif; ?>
   <br>
   <?php if(!empty($_POST) && !empty($_POST['Email']) && !empty($_POST['password'])): ?>
      <?php if($bol == false): ?>
       <div class="alert-danger">
         <p> email ou mot de passe est incorrecte</p>
       </div>
    <?php endif;?>
  <?php endif;?>
    <div > 
            
    <form class="box" action="" method="post">
  <h1>Login</h1>
  <input type="text" id="Email" name="Email" placeholder="Username">
  <input type="password" id="password"name="password" placeholder="Password">
  
  <a href="index.php"><input type="submit" name="submit" value="Se connecter"></a>
             <a href="forget.php" > <p style="color:#ffffff6e">mot de passe oublie ?</p></a>
</form>
              <br>
              <br>
              <br>

             
            </form>
   
        </div>
           
           
 <?php require 'footer.php';?>