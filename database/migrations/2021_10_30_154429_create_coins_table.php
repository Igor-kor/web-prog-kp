<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->string('Год');
            $table->string('Страна');
            $table->string('Сохранность');
            $table->string('Номинал');
            $table->string('Тип монеты');
            $table->string('Материал');
            $table->string('Диаметр');
            $table->string('Вес монеты');
            $table->string('Тираж');
            $table->string('Гурт');
            $table->string('Особенности');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins');
    }
}
