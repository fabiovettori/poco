<template>
    <div class="row">
        <div class="col-12 tiles-container">
            <div class="tile" v-for="review in reviews">
                <div class="avatar">
                    <img :src="'/' + review.customer.avatar" alt="avatar">
                </div>
                <div class="details">
                    <div class="rating">
                        <span v-for="i in 5" class="fa-star" :class="i <= review.score ? 'fas full' : 'fal'"></span>
                    </div>
                    <strong> {{ review.customer.name }} </strong>
                    <span class="fas fa-clock"></span>
                    <span> {{ date(review.customer.created_at, 'MMMM D, YYYY') }} </span>
                    <p> {{ review.description }} </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import dayjs from 'dayjs';

export default {
    name: 'Reviews',
    props: {
        reviews: Array,
    },
    data(){
        return {

        }
    },
    methods: {
        date(date, format){
            return dayjs(date).format(format);
        }
    }
}
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';
    @import './../../sass/partials/_mixin.scss';

    .tiles-container {
        @include flex(row, flex-start, flex-start);
        flex-wrap: wrap;

        .tile {
            @include flex(row, flex-start, flex-start);
            width: calc(100% / 2);

            .avatar {
                padding-right: 5px;
                width: 10%;

                img {
                    width: 100%;
                    border-radius: 50%;
                }
            }

            .details {
                width: 80%;
                .rating {
                    span {
                        color: $primary;
                    }
                }

                strong {
                    margin-right: 10px;
                    font-size: 18px;
                    font-weight: 700;
                }

                p {
                    font-size: 15px;
                    color: $darkgray;
                    line-height: 1.8;
                }

                span {
                    color: $lightgray;
                    font-size: 13px;
                }
            }
        }
    }
</style>
