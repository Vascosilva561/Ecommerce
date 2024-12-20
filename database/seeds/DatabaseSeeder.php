<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(productstableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CouponsTableSeeder::class);

        DB::table('admins')->insert([
            'name' => 'Eduardo cavungo',
            'email' => 'eduardo12@gmail.com',
            'password' => Hash::make('123456'),
        ]);


    }
}
