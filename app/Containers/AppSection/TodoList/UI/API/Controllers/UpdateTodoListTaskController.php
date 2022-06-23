<?php

namespace App\Containers\AppSection\Todolist\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TodoList\Actions\UpdateTodoListAction;
use App\Containers\AppSection\TodoList\UI\API\Requests\UpdateTodoListTaskRequest;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskTransformer;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;

class UpdateTodoListTaskController extends ApiController
{
    /**
     * @param UpdateTodoListTaskRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws UpdateResourceFailedException
     */
    public function updateTodoListTask(UpdateTodoListTaskRequest $request): array
    {
        $todolist = app(UpdateTodoListAction::class)->run($request);

        return $this->transform($todolist, TodoListTaskTransformer::class);
    }
}
