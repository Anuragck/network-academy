<template>
  <div>
    <!--**************ENQUIRE-NOW-MODAL(NEED TO BE TRANSFER TO VUE COMPONENT , this is a temp place)***********-->
    <!-- Modal -->

    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Enroll Now</h5>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
        ref="enquiry_close_btn"
      >
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="container">
        <form
          method="POST"
          enctype="multipart/form-data"
          @submit.prevent="addEnquiry()"
        >
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="enquirname" class="text-muted font-weight-bold"
                  >Enter Your Full Name<span class="text-danger h4">
                    *
                  </span></label
                >
                <input
                  type="text"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="enquirer_name"
                  aria-describedby="emailHelp"
                  placeholder="Enter Your Name"
                  enquirer_name="enquirer_name"
                  v-model="enquiry.enquirer_name"
                />
                <small class="text-danger" v-if="errors.enquirer_name">
                  {{ errors.enquirer_name[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="enquiremail" class="text-muted font-weight-bold"
                  >Enter Your Email ID
                  <span class="text-danger h4"> * </span></label
                >
                <input
                  type="email"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="enquirer_email"
                  aria-describedby="emailHelp"
                  placeholder="Enter Your Email Address"
                  name="enquirer_email"
                  v-model="enquiry.enquirer_email"
                />
                <small class="text-danger" v-if="errors.enquirer_email">
                  {{ errors.enquirer_email[0] }}</small
                >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="enquircourse" class="text-muted font-weight-bold"
                  >Choose Intrested Course
                  <span class="text-danger h4"> * </span></label
                >
                <select
                  v-model="enquiry.enquirer_preferred_course"
                  name="enquirer_preferred_course"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  v-on:change="getEnquiryBatches()"
                  :disabled="single_dropdown"
                >
                  <option :value="selected_course_id">
                    {{ selected_course }}
                  </option>
                  <option
                    v-for="course in enquiry_course_list"
                    :key="course.id"
                    :value="course.id"
                  >
                    {{ course.course_name }}
                  </option>
                </select>

                <small
                  class="text-danger"
                  v-if="errors.enquirer_preferred_course"
                >
                  {{ errors.enquirer_preferred_course[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group" v-if="enquiry_batches_list.length !== 0">
                <label
                  for="enquircoursetime"
                  class="text-muted font-weight-bold"
                  >Choose Intrested Batch
                  <span class="text-danger h4"> * </span></label
                >
                <select
                  v-model="enquiry.enquirer_preferred_course_time"
                  name="enquirer_preferred_course_time"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                >
                  <option disabled value="">select intrested batch</option>
                  <option
                    v-for="batches in enquiry_batches_list"
                    :key="batches.id"
                    :value="batches.id"
                  >
                    {{ batches.batch_time }} to {{ batches.batch_end_time }}
                    {{ "Batch Starting on" }} {{ batches.batch_starting_date }}
                  </option>
                </select>
                <small
                  class="text-danger"
                  v-if="errors.enquirer_preferred_course_time"
                >
                  {{ errors.enquirer_preferred_course_time[0] }}</small
                >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="enquirph" class="text-muted font-weight-bold"
                  >Enter Your Phone Number<span class="text-danger h4">
                    *
                  </span></label
                >
                <input
                  type="phone"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="enquirer_mobile "
                  aria-describedby="emailHelp"
                  placeholder="Enter Your phone number"
                  name="enquirer_mobile "
                  v-model="enquiry.enquirer_mobile"
                />
                <small class="text-danger" v-if="errors.enquirer_mobile">
                  {{ errors.enquirer_mobile[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="enquirdob" class="text-muted font-weight-bold"
                  >Select Your Date Of Birth
                  <span class="text-danger h4"> * </span></label
                >
                <input
                  type="date"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="enquirer_dob"
                  aria-describedby="emailHelp"
                  placeholder="select dob"
                  name="enquirer_dob"
                  v-model="enquiry.enquirer_dob"
                />
                <small class="text-danger" v-if="errors.enquirer_dob">
                  {{ errors.enquirer_dob[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label
                  for="enquirqualification"
                  class="text-muted font-weight-bold"
                  >Choose Your Qualification</label
                >
                <select
                  v-model="enquiry.enquirer_education"
                  name="enquirer_education"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                >
                  <option disabled value="">select Qualification</option>
                  <option value="sslc">Sslc</option>
                  <option value="plus two">Plus Two</option>
                  <option value="degree">Degree</option>
                  <option value="post graduation">Post Graduation</option>
                  <option value="others">Others</option>
                </select>
                <small class="text-danger" v-if="errors.enquirer_education">
                  {{ errors.enquirer_education[0] }}</small
                >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Select Your State
                  <span class="text-danger h4"> * </span></label
                >
                <select
                  v-model="enquiry.enquirer_state"
                  name="enquirer_state"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                >
                  <option disabled value="">select State</option>
                  <option value="kerala">Kerala</option>
                  <option value="karnataka">Karnataka</option>
                  <option value="tamilnadu">Tamilnadu</option>
                </select>
                <small class="text-danger" v-if="errors.enquirer_state">
                  {{ errors.enquirer_state[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Select Your District
                  <span class="text-danger h4"> * </span></label
                >
                <select
                  v-model="enquiry.enquirer_district"
                  name="enquirer_district"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                >
                  <option disabled value="">select District</option>
                  <option
                    v-for="district in districts"
                    :key="district.id"
                    v-bind:value="district.val"
                  >
                    {{ district.name }}
                  </option>
                </select>
                <small class="text-danger" v-if="errors.enquirer_district">
                  {{ errors.enquirer_district[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Enter Your Pin Code</label
                >
                <input
                  type="text"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="enquirer_pin"
                  aria-describedby="emailHelp"
                  placeholder="Enter Your Zip Code"
                  name="enquirer_pin"
                  v-model="enquiry.enquirer_pin"
                />
                <small class="text-danger" v-if="errors.enquirer_pin">
                  {{ errors.enquirer_pin[0] }}</small
                >
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Enter Your Street Name</label
                >
                <input
                  type="text"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="enquirer_street"
                  aria-describedby="emailHelp"
                  placeholder="Enter Your Street Name"
                  name="enquirer_street"
                  v-model="enquiry.enquirer_street"
                />
                <small class="text-danger" v-if="errors.enquirer_street">
                  {{ errors.enquirer_street[0] }}</small
                >
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Remarks</label
                >
                <textarea
                  v-model="enquiry.enquirer_remarks"
                  name="enquirer_remarks"
                  rows="1"
                  placeholder="add remarks here"
                  class="form-control shadow-sm enqry-input-border"
                  style="border-radius: 1.1rem"
                ></textarea>
              </div>
            </div>
          </div>

          <!-- <div class="form-group">
            <textarea
              v-model="enquiry.enquirer_remarks"
              name="enquirer_remarks"
              placeholder="add remarks here"
              class="form-control"
            ></textarea>
          </div>-->

          <div class="text-center pt-5 pb-3">
            <button type="submit" class="btn btn btn-outline-dark rounded-pill">
              Submit <i class="fas fa-angle-double-right fa-fw"></i>
            </button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-sm btn-outline-dark rounded-pill"
          data-dismiss="modal"
        >
          Close <i class="far fa-times-circle fa-fw"></i>
        </button>
      </div>
    </div>

    <!--**************ENQUIRE-NOW-MODAL END)*****************************************************************-->
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      selected_course: "select course",
      selected_course_id: "",
      single_dropdown: false,

      enquiry: {
        enquirer_name: "",
        enquirer_email: "",
        enquirer_mobile: "",
        enquirer_dob: "",
        enquirer_district: "",
        enquirer_state: "",
        enquirer_street: "",
        enquirer_pin: "",
        enquirer_education: "",
        enquirer_preferred_course: "",
        enquirer_preferred_course_time: "",
        enquirer_remarks: "",
      },

      enquiry_course_list: {},
      enquiry_batches_list: {},
      errors: {},
    };
  },

  methods: {
    addEnquiry() {
      axios
        .post("/add-enquiry", this.enquiry)
        .then((res) => {
          console.log("success");
          if (res.data == "success") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Thank you,we will contact you shortly",
              showConfirmButton: true,
              // timer: 1500
            });
            this.$refs.enquiry_close_btn.click();
           this.clear_form_field();

          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          console.log("errors");
        });
    },

    getEnquiryCourses() {
      axios
        .get("/get-enquiry-courses")
        .then((response) => {
          this.enquiry_course_list = response.data;
        })
        .catch((err) => {
          console.log("enquiry form errs".err);
        });
    },

    getEnquiryBatches() {
      axios
        .get("/get-enquiry-batches", {
          params: {
            batches: this.enquiry.enquirer_preferred_course,
          },
        })
        .then((response) => {
          this.enquiry_batches_list = response.data;
        })
        .catch((err) => {
          console.log("enquiry form errs".err);
        });
    },
      clear_form_field() {
      for (let data in this.enquiry) {
        this.enquiry[data] = "";
      }
      for (let er in this.errors) {
        this.errors[er] = "";
      }
    },
  },
  created() {
    this.getEnquiryCourses();

    var vm = this;
    bus.$on("single-course-selected", function (course_id, course_name) {
      vm.single_dropdown = true;
      vm.selected_course = course_name;
      vm.selected_course_id = course_id;

      vm.enquiry.enquirer_preferred_course = course_id;
      vm.getEnquiryBatches();
    });

    bus.$on("course-selected", function (course) {
      vm.selected_course = course.course_name;
      vm.selected_course_id = course.id;
      vm.enquiry.enquirer_preferred_course = course.id;

      vm.getEnquiryBatches();
    });
  },

  computed: {
    districts: function () {
      if (this.enquiry.enquirer_state === "kerala") {
        var districts = [
          { id: 1, val: "Kasaragod", name: "Kasaragod" },
          { id: 2, val: "Kannur", name: "Kannur" },
          { id: 3, val: "Wayanadu", name: "Wayanadu" },
          { id: 4, val: "Kozhikode", name: "Kozhikode" },
          { id: 5, val: "Malappuram", name: "Malappuram" },
          { id: 6, val: "Palakkad", name: "Palakkad" },
          { id: 7, val: "Thrissur", name: "Thrissur" },
          { id: 8, val: "Ernakulam", name: "Ernakulam" },
          { id: 9, val: "Idukki", name: "Idukki" },
          { id: 10, val: "Kottayam", name: "Kottayam" },
          { id: 11, val: "Pathanamthitta", name: "Pathanamthitta" },
          { id: 12, val: "Alappuzha", name: "Alappuzha" },
          { id: 13, val: "Kollam", name: "Kollam" },
          { id: 14, val: "Thiruvananthapuram", name: "Thiruvananthapuram" },
        ];
      } else if (this.enquiry.enquirer_state === "karnataka") {
        var districts = [
          { id: 1, val: "Bagalkot", name: "Bagalkot" },
          { id: 2, val: "Ballari", name: "Ballari" },
          { id: 3, val: "Belagavi", name: "Belagavi" },
          {
            id: 4,
            val: "Bengaluru (Bangalore) Rural",
            name: "Bengaluru (Bangalore) Rural",
          },
          {
            id: 5,
            val: "Bengaluru (Bangalore) Urban",
            name: "Bengaluru (Bangalore) Urban",
          },
          { id: 6, val: "Bidar", name: "Bidar" },
          { id: 7, val: "Chamarajanagar", name: "Chamarajanagar" },
          { id: 8, val: "Chikballapur", name: "Chikballapur" },
        ];
      } else if (this.enquiry.enquirer_state === "tamilnadu") {
        var districts = [
          { id: 1, val: "Ariyalur", name: "Ariyalur" },
          { id: 2, val: "Chengalpattu", name: "Chengalpattu" },
          { id: 3, val: "Chennai", name: "Chennai" },
          { id: 4, val: "Coimbatore", name: "Coimbatore" },
          { id: 5, val: "Cuddalore", name: "Cuddalore" },
          { id: 6, val: "Dharmapuri", name: "Dharmapuri" },
          { id: 7, val: "Dindigul", name: "Dindigul" },
          { id: 8, val: "Erode", name: "Erode" },
        ];
      }
      return districts;
    },
  },
};
</script>

<style>
</style>
