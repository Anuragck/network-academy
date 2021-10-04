<template>
  <div>
    <!-- index category start  -->

    <section class="team-course-home" id="team">
      <div class="container-fluid px-5">
        <div class="row">
          <!-- section title -->
          <div class="col-12">
            <div class="title text-center">
              <h3>Course Categories</h3>

              <div class="border"></div>
            </div>
          </div>
          <!---1st-row-->
          <!-- /section title -->
        </div>

        <div class="row justify-content-md-center">
          <!-- feaure box -->
          <div
            class="col-sm-6 col-lg-4"
            v-for="category in category_list"
            :key="category.id"
          >
            <div class="feature-box-1 text-center">
              <img
                :src="'/uploads/category_images/' + category.category_image"
                class="mx-auto d-block category-image"
                alt="..."
              />
              <div class="feature-content">
                <h5>{{ category.category_name }}</h5>
                <div class="text-center mt-3">
                  <a :href="'/courses/' + category.id"
                    ><button
                      type="button"
                      class="
                        btn btn-sm btn-blue
                        rounded-pill
                        course-category-btn
                      "
                    >
                      View Courses<i
                        class="fas fa-angle-double-right fa-fw p-1"
                      ></i></button
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!-- / -->
        </div>
      </div>
    </section>
    <!-- End section -->

    <!-- index category end  -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      category_list: {},
    };
  },

  created() {
    this.getIndexCategory();
  },

  methods: {
    getIndexCategory() {
      axios
        .get("/get-index-category")
        .then((response) => {
          this.category_list = response.data;
        })
        .catch((err) => {});
    },
  },
};
</script>

<style>
</style>