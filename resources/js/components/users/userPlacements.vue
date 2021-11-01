<template>
    <div>
        <section class="team" id="team">
            <div class="container">
                <div class="row">
                    <!-- section title -->
                    <div class="col-12">
                        <div class="title text-center ">
                            <h2>Placements</h2>

                            <div class="border"></div>
                        </div>
                    </div>

                    <div
                        id="carouselExampleControls"
                        class="carousel slide"
                        data-ride="carousel"
                    >
                        <div class="carousel-inner">
                            <div
                                class="carousel-item "
                                v-for="(placement, index) in placements"
                                :key="placement.id"
                                :class="index == 0 ? 'active' : 'no-active'"
                            >
                                <div class="row">
                                    <div
                                        v-for="person in placement"
                                        :key="person.id"
                                    >
                                        <div class="col pb-2">
                                            <div
                                                class="team-member text-center "
                                                style="max-width: 262.5px"
                                            >
                                                <div class="member-photo">
                                                    <!-- member photo -->
                                                    <img
                                                        class="img-fluid"
                                                        :src="
                                                            '/uploads/testimonials_images/' +
                                                                person.testimonial_image
                                                        "
                                                        alt="Placement image"
                                                    />
                                                    <!-- /member photo -->

                                                    <!-- /member social profile -->
                                                </div>

                                                <!-- member name & designation -->
                                                <div class="member-content">
                                                    <h3>{{ person.name }}</h3>
                                                    <span>
                                                        {{ person.designation }}
                                                    </span>
                                                    <p>
                                                        {{ person.description }}
                                                    </p>
                                                </div>
                                                <!-- /member name & designation -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a
                            class="carousel-control-prev"
                            href="#carouselExampleControls"
                            role="button"
                            data-slide="prev"
                        >
                            <span class="" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                        </a>
                        <a
                            class="carousel-control-next"
                            href="#carouselExampleControls"
                            role="button"
                            data-slide="next"
                        >
                            <span class="" aria-hidden="true"></span>
                            <span class="sr-only"></span>
                        </a>
                    </div>
                </div>
                <!-- End row -->
            </div>
            <!-- End container -->
        </section>
        <!-- End section -->
    </div>
</template>
<script>
import axios from "axios";
export default {
    props: ["placement_details"],
    data() {
        return {
            placements: []
        };
    },

    created() {
        this.placementData();
    },

    methods: {
        placementData() {
            const arr = this.placement_details;

            function sliceIntoChunks(arr, chunkSize) {
                const res = [];
                for (let i = 0; i < arr.length; i += chunkSize) {
                    const chunk = arr.slice(i, i + chunkSize);
                    res.push(chunk);
                }
                return res;
            }

            this.placements = sliceIntoChunks(arr, 4);

            
        }
    }
};
</script>

<style scoped>
.carousel-indicators li {
    margin-top: 200px;
    display: inline-block;
    width: 16px;
    height: 16px;
    margin: 15px;
    text-indent: 1;
    cursor: pointer;
    border: none;
    border-radius: 50%;
    background-color: #0d0d2e;
    box-shadow: inset 1px 1px 1px 1px rgba(17, 30, 66, 0.685);
}
.carousel-indicators .active {
    width: 16px;
    height: 16px;
    margin: 15px;

    background-color: #271b46bd;
}
</style>
