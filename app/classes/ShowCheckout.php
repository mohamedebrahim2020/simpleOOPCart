<?php
namespace App\classes;


use App\interfaces\Checkout;

class ShowCheckout implements Checkout
{
    public function showCheckout($array){
            $currency= "";
            $checkout = [];
            $checkout["totalDiscount"]= 0;
            $checkout["overall"] = $array["subtotal"]+$array["taxes"];
        if ($array["currency"] == "USD") {
            $currency = "$";
        }elseif($array["currency"]== "EGP"){
            $currency = "e£";
        }else{
            $currency = "£"; 
        }
            $checkout["subtotal"] = $currency.$array["subtotal"] ;
            $checkout["taxes"] = $currency.$array["taxes"];
         
        if (array_key_exists("id2", $array["discount"]) && array_key_exists("id3", $array["discount"])) {
            $checkout["totalDiscount"] += $array["discount"]["id2"];
            $checkout["Details"]= ["id2"=>"10% off Shoes".$currency.$array["discount"]["id2"]];
            $checkout["totalDiscount"] += $array["discount"]["id3"];
            $checkout["Details"]+= ["id3"=>"50% off jacket".$currency.$array["discount"]["id3"]];
           }
        elseif (array_key_exists("id3", $array["discount"])) {
            $checkout["totalDiscount"] += $array["discount"]["id3"];
            $checkout["Details"]= ["id3"=>"50% off jacket".$currency.$array["discount"]["id3"]];
           }
        else{
            $checkout["totalDiscount"] += $array["discount"]["id2"];
            $checkout["Details"]= ["id2"=>"10% off Shoes".$currency.$array["discount"]["id2"]];
        }      
            $checkout["overall"] = $array["subtotal"]+$array["taxes"]+$checkout["totalDiscount"];
            $checkout["totalDiscount"]= $currency.$checkout["totalDiscount"];
            $checkout["overall"] = $currency.$checkout["overall"];
         
         return $checkout;
    }
}