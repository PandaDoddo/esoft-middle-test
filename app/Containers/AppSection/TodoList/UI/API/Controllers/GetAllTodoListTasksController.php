<?php

namespace App\Containers\AppSection\Todolist\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TodoList\Actions\GetAllTodoListsAction;
use App\Containers\AppSection\TodoList\UI\API\Requests\GetAllTasksListRequest;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskToSimpleTransformer;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTodoListTasksController extends ApiController
{
    /**
     * @param GetAllTasksListRequest $request
     * @return array
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllTodoListTasks(GetAllTasksListRequest $request): array
    {
        $tasks = app(GetAllTodoListsAction::class)->run($request);

        return $this->transform($tasks, TodoListTaskTransformer::class);
    }
}
