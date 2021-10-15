<template>
  <div>
    <!-- batches modal  -->

    <!-- Modal -->
    <div
      class="modal fade batches-modal-lg"
      id="batches-modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="batches-modalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <batches-page> </batches-page>
        </div>
      </div>
    </div>

    <!-- modal end -->

    <!-- batches table  -->

    <!--loading preloader start-->
    <the-loading v-if="loading"></the-loading>
    <!--loading preloader end-->

    <div class="card mt-3 shadow" v-else>
      <div class="card-header">


            <span class="h5 font-weight-bold">Course batches List</span>






            <button
              type="button"
              class="
                btn btn btn-sm-block btn-dark
                rounded-pill
 float-right
                shadow
              "
              data-toggle="modal"
              data-target="#batches-modal"
            >
              Add batches <i class="fas fa-plus-circle fa-fw"></i>
            </button>
          </div>


 <div class="col-md-2 ml-auto mt-3">
            <div class="form-group ">

              <select
                class="form-control item shadow-sm rounded-pill "
                name="filter-course_name"
                v-model="course_name"
              >
              <option value selected disabled="" class="pb-3">Course Wise Filter</option>
                <option value="" class="pb-3">All</option>
                <option
                  v-for="course in course_list"
                  :key="course.id"
                  :value="course.id"
                >
                  {{ course.course_name }}
                </option>
              </select>
            </div>
  </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Course Name</th>
                <th scope="col">Date</th>
                <th scope="col">Starting Time</th>
                <th scope="col">Ending Time</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(batches, index) in batches_list.data"
                :key="batches.id"
              >
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ batches.course.course_name }}</td>
                <td>{{ batches.batch_starting_date | myDate }}</td>
                <td>{{ batches.batch_time }}</td>
                <td>{{ batches.batch_end_time }}</td>
                <td>
                  <button
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill"
                    data-toggle="modal"
                    data-target="#batches-edit-modal"
                    name=""
                    @click="editBatches(batches)"
                  >
                    Edit <i class="fas fa-edit fa-fw"></i>
                  </button>
                </td>
              </tr>

              <tr v-if="record">
                <td>No record found !</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <pagination
          :data="batches_list"
          @pagination-change-page="getBatches"
          align="center"
          :limit="5"
        >
        </pagination>
      </div>
    </div>

    <!-- batches table end -->

    <!-- Edit batches modal -->

    <!-- Modal -->
    <div
      class="modal fade batches-edit-modal-lg"
      id="batches-edit-modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="batches-modalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <batches-page :edit="true"> </batches-page>
        </div>
      </div>
    </div>

    <!-- modal end -->

    <!-- modal end -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      batches_list: {},
      course_list: {},
      record: false,
      course_name: "",

      loading: false,
    };
  },
  created() {
    this.getBatches();
    this.getCoursesForFilter();
    var vm = this;
    bus.$on("batches-added", function () {
      vm.getBatches();
    });
  },

  methods: {
    getBatches(page = 1) {
      this.loading = true; //the loading begin
      axios
        .get("/admin/get-batches?page=" + page, {
          params: {
            course_name: this.course_name,
          },
        })
        .then((response) => {
          this.batches_list = response.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.loading = false)); // set loading to false when request finish;;
    },

    editBatches(batches) {
      bus.$emit("edit-batches", batches);
    },
    getCoursesForFilter() {
      axios
        .get("admin/get-filter-courses")
        .then((response) => {
          this.course_list = response.data;
        })
        .catch((err) => {
          //   console.log("filter-courses errs".err);
        });
    },
  },

  watch: {
    course_name: function () {
      this.getBatches();
    },
  },
};
</script>

<style>
</style>
