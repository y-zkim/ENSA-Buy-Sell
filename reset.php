<?php
 if(isset($_GET['id']) && isset($_GET['token'])){
        require_once 'class/BD.php';
        $BD = new BD();
        require_once 'function.php';
        $user = $BD->query2('SELECT * FROM user WHERE id = ? AND reset_token IS NOT NULL AND reset_token = ? AND reset_at > DATE_SUB(NOW() , INTERVAL 30 MINUTE)' , [$_GET['id'], $_GET['token']]);
      
        if($user){
            if(!empty($_POST)){
                if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                    $password = password_hash($_POST['password'] , PASSWORD_BCRYPT);
                    $BD->query('UPDATE user SET password=? , reset_at = NULL , reset_token = NULL ' , [$password]);
                    session_start();
                    $_SESSION['auth'] = $user;
                    header('Location: account.php');
                    exit();
                }
            }
        }else{
            
            header('Location: connecter.php');

            exit();
        }

 }else{
   
    
     header('Location: connecter.php');
 }

?> 


<?php  require 'header.php';?>


<header>
        <div class="top_bar3"> 
           
            <form action="" class="form1" method="POST">
                <h2>Rénitialiser mot de passe</h2>
               <br>
               <br>
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="mot de passe">
                <br>
                    <label for="password_confirm"> Confirmer </label>
                    <input type="password" id="password_confirm" name="password_confirm" placeholder="mot de passe">
                <br>
                <br>
                <br>
                <br>
             <a href="account.php"><button type="submit" name="Valider" id=""  onclick="validerForm()"> Rénitialiser </button></a>
            </form>
   
        </div>
     
    </header>

    

    <footer >
        <p>Télécharger l'appliaction</p>
            <div class="footer">
                
                <img src="image/playstore.png" alt="">
                <img src="image/appstore.png" alt="">
            </div>
    
           <div class="footer2">
               <p><img src="image/footer1.jpg" alt="">Aide </p>
               <p><img src="image/mss.png" alt="">Contactez-nous </p>
           </div>
    
        </footer>
    
    

   
   
    <script src="script.js"></script>
</body>
</html>