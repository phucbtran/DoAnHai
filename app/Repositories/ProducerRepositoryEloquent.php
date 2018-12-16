<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProducerRepository;
use App\Entities\Producer;
use App\Validators\ProducerValidator;

/**
 * Class ProducerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProducerRepositoryEloquent extends BaseRepository implements ProducerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Producer::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProducerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
