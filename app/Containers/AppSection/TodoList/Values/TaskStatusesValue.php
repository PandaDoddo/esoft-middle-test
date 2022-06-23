<?php

namespace App\Containers\AppSection\Todolist\Values;

use App\Containers\AppSection\TodoList\Enums\TaskStatusEnum;
use App\Ship\Parents\Values\Value as ParentValue;

class TaskStatusesValue extends ParentValue
{

    private ?TaskStatusEnum $enum;

    public function __construct($value) {
        $this->enum = TaskStatusEnum::tryfrom($value) ?? TaskStatusEnum::default();
    }

    public function label(): string
    {
        return $this->enum->label();
    }

    public function name(): string
    {
        return $this->enum->name;
    }

    public function value(): int
    {
        return $this->enum->value;
    }



    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected string $resourceKey = 'statuses';
}
