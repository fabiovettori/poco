<template>
    <div>
        <heady :cartVisibility="cart" @shoppingCart="cartStatus" :cartCounter="cartCounter"/>
        <main class="guest">
            <section class="hero">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="call-to-action" ref="ctaHero">
                                    <h2 class="text-uppercase">Unlimited <br> medium <span>pizzas</span></h2>
                                    <h3>Medium 2-topping* pizza</h3>
                                    <p>*Additional charge for premium toppings. Minimum of 2 required.</p>
                                    <div>
                                        <a class="text-uppercase" href="#">order now</a>
                                        <span ref="priceOffer">$12.99</span>
                                        <span>$19.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="/images/hero_pizza.png" alt="pizza" @load="heroImgLoaded()" ref="heroImg">
                <img src="/images/hero-shape_left.png" alt="hero-top-left" ref="hero_top_left">
                <img src="/images/h2_shape-4.png" alt="hero-top-right" ref="hero_top_right">
                <img src="/images/h2_shape-5.png" alt="hero-bottom-right" ref="hero_bottom_right">
                <img src="/images/h1_tomato.png" alt="hero-middle-top" ref="hero_middle_top">
                <img src="/images/h1_shape-5.png" alt="hero-middle-bottom" ref="hero_middle_bottom">
            </section>

            <section class="categories" id="cat-home">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <a class="text-uppercase" name="menus" href="#">Menus</a>
                                <Categories :checkImg="false" :lazy="catLazy"/>
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
                    <div class="container-fluid">
                        <products />
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

            <section class="testimonials">
                <div class="wrapper">
                    <Testimonials :visibleTestimonials="3" />
                </div>
            </section>

            <section class="offers" id="offers">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="description" :class="offerLazy ? 'active' : ''">
                                <h3>fast food</h3>
                                <h2>meals</h2>
                                <p>new phonomenon <br> burger taste</p>
                                <span>$19.90</span>
                                <a href="#">order now</a>
                            </div>
                            <img src="images/offers_01.png" alt="poco offer" :class="offerLazy ? 'active' : ''">
                        </div>
                        <div class="col-4">
                            <div class="description" :class="offerLazy ? 'active' : ''">
                                <h3>house</h3>
                                <h2>burgers</h2>
                                <p>new phonomenon <br> burger taste</p>
                                <span>$12.90</span>
                                <a href="#">order now</a>
                            </div>
                            <img src="/images/offers_02.png" alt="poco offer" :class="offerLazy ? 'active' : ''">
                        </div>
                        <div class="col-4">
                            <div class="description" :class="offerLazy ? 'active' : ''">
                                <h3>hot fresh</h3>
                                <h2>salats</h2>
                                <p>new phonomenon <br> burger taste</p>
                                <span>$10.90</span>
                                <a href="#">order now</a>
                            </div>
                            <img src="/images/offers_03.png" alt="poco offer" :class="offerLazy ? 'active' : ''">
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <cart :cartVisibility="cart" @shoppingCart="cartStatus" :cartItems="cartItems" @removedItem="removedItem" :totalCart="totalCart"/>
        <footy />
    </div>
</template>

