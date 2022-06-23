<?php

namespace App\Containers\AppSection\TodoList\Tasks;

use App\Containers\AppSection\TodoList\Data\Repositories\TodoListTaskRepository;
use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class FindTodoListTaskByIdTask extends ParentTask
{
    public function __construct(
        protected TodoListTaskRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): TodoListTask
    {
        try {
            return $this->repository->find($id);
        } catch (Exception) {
            throw new NotFoundException();
        }
    }
}
