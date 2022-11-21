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
        Schema::create('santa_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('santa_user_id');
            $table->bigInteger('ward_user_id');
            $table->timestamps();
        });

        Schema::table('santa_lists', function (Blueprint $table) {
            $table->foreign('santa_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('ward_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santa_lists');
    }
};
