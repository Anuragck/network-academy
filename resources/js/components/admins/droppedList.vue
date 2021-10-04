<template>
  <div>
    <!-- course table  -->
<!--loading preloader start-->
<the-loading v-if="loading"></the-loading>
<!--loading preloader end-->
    <div class="card mt-3 shadow" v-else>
      <div class="card-header">
<div class="row ">
        <span class="h5 font-weight-bold float-right mt-4 pl-2 text-danger">Dropped List</span>

<div class="col-md-2 ml-auto">
          <div class="form-group ">
            <label for="Coursename" class="text-muted font-weight-bold"
              >Course Wise</label
            >
            <select
              class="form-control item shadow-sm rounded-pill"
              name="filter-priority"
            >
              <option value="" class="pb-3">All</option>
              <option value="1">course a</option>
              <option value="2">course b</option>
              <option value="3">course c</option>
            </select>
          </div>
</div>

<div class="col-md-2 ">
          <div class="form-group ml-auto">
            <label for="Coursename" class="text-muted font-weight-bold"
              >Batch Wise
            </label>
            <select
              class="form-control item shadow-sm rounded-pill"
              name="filter-source"
            >
              <option value="">All</option>
              <option value="a">b a</option>
              <option value="b">b b</option>
              <option value="c">b c</option>
              <option value="d">b d</option>
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
              <tr v-for="(dropped, index) in droppedList"
                :key="dropped.id">
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

              <!-- </tr>-->






            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer"></div>
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
loading:false,
    };
  },

  mounted() {
this.getDropped();
  },
  methods: {



    getDropped() {
 this.loading = true //the loading begin
      axios.get("admin/getDroppedList").then((response) => {
        this.droppedList = response.data;
      }).finally(() => (this.loading = false)) ;// set loading to false when request finish;;
    },



  },

  watch: {},
};
</script>

<style scoped>
</style>

