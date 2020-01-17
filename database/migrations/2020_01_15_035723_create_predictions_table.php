<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('league');
            $table->string('home_team');
            $table->string('away_team');
            $table->string('tip');
            $table->boolean('isEndded')->default(false);
            $table->string('result')->nullable();
            $table->boolean('isPremium')->default(false);
            $table->string('plan')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('predictions');
    }
}
