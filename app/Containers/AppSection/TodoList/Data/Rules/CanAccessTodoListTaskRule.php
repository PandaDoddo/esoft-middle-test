<?php
namespace App\Containers\AppSection\TodoList\Data\Rules;

use App\Containers\AppSection\TodoList\Models\TodoListTask;
use Illuminate\Contracts\Validation\Rule;

class CanAccessTodoListTaskRule implements Rule
{
    protected ?string $message = null;

    public function __construct(private $user)
    {

    }

    public function passes($attribute, $value): bool
    {
        // TODO: Find a normal way to implement it (may be middleware) && add translate for message && REMOVE MODEL FROM THIS

        $result = TodoListTask::query()->where('id', '=', $value)
                ->where(function($query) {
                    $query->where('created_by_user_id', '=', $this->user->id)
                        ->orWhere('responsible_user_id', '=', $this->user->id);
                })->count() > 0;
        $result || $this->message = 'Вы не можете изменять эту задачу';

        return $result;
    }

    public function message(): ?string
    {
        return __($this->message);
    }
}
