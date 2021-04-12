<template>
    <div class="row">
        <!-- <div class="col-12">
            <ul class="list-unstyled">
                <li class="text-uppercase" v-for="(category, index) in categoriesMenu" :class="index == categoryIndex ? 'active' : ''" @click="products(index)">
                    <span> {{ category.name }} </span>
                </li>
            </ul>
        </div> -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 dishes">
                    <a v-for="(product, index) in filteredProducts" :href="route('product', {slug: product.slug})" class="tile" v-if="product.id != exclusions_id">
                        <div class="wishlist">
                            <span class="fas fa-heart"></span>
                        </div>
                        <div class="cover">
                            <img :src="'/' + product.images[0].image" :alt="product.name">
                            <div class="overlay"></div>
                        </div>
                        <!-- <div class="rating">
                            <span v-for="i in 5" class="fa-star" :class="i <= stars(index) ? 'fas' : 'fal'"></span>
                        </div> -->
                        <rating :productRating="product"/>
                        <div class="details">
                            <h2> {{ product.name }} </h2>
                            <p> {{ product.short_description }} </p>
                            <!-- <div class="price">
                                <span class="mr-2"> ${{ beforePrice(product.configs[0].price, product.configs[0].discount) }} </span>
                                <span> ${{ product.configs[0].price }} </span>
                            </div> -->
                            <pricing :productPricing="product" :sizes="false" :activeConfig="0"/>
                        </div>
                        <div class="cart">
                            <!-- cart image -->
                        </div>
                    </a>
                    <img src="/images/bg-dishes-pizza.png" alt="pizza">
                    <img src="/images/bg-dishes-meat.png" alt="meat">
                    <img src="/images/bg-dishes-pepper.png" alt="pepper">
                </div>
            </div>
        </div>
        <!-- <div class="col-12 text-center">
            <a class="text-uppercase" name="shop" :href="route('shop')">all products</a>
        </div> -->
    </div>
</template>

<script>
    import Rating from './Rating.vue';
    import Pricing from './Pricing.vue';

    export default {
        name: 'Dishes',
        props: ['product', 'categoryActive', 'exclusions_id'],
        components: {
            Pricing,
            Rating,
        },
        mounted() {
            // this.categories();
            this.products();
        },
        data(){
            return {
                // categoriesMenu: [],
                // categoryActive: null,
                // categoryIndex: 0,
                filteredProducts: [],
            }
        },
        methods: {
            // categories(){
            //     const self = this;
            //     axios
            //     .get('http://localhost:8000/api/categories')
            //     .then(function(response){
            //         self.categoriesMenu = response.data.categories;
            //         self.products(0);
            //     })
            //     .catch(function() {
            //         console.warn('error');
            //     })
            // },
            products(index){
                // this.categoryIndex = index;
                // this.categoryActive = this.categoriesMenu[index].name;

                const self = this;
                axios
                .get('http://localhost:8000/api/products', {
                    params: {
                        category: self.categoryActive
                    }
                })
                .then(function(response){
                    self.filteredProducts = response.data.products;
                    console.log(self.filteredProducts);
                })
                .catch(function() {
                    console.warn('error');
                })
            },
            // beforePrice(actualPice, discount){
            //     let beforePrice = actualPice / ((100 - discount)/100);
            //     return Math.round(beforePrice * 100) / 100;
            // },
            // stars(index){
            //     let sumScores = 0;
            //     for (var i = 0; i < this.filteredProducts[index].reviews.length; i++) {
            //         sumScores += this.filteredProducts[index].reviews[i].score;
            //     };
            //
            //     let avgScore;
            //     if (sumScores == 0 || this.filteredProducts[index].reviews.length == 0) {
            //         return 0;
            //     } else {
            //         avgScore = sumScores / (this.filteredProducts[index].reviews.length);
            //         return avgScore;
            //     }
            // }
        }
    }
</script>

<style lang="scss" scoped>
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .dishes {
        @include flex(row, flex-start, center);
        flex-wrap: wrap;
        position: relative;
        padding-bottom: 50px;

        img[alt="pizza"]{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        img[alt="meat"]{
            position: absolute;
            top: 0%;
            left: 0%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        img[alt="pepper"]{
            position: absolute;
            bottom: 0%;
            right: 0%;
            z-index: -1;
        }

        .tile {
            width: calc((100% / 4) - 30px);
            margin: 0 15px;
            border: 1px solid #e5e5e5;
            border-radius: 30px;
            padding: 10px;
            background: $light;
            height: 470px;
            padding: 20px 30px;
            position: relative;

            &:hover {
                text-decoration: none;
            }

            &:hover {
                cursor: pointer;
            }

            .wishlist {
                position: absolute;
                color: #dfdfdf;
                top: 20px;
                right: 20px;
                font-size: 21px;
                z-index: 3;

                &:hover {
                    cursor: pointer;
                    color: $dark;
                }
            }

            .cover {
                position: relative;
                margin-bottom: 10px;

                .overlay {
                    position: absolute;
                    z-index: 1;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    height: 50%;
                    border-radius: 20px;
                    background-color: $primary;
                    transition: all .3s ease;
                    opacity: .2;
                }

                img {
                    position: relative;
                    z-index: 2;
                    width: 100%;
                    transition: all .3s ease;
                }
            }

            &:hover .overlay {
                height: 100%;
                opacity: 1;
            }

            &:hover .cover img {
                transform: scale(1.2);
            }

            .rating {
                span {
                    color: $primary;
                }
            }

            .details {
                h2 {
                    font-size: 18px;
                    font-weight: 700;
                    color: $dark;
                }

                p {
                    font-size: 14px;
                    font-weight: 400;
                    color: $darkgray;
                    line-height: 1.5;
                    margin-bottom: 30px;
                }

                div.price {
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
            }
            .cart {
                @include flex(row, center, center);
                position: absolute;
                bottom: 20px;
                right: 20px;
                width: 40px;
                height: 40px;
                background-color: $primary;
                border-radius: 10px;
                background-image: url('/../images/cart.svg');
                background-size: 60%;
                background-repeat: no-repeat;
                background-position: center;

                &:hover {
                    background-image: url('/../images/cart.png');
                    background-color: #eeac00;
                }
            }
        }
    }

</style>
