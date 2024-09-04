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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('description')->nullable();
            $table->timestamps();
        });
//        DB::statement("CREATE TABLE services (
//  id int UNSIGNED NOT NULL,
//  name varchar(255) NOT NULL,
//  description text NULL DEFAULT NULL,
//  created_at  timestamp    null,
//  updated_at  timestamp    null,
//  PRIMARY KEY (id)
//)");
//        DB::statement("
//        CREATE TABLE `services` (
//    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
//  `name` varchar(255) NOT NULL,
//  `description` text DEFAULT NULL,
//  `created_at` timestamp NULL DEFAULT NULL,
//  `updated_at` timestamp NULL DEFAULT NULL,
//  PRIMARY KEY (`id`)
//)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('services');
    }
};
