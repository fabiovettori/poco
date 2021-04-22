<template>
    <ul class="list-unstyled">
        <li class="cat-restaurant" v-for="(category, index) in categories" :class="lazy ? 'active' : ''">
            <img :src="category.cover" :alt="category.name">
            <span> {{ category.name }} </span>
        </li>
    </ul>
</template>

<script>
    export default {
        name: 'Categories',
        props: {
            lazy: Boolean,
        },
        mounted() {
            this.categoriesMenu();
        },
        data(){
            return {
                categories: [],
            }
        },
        methods: {
            categoriesMenu(){
                const self = this;
                axios
                .get('http://localhost:8000/api/categories')
                .then(function(response){
                    self.categories = response.data.categories;
                })
                .catch(function() {
                    console.warn('error');
                })
            },
        }
    }
</script>

<style lang="scss">
    .categories {
        .cat-restaurant {
            opacity: 0;
            position: relative;

            @for $i from 1 through 8 {
                &.active:nth-of-type(#{$i}) {
                    animation: lazyCat .3s ease $i*.1 + s forwards;
                }
            }
        }
    }

    @keyframes lazyCat {
        0% {
            opacity: 0;
            top: 80px;
        }
        100% {
            opacity: 1;
            top: 0;
        }
    }
</style>
