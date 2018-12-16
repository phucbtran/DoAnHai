<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Producer;

/**
 * Class ProducerTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProducerTransformer extends TransformerAbstract
{
    /**
     * Transform the Producer entity.
     *
     * @param \App\Entities\Producer $model
     *
     * @return array
     */
    public function transform(Producer $model)
    {
        return [
            'id'         => (int) $model->id,
            'TenNSX' => $model->TenNSX,
            'ThongTin' => $model->ThongTin,
            'Logo' => $model->Logo,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
