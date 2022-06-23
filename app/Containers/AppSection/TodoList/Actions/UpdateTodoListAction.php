<?php

namespace App\Containers\AppSection\TodoList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Containers\AppSection\TodoList\Tasks\FindTodoListTaskByIdTask;
use App\Containers\AppSection\TodoList\Tasks\UpdateTodoListTask;
use App\Containers\AppSection\TodoList\UI\API\Requests\UpdateTodoListTaskRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateTodoListAction extends ParentAction
{
    /**
     * @param UpdateTodoListTaskRequest $request
     * @return TodoListTask
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateTodoListTaskRequest $request): TodoListTask
    {
        $data = $request->validated();

        $task = app(UpdateTodoListTask::class)->run($data, $request->id);
        $task['is_creator'] = $task->created_by_user_id === $request->user()->id;

        return $task;
    }
}
