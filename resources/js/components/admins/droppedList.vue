<template>
  <div>
    <!-- course table  -->
    <!--loading preloader start-->
    <the-loading v-if="loading"></the-loading>
    <!--loading preloader end-->
    <div class="card mt-3 shadow" v-else>
      <div class="card-header">
        <div class="row">
          <span class="h5 font-weight-bold float-right mt-4 pl-2 text-danger"
            >Dropped List</span
          >

          <div class="col-md-2 ml-auto">
            <div class="form-group">
              <label for="course-name" class="text-muted font-weight-bold"
                >Course Wise</label
              >
              <select
                class="form-control item shadow-sm rounded-pill"
                name="course-name"
                v-model="course_name"
              >
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

          <div class="col-md-2">
            <div class="form-group ml-auto">
              <label for="course-batch" class="text-muted font-weight-bold"
                >Batch Wise
              </label>
              <select
                class="form-control item shadow-sm rounded-pill"
                name="course-batch"
                v-model="course_batch"
              >
                <option value="">All</option>
                <option
                  v-for="batches in batches_list"
                  :key="batches.id"
                  :value="batches.id"
                >
                  {{ batches.batch_time }} to {{ batches.batch_end_time }}
                  {{ "Batch Starting on" }} {{ batches.batch_starting_date }}
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Enquired Course</th>
                <th scope="col">Enquired Batch</th>
                <th scope="col">Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(dropped, index) in droppedList.data"
                :key="dropped.id"
              >
                <th scope="row">{{ index + 1 }}</th>

                <td>
                  <strong>{{ dropped.enquirer_name }}</strong>
                </td>

                <td>{{ dropped.enquirer_email }}</td>
                <td>{{ dropped.enquirer_mobile }}</td>
                <td>{{ dropped.get_course_name.course_name }}</td>
                <td>
                  {{ dropped.get_course_batch.batch_starting_date | myDate }} /
                  {{ dropped.get_course_batch.batch_time }}
                </td>

                <td>{{ dropped.conversion_remarks }}</td>
              </tr>

              <tr v-if="record">
                <td>No record found !</td>
              </tr>

              <!-- </tr>-->
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <pagination
          :data="droppedList"
          @pagination-change-page="getDropped"
          align="center"
          :limit="5"
        >
        </pagination>
      </div>
    </div>
    <!-- course table end -->
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      droppedList: {},
      batches_list: {},
      course_list: {},
      record: false,
      course_name: "",
      course_batch: "",
      loading: false,
    };
  },

  created() {
    this.getDropped();
    this.getCoursesForFilter();
    this.getBatchesForFilter();
  },
  methods: {
    getDropped(page = 1) {
      this.loading = true; //the loading begin
      axios
        .get("admin/dropped-list?page=" + page, {
          params: {
            course_name: this.course_name,
            course_batch: this.course_batch,
          },
        })
        .then((response) => {
          this.droppedList = response.data;
          if (this.droppedList.data.length == 0) {
            this.record = true;
          } else {
            this.record = false;
          }
        })
        .finally(() => (this.loading = false)); // set loading to false when request finish;;
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

    getBatchesForFilter() {
      axios
        .get("admin/get-filter-batches")
        .then((response) => {
          this.batches_list = response.data;
        })
        .catch((err) => {
          //   console.log("filter-batches errs".err);
        });
    },
  },

  watch: {
    course_name: function () {
      this.getDropped();
    },
    course_batch: function () {
      this.getDropped();
    },
  },
};
</script>

<style scoped>
</style>