<script>
    import Heady from './../components/Header';
    import Footy from './../components/Footer';
    import Categories from './../components/Categories';
    import Products from './../components/Products';
    import Testimonials from './../components/Testimonials';
    import Cart from './../components/Cart.vue';

    export default {
        name: 'home-vue',
        components: {
            Heady,
            Footy,
            Products,
            Categories,
            Testimonials,
            Cart
        },
        mounted(){
            console.log('Home mounted');
            this.regenCart();
            this.lazyCat();
            this.lazyOffer();
        },
        data(){
            return {
                cart: false,
                cartItems: [],
                totalCart: 0,
                cartCounter: 0,
                catLazy: false,
                offerLazy: false,
            }
        },
        methods: {
            cartStatus(status){
                this.cart = status;
            },
            removedItem(item_id){
                localStorage.removeItem(item_id);
                this.regenCart();
            },
            regenCart(){
                let items = [];
                for (var i = 0; i < localStorage.length; i++) {
                    let indexItem = localStorage.key(i);
                    items.push(JSON.parse(localStorage.getItem(indexItem)));
                };
                this.cartItems = items;
                this.total();
            },
            total(){
                let total = 0;
                let counter = 0;
                this.cartItems.forEach((item, i) => {
                    let discount = (item.price * item.discount) / 100;
                    total += (item.price - discount) * item.quantity;
                    counter += item.quantity;
                });
                this.totalCart = Math.round(total * 100) / 100;
                this.cartCounter = counter;
            },
            heroImgLoaded(){
                this.$refs.heroImg.style.animation = "heroImgLoaded 1s ease forwards";
                this.$refs.ctaHero.style.animation = "ctaHero 1s ease forwards";
                this.$refs.hero_top_left.style.animation = "heroTopLeft 1s ease forwards";
                this.$refs.hero_top_right.style.animation = "heroTopRight 1s .3s ease forwards";
                this.$refs.hero_middle_top.style.animation = "heroMiddleTop 1s ease forwards";
                this.$refs.hero_middle_bottom.style.animation = "heroMiddleBottom 1s .3s ease forwards";
                this.$refs.hero_bottom_right.style.animation = "heroBottomRight 1s ease forwards";
                this.$refs.priceOffer.style.animation = "priceOffer 1s .5s ease forwards";
            },
            lazyCat(){
                const options = {
                    root: null,
                    rootMargin: "0px",
                    threshold: .5
                };

                let target = document.getElementById('cat-home');
                let observer = new IntersectionObserver(lazyLoadCat, options);

                let self = this;
                function lazyLoadCat(entries, observer) {
                    entries.forEach((entry, i) => {
                        if (entry.isIntersecting == true) {
                            self.catLazy = true;
                            observer.unobserve(target);
                        }
                    });
                };

                observer.observe(target);
            },
            lazyOffer(){
                const options = {
                    root: null,
                    rootMargin: '0px',
                    threshold: .5
                };

                let target = document.getElementById('offers');

                let observer = new IntersectionObserver(lazyOffer, options);

                let self = this;
                function lazyOffer(entries, observer){
                    entries.forEach((entry, i) => {
                        if (entry.isIntersecting == true) {
                            self.offerLazy = true;
                            observer.unobserve(target);
                        }
                    });
                };

                observer.observe(target);
            }
        }
    }
</script>

<style lang="scss">
@keyframes heroImgLoaded {
    0% {
        transform: scale(1.2, .6);
    }
    20% {
        transform: scale(.6, 1.2);
    }
    40% {
        transform: scale(1, .8);
    }
    60% {
        transform: scale(.7, 1.1);
    }
    80% {
        transform: scale(1.05, .95);
    }
    100% {
        transform: scale(1, 1);
    }
}

@keyframes ctaHero {
    0% {
        top: 200px;
        opacity: 0;
    }
    100% {
        top: 0;
        opacity: 1;
    }
}

@keyframes heroTopLeft {
    0% {
        opacity: 0;
        left: -15%;
    }
    100% {
        opacity: 1;
        left: -5%;
    }
}

@keyframes heroTopRight {
    0% {
        opacity: 0;
        right: -20%;
    }
    100% {
        opacity: 1;
        right: -10%;
    }
}

@keyframes heroMiddleBottom {
    0% {
        opacity: 0;
        right: 15%;
        bottom: 18%;
    }
    100% {
        opacity: 1;
        right: 25%;
        bottom: 10%;
    }
}

@keyframes heroBottomRight {
    0% {
        opacity: 0;
        bottom: -5%;
    }
    100% {
        opacity: 1;
        bottom: 5%;
    }
}

@keyframes heroMiddleTop {
    0% {
        opacity: 0;
        left: 50%;
        top: -50%;
    }
    100% {
        opacity: 1;
        left: 50%;
        top: -25%;
    }
}

@keyframes priceOffer {
    0% {
        transform: scale(.7) rotateZ(0);
    }
    25% {
        transform: scale(1.2) rotateZ(15deg);
    }
    50% {
        transform: scale(.9) rotateZ(-15deg);
    }
    75% {
        transform: scale(1.1) rotateZ(10deg);
    }
    100% {
        transform: scale(1) rotateZ(0);
    }
}

.offers {
    .description {
        position: relative;
        opacity: 0;

        &.active {
            animation: lazyOffer 1s ease forwards;
        }
    }

    @keyframes lazyOffer {
        0% {
            opacity: 0;
            top: 80px;
        }
        100% {
            opacity: 1;
            top: 0;
        }
    }
}

</style>
