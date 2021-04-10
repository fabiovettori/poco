<template>
    <footer>
        <section class="top-footer">
            <div class="logo">
                <img src=" /images/logo.svg " alt="poco logo">
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
                            <img src=" /images/badge-gatways.png " alt="badge gateways">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </footer>
</template>

<script>
export default {
    name: 'Footy',
    props: {

    },
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';
    
    footer {
        section.top-footer {
            background-color: $dark;
            padding: 100px 0;

            .logo {
                @include flex(row, center, center);
                margin-bottom: 70px;

                img {
                    height: 50px;
                    flex-grow: .04;
                }

                &:before {
                    content: '';
                    border-top: 1px solid rgba(255, 255, 255, .1);
                    margin-top: 25px;
                    height: 24px;
                    flex-grow: .48;

                }

                &:after {
                    content: '';
                    border-top: 1px solid rgba(255, 255, 255, .1);
                    margin-top: 25px;
                    height: 24px;
                    flex-grow: .48;

                }
            }

            h2 {
                font-size: 20px;
                font-weight: 700;
                color: $light;
                margin-bottom: 20px;
            }

            p {
                font-size: 15px;
                line-height: 1.8;
                color: #b0b0b0;

                span {
                    color: $light;
                    font-weight: 700;
                }
            }

            span.phone {
                color: $primary;
                font-size: 18px;
                font-weight: 700;
            }

            .social {
                @include flex(row, center, center);
                span {
                    @include flex(row, center, center);
                    font-size: 14px;
                    background-color: $light;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    transition: all .3s ease;

                    &:hover {
                        cursor: pointer;
                        background-color: $primary;
                    }
                }
            }

            form {
                position: relative;

                input {
                    height: 60px;
                    width: 100%;
                    border: 1px solid rgba(255, 255, 255, .1);
                    background-color: transparent;
                    padding: 0 120px 0 20px;
                    border-radius: 3px;
                    color: $light;

                    &::placeholder {
                        text-transform: capitalize;
                        font-size: 16px;
                        color: rgba(255, 255, 255, .5);
                    }

                    &:focus {
                        outline: none;
                    }
                }
                a {
                    @include button ($primary, $dark, $primary, $light);
                    display: inline-block;
                    text-transform: uppercase;
                    margin-right: 10px;
                    position: absolute;
                    border-radius: 3px;
                    line-height: 46px;
                    height: 46px;
                    padding: 0 15px;
                    right: 0;
                    top: 50%;
                    transform: translateY(-50%);
                }
            }
        }

        section.bottom-footer {
            background-color: $secondary;
            padding: 30px 0;

            p {
                color: $light;

                a {
                    text-decoration: none;
                    color: $primary;

                    &:hover {
                        text-decoration: none;
                    }
                }
            }
        }
    }
</style>
