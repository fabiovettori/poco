<template>
    <div class="finder">
        <span class="fal fa-times-circle" @click="close()"></span>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <input type="text" placeholder="Search products.." v-model="inputSearch" @keyup="newSearch">
                    <ul>
                        <li v-for="product in filteredProducts">
                            <a :href=" route('product', {'slug': product.slug}) ">
                                <img :src=" '/' + product.images[0].image " :alt=" product.name ">
                                <div class="details">
                                    <h3> {{product.name}}  </h3>
                                    <pricing :productPricing="product" :sizes="false" :activeConfig="0"/>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pricing from './Pricing';

export default {
    name: 'Finder',
    components: {
        Pricing,
    },
    mounted(){
        let self = this;
        axios
        .get('http://localhost:8000/api/products/all')
        .then(function(response){
            self.products = response.data.products;
        }).catch(function() {
            console.warn('error');
        });
    },
    data(){
        return {
            inputSearch: '',
            products: [],
            filteredProducts: [],
        }
    },
    methods: {
        newSearch(){
            let self = this;
            if (this.inputSearch != '') {
                this.filteredProducts = this.products.filter(function(item){
                    return item.name.toLowerCase().includes(self.inputSearch.toLowerCase());
                })
            } else if (this.inputSearch == '') {
                this.filteredProducts = [];
            }
        },
        close(){
            this.$emit('status');
            this.inputSearch = '';
        }
    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .finder {
        background-color: $light;
        cursor: default;
        position: fixed;
        z-index: 10;
        height: 100vh;
        width: 100%;
        top: 0;
        left: 0;
        padding: 300px;
        opacity: 1;

        .fa-times-circle {
            position: absolute;
            cursor: pointer;
            font-size: 18px;
            right: 50px;
            top: 50px;
        }

        input {
            background-color: #fbf7e8;
            width: 50%;
            height: 40px;
            border-radius: 5px;
            border: none;
            padding: 5px 20px;

            &:focus {
                outline: none;
            }
        }

        ul {
            background-color: $light;
            box-shadow: 0 5px 30px 0 rgb(0 0 0 / 10%);
            padding: 0 20px;
            margin: auto;
            width: 50%;
            max-height: 350px;
            overflow-y: scroll;

            li {
                border-bottom: 1px solid rgba(0, 0, 0, .1);
                list-style-type: none;

                a {
                    @include flex(row, flex-start, center);
                    margin: 15px 0;

                    &:hover {
                        text-decoration: none;
                    }

                    img {
                        padding: 0;
                        height: 130px;
                    }

                    .details {
                        @include flex(column, center, flex-start);
                        margin-left: 15px;

                        h3 {
                            font-weight: 300px;
                            font-size: 14px;
                            color: $dark;
                        }

                        .config {
                            .price {
                                position: unset;
                                left: unset;
                                bottom: unset;

                                span {
                                    font-size: 14px;
                                    font-weight: 600;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>
