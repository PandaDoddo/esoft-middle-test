<?php

namespace App\Containers\AppSection\TodoList\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\TodoList\Tasks\GetAllTodoListTasksTask;
use App\Containers\AppSection\TodoList\UI\API\Requests\GetAllTasksListRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class GetAllTodoListsAction extends ParentAction
{
    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(GetAllTasksListRequest $request): mixed
    {
        $tasks = app(GetAllTodoListTasksTask::class)->run($request);

        $authUserId = $request->user()->id;

        $tasks->map(function($task) use ($authUserId) {
            $task['is_creator'] = $task->created_by_user_id === $authUserId;
            return $task;
        });

        return $tasks;
    }
}
