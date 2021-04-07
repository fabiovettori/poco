<section class="top-banner">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 d-flex flex-start align-center">
                    <p class="my-0 mr-3">
                        <span class="fas fa-mobile-alt mr-2"></span>
                        <span class="text-uppercase">call us +381 65 666 6666</span>
                    </p>
                    <p class="m-0">
                        <span class="fas fa-map-marker-alt mr-2"></span>
                        <span class="text-capitalize">71 madison ave</span>
                    </p>
                </div>

                <div class="col-2 social d-flex justify-content-between align-items-center">
                    <span class="fab fa-facebook"></span>
                    <span class="fab fa-twitter"></span>
                    <span class="fab fa-youtube"></span>
                    <span class="fab fa-wordpress"></span>
                </div>
            </div>
        </div>
    </div>
</section>

<nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7 links d-flex">
                    <a href=" {{ route('home') }} " class="logo">
                        <img src=" {{ asset('images/logo.svg') }} " alt="poco logo">
                    </a>
                    <ul class="list-unstyled d-flex justify-content-between align-items-center m-0">
                        <li>
                            <a class=" {{ Route::currentRouteName() == 'home' ? 'active' : '' }} " href=" {{ route('home') }} ">Home</a>
                        </li>
                        <li>
                            <a class=" {{ Route::currentRouteName() == 'shop' ? 'menu' : '' }}" href="#">Menu</a>
                        </li>
                        <li>
                            <a class=" {{ Route::currentRouteName() == 'about' ? 'active' : '' }}" href="#">About</a>
                        </li>
                        <li>
                            <a class=" {{ Route::currentRouteName() == 'shop' ? 'active' : '' }}" href=" {{ route('shop') }} ">Shop</a>
                        </li>
                        <li>
                            <a class=" {{ Route::currentRouteName() == 'blog' ? 'active' : '' }}" href="#">Blog</a>
                        </li>
                        <li>
                            <a class=" {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}" href="#">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="col-3 contacts d-flex">
                    <img src=" {{ asset('images/scooter.svg') }} " alt="scooter">
                    <div>
                        <span>Call and Order in</span>
                        <span>+1718-904-4450</span>
                    </div>
                </div>

                <div class="col-2 icons">
                    <span class="fas fa-search"></span>
                    <span class="fas fa-user"></span>
                    <span class="fas fa-heart"></span>
                    <img src=" {{ asset('images/cart.svg') }} " alt="shopping cart">
                </div>
            </div>
        </div>
    </div>
</nav>
