<?php

namespace App\Containers\AppSection\TodoList\UI\API\Transformers;

use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Containers\AppSection\Todolist\Values\TaskStatusesValue;
use App\Containers\AppSection\User\UI\API\Transformers\UserSimpleTransformer;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;
use Illuminate\Support\Carbon;
use League\Fractal\Resource\Item;

class TodoListTaskTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [
        'responsible',
    ];

    protected array $availableIncludes = [
        'creator',
        'status',
    ];

    public function transform(TodoListTask $todoListTask): array
    {
        $useExtra = in_array('extra', $this->getCurrentScope()?->getManager()->getRequestedIncludes(), true) ?? false;

        $response = [
            'object' => $todoListTask->getResourceKey(),
            'id' => $todoListTask->getHashedKey(),
            'title' => $todoListTask->title,
            'priority' => $todoListTask->priority,
            'expiration_at' => $todoListTask->expiration_at,
            'status' => $todoListTask->status,
            'isExpired' => $todoListTask->expiration_at <= Carbon::now(),
            'isCreator' => $todoListTask->is_creator,
        ];

        $useExtra && $response = array_merge($response, [
            'description' => $todoListTask->description,
            'created_by_user_id' => $todoListTask->created_by_user_id,
            'responsible_user_idd' => $todoListTask->responsible_user_id,
            'created_at' => $todoListTask->created_at,
            'updated_at' => $todoListTask->updated_at,
        ]);

        return $this->ifAdmin([
            'real_id' => $todoListTask->id,
        ], $response);
    }

    public function includeCreator(TodoListTask $todoListTask): Item
    {
        return $this->item($todoListTask->creator, new UserSimpleTransformer());
    }

    public function includeResponsible(TodoListTask $todoListTask): Item
    {
        return $this->item($todoListTask->responsibleUser, new UserSimpleTransformer());
    }

    public function includeStatus(TodoListTask $todoListTask): Item
    {
        return $this->item(new TaskStatusesValue($todoListTask->status), new TodoListTaskStatusesListTransformer());
    }
}
