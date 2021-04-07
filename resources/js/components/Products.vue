<template>
    <div class="row">
        <div class="col-12">
            <ul class="list-unstyled">
                <li class="text-uppercase" v-for="(category, index) in categoriesMenu" :class="index == categoryIndex ? 'active' : ''" @click="products(index)">
                    <span> {{ category.name }} </span>
                </li>
            </ul>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-12 dishes">
                    <a :href="route('product', {slug: product.slug})" class="tile" v-for="(product, index) in filteredProducts">
                        <div class="wishlist">
                            <span class="fas fa-heart"></span>
                        </div>
                        <div class="cover">
                            <img :src="product.images[0].image" :alt="product.name">
                            <div class="overlay"></div>
                        </div>
                        <div class="rating">
                            <span v-for="i in 5" class="fa-star" :class="i <= stars(index) ? 'fas' : 'fal'"></span>
                        </div>
                        <div class="details">
                            <h2> {{ product.name }} </h2>
                            <p> {{ product.short_description }} </p>
                            <div class="price">
                                <span class="mr-2"> ${{ beforePrice(product.configs[0].price, product.configs[0].discount) }} </span>
                                <span> ${{ product.configs[0].price }} </span>
                            </div>
                        </div>
                        <div class="cart">
                            <!-- cart image -->
                        </div>
                    </a>
                    <img src="images/bg-dishes-pizza.png" alt="pizza">
                    <img src="images/bg-dishes-meat.png" alt="meat">
                    <img src="images/bg-dishes-pepper.png" alt="pepper">
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <a class="text-uppercase" name="shop" :href="route('shop')">all products</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Products',
        mounted() {
            this.categories();
        },
        data(){
            return {
                categoriesMenu: [],
                categoryActive: null,
                categoryIndex: 0,
                filteredProducts: [],
            }
        },
        methods: {
            categories(){
                const self = this;
                axios
                .get('http://localhost:8000/api/categories')
                .then(function(response){
                    self.categoriesMenu = response.data.categories;
                    self.products(0);
                })
                .catch(function() {
                    console.warn('error');
                })
            },
            products(index){
                this.categoryIndex = index;
                this.categoryActive = this.categoriesMenu[index].name;

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
            beforePrice(actualPice, discount){
                let beforePrice = actualPice / ((100 - discount)/100);
                return Math.round(beforePrice * 100) / 100;
            },
            stars(index){
                let sumScores = 0;
                for (var i = 0; i < this.filteredProducts[index].reviews.length; i++) {
                    sumScores += this.filteredProducts[index].reviews[i].score;
                };

                let avgScore;
                if (sumScores == 0 || this.filteredProducts[index].reviews.length == 0) {
                    return 0;
                } else {
                    avgScore = sumScores / (this.filteredProducts[index].reviews.length);
                    return avgScore;
                }
            }
        }
    }
</script>
