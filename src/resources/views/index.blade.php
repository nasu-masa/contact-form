@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
@if (session('status'))
<h3 class="flash-message" id="flash-message">
    {{ session('status') }}
</h3>
@endif

<div class="contact-content">
    <div class="contact-title">
        <h1 class="contact-welcome">ようこそ Welcome</h1>
    </div>
    <div class="contact-item">
        <form class="form" action="/contact" method="get">
            @include('parts.button', ['label' => 'お問い合わせ'])
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const flash = document.getElementById('flash-message');
        if (!flash) return;

        // 3秒後にフェードアウト開始
        setTimeout(() => {
        flash.classList.add('hide');

        // フェードアウト後に完全に消す
        setTimeout(() => {
        flash.style.display = 'none';
        }, 500); // CSSのtransitionと同じ時間
        }, 3000);

        // フェードアウト終了後にDOMから削除（任意）
        flash.addEventListener('transitionend', () => {
            flash.remove();
        });
    });
</script>
@endsection