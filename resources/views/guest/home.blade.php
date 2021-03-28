@extends('guest.layouts.structure')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <div class="wrapper">
            <div class="container-fluid">
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
        </div>
    </section>

    <section class="categories">
        <div class="wrapper">
            <div class="container-fluid">
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
        </div>
    </section>

    <section class="highlights">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="tile">
                            <div>
                                <h2>Any day <br> Offers</h2>
                                <p class="text-uppercase">new phenomenon <br> burger taste</p>
                            </div>
                            <span>$12.90</span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="tile exp moon">
                            <div>
                                <h2>Other <br> flavors</h2>
                                <p class="text-uppercase">save room. <br> we made salats</p>
                            </div>
                            <span>$12.90</span>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="tile moon location">
                            <h2>Find a Poco <br> store <br> near you</h2>
                            <span class="text-uppercase">contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-dishes">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center title">Popular dishes</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid" id="categories">
                <categories-component />
            </div>
        </div>
    </section>

    <section class="marketing">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 left">
                        <h5>Get Up to</h5>
                        <h2>50% <br> <span class="text-uppercase">off</span> </h2>
                    </div>

                    <div class="col-6 right">
                        <h3 class="text-capitalize">hot fresh</h3>
                        <h2 class="text-uppercase">hot dog</h2>
                        <a class="text-uppercase" name="shop" href="#">order now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
