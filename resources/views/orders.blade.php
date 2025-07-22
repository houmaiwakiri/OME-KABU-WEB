@extends('layouts.app')

@section('title', '注文履歴')
@section('body_class', 'orders-page')

@section('content')
<div class="overlay-wrapper">
  <div class="overlay">
    <div class="main-content">
      <div class="orders-section">
        <h2 class="orders-title">注文履歴</h2>
        <div class="order-cards">
          @foreach($orders as $order)
            <div class="order-card">
              <p><strong>時刻:</strong> {{ $order->ordered_at }}</p>
              <p><strong>種別:</strong> {{ $order->order_type }}</p>
              <p><strong>価格:</strong> ¥{{ number_format($order->price) }}</p>
              <p><strong>VWAP:</strong> {{ $order->vwap }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
