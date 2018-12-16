<?php

use Illuminate\Database\Seeder;
use App\Entities\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
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
            Product::create([
                'TenSP' => $faker->name,
                'DonGia' => 20000,
                'NgayCapNhat' => $faker->dateTime,
                'MoTa' => $faker->paragraph,
                'HinhAnh' => $faker->url,
                'SoLuongTon' => 100,
                'LuotXem' => 100,
                'LuotBinhChon' => 100,
                'LuotBinhLuan' => 100,
                'SoLanMua' => 100,
                'Moi' => 100,
                'MaNCC' => 1,
                'MaNSX' => 1,
                'MaLoaiSP' => 1,
                'DaXoa' => 0,
                'ThongTinSanPham' => $faker->paragraph,
                'HinhAnh1' => $faker->url,
                'HinhAnh2' => $faker->url,
                'HinhAnh3' => $faker->url,
                'HinhAnh4' => $faker->url,
            ]);
        }
    }
}
