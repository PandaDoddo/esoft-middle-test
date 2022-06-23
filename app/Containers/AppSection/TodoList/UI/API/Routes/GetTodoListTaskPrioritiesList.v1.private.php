<?php

/**
 * @apiGroup           Todolist
 * @apiName            Priorities
 *
 * @api                {GET} /v1/priorities Priorities
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

use App\Containers\AppSection\Todolist\UI\API\Controllers\GetTodoListTaskPrioritiesListController;
use Illuminate\Support\Facades\Route;

Route::get('priorities', [GetTodoListTaskPrioritiesListController::class, 'getAllTodoListPrioritiesList'])
    ->middleware(['auth:api']);

