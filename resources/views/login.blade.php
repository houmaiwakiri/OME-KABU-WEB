@extends('layouts.app')

@section('title', 'ログイン - 管理画面')
@section('body_class', 'login-page')

@section('content')
<div class="login-container">
  <div class="login-top">
    <div class="login-title">
      OME-KABU-WEB<br>
      管理画面ログイン
    </div>
    <div class="login-right">
      <h2>ログイン</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="user_id">ユーザーID</label>
        <input type="text" id="user_id" name="user_id" required autofocus>

        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">ログイン</button>
      </form>
    </div>
  </div>

  <div class="login-bottom"></div>
</div>
@endsection
