<?php

namespace App\Containers\AppSection\TodoList\Data\Factories;

use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Ship\Parents\Factories\Factory as ParentFactory;

class TodoListTaskFactory extends ParentFactory
{
    protected $model = TodoListTask::class;

    public function definition(): array
    {
        return [
            // Add your model fields here
            // 'name' => $this->faker->name(),
        ];
    }
}
