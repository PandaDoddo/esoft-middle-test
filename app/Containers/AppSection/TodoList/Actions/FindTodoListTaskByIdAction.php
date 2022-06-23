<?php

namespace App\Containers\AppSection\TodoList\Actions;

use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Containers\AppSection\TodoList\Tasks\FindTodoListTaskByIdTask;
use App\Containers\AppSection\TodoList\UI\API\Requests\FindTodoListTaskByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindTodoListTaskByIdAction extends ParentAction
{
    /**
     * @throws NotFoundException
     */
    public function run(FindTodoListTaskByIdRequest $request): TodoListTask
    {
        $task = app(FindTodoListTaskByIdTask::class)->run($request->id);
        $task['is_creator'] = $task->created_by_user_id === $request->user()->id;

        return $task;
    }
}
