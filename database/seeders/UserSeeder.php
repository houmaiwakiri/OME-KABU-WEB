<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    User::create([
      'user_id' => 'admin',
      'password' => Hash::make('admin'),
      'user_name' => '管理者',
      'auth_id' => 1,
    ]);
  }
}