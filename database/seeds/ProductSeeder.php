<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $products = [];

        // foreach(range(1,5) as $index){
        //     $products[] = [
        //         'name' => "Product $index",
        //         'price' => rand(1,10) * 100,
        //         'category_id' => rand(3,5),
        //         'created_at' => now(),
        //         'updated_at' => now() 
        //     ];

        //     DB::table('products')->insert($products);
        // }
        factory(Product::class,20)->create();
    }
}
