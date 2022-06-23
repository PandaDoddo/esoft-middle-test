<?php

namespace App\Containers\AppSection\TodoList\UI\API\Requests;

use App\Containers\AppSection\TodoList\Data\Rules\IsMaybeResponsibleRule;
use App\Containers\AppSection\TodoList\Enums\TaskPrioritiesEnum;
use App\Containers\AppSection\TodoList\Enums\TaskStatusEnum;
use App\Ship\Parents\Requests\Request as ParentRequest;
use Illuminate\Validation\Rules\Enum;

class CreateTodoListTaskRequest extends ParentRequest
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
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'expiration_at' => 'required|date|after:now',
            'responsible_user_id' => [
                'required',
                'numeric',
                'exists:App\Containers\AppSection\User\Models\User,id',
                new IsMaybeResponsibleRule($this->user())
            ],
            'priority' => [
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
