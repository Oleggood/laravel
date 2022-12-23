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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->date('task_date'); //дата задачи (документа)
            $table->string('number', '30')->nullable(); //номер документа
            $table->string('task_name', '700'); //наименование документа
            $table->string('item', '20')->nullable(); ; //пункт
            $table->longText('task'); //текст поручения
            $table->longText('note')->nullable(); //примечание
            $table->date('deadline'); //крайняя дата исполнения
            $table->integer('task_status_id'); //связь с таблицей статусов
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
        Schema::dropIfExists('tasks');
    }
};
