@extends('layouts.app')

@section('content')
    <h2>{{ $filename }}</h2>
    <table border="1" cellpadding="5">
        @foreach ($rows as $i => $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    <p><a href="{{ route('logs.index') }}">戻る</a></p>
@endsection
