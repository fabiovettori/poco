<template>
    <div class="config">
        <div class="price">
            <span class="mr-2"> ${{ beforePrice(configs[activeConfig].price, configs[activeConfig].discount) }} </span>
            <span> ${{ configs[activeConfig].price }} </span>
        </div>
        <div class="sizes" v-show="sizes">
            <span>sizes:</span>
            <span v-for="(config, index) in configs" @click="changeConfig(index)"> {{ config.size }} </span>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Pricing',
        props: {
            productPricing: Object,
            sizes: Boolean,
        },
        beforeMount(){
            this.beforePrice();
            this.productConfigs();
        },
        data(){
            return {
                configs: [],
                activeConfig: 0,
            }
        },
        methods: {
            productConfigs(){
                for (var i = 0; i < this.productPricing.configs.length; i++) {
                    this.configs.push(this.productPricing.configs[i]);
                }
            },
            changeConfig(index){
                this.activeConfig = index;
            },
            beforePrice(actualPice, discount){
                let beforePrice = actualPice / ((100 - discount)/100);
                return Math.round(beforePrice * 100) / 100;
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

            span:last-of-type {
                @include flex(row, center, center);
                font-size: 15px;
                height: 40px;
                width: 40px;
                border-radius: 50%;
                background-color: $primary;

                &:hover {
                    cursor: pointer;
                    background-color: #eeac00;
                }
            }
        }
    }
</style>
