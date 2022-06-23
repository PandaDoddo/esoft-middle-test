<?php

namespace App\Containers\AppSection\User\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class SubordinatesByUserIdCriteria extends Criteria
{


    public function __construct(private $userId)
    {

    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('supervisor_id', '=', $this->userId);
    }
}
