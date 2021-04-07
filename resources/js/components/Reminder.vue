<template>
    <div class="row">
        <div class="col-12 reminder-conainer">

        </div>
    </div>
</template>

<script>
export default {
    name: 'Reminder',
    props: {
        product: Object
    },
    data(){
        return {

        }
    },
    methods: {

    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .reminder-conainer {
        box-shadow: 0 0 30px 0 rgb(0 0 0 / 10%);
        background-color: $light;
        height: 80px;
        width: 100%;
    }
</style>
