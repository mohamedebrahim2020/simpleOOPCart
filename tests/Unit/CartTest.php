<?php

namespace Tests\Unit;
use Tests\TestCase;
//php vendor/phpunit/phpunit/phpunit  : this the command who i use to run test


class CartTest extends TestCase
{
    

    public function testEmptyCurrency()
    {
        //assert the error of empty currency
        
        $data=[
            'currency' => "",
            'cartitems[0][id]' => "1",
            'cartitems[0][name]' => "T-shirt",
            'cartitems[0][quantity]' => "5",
            'cartitems[1][id]' => "2",
            'cartitems[1][name]' => "Shoes",
            'cartitems[1][quantity]' => "1",
            'cartitems[2][id]' => "3",
            'cartitems[2][name]' => "Jacket",
            'cartitems[2][quantity]' => "5",
        ];
      
       $response = $this->postJson('api/store', $data,['Accept' => 'application/json'])
        ->assertExactJson([
            "error" =>"empty currency field !!!" ,
        ]);
   
    }

    public function testInvalidCurrency()
    {
        //assert the error of invalid currency e.g:euro
        
        $data=[
            'currency' => "euro",
            'cartitems[0][id]' => "1",
            'cartitems[0][name]' => "T-shirt",
            'cartitems[0][quantity]' => "5",
            'cartitems[1][id]' => "2",
            'cartitems[1][name]' => "Shoes",
            'cartitems[1][quantity]' => "1",
            'cartitems[2][id]' => "3",
            'cartitems[2][name]' => "Jacket",
            'cartitems[2][quantity]' => "5",
        ];
      
       $response = $this->postJson('api/store', $data,['Accept' => 'application/json'])
        ->assertExactJson([
            "error" => "not a valid currency" ,
        ]);
   
    }
}
