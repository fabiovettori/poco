<template>
    <div>
        <heady :cartVisibility="cart" @shoppingCart="cartStatus" :cartCounter="cartCounter"/>
        <section class="navigation-bar">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 product-breadcrumbs m-0">
                            <a :href=" route('home') ">home</a>
                            <a href="#"> {{ product.category.name }} </a>
                            <span> {{ product.name }} </span>
                        </div>

                        <switcher :relatedProducts="related" :activeProductId="product.id"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-details">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6 product-images">
                            <div class="row">
                                <div v-for="cover in product.images" class="col-12 image-container">
                                    <div>
                                        <img :src="'/' + cover.image" :alt="product.name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="info">
                                <h1> {{ product.name }} </h1>
                                <p> {{ product.short_description }} </p>
                                <div class="reviews">
                                    <rating :productRating="product" />
                                    <a href="#">(
                                        {{ product.reviews.length }}
                                        <span>customer reviews</span>
                                        )
                                    </a>
                                </div>
                                <div>
                                    <pricing :productPricing="product" :sizes="true" :activeConfig="activeConfig" @config="choosenConfig"/>
                                </div>
                            </div>

                            <div class="cart">
                                <div class="quantity">
                                    <span class="far fa-minus" @click="minus"></span>
                                    <span class="counter"> {{ cartQuantity }} </span>
                                    <span class="far fa-plus" @click="plus"></span>
                                </div>
                                <button @click="addToCart()">
                                    <span class="far fa-shopping-basket"></span>
                                    add to cart
                                </button>
                                <span class="fas fa-heart"></span>
                            </div>

                            <div class="more-info">
                                <p class="category">
                                    Category:
                                    <a href="#"> {{ product.category.name }} </a>
                                </p>
                                <p class="social">
                                    Share:
                                    <a href="#">
                                        <span class="fab fa-facebook"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fab fa-linkedin"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fab fa-google-plus"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fab fa-pinterest-p"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fal fa-envelope"></span>
                                    </a>
                                </p>
                            </div>

                            <ul class="shipping-details">
                                <li>Free global shipping on all orders</li>
                                <li>30 days easy returns if you change your mind</li>
                                <li>Order before noon for same day dispatch</li>
                            </ul>

                            <div class="trust-badges">
                                <h5 class="mb-0">Guaranteed Safe Checkout</h5>
                                <img :src="'/images/badge-gatways.png'" alt="badge gatways">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-nutrition-reviews">
            <div class="container">
                <div class="row">
                    <div class="col-12 choices">
                        <button :class="nutritionVisibility == true ? 'active' : ''" @click="switchReviewsNutrition()">description</button>
                        <button :class="nutritionVisibility == false ? 'active' : ''" @click="switchReviewsNutrition()">reviews ({{ product.reviews.length }})</button>
                    </div>
                </div>
            </div>
            <transition>
                <div class="container nutrition" v-if="nutritionVisibility" :key="'nutrition'">
                    <div class="row">
                        <div class="col-12 description">
                            <p> {{ product.long_description }} </p>
                            <p>
                                <span class="title">Ingredients:</span>
                                <span v-for="(ingredient, index) in product.ingredients">
                                    <span v-if="index < product.ingredients.length - 1"> {{ ingredient.name }},  </span>
                                    <span v-else> {{ ingredient.name }}.  </span>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 nutrition">
                            <div class="title">
                                <h3> {{ product.name }} </h3>
                            </div>
                            <div class="content" v-for="(nutrient, key, index) in product.nutrient" v-if="key != 'product_id'">
                                <h3> {{ nutrient }} </h3>
                                <span> {{ nutrients[index - 1] }} </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 allergles">
                            <div class="title">
                                <h3>allergles</h3>
                            </div>
                            <div class="content" v-for="(ingredient, key) in product.ingredients" v-if="ingredient.allergen != null">
                                <span> {{ ingredient.allergen.name }} </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container reviews" v-else :key="'reviews'">
                    <reviews :reviews="product.reviews"/>
                </div>
            </transition>
        </section>

        <section class="related">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="col-12 title">
                        <h2>related products</h2>
                    </div>
                    <div class="col-12">
                        <dishes :categoryActive="product.category.name" :product="product" :exclusions_id="product.id"/>
                    </div>
                </div>
            </div>
        </section>

        <cart :cartVisibility="cart" @shoppingCart="cartStatus" :cartItems="cartItems" @removedItem="removedItem" :totalCart="totalCart"/>
        <reminder :product="product" :activeConfig="activeConfig" @cart="cartReminder"/>
        <footy />
    </div>
</template>

<script>
    import Heady from './../components/Header';
    import Footy from './../components/Footer';
    import Rating from './../components/Rating.vue';
    import Pricing from './../components/Pricing.vue';
    import Dishes from './../components/Dishes.vue';
    import Switcher from './../components/Switcher.vue';
    import Reviews from './../components/Reviews.vue';
    import Reminder from './../components/Reminder.vue';
    import Cart from './../components/Cart.vue';

    export default {
        name: 'product-vue',
        props: ['product_details', 'related_products', 'product_nutrition'],
        components: {
            Heady,
            Footy,
            Rating,
            Pricing,
            Dishes,
            Switcher,
            Reviews,
            Reminder,
            Cart
        },
        beforeMount(){
            console.log('Product Vue');
            this.product = JSON.parse(this.product_details);
            this.related = JSON.parse(this.related_products);
            this.nutrients = this.product_nutrition.split(',');
            console.log(this.product);
        },
        mounted(){
            this.regenCart();
        },
        data(){
            return {
                cart: false,
                cartItems: [],
                cartCounter: 0,
                totalCart: 0,
                product: {},
                related: [],
                nutrients: [],
                cartQuantity: 1,
                activeConfig: 0,
                nutritionVisibility: true,
            }
        },
        methods: {
            plus(){
                this.cartQuantity += 1;
            },
            minus(){
                if (this.cartQuantity > 1) {
                    this.cartQuantity -= 1;
                }
            },
            switchReviewsNutrition(){
                this.nutritionVisibility =! this.nutritionVisibility;
            },
            cartStatus(status){
                this.cart = status;
            },
            choosenConfig(index) {
                this.activeConfig = index;
            },
            addToCart(){
                let newCart = {
                    'id': this.product.id,
                    'name': this.product.name,
                    'slug': this.product.slug,
                    'price': this.product.configs[this.activeConfig].price,
                    'discount': this.product.configs[this.activeConfig].discount,
                    'cover': this.product.images[0].image,
                    'quantity': this.cartQuantity,
                };
                localStorage.setItem(this.product.id, JSON.stringify(newCart));
                this.regenCart();
                this.cart = true;
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
            cartReminder(){
                if (this.cartQuantity >= 1) {
                    this.cartQuantity++;
                    this.addToCart();
                }
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
