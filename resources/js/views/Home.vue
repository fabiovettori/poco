<template>
    <div>
        <heady :cartVisibility="cart" @shoppingCart="cartStatus" :cartCounter="cartCounter"/>
        <main class="guest">
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
                                </div>
                                <a class="text-uppercase" name="menus" href="#">Menus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="/images/hero_pizza.png" alt="pizza">
            </section>

            <section class="categories">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <Categories :checkImg="false"/>
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
                    <Testimonials />
                </div>
            </section>

            <section class="offers">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-4">
                            <div class="description">
                                <h3>fast food</h3>
                                <h2>meals</h2>
                                <p>new phonomenon <br> burger taste</p>
                                <span>$19.90</span>
                                <a href="#">order now</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="description">
                                <h3>house</h3>
                                <h2>burgers</h2>
                                <p>new phonomenon <br> burger taste</p>
                                <span>$12.90</span>
                                <a href="#">order now</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="description">
                                <h3>hot fresh</h3>
                                <h2>salats</h2>
                                <p>new phonomenon <br> burger taste</p>
                                <span>$10.90</span>
                                <a href="#">order now</a>
                            </div>
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
        },
        data(){
            return {
                cart: false,
                cartItems: [],
                totalCart: 0,
                cartCounter: 0,
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
            }
        }
    }
</script>
