<?php

namespace App\Containers\AppSection\User\Models;

use App\Containers\AppSection\Authentication\Traits\AuthenticationTrait;
use App\Containers\AppSection\Authorization\Traits\AuthorizationTrait;
use App\Containers\AppSection\TodoList\Models\TodoListTask;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rules\Password;

class User extends ParentUserModel {
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'login',
        'password',
        'supervisor_id',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [

    ];

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(self::class, 'supervisor_id', 'id');
    }

    public function subordinates(): hasMany
    {
        return $this->hasMany(self::class, 'supervisor_id', 'id');
    }

    public function tasks(): hasMany
    {
        return $this->hasMany(TodoListTask::class, 'created_by_user_id', 'id');
    }

    public static function getPasswordValidationRules(): Password
    {
        return Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();
    }
}
