<?php

namespace App\Containers\AppSection\TodoList\UI\API\Requests;

use App\Containers\AppSection\TodoList\Data\Rules\CanAccessTodoListTaskRule;
use App\Containers\AppSection\TodoList\Data\Rules\IsMaybeResponsibleRule;
use App\Containers\AppSection\TodoList\Enums\TaskPrioritiesEnum;
use App\Containers\AppSection\TodoList\Enums\TaskStatusEnum;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateTodoListTaskRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        //TODO: Find a normal way to implement it

        $task = $this->user()->tasks()->where('id', '=', $this->getInputByKey('id'))->first();
        $isNotOwner = !($this->user()->id === $task?->creator->id);

        return [
            'id' => [
                'bail',
                'required',
                'numeric',
                'exists:App\Containers\AppSection\TodoList\Models\TodoListTask,id',
                new CanAccessTodoListTaskRule($this->user())
            ],
            'title' => [
                Rule::excludeIf($isNotOwner),
                'required',
                'string'
            ],
            'description' => [
                Rule::excludeIf($isNotOwner),
                'required',
                'string'
            ],
            'expiration_at' => [
                Rule::excludeIf($isNotOwner),
                'required',
                'date',
                'after:now'],
            'responsible_user_id' => [
                Rule::excludeIf($isNotOwner),
                'required',
                'numeric',
                'exists:App\Containers\AppSection\User\Models\User,id',
                new IsMaybeResponsibleRule($this->user())
            ],
            'priority' => [
                Rule::excludeIf($isNotOwner),
                'required',
                new Enum(TaskPrioritiesEnum::class)
            ],
            'status' => [
                'required',
                new Enum(TaskStatusEnum::class)
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
                                'hasAccess',
                            ]);
    }
}
