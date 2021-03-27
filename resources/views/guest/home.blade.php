@extends('guest.layouts.structure')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call-to-action">
                        <h2 class="text-uppercase">Unlimited <br> medium <span>pizzas</span></h2>
                        <h3>Medium 2-topping* pizza</h3>
                        <p>*Additional charge for premium toppings. Minimum of 2 required.</p>
                        <div>
                            <a class="text-uppercase" href="#">order now</a>
                            <span>$12.99</span>
                            <span>$19.99</span>
                        </div>
                        <img src=" {{ asset('images/hero_pizza.png') }} " alt="pizza">
                    </div>
                    <a class="text-uppercase" name="menus" href="#">Menus</a>
                </div>
            </div>
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled m-0">
                        @foreach ($categories as $category)
                            <li>
                                <img src=" {{ $category->cover }}" alt=" {{ $category->name }} ">
                                <span> {{ $category->name }} </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
