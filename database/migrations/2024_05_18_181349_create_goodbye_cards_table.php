<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('goodbye_cards', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_email')->nullable()->default(null);
            $table->longText('message');
            $table->string('card_color')->nullable()->default(null);
            $table->boolean('has_asset')->default(false);
            $table->enum('asset_type', ['image', 'video', null])->nullable()->default(null);
            $table->string('asset_path')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goodbye_cards');
    }
};
