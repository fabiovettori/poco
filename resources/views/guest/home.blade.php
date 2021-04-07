@extends('guest.layouts.structure')

@section('title', 'Home')

@section('content')
    <div id="home-vue">
        <home-vue />
    </div>
@endsection

@section('script')
    <script src=" {{ asset('js/app.js') }} " charset="utf-8"></script>
@endsection
