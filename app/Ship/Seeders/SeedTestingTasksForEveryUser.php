<?php

namespace App\Ship\Seeders;

use App\Containers\AppSection\TodoList\Data\Repositories\TodoListTaskRepository;
use App\Containers\AppSection\TodoList\Enums\TaskPrioritiesEnum;
use App\Containers\AppSection\TodoList\Enums\TaskStatusEnum;
use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\GetUserSubordinatesByUserIdTask;
use App\Ship\Parents\Seeders\Seeder as ParentSeeder;
use Exception;
use Illuminate\Support\Carbon;

class SeedTestingTasksForEveryUser extends ParentSeeder
{
    public function __construct(
        protected UserRepository $userRepository,
        protected TodoListTaskRepository $todoListTaskRepository
    ) {
    }

    public function run()
    {
        //TODO: refactor
        $futureDate = Carbon::now()->addYear()->endOfDay()->toFormattedDateString();
        $pastDate = Carbon::now()->subYear()->endOfDay()->toFormattedDateString();

        $tasksWithImportantAttributes = collect([
            [
                'expiration_at' => $futureDate,
                'status' => TaskStatusEnum::TO_DO->value,
            ],
            [
                'expiration_at' => $futureDate,
                'status' => TaskStatusEnum::DONE->value,
            ],
            [
                'expiration_at' => $futureDate,
                'status' => TaskStatusEnum::CANCELED->value,
            ],
            [
                'expiration_at' => $futureDate,
                'status' => TaskStatusEnum::IN_PROCESS->value,
            ],
            [
                'expiration_at' => $pastDate,
                'status' => TaskStatusEnum::IN_PROCESS->value,
            ]
        ]);

        $this->userRepository->All()->each(
            function (User $user) use ($tasksWithImportantAttributes) {
                $subordinates = app(GetUserSubordinatesByUserIdTask::class)->run($user->id);
                $tasksWithImportantAttributes->each(function ($item) use ($subordinates, $user) {
                    try {
                        $subordinate = $subordinates?->random();
                    } catch (Exception $e) {
                        $subordinate = $user;
                    }

                    $taskFrom = $subordinate->supervisor ?? $user;

                    $taskData = array_merge([
                        'title' => 'Заголовок от ' . $user->login,
                        'description' => 'Описание задачи...',
                        'priority' => array_rand([
                             TaskPrioritiesEnum::LOW->value,
                             TaskPrioritiesEnum::MEDIUM->value,
                             TaskPrioritiesEnum::HIGH->value,
                        ]),
                        'responsible_user_id' => $subordinate->id,
                        'created_by_user_id' => $taskFrom->id
                    ], $item);

                    $this->todoListTaskRepository->create($taskData);
                });
            }
        );
    }
}
