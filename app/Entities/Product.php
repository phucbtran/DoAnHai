<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'sanpham';
    protected $fillable = [
        'id',
        'TenSP',
        'DonGia',
        'NgayCapNhat',
        'MoTa',
        'HinhAnh',
        'SoLuongTon',
        'LuotXem',
        'LuotBinhChon',
        'LuotBinhLuan',
        'SoLanMua',
        'Moi',
        'MaNCC',
        'MaNSX',
        'MaLoaiSP',
        'DaXoa',
        'ThongTinSanPham',
        'HinhAnh1',
        'HinhAnh2',
        'HinhAnh3',
        'HinhAnh4',
        'updated_at',
        'created_at'
    ];

}
