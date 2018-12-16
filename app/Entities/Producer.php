<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Producer.
 *
 * @package namespace App\Entities;
 */
class Producer extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'nhasanxuat';
    protected $fillable = [
        'id',
        'TenNSX',
        'ThongTin',
        'Logo',
        'updated_at',
        'created_at'
    ];

}
