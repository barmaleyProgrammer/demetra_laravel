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
        Schema::create('gallery_places', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->timestamps();
        });

        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gallery_place_id')->unsigned()->nullable(false);
            $table->boolean('is_main')->nullable(false)->default(false);
            $table->longText('image')->nullable(false);
//            $table->enum('type', ['main', 'casual'])->nullable(false)->default('sub');
            $table->foreign('gallery_place_id')
                ->references('id')
                ->on('gallery_places')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fk_faqs_1');
        Schema::dropIfExists('places');
        Schema::dropIfExists('photos');
    }
};
