<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 100)->create();
    }
}
