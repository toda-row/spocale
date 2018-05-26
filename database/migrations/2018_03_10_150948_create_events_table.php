<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->string('event_name');
        $table->integer('event_price');
        $table->string('email');
        $table->dateTime('event_date');
        $table->longText('description');
        $table->string('eventpic_filename');
        $table->string('event_type');
        $table->string('event_area');
        $table->string('event_adress');
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
        Schema::dropIfExists('events');
    }
}
