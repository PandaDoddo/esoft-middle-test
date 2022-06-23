<?php

namespace App\Ship\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class DateFieldCriteria extends Criteria
{
    public function __construct(
        private string $field,
        private ?string $from,
        private ?string $to
    ) {
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where(function ($query) {
            $this->from !== null && $query->where($this->field, '>=', $this->from);
            $this->to   !== null && $query->where($this->field, '<=', $this->to);
        });
    }
}
