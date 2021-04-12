<template>
    <div class="config">
        <div class="price">
            <span class="mr-2"> ${{ configs[activeConfig].price }} </span>
            <span> ${{ discountPrice(configs[activeConfig].price, configs[activeConfig].discount) }} </span>
        </div>
        <div class="sizes" v-show="sizes">
            <span>sizes:</span>
            <span class="types" :class="index == activeConfig ? 'active' : ''" v-for="(config, index) in configs" @click="changeConfig(index)"> {{ config.size }} </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Pricing',
        props: {
            productPricing: Object,
            sizes: Boolean,
            activeConfig: Number,
        },
        beforeMount(){
            this.discountPrice();
            this.productConfigs();
        },
        data(){
            return {
                configs: [],
            }
        },
        methods: {
            productConfigs(){
                for (var i = 0; i < this.productPricing.configs.length; i++) {
                    this.configs.push(this.productPricing.configs[i]);
                }
            },
            changeConfig(index){
                this.$emit('config', index);
            },
            discountPrice(actualPice, discount){
                let discountPrice = (actualPice * discount) / 100;
                let newPrice = actualPice - discountPrice;
                return Math.round(newPrice * 100) / 100;
            },
        }
    }
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .config {
        @include flex(row, flex-start, center);
        .price {
            position: absolute;
            left: 30px;
            bottom: 25px;

            span {
                font-size: 20px;
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
        .sizes {
            @include flex(row, flex-start, flex-end);
            flex-basis: 30%;

            span:first-of-type {
                margin-right: 10px;
                color: $lightgray;
            }

            span.types {
                @include flex(row, center, center);
                font-size: 15px;
                height: 40px;
                width: 40px;
                border-radius: 50%;
                margin-right: 5px;

                &.active {
                    background-color: $primary;
                }

                &:hover {
                    cursor: pointer;
                    background-color: #eeac00;
                }
            }
        }
    }
</style>
