<?php

/**
 * @apiGroup           TodoList
 * @apiName            FindTodoListById
 *
 * @api                {GET} /v1/tasks/:id Find TodoListTask By Id
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

use App\Containers\AppSection\Todolist\UI\API\Controllers\FindTodoListTaskByIdController;
use Illuminate\Support\Facades\Route;

Route::get('tasks/{id}', [FindTodoListTaskByIdController::class, 'findTodoListTaskById'])
    ->middleware(['auth:api']);

