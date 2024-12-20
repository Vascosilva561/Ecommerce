<?php

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Telefones', 'slug' => 'telefones', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Tablets', 'slug' => 'Tablets', 'created_at' => $now, 'updated_at' => $now],
            
        ]);
    }
}
