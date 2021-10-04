<template>
  <div>
    <!-- Start courses
          =========================================== -->
    <section class="team-course-home" id="team">
      <div class="container-fluid px-5">
        <div class="row">
          <!-- section title -->
          <div class="col-12">
            <div class="title text-center">
              <h3>Featured Courses</h3>

              <div class="border"></div>
            </div>
          </div>
          <!---1st-row-->
          <!-- /section title -->
        </div>

        <div class="row">
          <!--Course Card  -->
          <div
            class="col pt-3 course-width-custom-responsive"
            v-for="course in index_page_courses"
            :key="course.id"
          >
            <div class="report-module">
              <div class="thumbnail">
                <a href="#"
                  ><img :src="'/uploads/course_images/' + course.course_image"
                /></a>
              </div>
              <div class="post-content">


                <!-- <a href="/courseView"
                  ><div class="category btn"> Enroll Now</div></a
                > -->
<a    type="button"
                data-toggle="modal"
                data-target="#enquireModal"

@click="selectedCourse(course)"

                  ><div class="category btn"> Enroll Now</div></a
                >


                <h6 class="">{{ course.course_name }}</h6>
                <p class="text-justify" v-html="course.small_description.substring(0,150)+'...'">{{ course.small_description.substring(0,150)+"..." }}</p>
                <a :href="'/courseView/' + course.id">
                  <button
                    type="button"
                    class="btn btn-sm btn-outline-dark rounded-pill float-right"
                  >
                    More <i class="fas fa-chevron-circle-right fa-fw"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
          <!--Course Card end -->
        </div>
      </div>
      <div class="text-center pt-5 mt-3">
        <a href="/courses/0"
          ><button
            type="button"
            class="btn btn-sm btn-outline-dark rounded-pill"
          >
            Show More Courses<i
              class="fas fa-angle-double-right fa-fw p-1"
            ></i></button
        ></a>
      </div>
    </section>

    <!-- End section -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      index_page_courses: {},
    };
  },

  created() {
    this.getIndexPageCourses();
  },
  methods: {
    getIndexPageCourses() {
      axios
        .get("/index-page-courses")
        .then((response) => {
          this.index_page_courses = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },

selectedCourse(course){

  bus.$emit('course-selected',course);
}



  },
};
</script>

<style>
</style>
