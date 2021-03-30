<template>
    <ul class="list-unstyled">
        <li v-for="(category, index) in categories">
            <img :src="category.cover" :alt="category.name">
            <span> {{ category.name }} </span>
        </li>
    </ul>
</template>

<script>
    export default {
        name: 'Categories',
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
