<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product1 = [
            'name'=>'Egg',
            'price'=>12,
            'description'=>'Everyday one egg good gor health',
            'image'=>'storage/uploads/products/noimage.png'
        ];

        $product2 = [
            'name'=>'Book',
            'price'=>34,
            'description'=>'A Book is a best firend',
            'image'=>'storage/uploads/products/noimage.png'
        ];

        \App\Product::create($product1);
        \App\Product::create($product2);
    }
}
