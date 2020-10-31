<?php

namespace App\Http\Controllers;


use App\classes\check;
use App\classes\jacketOffer;
use App\classes\Shoesoffer;
use App\classes\ShowCheckout;
use App\classes\tax;
use Illuminate\Http\Request;



class CartController extends Controller
{
    public function cartItems(Request $request)
    {
        // dd($request);
        $currency = $request->currency;
        if (! $currency ) {
            return response()->json(["error"=>"empty currency field !!!"]);
        } 
        elseif ($currency != "USD" && $currency != "EGP" && $currency != "POUND") {
            
            return response()->json(["error"=>"not a valid currency"]);
        }else{
        $cartItems  = $request->cartitems;
        $add = new check;
        $acceptedItems = $add->checkStore($cartItems, $currency);
        $tax = new tax;
        $acceptedItems = $tax->calculateTax($acceptedItems);

        if (array_key_exists("id2", $acceptedItems)) {
            $shoes_offer = new ShoesOffer ;
            $acceptedItems = $shoes_offer->checkOffer($acceptedItems);
            
        }

        if (array_key_exists("id3", $acceptedItems) && array_key_exists("id1", $acceptedItems)) {
            $jacket_offer = new jacketOffer ;
            $acceptedItems = $jacket_offer->checkOffer($acceptedItems);
        }

        $checkout = new ShowCheckout ; 
        $checkout = $checkout->showCheckout($acceptedItems); 
        return response()->json($checkout);
    }
}
}
