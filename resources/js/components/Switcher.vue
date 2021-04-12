<template>
    <div class="col-6 other-products text-right">
        <a :href=" route('product', {slug: relatedProducts[prevProduct].slug}) " @mouseenter="prevAnimation = true" @mouseleave="prevAnimation = false">
            <span class="fas fa-chevron-left"></span>

            <transition
                tag="div"
                name="fade"
                >
                <div class="preview" v-show="prevAnimation">
                    <img :src="'/' + relatedProducts[prevProduct].images[0].image " :alt=" relatedProducts[nextProduct].name ">
                    <div>
                        <h2> {{ relatedProducts[prevProduct].name }} </h2>
                        <pricing :productPricing="relatedProducts[prevProduct]" :sizes="false" :activeConfig="0"/>
                    </div>
                </div>
            </transition>
        </a>
        <a :href=" route('product', {slug: relatedProducts[nextProduct].slug}) " @mouseenter="nextAnimation = true" @mouseleave="nextAnimation = false">
            <span class="fas fa-chevron-right"></span>

            <transition
                tag="div"
                name="fade"
                >
                <div class="preview" v-show="nextAnimation">
                    <img :src="'/' + relatedProducts[nextProduct].images[0].image " :alt=" relatedProducts[nextProduct].name ">
                    <div>
                        <h2> {{ relatedProducts[nextProduct].name }} </h2>
                        <pricing :productPricing="relatedProducts[nextProduct]" :sizes="false" :activeConfig="0"/>
                    </div>
                </div>
            </transition>
        </a>
    </div>
</template>

<script>
import Pricing from './Pricing.vue';

export default {
    name: 'Switcher',
    props: {
        relatedProducts: Array,
        activeProductId: Number,
    },
    components: {
        Pricing,
    },
    beforeMount(){
        this.activeProductIndex();
    },
    data(){
        return {
            nextProduct: null,
            prevProduct: null,
            nextAnimation: false,
            prevAnimation: false,
        }
    },
    methods: {
        activeProductIndex(){
            this.relatedProducts.forEach((item, i) => {
                if (item.id == this.activeProductId) {
                    this.nextCalc(i);
                    this.prevCalc(i);
                };
            });
        },
        nextCalc(i){
            if (i == this.relatedProducts.length - 1) {
                this.nextProduct = 0;
            } else {
                this.nextProduct = i + 1;
            }
        },
        prevCalc(i){
            if (i == 0) {
                this.prevProduct = this.relatedProducts.length - 1;
            } else {
                this.prevProduct = i - 1;
            }
        },
    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .other-products {
        @include flex(row, flex-end, center);
        position: relative;

        a {
            display: block;
            padding: 30px 0;

            &:first-of-type {
                margin-right: 20px;
            }

            > span {
                @include flex(row, center, center);
                background-color: $primary;
                padding: 20px;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                font-size: 10px;
                color: $dark;

                &:hover {
                    text-decoration: none;
                    background-color: #eeac00;
                }
            }

            .preview {
                @include flex(row, flex-start, center);
                width: 240px;
                height: 80px;
                padding: 2px 15px;
                position: absolute;
                right: 15px;
                bottom: -75px;
                background-color: $light;
                border-radius: 15px;
                box-shadow: 0 0 30px 0 rgb(0 0 0 / 10%);

                img {
                    height: 100%;
                }

                div {
                    h2 {
                        text-align: left;
                        color: $dark;
                        font-size: 14px;
                        font-weight: 700;

                        &:hover {
                            color: $primary;
                            text-decoration: underline;
                        }
                    }
                }

                .config {
                    @include flex(row, flex-start, center);
                    .price {
                        position: unset;
                        left: unset;
                        bottom: unset;

                        span {
                            font-size: 14px;
                            font-weight: 700;

                            &:first-of-type {
                                text-decoration: line-through;
                                color: $lightgray;
                            }

                            &:last-of-type {
                                color: $primary;
                            }
                        }
                    }
                }
            }

            .fade-enter-active  {
                animation: fadeIn .6s ease forwards;
            }

            .fade-leave-active {
                animation: fadeOut .6s ease forwards;
            }

            @keyframes fadeIn {
               from {
                   opacity: 0;
                   bottom: -90px;
               }
               to {
                   opacity: 1;
                   bottom: -75px;
               }
           }

           @keyframes fadeOut {
              from {
                  opacity: 1;
                  bottom: -75px;
              }
              to {
                  opacity: 0;
                  bottom: -90px;
              }
          }
        }
    }
</style>
