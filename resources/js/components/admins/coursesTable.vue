<template>
  <div class="container-fluid">
    <!-- Large modal -->
    <div
      class="modal fade course-modal-lg"
      tabindex="-1"
      data-backdrop="static"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <courses-page> </courses-page>
        </div>
      </div>
    </div>

    <!-- modal end -->

    <!-- course table  -->
<!--loading preloader start-->
<the-loading v-if="loading"></the-loading>
<!--loading preloader end-->

    <div class="card mt-3 shadow" v-else>
      <div class="card-header">
        <button
          type="button"
          class="btn btn btn-sm-block btn-dark rounded-pill float-right shadow"
          data-toggle="modal"
          data-target=".course-modal-lg"
        >
          Add Course <i class="fas fa-plus-circle fa-fw"></i>
        </button>
        <span class="h5 font-weight-bold">Course List</span>
      </div>
        <!-- filter area  -->
        <!-- <div class="row mt-3 bg-success"> -->

<div class="row">



<div class="col-auto mr-auto  ">

    <div class="form-group pl-3">
                    <label for="Coursename" class="text-muted font-weight-bold pt-2"
                      >per page</label
                    >

                    <select
                      class="form-control item pb-1 shadow-sm rounded-pill"
                      id="paginate"
                      name="paginate"
                      v-model="filter.paginate"
                    >
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="20">20</option>
                      <option value="50">50</option>

                    </select>



</div>
</div>


<div class="col-auto align-self-center">
          <div class="form-group pr-2">
            <label for="Coursename" class="text-muted font-weight-bold pt-2 "
              >Filter by Category</label
            >
            <select
                      class="form-control item shadow-sm rounded-pill "
                      name="filter-category"
                        v-model="filter.category"
                    >
                    <option value="">all</option>
                      <option v-for="category in category_list " :key="category.id" :value="category.id">
                        {{ category.category_name }} </option>




                    </select>
          </div>
</div>

<div class="col-auto">
          <div class="form-group pr-3 pl-1">
            <label for="Coursename" class="text-muted font-weight-bold pt-2 float-right"
              >Search</label
            >
            <input
              type="text"
              class="form-control rounded-pill shadow-sm "
              id="search"
              name="search"
              placeholder="Search course code/name "
              v-model.lazy="filter.search"
            />
          </div>
</div>


      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Course Name</th>
                <th scope="col">Short Name</th>
                <th scope="col">Course Code</th>

                <th scope="col">Duration</th>
                <th scope="col">Course Fee</th>
                <th scope="col">Certificate Fee</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(course, index) in course_list.data" :key="course.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ course.course_name }}</td>
                <td>{{ course.course_short_name }}</td>
                <td>{{ course.course_code }}</td>

                <td>{{ course.course_duration }}</td>
                <td>{{ course.course_fee }}</td>
                <td>{{ course.course_certification_fee }}</td>
                <td class="text-center">
                  <button
                    type="button"
                    class="btn btn-sm btn-dark  "
                    data-toggle="modal"
                    data-target=".course-edit-modal-lg"
                    name=""
                    @click="editCourse(course)"
                  >
                   <i class="fas fa-edit fa-fw "></i>
                  </button>
                <button
                    type="button"
                    class="btn btn-sm btn-outline-dark "
                    title="Add To Home"
                    @click="addToHome(course)"
                    style="border-radius:50%">

                   <i v-if="course.add_to_home_status == '0'" class="far fa-star fa-fw  fa-star-course" style="color:#FFA500	;"></i>

                    <i v-if="course.add_to_home_status == '1'" class="fas fa-star fa-fw  fa-star-course" style="color:#FFA500	;"></i>
                    </button>
                  </td>


              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <pagination
          :data="course_list"
          @pagination-change-page="getCourses"
          align="center"
          :limit="5"
        >
        </pagination>
      </div>
    </div>

    <!-- course table end -->
    <!-- Edit Course modal -->

    <div
      class="modal fade course-edit-modal-lg"
      tabindex="-1"
      data-backdrop="static"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <courses-page :edit="true"> </courses-page>
        </div>
      </div>
    </div>

    <!-- modal end -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      filter: {
        paginate: 5,
        search: "",
        category:'',
      },

course_id:'',

      course_list: {},
      category_list:{},

loading:false,
    };
  },

  created() {
    this. getCourseTableCategories();
    this.getCourses();
    var vm = this;
    bus.$on("course-added", function () {
      vm.getCourses();
    });
  },
  methods: {
    getCourses(page = 1) {
 this.loading = true //the loading begin
      axios
        .get("/admin/get-courses?page=" + page, {
          params: {
            paginate: this.filter.paginate,
            search: this.filter.search,
            category: this.filter.category,
          },
        })
        .then((response) => {
          this.course_list = response.data;
        }) .finally(() => (this.loading = false)) ;// set loading to false when request finish;;
    },

    getCourseTableCategories(){

       axios
        .get("/admin/get-course-table-categories" )
        .then((response) => {
          this.category_list = response.data;
        });

    },

        addToHome(course){

            axios.post("/admin/change-add-to-home-status",course) .then((res) => {
          console.log("success");
            this.getCourses();
        })
        },

    editCourse(course) {
      bus.$emit("edit-course", course);
    },
  },
  // methods ends

  watch: {
    "filter.paginate": function () {
      this.getCourses();
    },
    "filter.search": function () {
      this.getCourses();
    },
    "filter.category": function () {
      this.getCourses();
    },
  },
};
</script>

<style scoped>
.fa-star-course:hover{
transform: scale(1.4);
}

</style>


