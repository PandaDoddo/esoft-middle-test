<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Criterias\SubordinatesByUserIdCriteria;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class GetUserSubordinatesByUserIdTask extends ParentTask
{
    public function __construct(protected UserRepository $repository)
    {

    }

    public function run($userId)
    {
        $this->repository->pushCriteria(new SubordinatesByUserIdCriteria($userId));
        return $this->addRequestCriteria()->repository->limit(15);
    }
}
