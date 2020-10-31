<?php
namespace App\classes;

use App\interfaces\Offer; 

class ShoesOffer implements Offer
{
    public function  checkOffer($array){
      $array["discount"]+=["id2"=> "-".$array["id2"][3]*0.1];
      $array["id2"][3]=$array["id2"][3]*0.9; 
       return $array;
    }
}