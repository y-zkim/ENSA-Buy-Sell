<?php
require 'class/pdo.php';

 $user_id = $_GET['id'];
 $token = $_GET['token'];
 $req= $pdo->prepare('SELECT * FROM user WHERE id = ?');
 $req ->execute([$user_id]);
 
 $user=$req->fetch();
     session_start();

 if($user && $user->confirmation == $token){
     $req = $pdo->prepare('UPDATE user SET confirmation = NULL, date_confirmation=NOW() WHERE id=?')->execute([$user_id]);
     $_SESSION['auth'] = $user;
    
    header('Location: account.php');

 }else{
     $_SESSION['flash']['danger']= "ce token nest plus valider";
     header('Location: connecter.php');
 } 
 
?>