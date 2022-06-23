<?php

namespace App\Containers\AppSection\Todolist\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TodoList\Actions\GetTodoListTaskStatusesListAction;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskStatusesListTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetTodoListTaskStatusesListController extends ApiController
{
    /**
     * @return array
     * @throws InvalidTransformerException
     */
    public function getAllTodoListTaskStatusesList(): array
    {
        $statuses = app(GetTodoListTaskStatusesListAction::class)->run();

        return $this->transform($statuses, TodoListTaskStatusesListTransformer::class);
    }
}
