@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
        <div class="thanks__content">
            <div class="thanks__heading">
                <h2>お問い合わせありがとうございます</h2>
            </div>
            <picture>
                <source srcset="{{ asset('img/cute yellow dog wear3.large.png') }}" media="(min-width: 1024px)">
                <source srcset="{{ asset('img/cute yellow dog wear3.png') }}" media="(min-width: 600px)">
                <img src="{{ asset('img/cute yellow dog wear3.png') }}" alt="お辞儀">
            </picture>
        </div>
@endsection

