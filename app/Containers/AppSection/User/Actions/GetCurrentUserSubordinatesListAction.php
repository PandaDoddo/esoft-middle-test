<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Tasks\GetAuthUserTask;
use App\Containers\AppSection\User\Tasks\GetUserSubordinatesByUserIdTask;
use App\Ship\Parents\Actions\Action as ParentAction;

class GetCurrentUserSubordinatesListAction extends ParentAction
{
    public function run()
    {
        // TODO: refactor
        $user = app(GetAuthUserTask::class)->run();
        return app(GetUserSubordinatesByUserIdTask::class)->run($user->id)->merge([$user]);
    }
}
