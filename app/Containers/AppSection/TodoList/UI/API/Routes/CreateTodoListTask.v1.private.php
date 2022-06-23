<?php

/**
 * @apiGroup           TodoList
 * @apiName            CreateTodoList
 *
 * @api                {POST} /v1/tasks Create TodoListTask
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Todolist\UI\API\Controllers\CreateTodoListTaskController;
use Illuminate\Support\Facades\Route;

Route::post('tasks', [CreateTodoListTaskController::class, 'createTodoListTask'])
    ->middleware(['auth:api']);

