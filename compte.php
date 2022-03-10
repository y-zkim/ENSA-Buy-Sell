<header>
<?php 
require 'class/pdo.php';
require_once 'function.php';
require 'class/BD.php';
require_once 'header.php';
$BD = new BD();


if(!empty($_POST)){
    $erros = [];
    if(!preg_match('/^[a-zA-Z]/', $_POST['nom'])){
        $erros['nom'] = "Votre nom n'est pas valide";
        echo '<script>alert("Utiliser seulement des lettres!")</script>';
    }
    if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z]/', $_POST['prenom'])){
        $erros['prenom'] = "Votre prénom n'est pas valide";
        echo '<script>alert("Utiliser seulement des lettres!")</script>';
    }
    if(empty($_POST['email']) || !filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL) ){
        $erros['email'] = "Votre Email n'est pas valide";
    } else{
        $email = $BD -> query('SELECT id FROM user WHERE email = ? ' , [$_POST['email']] ); // si l'utilisateur deja existe
        
        
       if($email){
           $erros['email'] = " Adresse email déjà utilisée !";
           echo '<script>alert("Adresse email déjà utilisée !")</script>';
       }
    }
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $erros['password'] = "Votre Password n'est pas valide";
        echo '<script>alert("Mots de passe vides ou non identiques !")</script>';
    }    
    if(empty($erros)){
    $password= password_hash($_POST['password'] , PASSWORD_BCRYPT);
        $token = str_random(60);
        var_dump($token);
        $BD->query('INSERT INTO user SET nom = ? , prenom= ? , password=? , email=? , confirmation =?',
        [$_POST['nom'],$_POST['prenom'],
        $password, $_POST['email'] , 
        $token]);
    $user_id= $BD->lastInsertId(); 
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"ENSA Buy & Sell"'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
;
    mail($_POST['email'], "Confirmation du compte ENSA Buy & Sell", "Afin de valide votre comte merci de cliquer sur le lien: \n\n http://localhost/Projet/projet_web_code/confirm.php?id=$user_id&token=$token", $header);
    $_SESSION['flash']['succes'] = 'un email de confirmation a été envoyé pour valider votre compte';
    header('Location: connecter.php');
    exit();
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

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Maroc</title>
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/produts.css">
    <link rel="stylesheet" href="style/explorebtn.css">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/Style_search.css">
    <link rel="stylesheet" href="style/style2.css">
    <link rel="stylesheet" href="style/style3.css">
    <link rel="stylesheet" href="style/style4.css">
    <link rel="stylesheet" href="style/style5.css">
    <link rel="stylesheet" href="style/style6.css">
    <link rel="shortcut icon" href="image/logo.PNG">

    </header>

<body>

                <?php if(!empty($erros)): ?>
                <div class="alert-danger">
                    <p> Vous n'avez pas remple le formulaire correctement</p>
                    <ul>
                        <?php foreach($erros as $error): ?>
                        <li> <?= $error;?> </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php endif;?>
                    <form class="box" action="" method="POST">
                        <h1>Créer votre compte</h1>
                        <p><input type="text" id="nom" name="nom" placeholder="Nom"></p>
                        <p><input type="text" id="prenom"name="prenom" placeholder="Prénom"></p>
                        <p><input type="text" id="email"name="email" placeholder="E-mail"></p>
                        <p><input type="password" id="password"name="password" placeholder="Mot de passe"></p>
                        <p><input type="password" id="password_confirm"name="password_confirm" placeholder="Confirmez votre mot de passe"></p><br>
                        <p><input type="submit" name="valider" value="Submit" placeholder='OK'></p><br>
                        <a href="compte.php" > <p style="color:#ffffff6e">Rénitialiser</p></a>
                    </form>

                    <?php /*
                    <?php if(!empty($_POST))
                        {
                            $erros = [];
                            if(!preg_match('/^[a-zA-Z]/', $_POST['nom']))
                            {
                                $erros['Nom'] = "Votre nom n'est pas valide";
                            }
                            if(empty($_POST['prenom']) || !preg_match('/^[a-zA-Z]/', $_POST['prenom']))
                            {
                                $erros['Prénom'] = "Votre prenom n'est pas valide";
                            }
                            if(empty($_POST['email']) || !filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL) )
                            {
                                $erros['Email'] = "Votre Email n'est pas valide";
                            } else{
                                $email = $BD -> query('SELECT id FROM user WHERE email = ? ' , [$_POST['email']] ); // si l'utilisateur deja existe
                            }       
                            if($email)
                            {
                                $erros['email'] = " ce email est deja pris";
                            }
                        }
                        if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm'])
                        {
                            $erros['password'] = "Votre Password n'est pas valide";
                        }    
                        if(empty($erros))
                        {
                            $password= password_hash($_POST['password'] , PASSWORD_BCRYPT);
                            $token = str_random(60);
                            $BD->query('INSERT INTO user SET nom = ? , prenom= ? , password=? , email=? , confirmation =?',
                            [$_POST['nom'],$_POST['prenom'],
                            $password, $_POST['email'] , 
                            $token]);
                            $user_id= $BD->lastInsertId(); 
                            mail($_POST['email'] , 'Confirmation de votre compte' , "Afin de valide votre comte merci de cliqyer sur ce lien\n\nhttp://localhost/projet_web_code/confirm.php?id=$user_id&token=$token");
                            $_SESSION['flash']['succes'] = 'un email de confirmation a été envoyer pour valider votre compte';
                            header('Location: connecter.php');
                            exit();
                        } 
                        }
                    ?> 
                                    </div>
                                </div>*/?>
                    </body>


