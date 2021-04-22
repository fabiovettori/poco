<template>
    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col header">
                    <img src="/images/logo.svg" alt="poco logo">
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <section class="shipping-details">
                        <h2 class="title">1. shipping details</h2>
                        <div class="details">
                            <input type="email" name="email" placeholder="email address">
                            <input type="text" name="first_name" placeholder="first name">
                            <input type="text" name="last_name" placeholder="last name">
                            <input type="text" name="address" placeholder="address">
                            <input type="text" name="zip_code" placeholder="zip code">
                            <input type="text" name="city" placeholder="city">
                            <select name="country">
                                <option v-for="(country, index) in countries" value=index> {{ country }} </option>
                            </select>
                        </div>
                        <div class="news">
                            <input type="checkbox" name="news" checked value="">
                            <span>Sign up for exclusive offers and news</span>
                        </div>
                    </section>

                    <section class="shipping-options">
                        <h2 class="title">2. shipping options</h2>

                        <div v-for="(option, index) in shippingOptions" class="option-type">
                            <div>
                                <input type="radio" name="shipping-options" value="" :checked="index == shippingOptionActive ? 'checked' : ''" @click="shippingOptionActive = index">
                                <span> {{ option.name }} </span>
                            </div>
                            <span> {{ index != 0 ? '$' + currency(option.price) : 'Free' }} </span>
                        </div>
                    </section>

                    <section class="billing-details">
                        <h2 class="title">3. billing details</h2>
                        <div>
                            <input type="checkbox" name="news" @change="billingVisibility = !billingVisibility" checked value="">
                            <span>billing address is the same as shipping</span>
                        </div>
                        <transition
                            tag="div"
                            name="billing">
                            <div class="details" v-if="billingVisibility">
                                <input type="email" name="email" placeholder="email address">
                                <input type="text" name="first_name" placeholder="first name">
                                <input type="text" name="last_name" placeholder="last name">
                                <input type="text" name="address" placeholder="address">
                                <input type="text" name="zip_code" placeholder="zip code">
                                <input type="text" name="city" placeholder="city">
                                <select name="country">
                                    <option v-for="(country, index) in countries" value=index> {{ country }} </option>
                                </select>
                            </div>
                        </transition>
                    </section>
                </div>
                <div class="col-4">
                    <section class="order-summery">
                        <h2 class="title">4. order summery</h2>
                        <div class="details">
                            <div class="subtotal">
                                <span>subtotal</span>
                                <span> ${{ currency(subTotalCart) }} </span>
                            </div>
                            <div class="payment-method">
                                <span> {{ shippingOptions[shippingOptionActive].name }} </span>
                                <span> {{ shippingOptionActive != 0 ? '$' + currency(shippingOptions[shippingOptionActive].price) : 'Free'}} </span>
                            </div>
                            <div class="vat">
                                <span>vat</span>
                                <span> ${{ currency(vat) }} </span>
                            </div>
                            <div class="total">
                                <span>total</span>
                                <span> ${{ currency(total) }} </span>
                            </div>
                            <div class="coupon">
                                <input type="text" placeholder="discount code">
                                <button>apply</button>
                            </div>
                        </div>
                    </section>

                    <section class="payment-method">
                        <h2 class="title">5. payment method</h2>
                        <div class="details">
                            <div class="method" v-for="(method, index) in paymentMethods">
                                <div>
                                    <input type="radio" name="payment-method" :value=" method.name ">
                                    <span> {{ method.name }} </span>
                                </div>
                                <img :src=" method.logo " :alt=" method.name ">
                            </div>
                            <button>complete purchase</button>
                        </div>
                    </section>
                </div>
            </div>

            <img src="/images/bg-dishes-pizza.png" alt="pizza">
            <img src="/images/bg-dishes-meat.png" alt="meat">
            <img src="/images/bg-dishes-pepper.png" alt="pepper">
        </div>
    </section>
</template>

