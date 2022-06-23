<?php

/**
 * @apiGroup           Todolist
 * @apiName            GetAllTasksStatusesList
 *
 * @api                {GET} /v1/statuses Get All Tasks Statuses List
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

use App\Containers\AppSection\Todolist\UI\API\Controllers\GetTodoListTaskStatusesListController;
use Illuminate\Support\Facades\Route;

Route::get('statuses', [GetTodoListTaskStatusesListController::class, 'getAllTodoListTaskStatusesList'])
    ->middleware(['auth:api']);

