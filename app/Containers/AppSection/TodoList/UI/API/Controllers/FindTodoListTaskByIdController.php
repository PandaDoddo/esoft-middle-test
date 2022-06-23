<?php

namespace App\Containers\AppSection\Todolist\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TodoList\Actions\FindTodoListTaskByIdAction;
use App\Containers\AppSection\TodoList\UI\API\Requests\FindTodoListTaskByIdRequest;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskTransformer;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;

class FindTodoListTaskByIdController extends ApiController
{
    /**
     * @param FindTodoListTaskByIdRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findTodoListTaskById(FindTodoListTaskByIdRequest $request): array
    {
        $todolist = app(FindTodoListTaskByIdAction::class)->run($request);

        return $this->transform($todolist, TodoListTaskTransformer::class);
    }
}
