<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('description')->nullable();
            $table->double('price')->nullable();
            $table->longText('image')->nullable();
            $table->timestamps();
        });

        Schema::create('room_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('room_id')->unsigned()->nullable(false);
            $table->longText('image')->nullable(false);
            $table->foreign('room_id')
                ->references('id')
                ->on('rooms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fk_faqs_1');
        Schema::dropIfExists('room');
        Schema::dropIfExists('rooms');
    }
};
