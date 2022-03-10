<?php 
 require 'BD.php';
 require 'addpanier.php';
 $BD = new BD();
$panier= new panier($BD);
$json=array('error'=>true);
?>

<?php
if(isset($_GET['id'])&&isset($_GET['type']) ){
    $artic = $BD->query('SELECT id FROM article WHERE id=? ' , [$_GET['id']]);
   
    
 $panier->add($artic[0]->id) ;
   
    
}
header('Location: ../panier.php');
?>