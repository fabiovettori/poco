<template>
    <div class="rating">
        <span v-for="i in 5" class="fa-star" :class="i <= stars() ? 'fas full' : 'fal'"></span>
    </div>
</template>

<script>
    export default {
        name: 'Rating',
        props: {
            productRating: Object,
        },
        mounted(){
            this.stars();
        },
        data(){
            return {
                stars(){
                    let sumScores = 0;
                    for (var i = 0; i < this.productRating.reviews.length; i++) {
                        sumScores += this.productRating.reviews[i].score;
                    };

                    let avgScore;
                    if (sumScores == 0 || this.productRating.reviews.length == 0) {
                        return 0;
                    } else {
                        avgScore = sumScores / (this.productRating.reviews.length);
                        return avgScore;
                    }
                }
            }
        }
    }
</script>

<style lang="scss">
    @import './../../sass/partials/_variables.scss';

    .rating {
        span {
            color: $primary;
            margin-left: 2px;

            &.fal {
                color: rgba($lightgray, .5);
            }
        }
    }
</style>
