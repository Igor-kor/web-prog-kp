<?php

use App\Models\Mark;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Mark::class);
            // по сохранности марок https://filtorg.ru/articles/ocenka-sostoyaniya-marok/
            $table->enum('safety',[
                'MNH OG','MNH','MLH','MVLH','MH','POG','UH','Mounted','NG','Sans gomme','O.G.','CTO','Used','G/VG','Fine','VF','XF'
            ])->nullable(); // сохранность
            $table->string('description')->nullable(); // описание
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks_users');
    }
}
