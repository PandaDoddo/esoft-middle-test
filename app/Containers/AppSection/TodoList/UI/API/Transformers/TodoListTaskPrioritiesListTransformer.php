<?php

namespace App\Containers\AppSection\TodoList\UI\API\Transformers;

use App\Containers\AppSection\Todolist\Values\TaskPrioritiesValue;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use JetBrains\PhpStorm\ArrayShape;

class TodoListTaskPrioritiesListTransformer extends ParentTransformer
{
    #[ArrayShape(['label' => "string", 'value' => "int", 'name' => "string"])]
    public function transform(TaskPrioritiesValue $taskStatus): array
    {
        return [
            'label' => $taskStatus->label(),
            'value' => $taskStatus->value(),
            'name' => $taskStatus->name(),
        ];
    }
}
