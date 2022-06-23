<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use App\Containers\AppSection\User\Actions\GetCurrentUserSubordinatesListAction;
use App\Containers\AppSection\User\UI\API\Requests\GetCurrentUserSubordinatesListRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserSimpleTransformer;
use App\Ship\Parents\Controllers\ApiController;

class GetCurrentUserSubordinatesListController extends ApiController
{

    public function GetCurrentUserSubordinatesList(GetCurrentUserSubordinatesListRequest $request)
    {
        $subordinates = app(GetCurrentUserSubordinatesListAction::class)->run($request);

        return $this->transform($subordinates, UserSimpleTransformer::class);
    }
}
