<?php
namespace App\classes;

 

class ShoesOffer extends offers
{
    public function  checkOffer($array){
      $array["discount"]+=["id2"=> "-".$array["id2"][3]*0.1];
      $array["id2"][3]=$array["id2"][3]*0.9; 
       return $array;
    }
}