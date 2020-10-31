<?php
namespace App\classes;

use App\interfaces\CalculateTax;


class tax implements CalculateTax
{
    public function calculateTax($array){
       $array["discount"]= []; 
       $taxes =  $array["subtotal"]*0.14;
       $array += ["taxes"=>$taxes];
       return $array;
    }
}