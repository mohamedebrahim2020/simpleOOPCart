<?php

namespace App\classes;




class jacketOffer extends offers
{
    public function  checkOffer($array)
    {

        $qty_product1 = $array["id1"][2];
        $qty_product2 = $array["id3"][2];

        if ($qty_product1 / 2 > $qty_product2) {
            $array["discount"]+=["id3"=> "-".$array["id3"][3]*0.5];
            $array["id3"][3] = $array["id3"][3] * 0.5;
            return $array;
        } elseif ($qty_product1 / 2 <= $qty_product2) {
            $array["discount"]+=["id3"=> "-".(($qty_product1 / 4) * $array["id3"][3] / $qty_product2)];
            $array["id3"][3] = ($qty_product2 - $qty_product1 / 2) * ($array["id3"][3] / $qty_product2) + (($qty_product1 / 4) * $array["id3"][3] / $qty_product2);
            return $array;
        } else {
            return $array;
        }
    }
}
