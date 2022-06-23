<?php

namespace App\Containers\AppSection\TodoList\Enums;

enum TaskPrioritiesEnum: int
{

    case UNDEFINED = -1;
    case LOW = 0;
    case MEDIUM = 1;
    case HIGH = 2;

    public static function default(): self
    {
        return self::UNDEFINED;
    }

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel($value): string
    {
        return match ($value) {
            self::UNDEFINED  =>  __('priorities.UNDEFINED'),
            self::LOW        =>  __('priorities.LOW'),
            self::MEDIUM     =>  __('priorities.MEDIUM'),
            self::HIGH       =>  __('priorities.HIGH'),
        };
    }
}
