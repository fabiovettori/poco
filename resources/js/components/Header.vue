<template>
    <header class="guest">
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
                            <a :href=" route('home') " class="logo">
                                <img src=" /images/logo.svg " alt="poco logo">
                            </a>
                            <ul class="list-unstyled d-flex justify-content-between align-items-center m-0">
                                <li>
                                    <a :class=" route().current() == 'home' ? 'active' : '' " :href=" route('home') ">Home</a>
                                </li>
                                <li>
                                    <a :class=" route().current() == 'shop' ? 'menu' : '' " href="#">Menu</a>
                                </li>
                                <li>
                                    <a :class=" route().current() == 'about' ? 'active' : '' " href="#">About</a>
                                </li>
                                <li>
                                    <a :class=" route().current() == 'shop' ? 'active' : '' " :href=" route('shop') ">Shop</a>
                                </li>
                                <li>
                                    <a :class=" route().current() == 'blog' ? 'active' : '' " href="#">Blog</a>
                                </li>
                                <li>
                                    <a :class=" route().current() == 'contact' ? 'active' : '' " href="#">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-3 contacts d-flex">
                            <img src=" /images/scooter.svg " alt="scooter">
                            <div>
                                <span>Call and Order in</span>
                                <span>+1718-904-4450</span>
                            </div>
                        </div>

                        <div class="col-2 icons">
                            <span class="fas fa-search"></span>
                            <span class="fas fa-user"></span>
                            <span class="fas fa-heart"></span>
                            <img src=" /images/cart.svg " alt="shopping cart" @click="cart()">
                            <span class="counter"> {{ cartCounter }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Heady',
    props: {
        cartVisibility: Boolean,
        cartCounter: Number,
    },
    data(){
        return {

        }
    },
    methods: {
        cart(){
            this.$emit('shoppingCart', !this.cartVisibility);
        }
    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    header.guest > section:first-of-type {
        background-color: $dark;
        padding: 5px 0;
        color: $light;

        .social {
            span {
                transition: all .1s ease;

                &:hover {
                    color: $primary;
                    cursor: pointer;
                }
            }
        }
    }

    header.guest > nav {
        padding: 30px 0;

        .links {
            @include flex(row, flex-start, center);
            padding-right: 30px;

            .logo {
                @include flex(row, flex-start, center);
                flex-basis: 1;

                img {
                    max-height: 40px;
                    width: 120px;
                    margin-right: 50px;
                }
            }
            ul {
                flex-grow: 1;
                flex-basis: .9;
                li {
                    a {
                        color: $dark;
                        text-decoration: none;
                        font-weight: 700;
                        font-size: 16px;

                        &.active {
                            color: $primary;
                        }
                    }
                }
            }
        }
        .contacts {
            @include flex(row, center, center);

            img {
                filter: invert(37%) sepia(78%) saturate(653%) hue-rotate(100deg) brightness(99%) contrast(94%);
                max-height: 40px;
            }
            > div {
                @include flex(column, center, flex-start);
                padding-left: 10px;

                span:first-of-type {
                    color: #999999;
                    font-size: 13px;
                }

                span:last-of-type {
                    color: $primary;
                    font-size: 24px;
                    font-weight: bold;
                }
            }
        }

        .icons {
            @include flex(row, space-between, center);
            position: relative;

            span, img {
                display: block;
                width: 38px;
                height: 38px;
                padding: 5px;
                border-radius: 50%;
                border: 1px solid #e5e5e5;
                transition: all .1s ease;

                &:hover {
                    background-color: $primary;
                    cursor: pointer;
                }
            }
            span {
                @include flex(row, center, center);
                font-size: 14px;
            } img {
                padding: 8px
            }

            .counter {
                @include flex(row, center, center);
                border: 1px solid $light;
                position: absolute;
                font-size: 10px;
                right: 8px;
                top: 8px;
                width: 18px;
                height: 18px;
                border-radius: 50%;
                background-color: $primary;
                color: $dark;
            }
        }
    }
</style>
