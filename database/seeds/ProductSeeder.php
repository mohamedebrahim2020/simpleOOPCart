<?php


use App\Price;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $prices = [
            ['id' => 1, 'USD' =>10.99 , 'EGP' => 172.65, 'POUND' =>8.43],
            ['id' => 2, 'USD' => 24.99, 'EGP' => 392.59, 'POUND' =>19.17 ],
            ['id' => 3, 'USD' =>19.99 , 'EGP' => 314.04, 'POUND' =>15.33],
            ['id' => 4, 'USD' => 14.99, 'EGP' => 235.49, 'POUND' =>11.50 ],
        ];

         Price::insert($prices);
        $products = [
            ['id' => 1, 'name' => 'T-shirt', 'description' => 'shirt', 'quantity' => '5', 'price_id' => '1'],
            ['id' => 2, 'name' => 'Shoes', 'description' => 'Shoes', 'quantity' => '7', 'price_id' => '2'],
            ['id' => 3, 'name' => 'Jacket', 'description' => 'Jacket', 'quantity' => '8', 'price_id' => '3'],
            ['id' => 4, 'name' => 'Pants', 'description' => 'Pants', 'quantity' => '10', 'price_id' => '4'],
            
        ];
        Product::insert($products);
    }
}
