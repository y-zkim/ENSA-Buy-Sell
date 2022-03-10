<?php
  require_once 'header.php';
  
  if(!empty($_POST)){
    if( empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
      echo "les mots de passe ne correspondent pas";

    }else{
      $user_id= $_SESSION['auth']->id_user;
      $password= password_hash($_POST['password'],PASSWORD_BCRYPT);
      require_once 'class/pdo.php';
      $req= $pdo->prepare('UPDATE user SET password = ? WHERE id = ?')->execute([$password,$user_id]);
      echo 'Mot de passe à été changé avec succés!';
    }
  }
?> 

<div>
    <?php $BD = new BD();
    $match_id=$_SESSION['auth']->id_user;
    //var_dump($_SESSION['auth']->id);
    //echo($match_id);
    ?>
    
 <div >
                          
    <form action="" method="POST" class="box">
          <h2 style="color:white"> Changez votre mot de passe </h2>
          <input type="password" id="password" name="password" placeholder="Nouveau mot de passe">
          <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirmer mot de passe">
          <input type="submit" name="Valider" id=""  onclick="validerForm()" value="Changer"> 
    </form>
</div>
<?php// var_dump($_SESSION['auth']);?>


