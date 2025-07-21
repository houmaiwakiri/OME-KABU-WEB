<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController
{
  public function main(Request $request)
  {
    $token = $request->session()->get('token') ?? $request->input('token');

    $user = User::where('api_token', hash('sha256', $token))->first();
    if (!$user) {
      return redirect('/login')->withErrors(['ログインしてください']);
    }

    // 認証成功時の画面表示
    return view('main', ['user' => $user]);
  }
}