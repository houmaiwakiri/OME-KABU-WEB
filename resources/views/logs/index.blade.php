@extends('layouts.app')

@section('content')
    <h2>CSVファイル一覧 ({{ strtoupper($type) }})</h2>
    <ul>
        @foreach ($files as $file)
            <li>
                <a href="{{ route('logs.show', basename($file)) }}">{{ basename($file) }}</a>
            </li>
        @endforeach
    </ul>
@endsection
