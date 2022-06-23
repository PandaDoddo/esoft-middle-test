<?php

namespace App\Containers\AppSection\TodoList\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class HasAccessToTasksCriteria extends Criteria
{


    public function __construct(private $userId)
    {

    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        //abort(500);
        return $model->where(function ($query) {
            $query->where('created_by_user_id', '=', $this->userId)
                ->orWhere('responsible_user_id', '=', $this->userId);
        });
    }
}
