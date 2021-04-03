<section class="top-footer">
    <div class="logo">
        <img src=" {{ asset('images/logo.svg') }} " alt="poco logo">
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 text-center">
                    <h2 class="text-uppercase">address</h2>
                    <p>570 8th Ave, <br> New York, <br> NY 10018 United States</p>
                </div>
                <div class="col-3 text-center">
                    <h2 class="text-uppercase">book table</h2>
                    <p>Dogfood och Sliders foodtruck. <br> Under Om oss kan ni läsa</p>
                    <span class="phone">(850) 435-4155</span>
                </div>
                <div class="col-3 text-center">
                    <h2 class="text-uppercase">opening hours</h2>
                    <p>
                        Monday – Friday:
                        <span>8am – 4pm</span>
                        <br> Saturday:
                        <span>9am – 5pm</span>
                    </p>
                    <div class="social">
                        <span class="fab fa-facebook"></span>
                        <span class="fab fa-twitter"></span>
                        <span class="fab fa-youtube"></span>
                        <span class="fab fa-wordpress"></span>
                    </div>
                </div>
                <div class="col-3 text-center">
                    <h2 class="text-uppercase">newsletter</h2>
                    <p>Subscribe to the weekly newsletter for all the latest updates</p>
                    <form action="#" method="POST">
                        @csrf
                        <div>
                            <input type="text" placeholder="your email ...">
                            <a href="#">subscribe</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bottom-footer">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <p class="text-left m-0">Copyright © 2020
                        <a href="#">pocofood</a>.
                        All Rights Reserved.
                    </p>
                </div>
                <div class="col-6 text-right">
                    <img src=" {{ asset('images/badge-gatways.png') }} " alt="badge gateways">
                </div>
            </div>
        </div>
    </div>
</section>
