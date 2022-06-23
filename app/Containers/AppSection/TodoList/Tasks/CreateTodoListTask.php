<?php

namespace App\Containers\AppSection\TodoList\Tasks;

use App\Containers\AppSection\TodoList\Data\Repositories\TodoListTaskRepository;
use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;

class CreateTodoListTask extends ParentTask
{
    public function __construct(
        protected TodoListTaskRepository $repository
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): TodoListTask
    {
        try {
            return $this->repository->create($data);
        } catch (Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
