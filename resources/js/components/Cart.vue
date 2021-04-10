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
    </div>
</template>

<script>
export default {
    name: 'Cart',
    props: {
        cartVisibility: Boolean,
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
    }
</style>
