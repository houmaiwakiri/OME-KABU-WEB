@extends('layouts.app')

@section('title', 'CSV取込')
@section('body_class', 'import-page')

@section('content')
<div class="overlay-wrapper">
  <div class="overlay">
    <div class="import-section">
      <h2 class="import-title">CSV取込</h2>
      @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
      @endif
      <form method="POST" action="{{ route('import.csv') }}">
        @csrf
        <button type="submit" class="import-button">注文履歴を取り込む</button>
      </form>
    </div>
  </div>
</div>
@endsection