<script>

    export default {
    name: 'Checkout',
    mounted(){
        console.log('Chechout mounted');
        this.regenCart();
    },
    data(){
        return {
            countries: ['Italy', 'Grain Bretain', 'Germany', 'France', 'United States'],
            billingVisibility: false,
            paymentMethod: 0,
            vat: 10,
            shippingOptionActive: 0,
            shippingOptions:
            [
                {
                    name: 'Free Shipping',
                    price: 0
                },
                {
                    name: 'International Shipping',
                    price: 10
                }
            ],
            paymentMethods:
            [
                {
                    name: 'credit card',
                    logo: '/images/credit_card.png'
                },
                {
                    name: 'paypal',
                    logo: '/images/paypal.png'
                }
            ],
            cartItems: [],
            cartCounter: 0,
            subTotalCart: 0,
        }
    },
    computed: {
        total(){
            let total;
            if (this.shippingOptionActive != 0) {
                total = this.vat + this.shippingOptions[this.shippingOptionActive].price + this.subTotalCart;
            } else {
                total = this.vat + this.subTotalCart;
            }

            return Math.round(total * 100) / 100;
        }
    },
    methods: {
        regenCart(){
            let items = [];
            for (var i = 0; i < localStorage.length; i++) {
                let indexItem = localStorage.key(i);
                items.push(JSON.parse(localStorage.getItem(indexItem)));
            };
            this.cartItems = items;
            this.subTotal();
        },
        subTotal(){
            let subTotal = 0;
            let counter = 0;
            this.cartItems.forEach((item, i) => {
                let discount = (item.price * item.discount) / 100;
                subTotal += (item.price - discount) * item.quantity;
                counter += item.quantity;
            });
            this.subTotalCart = Math.round(subTotal * 100) / 100;
            this.cartCounter = counter;
        },
        currency(number){
            return Number.parseFloat(number).toFixed(2);
        },
    },
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    section.checkout {
        padding: 30px 0;

        .container {
            position: relative;

            input[type="checkbox"], input[type="radio"] {
                width: 16px;
                height: 16px;
            }

            img[alt="meat"] {
                position: absolute;
                z-index: -1;
                height: 100px;
                top: 0;
                left: 0;
                transform: translate(-50%, 50%);
            }

            img[alt="pizza"] {
                position: absolute;
                z-index: -1;
                height: 100px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, 50%);
            }

            img[alt="pepper"] {
                position: absolute;
                z-index: -1;
                height: 100px;
                bottom: 0;
                right: 0;
                transform: translate(-50%, -50%);
            }
        }

        h2 {
            text-transform: capitalize;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 700;
        }

        .header {
            @include flex(row, space-between, center);
            margin-bottom: 30px;

            img {
                height: 50px;
            }
        }

        .shipping-details, .billing-details {
            margin-bottom: 30px;

            .details {
                @include flex(row, space-between, center);
                flex-wrap: wrap;
                background-color: $light;
                box-shadow: 0 5px 20px 0 rgb(0 0 0 / 10%);
                padding: 20px;

                input, select {
                    border: 1px solid rgba(0, 0, 0, .1);
                    padding: 0 10px;
                    border-radius: 5px;
                    height: 50px;

                    &::placeholder {
                        text-transform: capitalize;
                    }
                }

                input {
                    margin-bottom: 10px;
                }

                input[type="checkbox"] {
                    height: unset;
                    margin-bottom: 0;
                }

                select {
                    option {
                        text-transform: capitalize;
                        padding: 20px 0;
                    }
                }

                input[name="email"], input[name="address"], select[name="country"] {
                    width: 100%;
                }

                input[name="first_name"], input[name="last_name"], input[name="zip_code"], , input[name="city"] {
                    width: calc(50% - 5px);
                }
            }

            .news {
                @include flex(row, flex-start, center);
                height: 60px;

                span {
                    margin-left: 10px;
                }
            }
        }

        .shipping-options {
            margin-bottom: 30px;

            > div {
                @include flex(row, flex-start, center);
                box-shadow: 0 5px 20px 0 rgb(0 0 0 / 10%);
                padding: 0 20px;
                background-color: $light;
                height: 60px;

                &:first-of-type {
                    border-bottom: 1px solid rgba(0, 0, 0, .1);
                }

                span {
                    text-transform: capitalize;
                    margin-left: 10px;
                }
            }

            .option-type {
                @include flex(row, space-between, center);

                &:first-of-type {
                    > span:first-of-type {
                        font-weight: 700;
                        color: $secondary;
                    }
                }
            }
        }

        .billing-details {
            margin-bottom: 30px;

            > div:first-of-type {
                @include flex(row, flex-start, center);
                box-shadow: 0 5px 20px 0 rgb(0 0 0 / 10%);
                padding: 0 20px;
                background-color: $light;
                height: 60px;

                span {
                    text-transform: capitalize;
                    margin-left: 10px;
                }
            }

            .details {
                overflow: hidden;
            }

            .billing-enter, .billing-leave-to {
                height: 0;
            }

            .billing-enter-to, .billing-leave {
                height: 330px;
            }

            .billing-enter-active, .billing-leave-active {
                transition: all .3s linear;
            }
        }

        .order-summery {
            margin-bottom: 30px;

            .details {
                box-shadow: 0 5px 20px 0 rgb(0 0 0 / 10%);
                background-color: $light;
                padding: 20px;

                .coupon {
                    @include flex(row, space-between, center);
                }
            }

            .subtotal, .payment-method, .vat, .total, .coupon {
                @include flex(row, space-between, center);
                margin-bottom: 5px;

                span {
                    text-transform: capitalize;
                }
            }

            .total {
                span {
                    font-weight: 700;
                }
            }

            .coupon {
                @include flex(row, space-between, center);
                margin-top: 20px;

                input {
                    border: 1px solid rgba(0, 0, 0, .1);
                    padding: 0 10px;
                    border-radius: 5px;
                    height: 50px;
                    width: calc(70% - 5px);

                    &::placeholder {
                        text-transform: capitalize;
                    }
                }

                button {
                    @include button ($lightgray, $light, $darkgray, $light);
                    text-transform: uppercase;
                    padding: 0;
                    margin: 0;
                    border: none;
                    height: 50px;
                    width: calc(30% - 5px);
                }
            }
        }

        .payment-method {
            .details {
                box-shadow: 0 5px 20px 0 rgb(0 0 0 / 10%);
                background-color: $light;
                padding: 20px;

                .method {
                    @include flex(row, space-between, center);
                    margin-bottom: 20px;

                    > div {
                        @include flex(row, flex-start, center);
                    }

                    img {
                        max-width: 130px;
                    }

                    span {
                        text-transform: capitalize;
                        margin-left: 10px;
                    }
                }

                button {
                    @include button ($secondary, $light, #039244, $light);
                    text-transform: uppercase;
                    margin: 0;
                    width: 100%;
                    border: none;
                }
            }
        }
    }
</style>
