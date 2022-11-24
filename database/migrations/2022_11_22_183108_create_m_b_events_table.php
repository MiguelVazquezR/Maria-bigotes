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
        Schema::create('m_b_events', function (Blueprint $table) {
            $table->id();
            
            $table->boolean('requirements_read')->default(0);
            $table->string('name', 100);
            $table->string('phone_number', 14);
            $table->date('event_date');
            $table->time('event_start');
            $table->string('address', 100);
            $table->string('postal_code', 6);
            $table->string('address_references', 100)->nullable();
            $table->unsignedSmallInteger('number_invites');
            $table->boolean('taste_our_specials')->default(0);
            $table->string('how_hear_about_us', 100);
            $table->string('comments')->nullable();
            $table->foreignId('event_type_id')->constrained();
            $table->foreignId('service_type_id')->constrained();
            $table->foreignId('pack_type_id')->constrained();

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
        Schema::dropIfExists('m_b_events');
    }
};
