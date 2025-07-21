<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('token', function (Blueprint $table) {
            $table->id();
            $table->string('access_token', 64)->unique();
            $table->string('user_id'); // users.user_id を参照（FK制約は任意）
            $table->timestamps();      // create_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('token')
    }
};