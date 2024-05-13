<?php
use App\Models\HomePagePhoto;
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
        Schema::create('home_page_photos', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->nullable(false)->default(0);
            $table->boolean('is_active')->nullable(false)->default(true);
            $table->timestamps();
            $table->longText('image')->nullable(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos_home_page');
    }
};
