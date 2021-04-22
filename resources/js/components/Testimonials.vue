<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">What our clients says</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="carousel" ref="carousel">
                    <span class="fal fa-chevron-circle-left controls prev" id="prev" @click="prev()"></span>
                    <transition-group tag="ul" class="list-unstyled mb-4" name="carousel">
                        <li class="tile" v-for="testimonial in testimonials" :key="testimonial.id">
                            <div class="header">
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
                            <p class="description" v-for="(review, i) in testimonial.reviews" v-if="i == 0">
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
        props: {
            visibleTestimonials: Number,
        },
        mounted() {
            this.testimonialsList();
        },
        data(){
            return {
                testimonials: [],
            }
        },
        methods: {
            testimonialsList(){
                const self = this;
                axios
                .get('http://localhost:8000/api/testimonials')
                .then(function(response){
                    for (var i = 0; i < self.visibleTestimonials; i++) {
                        self.testimonials.push(response.data.testimonials[i])
                    };
                    console.log(self.testimonials, 'testimonials');
                })
                .catch(function() {
                    console.warn('error');
                })
            },
            next(){

            },
            prev(){
                
            }
        }
    }
</script>
