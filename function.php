<?php 

function debug($var){
    echo '<pre>' . print_r($var, true) . '<\pre>';
}

function str_random($lenght){

    $alphabet="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
     return substr(str_shuffle(str_repeat($alphabet, $lenght)) , 0, $lenght);

}
function logged_only(){
    if(session_status()== PHP_SESSION_NONE){

        session_start();
    }
    if(!isset($_SESSION['auth'])){
        
        header('Location: connecter.php');
        exit();
      }
}

function Pagination_precedent ($pages , $page ):?string

{  
     if($pages >1 && $page >1){
        $url = URL::urlhelp($_GET , 'p' , $page-1);
        return <<<HTML
          <a class="btn-page" href="?$url"><button >Page Precedente </button></a>
HTML;
     }else{
         return null;
     }
}

function Pagination_suivant($pages , $page ):?string
{
    if($pages >1 && $page < $pages){
         $url = URL::urlhelp($_GET , 'p' , $page+1);
        return <<<HTML
          <a class="btn-page" href="?$url"><button >Page Suivant </button></a>
HTML;
     }
     return null;
}

?>