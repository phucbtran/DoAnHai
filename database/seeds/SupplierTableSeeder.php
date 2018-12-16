<?php

use Illuminate\Database\Seeder;
use App\Entities\Supplier;
use Faker\Factory as Faker;

class SupplierTableSeeder extends Seeder
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
            Supplier::create([
                'TenNCC' => $faker->name,
                'DiaChi' => $faker->address,
                'Email' => $faker->email,
                'SoDienThoai' => $faker->phoneNumber,
                'Fax' => $faker->email,
            ]);
        }
    }
}
