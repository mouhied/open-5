<?php
namespace App\Functions;

class extrait{
  public static function excerpt(string $contenu, int $limit){
     $limit = 100;
     if(mb_strlen($contenu) <= $limit){
         return $contenu;
     }
       return mb_substr($contenu,0,$limit).'...';
  }
}