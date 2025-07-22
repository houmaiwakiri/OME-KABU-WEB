@extends('layouts.app')

@section('title', 'メイン画面')
@section('body_class', 'main-page')

@section('content')
<div class="main-container">
  <nav class="side-nav">
    <a href="{{ route('orders.index') }}" class="nav-card">注文履歴</a>
    <a href="{{ route('import.index') }}" class="nav-card">CSV取込</a>
    <!-- 他リンクがあればここに -->
  </nav>

  <div class="logout-area">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-button">ログアウト</button>
    </form>
  </div>
</div>
@endsection
