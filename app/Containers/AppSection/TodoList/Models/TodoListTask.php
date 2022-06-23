<?php

namespace App\Containers\AppSection\TodoList\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TodoListTask extends ParentModel
{

    protected $fillable = [
        'title',
        'description',
        'expiration_at',
        'priority',
        'status',
        'created_by_user_id',
        'responsible_user_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id', 'id');
    }

    public function responsibleUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsible_user_id', 'id');
    }

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'TodoListTask';
}
