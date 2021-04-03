<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">What our clients says</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="carousel" ref="testimonial_carousel">
                    <span class="fal fa-chevron-circle-left controls prev" id="prev"></span>
                    <transition-group tag="ul" class="list-unstyled mb-4" name="carousel">
                        <li class="tile" v-for="(testimonial, key) in testimonials" :key="testimonial.id" v-if="checkVisibilityTiles(key)">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="avatar">
                                    <img :src="testimonial.avatar" :alt="testimonial.name">
                                </div>
                                <div class="details ml-2">
                                    <span> {{ testimonial.name }} </span>
                                    <div class="stars">
                                        <span v-for="i in 5" class="fa-star" :class="i <= testimonial.reviews[0].score ? 'fas': 'fal'"></span>
                                    </div>
                                </div>
                            </div>
                            <p class="description" v-for="(review, index) in testimonial.reviews" v-if="index == 0">
                                "{{ review.description }}"
                            </p>
                        </li>
                    </transition-group>
                    <span class="fal fa-chevron-circle-right controls next" id="next" @click="next()"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="text-center markers">
                    <span v-for="i in 5"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Testimonials',
        mounted() {
            this.testimonialsList();
        },
        data(){
            return {
                testimonials: [],
                visibleTestimonials: 9,
                visibleTiles: [0, 1, 2],
            }
        },
        methods: {
            testimonialsList(){
                const self = this;
                axios
                .get('http://localhost:8000/api/testimonials')
                .then(function(response){
                    self.testimonials = response.data.testimonials;
                    console.log(self.testimonials);
                })
                .catch(function() {
                    console.warn('error');
                })
            },
            checkVisibilityTiles(i){
                if (i <= this.visibleTestimonials && this.visibleTiles.includes(i)) {
                    return true
                }
            },
            next(){
                // let visibleTilesNew = [];
                // for (var i = 0; i < this.visibleTiles.length; i++) {
                //
                //     if (this.visibleTiles[i] == this.visibleTestimonials) {
                //         let newIndex = 0;
                //         visibleTilesNew.push(newIndex);
                //     } else {
                //         let newIndex = this.visibleTiles[i] + 1;
                //         visibleTilesNew.push(newIndex);
                //     }
                // };
                // this.visibleTiles = visibleTilesNew;
                // console.log(this.visibleTiles);
            },
        }
    }
</script>
