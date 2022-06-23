<?php

namespace App\Containers\AppSection\TodoList\Actions;

use App\Containers\AppSection\TodoList\Tasks\DeleteTodoListTask;
use App\Containers\AppSection\TodoList\UI\API\Requests\DeleteTodoListRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteTodoListAction extends ParentAction
{
    /**
     * @param DeleteTodoListRequest $request
     * @return int
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteTodoListRequest $request): int
    {
        return app(DeleteTodoListTask::class)->run($request->id);
    }
}
