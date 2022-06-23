<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Support\Facades\Auth;

class GetAuthUserTask extends ParentTask
{
    public function __construct()
    {
        // ..
    }

    public function run()
    {
        return Auth::user();
    }
}
