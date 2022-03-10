<?php
class URL {

    public static function urlhelp( $data , string $param ,  $value)
    {
        
        return http_build_query(array_merge($data , [$param=>$value]));
    }
   
    
}