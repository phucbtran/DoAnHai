<?php

namespace App\Presenters;

use App\Transformers\ProducerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProducerPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProducerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProducerTransformer();
    }
}
