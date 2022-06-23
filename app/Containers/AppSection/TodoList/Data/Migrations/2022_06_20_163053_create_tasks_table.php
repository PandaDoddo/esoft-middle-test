<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todo_list_tasks', static function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->datetime('expiration_at')->index();
            $table->tinyInteger('priority');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('created_by_user_id')->index();
            $table->foreign('created_by_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->unsignedBigInteger('responsible_user_id')->index();
            $table->foreign('responsible_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_list_tasks');
    }
};
