<template>
    <div class="account">
        <div>
            <span>Sign in</span>
            <a href="#">Create an Account</a>
        </div>

        <div>
            <label for="username">Username or email</label>
            <input type="text" name="username" placeholder="username">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="text" name="password" placeholder="password">
        </div>

        <a href="#">login</a>

        <a href="#">Lost your password?</a>
    </div>
</template>

<script>
export default {
    name: 'Account',
    data(){
        return {

        }
    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .account {
        background-color: $light;
        border: 1px solid rgba(0, 0, 0, .1);
        border-top: 2px solid $primary;
        padding: 40px 20px;
        width: 320px;
        height: 380px;
        position: absolute;
        z-index: 5;
        right: 0;
        top: 55px;
        display: none;
        cursor: default;

        &:hover {
            display: block;
        }

        div {
            margin-bottom: 15px;
        }

        > a {
            &:first-of-type {
                @include button($primary, $dark, $primary, $light);
                text-transform: uppercase;
                text-align: center;
                padding: 15px 40px;
                margin: 0;
                margin-bottom: 30px;
                display: block;
            }

            &:last-of-type {
                font-size: 14px;
                font-weight: 300;
                color: $primary;
            }
        }

        input {
            border: 1px solid rgba(0, 0, 0, .1);
            border-radius: 5px;
            padding: 5px 10px;
            height: 50px;
            width: 100%;

            &:focus {
                outline: none;
            }

            &::placeholder {
                text-transform: capitalize;
            }
        }

        label {
            display: block;
            font-weight: 300;
            color: $lightgray;
        }

        div:first-of-type {
            span {
                margin-right: 5px;
                font-size: 18px;
                font-weight: 500;
                color: $dark;
            }

            a {
                font-size: 14px;
                font-weight: 300;
                color: $primary;
            }
        }
    }
</style>
