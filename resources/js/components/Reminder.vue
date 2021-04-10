<template>
    <section class="reminder" :class="active == false ? 'hidden' : ''">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 content">
                        <div class="description">
                            <img :src=" '/' + product.images[0].image " :alt=" product.name ">
                            <div class="details">
                                <div>
                                    <span>You are viewing:
                                        <span class="product-name"> {{ product.name }} </span>
                                    </span>
                                </div>
                                <div>
                                    <pricing :productPricing="product" :sizes="false"/>
                                    <rating :productRating="product"/>
                                </div>
                            </div>
                        </div>
                        <button>
                            add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Pricing from './Pricing';
import Rating from './Rating';

export default {
    name: 'Reminder',
    props: {
        product: Object
    },
    components: {
        Pricing,
        Rating
    },
    mounted(){
        this.visibilityReminder();
    },
    data(){
        return {
            active: false,
            viewportActivation: .3,
        }
    },
    methods: {
        visibilityReminder(){
            let targetHeight = document.body.scrollHeight;

            const self = this;
            window.addEventListener('scroll', function(){
                let userScrollY = window.scrollY;

                if (userScrollY > targetHeight * self.viewportActivation && self.active != true) {
                    self.active = true;

                } else if (userScrollY < targetHeight * self.viewportActivation && self.active != false){
                    self.active = false;
                }
            })
        }
    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';
    @import './../../sass/partials/_common.scss';

    .reminder {
        box-shadow: 0 0 30px 0 rgb(0 0 0 / 10%);
        background-color: $light;
        width: 100%;
        position: fixed;
        z-index: 6;
        bottom: 0;
        right: 0;
        transition: all .5s ease;

        &.hidden {
            bottom: -80px;
        }

        .content {
            @include flex(row, space-between, center);
            padding: 10px 0;

            .description {
                @include flex(row, flex-start, center);

                img {
                    border: 1px solid rgba(0, 0, 0, .1);
                    margin-right: 10px;
                    height: 60px;
                }

                .details {
                    @include flex(column, center, flex-start);

                    .product-name {
                        font-size: 15px;
                        font-weight: 700;
                    }

                    > div:last-of-type {
                        @include flex(row, flex-start, center);

                        .config {
                            .price {
                                position: unset;
                                left: unset;
                                bottom: unset;
                                margin-right: 10px;

                                span {
                                    font-size: 16px;
                                }
                            }
                        }

                        .rating {
                            font-size: 11px;
                        }
                    }
                }
            }

            button {
                @include button ($primary, $dark, $primary, $light);
                text-transform: uppercase;
                font-size: 12px;
                padding: 12px 28px;
                border: none;
            }
        }
    }
</style>
