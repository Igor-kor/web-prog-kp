<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserCollections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coin_users', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable(); // пользователь загрузивший
        });
        Schema::table('mark_users', function (Blueprint $table) {
            $table->foreignIdFor(User::class)->nullable(); // пользователь загрузивший
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
