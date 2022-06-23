<?php

namespace App\Containers\AppSection\Todolist\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TodoList\Actions\CreateTodoListTaskAction;
use App\Containers\AppSection\TodoList\UI\API\Requests\CreateTodoListTaskRequest;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class CreateTodoListTaskController extends ApiController
{
    /**
     * @param CreateTodoListTaskRequest $request
     * @return JsonResponse
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createTodoListTask(CreateTodoListTaskRequest $request): JsonResponse
    {
        $todolist = app(CreateTodoListTaskAction::class)->run($request);

        return $this->created($this->transform($todolist, TodoListTaskTransformer::class));
    }
}
