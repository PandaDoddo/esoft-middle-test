<?php

namespace App\Containers\AppSection\TodoList\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\TodoList\Data\Repositories\TodoListTaskRepository;
use App\Containers\AppSection\TodoList\UI\API\Requests\GetAllTasksListRequest;
use App\Containers\AppSection\TodoList\Data\Criterias\HasAccessToTasksCriteria;
use App\Ship\Criterias\DateFieldCriteria;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTodoListTasksTask extends ParentTask
{
    public function __construct(
        protected TodoListTaskRepository $repository
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllTasksListRequest $request): mixed
    {
        $request->has('dateField') && $this->repository->pushCriteria(
            new DateFieldCriteria(
                $request->input('dateField'),
                $request->input('dateFrom'),
                $request->input('dateTo')
            )
        );

        $this->repository->pushCriteria( new HasAccessToTasksCriteria($request->user()->id) );

        return $this->addRequestCriteria()->repository->paginate();
    }
}
