<?php

use Faker\Factory as Faker;
use App\Entities\Producer;
use Illuminate\Database\Seeder;

class ProducerTableSeeder extends Seeder
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
            Producer::create([
                'TenNSX' => $faker->name,
                'ThongTin' => $faker->paragraph,
                'Logo' => $faker->url,
            ]);
        }
    }
}
