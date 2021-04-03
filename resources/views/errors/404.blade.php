@extends('guest.layouts.structure')

@section('title', '404')

@section('content')
    <section class="errors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <img src=" {{ asset('images/404.png') }} " alt="poco page 404">
                    <h1>
                        Oop, that link is broken.
                    </h1>
                    <p>
                        Page doesn’t exist or some other error occured. Go to our <br>
                        <a href=" {{ route('home') }} ">Home page</a>
                        or go back to
                        <a href=" {{ url()->previous() }} ">Previous page</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
