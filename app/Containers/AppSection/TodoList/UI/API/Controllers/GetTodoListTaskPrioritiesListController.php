<?php

namespace App\Containers\AppSection\Todolist\UI\API\Controllers;

use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\TodoList\Actions\GetTodoListTaskPrioritiesListAction;
use App\Containers\AppSection\TodoList\UI\API\Transformers\TodoListTaskPrioritiesListTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetTodoListTaskPrioritiesListController extends ApiController
{
    /**
     * @return array
     * @throws InvalidTransformerException
     */
    public function getAllTodoListPrioritiesList(): array
    {
        $statuses = app(GetTodoListTaskPrioritiesListAction::class)->run();

        return $this->transform($statuses, TodoListTaskPrioritiesListTransformer::class);
    }
}
