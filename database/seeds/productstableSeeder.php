<?php

use Illuminate\Database\Seeder;
use App\Product;

class productstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 

             Product::create([
                'name' => 'samsung-galaxy-a10' . $i,
                'slug' => 'samsung-galaxy-a10' . $i,
                'details' => [13, 14, 15][array_rand([13,14,15])] .'inch,'. [1,2,3][array_rand([1,2,3])] .' TB SSD, 32GB RAM',
                'price' => rand(149999, 23000),
                'description' =>'Lorem ipsum' . $i . ' dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

            for ($i=0; $i < 5; $i++) { 

             Product::create([
                'name' => 'tablet-samusung-galaxy' . $i,
                'slug' => 'tablet-samusung-galaxy' . $i,
                'details' => [24, 25, 27][array_rand([24,25,27])] .'inch,'. [1,2,3][array_rand([1,2,3])] .' TB SSD, 32GB RAM',
                'price' => rand(149999, 23000),
                'description' =>'Lorem ipsum' . $i . ' dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                
            ])->categories()->attach(2);
        }
        

    }
}
