<?php

namespace App\Containers\AppSection\Todolist\Actions;

use App\Containers\AppSection\TodoList\Enums\TaskStatusEnum;
use App\Containers\AppSection\Todolist\Values\TaskStatusesValue;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetTodoListTaskStatusesListAction extends ParentAction
{
    public function run(): mixed
    {
        return collect([
           TaskStatusEnum::CANCELED,
           TaskStatusEnum::TO_DO,
           TaskStatusEnum::IN_PROCESS,
           TaskStatusEnum::DONE,
       ])->map(static function ($item) {
            return new TaskStatusesValue($item->value);
        });
    }
}
