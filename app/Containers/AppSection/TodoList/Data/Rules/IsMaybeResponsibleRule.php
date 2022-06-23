<?php
namespace App\Containers\AppSection\TodoList\Data\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsMaybeResponsibleRule implements Rule
{
    protected ?string $message = null;

    public function __construct(private $user)
    {

    }

    public function passes($attribute, $value): bool
    {
        //TODO: add translation for message
        $result = $value === $this->user->id || $this->user->subordinates()->where('id', '=', $value)->count() > 0;
        $result || $this->message = 'Вы не можете выбрать этого пользователя ответственным';

        return $result;
    }

    public function message(): ?string
    {
        return __($this->message);
    }
}
