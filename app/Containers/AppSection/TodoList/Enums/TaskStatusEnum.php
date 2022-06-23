<?php

namespace App\Containers\AppSection\TodoList\Enums;

enum TaskStatusEnum: int
{
    case UNDEFINED = -2;
    case CANCELED = -1;
    case TO_DO = 0;
    case IN_PROCESS = 1;
    case DONE = 2;

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

            self::UNDEFINED  =>  __('statuses.UNDEFINED'),
            self::CANCELED   =>  __('statuses.CANCELED'),
            self::TO_DO      =>  __('statuses.TO_DO'),
            self::IN_PROCESS =>  __('statuses.IN_PROCESS'),
            self::DONE       =>  __('statuses.DONE'),
        };
    }
}
