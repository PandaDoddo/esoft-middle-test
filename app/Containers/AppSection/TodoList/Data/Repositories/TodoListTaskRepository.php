<?php

namespace App\Containers\AppSection\TodoList\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class TodoListTaskRepository extends ParentRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'created_by_user_id' => '=',
        'responsible_user_id' => '=',
        'expiration_at',
    ];
}
