<template>
  <div>
    <!-- modal  -->

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle"></h5>
      <button
        type="button"
        class="close"
        ref="batches_close_btn"
        data-dismiss="modal"
        aria-label="Close"
        @click="clear_form_field()"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- content  -->

      <div class="row">
        <div class="col-md-12">
          <div class="registration-form-admin">
            <form
              class="form-horizontal"
              method="POST"
              enctype="multipart/form-data"
              @submit.prevent="addBatch()"
            >
              <div class="card-body">
                <h4 class="card-title text-center">
                  <b>{{ title }} </b>
                </h4>

                <div class="form-group" v-if="course_id_input">
                  <label
                    for="course-starting-date"
                    class="text-muted font-weight-bold"
                    >Select Course Name</label
                  >

                  <select
                    class="form-control rounded-pill shadow-sm"
                    id="course_id"
                    name="course_id"
                    v-model="batch.course_id"
                  >
                    <option value="" disabled>Select Course</option>
                    <option
                      v-for="course in course_list"
                      :key="course.id"
                      v-bind:value="course.id"
                    >
                      {{ course.course_name }}
                    </option>
                  </select>

                  <small class="text-danger" v-if="errors.course_id">{{
                    errors.course_id[0]
                  }}</small>
                </div>

                <div class="form-group">
                  <label
                    for="course-starting-date"
                    class="text-muted font-weight-bold"
                    >Course Starting Date</label
                  >
                  <input
                    type="date"
                    class="form-control rounded-pill shadow-sm"
                    id="batch_starting_date"
                    name="batch_starting_date"
                    placeholder="batch_starting_date "
                    v-model="batch.batch_starting_date"
                  />

                  <small class="text-danger" v-if="errors.batch_starting_date">
                    {{ errors.batch_starting_date[0] }}</small
                  >
                </div>

                <!--  <div class="form-group">
              <label
                for="course-starting-date"
                class="text-muted font-weight-bold"
                >Select Batch Time</label
              >

              <input
                type="time"
                class="form-control item shadow-sm"
                id="batch_time"
                name="batch_time"
                placeholder="batch_time "
                v-model="batch.batch_time"
              />

              <small class="text-danger" v-if="errors.batch_time">
                {{ errors.batch_time[0] }}</small
              >
            </div>
-->
                <label
                  for="course-starting-date"
                  class="text-muted font-weight-bold"
                  >Select Batch Starting Time</label
                >

                <div class="row">
                  <div class="col">
                    <select
                      class="form-control rounded-pill shadow-sm"
                      id="course_id"
                      name="course_id"
                      v-model="batch.batch_time"
                    >
                      <option value="" class="pb-3">Hour</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    <small class="text-danger" v-if="errors.batch_time">
                      {{ errors.batch_time[0] }}</small
                    >
                  </div>

                  <div class="col">
                    <select
                      class="form-control rounded-pill shadow-sm"
                      id="course_id"
                      name="course_id"
                      v-model="batch.batch_time_minute"
                    >
                      <option value="" class="pb-3">Minute</option>
                      <option value="00">00</option>
                      <option value="05">05</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                      <option value="30">30</option>
                      <option value="35">35</option>
                      <option value="40">40</option>
                      <option value="45">45</option>
                      <option value="50">50</option>
                      <option value="55">55</option>
                    </select>
                  </div>

                  <div class="col">
                    <select
                      class="form-control rounded-pill shadow-sm"
                      id="course_id"
                      name="course_id"
                      v-model="batch.batch_time_am_pm"
                    >
                      <option value="" class="pb-3">AM/PM</option>
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
                    <small class="text-danger" v-if="errors.batch_time_am_pm">
                      {{ errors.batch_time_am_pm[0] }}</small
                    >
                  </div>
                </div>

                <!---2nd row--->
                <label
                  for="course-starting-date"
                  class="text-muted font-weight-bold"
                  >Select Batch Ending Time</label
                >

                <div class="row">
                  <div class="col">
                    <select
                      class="form-control rounded-pill shadow-sm"
                      id="course_id"
                      name="course_id"
                      v-model="batch.batch_end_time"
                    >
                      <option value="" class="pb-3">Hour</option>
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    <small class="text-danger" v-if="errors.batch_end_time">
                      {{ errors.batch_end_time[0] }}</small
                    >
                  </div>

                  <div class="col">
                    <select
                      class="form-control rounded-pill shadow-sm"
                      id="course_id"
                      name="course_id"
                      v-model="batch.batch_end_time_minute"
                    >
                      <option value="" class="pb-3">Minute</option>
                      <option value="00">00</option>
                      <option value="05">05</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                      <option value="30">30</option>
                      <option value="35">35</option>
                      <option value="40">40</option>
                      <option value="45">45</option>
                      <option value="50">50</option>
                      <option value="55">55</option>
                    </select>
                  </div>

                  <div class="col">
                    <select
                      class="form-control rounded-pill shadow-sm"
                      id="course_id"
                      name="course_id"
                      v-model="batch.batch_end_time_am_pm"
                    >
                      <option value="" class="pb-3">AM/PM</option>
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
                  </div>
                </div>
                <!--endrow-->

                <div class="text-center">
                  <div class="card-body text-end">
                    <button
                      type="submit"
                      class="btn btn btn-dark rounded-pill shadow"
                      name="submitBatch"
                      :disabled="isloading"
                    >
                      Save Batch
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- content  end-->
    </div>
    <div class="modal-footer"></div>
    <!-- modal  end-->
  </div>
