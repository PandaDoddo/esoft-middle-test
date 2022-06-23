<?php

namespace App\Ship\Seeders;

use App\Containers\AppSection\User\Actions\CreateUserAction;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;

class SeedTestingUsersForTodoList extends ParentSeeder
{
    public function run()
    {
        collect([
            [
                'login' => 'user1',
                'surname' => 'Иванов',
                'name' => 'Иван',
                'patronymic' => 'Иванович',
                'supervisor_id' => 1,
                'password' => 'password',
            ],
            [
                'login' => 'user2',
                'surname' => 'Петров',
                'name' => 'Петр',
                'patronymic' => 'Петрович',
                'supervisor_id' => 1,
                'password' => 'password',
            ],
            [
                'login' => 'user3',
                'surname' => 'Васильев',
                'name' => 'Василий',
                'patronymic' => 'Васильевич',
                'supervisor_id' => 3,
                'password' => 'password',
            ]
        ])->each(static function ($userData) {
            app(CreateUserAction::class)->run($userData);
        });
    }
}
