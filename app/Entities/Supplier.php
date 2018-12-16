<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Supplier.
 *
 * @package namespace App\Entities;
 */
class Supplier extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'nhacungcap';
    protected $fillable = [
        'id',
        'TenNCC',
        'DiaChi',
        'Email',
        'SoDienThoai',
        'Fax',
        'updated_at',
        'created_at'
    ];

}
