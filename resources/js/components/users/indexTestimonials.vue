<template>
  <div>

<section class="testimonial section" id="testimonial">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <!-- testimonial wrapper -->
                <div class="testimonial-slider">
    <div

      v-for="testimonial in testimonials"
      :key="testimonial.id"
    >
      <!-- testimonial single -->
      <div class="item text-center">
        <i class="tf-ion-chatbubbles"></i>
        <!-- client info -->
        <div class="client-details ">
          <p>{{ testimonial.description }}</p>
        </div>
        <!-- /client info -->
        <!-- client photo -->
        <div class="client-thumb">
          <img
            :src="
              '/uploads/testimonials_images/' + testimonial.testimonial_image
            "
            class="img-fluid"
            alt="testimonial image"
          />
        </div>
        <div class="client-meta pt-1">
          <h4>{{ testimonial.name }}</h4>
          <span> {{ testimonial.designation }} </span>
        </div>
        <!-- /client photo -->

      </div>
      <!-- /testimonial single -->



    </div>



         </div>


            </div> 		<!-- end col lg 12 -->
        </div>	    <!-- End row -->
    </div>       <!-- End container -->
</section>    <!-- End Section -->

    <!-- End testimonials Section -->
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["testimonials"],
  data() {
    return {

        testimonialss:{}
    };
  },

  created() {

    console.log(this.testimonials);
  },

  methods:{


      getTestimonial(){
          axios.get('get-testimonial').then((response) => {

              this.testimonials=response.data;

          }).catch((err) => {

          });
      }

  }
};
</script>

<style>
</style>
