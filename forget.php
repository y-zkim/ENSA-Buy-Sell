<?php
  
  require_once 'function.php';
  if(!empty($_POST) && !empty($_POST['Email'])){
   require_once 'class/pdo.php';
    $req = $pdo->prepare('SELECT * FROM user WHERE email=? AND confirmation is NULL');
    $req ->execute([$_POST['Email']]);
    $user = $req->fetch();
    if($user){
    session_start();
    $reset_token = str_random(60);
    $user_id= $pdo->lastInsertId();
    $pdo->prepare("UPDATE user SET reset_token = ? , reset_at= NOW() WHERE id= ?")->execute([$reset_token , $user->id]);
    mail($_POST['Email'] , 'Rénitialisation de votre compte' , "Afin de Rénitialiser v votre mot de passe merci de cliqyer sur ce lien\n\nhttp://localhost/projet_web_code/reset.php?id=$user->id&token=$reset_token");
  
      header('Location: connecter.php');
       '<p> Vous evete mainteneat bien connecter <\p>';
      exit();
    }else{
      '<p> email au mot de passe incorrecte <\p>';
    }
  }
?> 

<?php  require 'header.php';?>
      
        <div class="top_bar4"> 
            <form action="" class="form3" method="POST">
                <h2>Mot de passe oublié</h2>
               <br>
               <label for="Email">Email</label>
               <input type="email" id="email" name="Email" placeholder="E-mail">
             <a href="account.php"><button type="submit" name="Valider" id=""  onclick="validerForm()"> Envoyer</button></a>
            </form>
        </div>
<?php require 'footer.php';?>