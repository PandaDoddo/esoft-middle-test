<?php

namespace App\Containers\AppSection\TodoList\Tasks;

use App\Containers\AppSection\TodoList\Data\Repositories\TodoListTaskRepository;
use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateTodoListTask extends ParentTask
{
    public function __construct(
        protected TodoListTaskRepository $repository
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): TodoListTask
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
