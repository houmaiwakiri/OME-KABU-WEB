<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->string('access_token')->unique();
            $table->string('user_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};