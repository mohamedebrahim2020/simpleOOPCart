<?php
namespace App\classes;


use App\interfaces\CheckStore;
use App\Product;

class check implements CheckStore 
{
    public function checkStore($cartItems,$currency){
        $acceptedItems = [];
        $i=1;
        $subtotal =0.0;
        foreach ($cartItems as $item) {
         
           
 
               $id=$item["id"];
               
               $quantity=(int)$item["quantity"];
              
             $product=Product::find($id);
             if ($product->quantity <= $quantity) {
             $quantity = $product->quantity;
             }
             $item_price = $product->price->$currency;
             $item_total_price = $quantity * $item_price;
             $subtotal += $item_total_price;
           
             $acceptedItems += ["id$product->id"=> [$product->id,$product->name,$quantity,$item_total_price]];
             $i++;
            
 
           
           
        };
        $acceptedItems +=["subtotal"=>$subtotal,"currency"=>$currency];
        
        return $acceptedItems;
    
        
    }
}
?>