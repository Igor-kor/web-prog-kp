<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Coin;
use App\Models\Image;

class CreateCoinUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Coin::class);
            // ->set()
            $table->enum('safety',[
                'PF','PL','BU','UNC','AU+','AU','XF+','XF','VF+','VF','F','VG','G','AG','FA','PR'
            ])->nullable(); // сохранность
            $table->string('description')->nullable(); // описание
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
        Schema::dropIfExists('coin_users');
    }
}
