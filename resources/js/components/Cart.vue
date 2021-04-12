<template>
    <div class="cart" :class="cartVisibility == false ? 'hidden' : ''">
        <div class="title">
            <h3 class="m-0">shopping cart</h3>
            <div class="closer" @click="cart()">
                <span>close</span>
                <div class="close-cart">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div v-if="cartItems.length != 0" class="order-details">
            <ul class="items">
                <li v-for="item in cartItems">
                    <div class="left-cart-item">
                        <span class="fal fa-times-circle" @click="deleteItem(item.id)"></span>
                        <img :src=" '/' +  item.cover " :alt=" item.name ">
                    </div>
                    <div class="right-cart-item">
                        <a :href=" route('product', {slug: item.slug}) "> {{ item.name }} </a>
                        <div class="pricing">
                            <span> {{ item.quantity }} x </span>
                            <span> ${{ discountPrice(item.price, item.discount) }} </span>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="checkout">
                <div class="summary">
                    <strong>subtotal:</strong>
                    <strong> ${{ totalCart }} </strong>
                </div>
                <div class="actions">
                    <a href="#">checkout</a>
                    <a href="#">view cart</a>
                </div>
            </div>
        </div>
        <div v-else class="cart-warning">
            <span>No products in the cart.</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Cart',
    props: {
        cartVisibility: Boolean,
        cartItems: Array,
        totalCart: Number,
    },
    data(){
        return {
            
        }
    },
    methods: {
        cart(){
            this.$emit('shoppingCart', !this.cartVisibility);
        },
        deleteItem(item_id){
            this.$emit('removedItem', item_id);
        },
        discountPrice(actualPice, discount){
            let discountPrice = (actualPice * discount) / 100;
            let newPrice = actualPice - discountPrice;
            return Math.round(newPrice * 100) / 100;
        },
    }
}
</script>

<style lang="scss" scoped>
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .cart {
        background-color: $light;
        position: fixed;
        z-index: 5;
        top: 0;
        right: 0;
        height: 100vh;
        width: 350px;
        padding: 0 15px 15px;
        transition: all .5s ease;

        &.hidden {
            right: -350px;
        }

        .cart-warning {
            text-align: center;
            padding: 20px 0;

            span {
                font-size: 18px;
                color: $lightgray;
            }
        }

        .title {
            @include flex(row, space-between, center);
            padding: 25px 0;
            border-bottom: 1px solid rgba(0, 0, 0, .1);

            h3, span {
                text-transform: uppercase;
                font-weight: 700;
                color: $dark;
            }

            h3 {
                font-size: 20px;
            }

            span {
                font-size: 13px;
            }

            .closer {
                @include flex(row, space-between, center);
                cursor: pointer;

                .close-cart {
                    @include flex(column, center, center);
                    position: relative;
                    width: 15px;

                    span {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background-color: $dark;
                        display: block;
                        height: 2px;
                        width: 10px;
                        transition: all .3s ease;
                    }

                    span:first-of-type {
                        transform: translate(-50%, -50%) rotate(45deg);
                    }

                    span:last-of-type {
                        transform: translate(-50%, -50%) rotate(-45deg);
                    }

                }

                &:hover .close-cart > span:first-of-type {
                    transform: translate(-50%, -50%) rotate(0deg);
                }

                &:hover .close-cart > span:last-of-type {
                    transform: translate(-50%, -50%) rotate(0deg);
                }
            }
        }

        .order-details {
            @include flex(column, space-between, flex-start);
            height: calc(100% - 75px);

            .items {
                list-style-type: none;
                width: 100%;

                li {
                    @include flex(row, flex-start, center);
                    border-bottom: 1px solid rgba(0, 0, 0, .1);
                    cursor: pointer;
                    padding: 10px 0;

                    .left-cart-item {
                        .fa-times-circle {
                            color: $lightgray;

                            &:hover {
                                color: $primary;
                            }
                        }

                        img {
                            background-color: #f7f4ef;
                            height: 60px;
                            width: 60px;
                            border-radius: 40%;
                            margin-right: 5px;
                            height: 60px;
                        }
                        span {
                            margin-right: 5px;
                            font-size: 14px;
                            line-height: 14px;
                        }
                    }

                    .right-cart-item {
                        @include flex(column, center, flex-start);
                        margin-left: 5px;

                        a {
                            color: $dark;

                            &:hover {
                                color: $primary;
                            }
                        }

                        .pricing {
                            span:last-of-type {
                                color: $primary;
                            }
                        }
                    }
                }
            }

            .checkout {
                border-top: 1px solid rgba(0, 0, 0, .1);
                width: 100%;

                .summary {
                    @include flex(row, space-between, center);

                    strong {
                        text-transform: uppercase;
                        display: block;
                        padding: 20px 0;
                        font-weight: 700;
                        font-size: 18px;
                    }
                }

                .actions {
                    a {
                        text-transform: uppercase;
                        text-align: center;
                        display: block;

                        &:first-of-type {
                            @include button ($primary, $dark, #eeac00, $light);
                            margin-right: 0;
                            margin-bottom: 15px;
                            padding: 15px 30px;
                        }

                        &:last-of-type {
                            @include button ($light, $dark, $light, $primary);
                            border: 1px solid $dark;
                            margin-right: 0;
                            padding: 15px 30px;

                            &:hover {
                                border: 1px solid $primary;
                            }
                        }
                        padding: 10px 30px;
                        margin: 0;
                    }
                }
            }
        }
    }
</style>
