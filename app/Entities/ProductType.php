<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProductType.
 *
 * @package namespace App\Entities;
 */
class ProductType extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'loaisanpham';
    protected $fillable = [
        'id',
        'TenLoai',
        'Icon',
        'BiDanh',
        'updated_at',
        'created_at'
    ];

}
