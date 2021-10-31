<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Image;
use App\Models\Country;

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
            $table->foreignIdFor(Image::class)->nullable(); // Изображения
            $table->foreignIdFor(Country::class)->nullable(); // страна
            $table->string('year')->nullable();// год, может быть до н.э., поэтому текст
            $table->string('denomination')->nullable(); // номинал
            $table->string('material')->nullable(); // материал
            $table->string('diameter')->nullable(); // диаметр
            $table->string('coin_weight')->nullable(); // вес монеты
            $table->string('circulation')->nullable(); // тираж
            $table->string('edge')->nullable(); // Гурт
            $table->string('features')->nullable(); // Особенности
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
