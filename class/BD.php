<?php

class BD{
    private $host= 'localhost';
    private $username='root';
    private $password='';
    private $database ='projetphp';
    private  $bd;

 public function __construct($host = null , $username = null ,$password=null , $database=null  ){
     
    if($host != null){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database  = $database;


    }
    try{
      $this->bd = new PDO('mysql:host='.$this->host.';dbname='.$this->database , $this->username , $this ->password ,
       array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8', PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING) );  
    }
    catch(PDOException $e){
        
        die(" <h1>impossible de se conncter avec base de donne <h1/>");

    }  
 }
 
 public function query($sql ,$data = array()){
    $req = $this->bd->prepare($sql);
    $req->execute($data);
    return $req->fetchAll(PDO::FETCH_OBJ);
 }
 
  public function query2($sql , $data = array()){
   $req = $this->bd->prepare($sql);
   $req->execute($data);
   return $req->fetch(PDO::FETCH_OBJ);
  }
  public function query3($sql , $data = array()){
     
          $req = $this->bd->prepare($sql);
           $req->execute($data);
  
          return $req;
     
  
  }
  
  
  
  

public function lastInsertId(){
   return $this->bd->lastInsertId();
}
}
?>



