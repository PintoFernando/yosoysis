<?php
namespace sis5cs\Repositories;
class ContadorC2Repository{
    public static function contador_c2($p1,$p2)
    {     
      $cont=0;
      if($p1>0)
      {
       $cont++;
      }
      if($p2>0)
       {
        $cont++;
       }      
      return $cont*10;
    }
  
}