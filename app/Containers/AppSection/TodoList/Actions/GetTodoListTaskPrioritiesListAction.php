<?php

namespace App\Containers\AppSection\Todolist\Actions;

use App\Containers\AppSection\TodoList\Enums\TaskPrioritiesEnum;
use App\Containers\AppSection\Todolist\Values\TaskPrioritiesValue;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetTodoListTaskPrioritiesListAction extends ParentAction
{
    public function run(): mixed
    {
        return collect([
           TaskPrioritiesEnum::LOW,
           TaskPrioritiesEnum::MEDIUM,
           TaskPrioritiesEnum::HIGH,
       ])->map(static function ($item) {
            return new TaskPrioritiesValue($item->value);
        });
    }
}
