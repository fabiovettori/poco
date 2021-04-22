<template>
    <div>
        <heady :cartVisibility="cart" @shoppingCart="cartStatus" :cartCounter="cartCounter"/>
        <main>
            <section class="navigation-bar">
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 product-breadcrumbs m-0">
                                <a :href=" route('home') ">home</a>
                                <span> Cart </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- <cart :cartVisibility="cart" @shoppingCart="cartStatus" :cartItems="cartItems" @removedItem="removedItem" :totalCart="totalCart"/> -->
        <footy />
    </div>
</template>

<script>
    import Heady from './../components/Header';
    import Footy from './../components/Footer';
    import Cart from './../components/Cart.vue';

    export default {
    name: 'ShoppingCart',
    components: {
        Heady,
        Footy,
        Cart,
    },
    props: {

    },
    mounted(){
        console.log('Shopping Cart mounted');
        this.regenCart();
    },
    data(){
        return {
            cart: false,
            cartItems: [],
            totalCart: 0,
            cartCounter: 0,
        }
    },
    methods: {
        cartStatus(status){
            this.cart = status;
        },
        regenCart(){
            let items = [];
            for (var i = 0; i < localStorage.length; i++) {
                let indexItem = localStorage.key(i);
                items.push(JSON.parse(localStorage.getItem(indexItem)));
            };
            this.cartItems = items;
            this.total();
        },
        total(){
            let total = 0;
            let counter = 0;
            this.cartItems.forEach((item, i) => {
                let discount = (item.price * item.discount) / 100;
                total += (item.price - discount) * item.quantity;
                counter += item.quantity;
            });
            this.totalCart = Math.round(total * 100) / 100;
            this.cartCounter = counter;
        },
    },
}
</script>

<style lang="scss">

</style>
