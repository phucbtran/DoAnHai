<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Entities\ProductType;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(0, 20) as $index) {
            ProductType::create([
                'TenLoai' => $faker->name,
                'Icon' => $faker->url,
                'BiDanh' => $faker->name,
            ]);
        }
    }
}
