<template>
  <div>
    <div class="modal-header">
      <h5 class="modal-title" id="convertion-status">
        {{ enquirer_name }}
      </h5>
      <button
        @click.prevent="clear_conversion_modal()"
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
        ref="add_conversion__close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- content area  -->

      <div class="container px-5">
        <form method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label
                  for="conversion-satus"
                  class="text-muted font-weight-bold"
                  >Select Conversion Status
                </label>

                <select
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="conversion-status"
                  name="convertionStatus"
                  v-model="conversion_data.convertionStatus"
                autofocus
                >
                   <option disabled selected value="">Select Convertion Status</option>
                  <option value="Joined">Joined</option>
                  <option value="Dropped">Dropped</option>
                </select>
                <small class="text-danger" v-if="errors.convertionStatus">
                  {{ errors.convertionStatus[0] }}</small
                >
              </div>
            </div>
            <!--col end-->
          </div>
          <div class="row" v-if="conversion_data.convertionStatus == 'Joined'">
            <div class="col-md-4">
              <div class="form-group">
                <label for="enquircourse" class="text-muted font-weight-bold"
                  >Joined Course <span class="text-danger h4"> * </span></label
                >
                <select
                  v-model="conversion_data.joinedCourse"
                  name="joinedCourse"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  v-on:change="getEnquiryBatchesForConvertion()"
                  :disabled="single_dropdown"
                >
                  Select Joined Course
<option disabled value=""> Select Joined Course</option>
                  <option
                    v-for="course in enquiry_course_list"
                    :key="course.id"
                    :value="course.id"
                  >
                    {{ course.course_name }}
                  </option>
                </select>

                <small class="text-danger" v-if="errors.joinedCourse">
                  {{ errors.joinedCourse[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group" v-if="enquiry_batches_list.length !== 0">
                <label
                  for="enquircoursetime"
                  class="text-muted font-weight-bold"
                  >Joined Batch <span class="text-danger h4"> * </span></label
                >
                <select
                  v-model="conversion_data.joinedBatch"
                  name="joinedBatch"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                >
                  <option disabled value="">Please select one</option>
                  <option
                    v-for="batches in enquiry_batches_list"
                    :key="batches.id"
                    :value="batches.id"
                  >
                    {{ batches.batch_time }} to {{ batches.batch_end_time }}
                    {{ "Batch Starting on" }} {{ batches.batch_starting_date }}
                  </option>
                </select>
                <small class="text-danger" v-if="errors.joinedBatch">
                  {{ errors.joinedBatch[0] }}</small
                >
              </div>
            </div>
            <div class="col-md-4" >
              <div class="form-group">

                <label for="course-fee" class="text-muted font-weight-bold"
                  >Course Fee <span class="text-danger h4"> * </span></label
                >
                <input
                  type="number"
                min="0"
                  name="joinedFee"
                  class="form-control shadow-sm enqry-input-border rounded-pill"
                  v-model="conversion_data.joinedFee"
                />
              </div>
              <small class="text-danger" v-if="errors.remarks">
                {{ errors.remarks[0] }}</small
              >
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Remarks / Reason</label
                >
                <textarea
                  v-model="conversion_data.remarks"
                  name="remarks"
                  rows="3"
                  placeholder="add remarks here"
                  class="form-control shadow enqry-input-border"
                  style="border-radius: 1.1rem"
                ></textarea>
              </div>
              <small class="text-danger" v-if="errors.remarks">
                {{ errors.remarks[0] }}</small
              >
            </div>
            <!--col end-->
          </div>
          <!--row end3-->

          <div class="text-center pt-3 pb-2">
            <button
              type="button"
              class="btn btn btn-outline-dark rounded-pill shadow"
              @click="addConversionStatus()"
            >
              Save <i class="fas fa-angle-double-right fa-fw"></i>
            </button>
          </div>
        </form>
      </div>

      <!-- content area ends -->
    </div>
    <div class="modal-footer">
      <button
        @click.prevent="clear_conversion_modal()"
        type="button"
        class="btn btn-dark btn-sm rounded-pill"
        data-dismiss="modal"
      >
        Close
      </button>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import moment from "moment";
export default {
  data() {
    return {
      enqId: "",
      enquirer_name: "",
      single_dropdown: false,
      enquiry_course_list: {},
      enquiry_batches_list: {},


cId:'',

      errors: {},
      conversion_data: {
        convertionStatus: "",
        joinedCourse: "",
        joinedBatch: "",
joinedFee:'',

        remarks: "",
        joinedDate: moment().format("YYYY-MM-DD"),
      },


    };
  },
  methods: {
    clear_conversion_modal() {
      this.conversion_data = {};
      this.errors = {};
    },

    addConversionStatus() {
      axios
        .post("admin/add-conversion-status/" + this.enqId, this.conversion_data)
        .then((response) => {
          if (response.data == "success") {
            bus.$emit("AfterAction");
            this.$refs.add_conversion__close.click();
          }
        if(response.data == "already dropped"){
Swal.fire({
  icon: 'error',
  title: 'Already Dropped...',
})
        }

 if(response.data == "already joined"){
Swal.fire({
  icon: 'error',
  title: 'Already Joined...',
})
        }
                })
        .catch((error) => {
          this.errors = error.response.data.errors;
          console.log("conversion-errors");
        });
    },

    getEnquiryCoursesForConvertion() {
      axios
        .get("admin/get-enquiry-courses-add-new-lead")
        .then((response) => {
          this.enquiry_course_list = response.data;
        })
        .catch((err) => {
          //   console.log("enquiry form errs".err);
        });
    },

    getEnquiryBatchesForConvertion() {
      axios
        .get("admin/get-enquiry-batches-add-new-lead", {
          params: {
            batches: this.conversion_data.joinedCourse,
          },
        })
        .then((response) => {
          this.enquiry_batches_list = response.data;
        })
        .catch((err) => {
          //   console.log("enquiry form errs".err);
        });



if(this.conversion_data.joinedCourse !=''){



      this.conversion_data.joinedFee = "";

      for (let course in this.enquiry_course_list) {
        let select_course = this.enquiry_course_list[course ];

        if (select_course.id == this.conversion_data.joinedCourse) {
         this.conversion_data.joinedFee =  select_course.course_fee;

          break;
        }
      }
}

    },
  },
  mounted() {},

  created() {
    bus.$on("enq_id", (enquiry) => {
      this.enqId = enquiry.id;
      this.enquirer_name = enquiry.enquirer_name;
    });

    this.getEnquiryCoursesForConvertion();
  },


};
</script>
