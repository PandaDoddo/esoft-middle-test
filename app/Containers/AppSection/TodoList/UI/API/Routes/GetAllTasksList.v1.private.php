<?php

/**
 * @apiGroup           TodoList
 * @apiName            GetAllTodoLists
 *
 * @api                {GET} /v1/tasks Get All TodoListsTasks
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


use App\Containers\AppSection\Todolist\UI\API\Controllers\GetAllTodoListTasksController;
use Illuminate\Support\Facades\Route;

Route::get('tasks', [GetAllTodoListTasksController::class, 'getAllTodoListTasks'])
    ->middleware(['auth:api']);

