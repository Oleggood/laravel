<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname', 40)->nullable(); //фамилия
            $table->string('name', 40); //имя
            $table->string('patronymic', 40)->nullable(); //отчество
            $table->date('birthday')->nullable(); //день рождения
            $table->integer('nickname')->unique(); //прозвище - цыфры
            $table->boolean('is_not_fired')->default(true); //НЕ уволен ли
            $table->string('login', 15)->unique(); //логин
            $table->string('password', 10); //пароль
            $table->longText('note', 500)->nullable(); //примечание
            $table->rememberToken();
            $table->integer('department_id')->nullable(); //связь - ID структурного подразделения
            $table->integer('position_id')->nullable(); //связь - ID должности
            $table->integer('role_id')->nullable(); //связь - ID таблицы ролей
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
