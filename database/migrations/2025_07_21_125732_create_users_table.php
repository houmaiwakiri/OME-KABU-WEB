<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique(); // ログインID
            $table->string('password');          // ハッシュ化されたパスワード
            $table->string('user_name');         // 表示名
            $table->integer('auth_id')->default(1); // 権限（拡張用）
            $table->timestamps(); // create_at / updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};