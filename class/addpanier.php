<?php 
class panier{
    private $BD;
    
  public function __construct($BD) { 
      if(!isset($_SESSION)){
          
        session_start();  // initialisation de la session
      }
       if(!isset($_SESSION['panier'])){
      $_SESSION['panier'] = array();
       }
       $this ->BD = $BD;
       if($_SESSION ==" "){
           session_destroy();
       }
       if(isset($_GET['delPanier'])){

        $this->del($_GET['delPanier']);

       }
       if(isset($_POST['panier']['quantity'])){
           $this->recalc();
       }
  }
  public function recalc(){

    foreach($_SESSION['panier'] as $product_id=>$quantity){
        if(isset($_POST['panier']['quantity'][$product_id])){
        $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id]; // ne pas entrer des faux produit 
        }
    
    } 
       $_SESSION['panier'] = $_POST['panier']['quantity'];
  }
  public function count(){
      return array_sum($_SESSION['panier']);


  }

  public function total(){
      $total = 0;
      $ids= array_keys($_SESSION['panier']);
      //var_dump($_SESSION['panier']);
      if(empty($ids)){
          $article=array();
      }else{
      $article= $this->BD->query('SELECT id , prix FROM article WHERE id IN('.implode(',',$ids).')');
      } 

      foreach($article as $artic){
        $total = $total+ $artic ->prix * $_SESSION['panier'][$artic->id];
      }
      return $total;
  }

 
 public function add($product_id){
    if(isset($_SESSION['panier'][$product_id] )){
        $_SESSION['panier'][$product_id] ++;
    }else{

        $_SESSION['panier'][$product_id] = 1 ;
    }

 }

 public function del ($product_id){
    unset($_SESSION['panier'][$product_id]) ;
 }
}

?>