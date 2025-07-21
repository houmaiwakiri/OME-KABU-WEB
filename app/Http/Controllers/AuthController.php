<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

use App\Models\User;
use App\Models\Token;

class AuthController
{
  public function showLogin()
  {
    return view('login');
  }

  public function login(Request $request)
  {
    $request->validate([
      'user_id' => 'required',
      'password' => 'required',
    ]);

    $user = User::where('user_id', $request->user_id)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
      return back()->withErrors(['login_error' => 'ユーザーIDまたはパスワードが違います']);
    }

    // トークン発行
    $tokenValue = bin2hex(random_bytes(32));
    Token::create([
      'access_token' => $tokenValue,
      'user_id' => $user->user_id,
    ]);

    // トークンを Cookie に保存（例：60分有効）
    return redirect('/main')->withCookie(
      cookie('access_token', $tokenValue, 60)  // 名前, 値, 分
    );
  }

  public function logout(Request $request)
  {
    $token = $request->cookie('access_token');

    if ($token) {
      Token::where('access_token', $token)->delete();
    }

    // トークンクッキー削除 + リダイレクト
    return redirect('/login')->withCookie(
      Cookie::forget('access_token')
    );
  }
}