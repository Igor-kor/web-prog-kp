<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Country;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Country::class)->nullable(); // страна
            $table->string('year')->nullable();// год
            $table->string('size')->nullable();// размер
            $table->string('denomination')->nullable(); // номинал
            $table->string('material')->nullable(); // материал
            $table->string('circulation')->nullable(); // тираж
            $table->string('features')->nullable(); // Особенности
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
