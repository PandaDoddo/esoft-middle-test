<?php

namespace App\Containers\AppSection\TodoList\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Containers\AppSection\TodoList\Tasks\CreateTodoListTask;
use App\Containers\AppSection\TodoList\UI\API\Requests\CreateTodoListTaskRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateTodoListTaskAction extends ParentAction
{
    /**
     * @param CreateTodoListTaskRequest $request
     * @return TodoListTask
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run($request): TodoListTask
    {
        $data = $request->sanitizeInput([
            "title",
            "description",
            "expiration_at",
            "priority",
            "status",
            "responsible_user_id",
        ]);

        $data['created_by_user_id'] = $request->user()->id;

        return app(CreateTodoListTask::class)->run($data);
    }
}