</template>

<script>
export default {
  props: ["edit"],
  data() {
    return {
      isloading: false,
      course_id_input: true,
      title: "Add New Batch",
      batch: {
        id: "",
        course_id: "",
        batch_starting_date: "",
        batch_time: "",
        batch_time_minute: "",
        batch_time_am_pm: "",

        batch_end_time: "",
        batch_end_time_minute: "",
        batch_end_time_am_pm: "",

        // class_starting_time:"",
        // class_ending_time:'',
      },
      course_list: {},
      errors: {},
    };
  },
  mounted() {},
  created() {
    this.getBatchCourses();

    if (this.edit) {
      this.title = "Edit Batch";
      this.course_id_input = false;
      var vm = this;
      bus.$on("edit-batches", function (batches) {
        vm.clear_form_field();
        vm.batch.id = batches.id;
        vm.batch.course_id = batches.course_id;
        vm.batch.batch_starting_date = batches.batch_starting_date;
        // vm.batch.batch_time=batches.batch_time;

        // vm.batch.batch_time_minute=batches.batch_time_minute;
        // vm.batch.batch_time_am_pm=batches.batch_time_am_pm;

        // vm.batch.batch_end_time=batches.batch_end_time;
        // vm.batch.batch_end_time_minute=batches.batch_end_time_minute;
        // vm.batch.batch_end_time_am_pm=batches.batch_end_time_am_pm;
      });
    }
  },
  methods: {
    addBatch() {
      this.isloading = true;
      let upload = new FormData();

      if (this.edit) {
        upload.append("id", this.batch.id);
      }

      upload.append("course_id", this.batch.course_id);
      upload.append("batch_starting_date", this.batch.batch_starting_date);
      upload.append("batch_time", this.batch.batch_time);
      upload.append("batch_time_minute", this.batch.batch_time_minute);
      upload.append("batch_time_am_pm", this.batch.batch_time_am_pm);

      upload.append("batch_end_time", this.batch.batch_end_time);
      upload.append("batch_end_time_minute", this.batch.batch_end_time_minute);
      upload.append("batch_end_time_am_pm", this.batch.batch_end_time_am_pm);

      axios
        .post("/admin/add-batch", upload)
        .then((res) => {
          console.log("succss");
          this.clear_form_field();
          this.$refs.batches_close_btn.click();
          bus.$emit("batches-added");

          Toast.fire({
            icon: "success",
            title: "Batches Added successfully",
          });

          this.isloading = false;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          this.isloading = false;
          console.log("errors");
        });
    },

    getBatchCourses() {
      axios
        .get("/admin/get-batch-courses")
        .then((response) => {
          this.course_list = response.data;
        })
        .catch((err) => {});
    },

    clear_form_field() {
      for (let data in this.batch) {
        this.batch[data] = "";
      }

      for (let er in this.errors) {
        this.errors[er] = "";
      }
    },
  },
};
</script>
<
<style>



</style>
