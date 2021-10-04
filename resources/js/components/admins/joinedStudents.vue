<template>
  <div>

<!--loading preloader start-->
<the-loading v-if="loading"></the-loading>
<!--loading preloader end-->
    <!-- course table  -->

    <div class="card mt-3 shadow" v-else>
      <div class="card-header">
        <div class="row">
          <span class="h5 font-weight-bold float-right mt-4 pl-2 text-success"
            >Joined Students List</span
          >

          <div class="col-md-2 ml-auto">
            <div class="form-group">
              <label for="Coursename" class="text-muted font-weight-bold"
                >Joined Date From</label
              >
              <input
                type="date"
                class="form-control item shadow-sm rounded-pill"
                v-model="from_date"
              />
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="Coursename" class="text-muted font-weight-bold"
                >Joined Date To</label
              >
              <input
                type="date"
                class="form-control item shadow-sm rounded-pill"
                v-model="to_date"
              />
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="Coursename" class="text-muted font-weight-bold"
                >Course Wise</label
              >
              <select
                class="form-control item shadow-sm rounded-pill"
                name="filter-course_name"
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
              <label for="Coursename" class="text-muted font-weight-bold"
                >Batch Wise
              </label>
              <select
                class="form-control item shadow-sm rounded-pill"
                name="filter-batch_time"
                v-model="batch_time"
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
                <th scope="col">Joined Course</th>
                <th scope="col">Joined Batch</th>
                <th scope="col">Total Course Fee</th>
                <th scope="col">Fee Status <br />(Balance if any)</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(joined, index) in joinedStudents.data"
                :key="joined.id"
              >
                <th scope="row">{{ index + 1 }}</th>

                <td>
                  <strong>{{ joined.student_name }}</strong>
                </td>

                <td>{{ joined.student_email }}</td>
                <td>{{ joined.student_mobile }}</td>
                <td>{{ joined.get_course_names.course_name }}</td>
                <td>
                  {{ joined.get_course_batches.batch_starting_date | myDate }}/
                  {{ joined.get_course_batches.batch_time }}
                </td>
                <td>{{ joined.joined_course_fee }}</td>
                <td
                  v-if="joined.joined_course_fee == joined.course_fee_recieved"
                >
                  <span class="badge badge-pill badge-success"
                    >Paid <i class="far fa-check-circle fa-fw"></i
                  ></span>
                </td>
                <td v-else>
                  {{ joined.joined_course_fee - joined.course_fee_recieved }}
                </td>

                <td class="text-center">
                  <button
                    @click="paymentHistory(joined)"
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill mt-1 ml-2"
                    data-toggle="modal"
                    data-target="#paymentHistory"
                    name=""
                    title="Payment History"
                  >
                    <i class="fas fa-file-invoice-dollar"></i>
                  </button>

                  <button
                    @click="addFeePayment(joined)"
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill ml-2 mt-1"
                    data-toggle="modal"
                    data-target="#addPaymentEntry"
                    name=""
                    title="Add Payment"
                  >
                    <i class="fas fa-plus-circle"></i>
                  </button>

                  <button
                    @click="courseCompleted(joined)"
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill ml-2 mt-1"
                    name=""
                    title="Mark as course completed"
                  >
                    <i class="fa fa-graduation-cap"></i>
                  </button>
                </td>
              </tr>

              <tr v-if="record">
                <td>No record found !</td>
              </tr>

              <!-- </tr>-->

              <!--payment entry add modal start-->
              <div
                class="modal fade"
                id="addPaymentEntry"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog">
                  <div class="modal-content">
                    <add-fee-payment></add-fee-payment>
                  </div>
                </div>
              </div>
              <!--payment entry add modal end-->

              <!--payment history modal start-->
              <div
                class="modal fade"
                id="paymentHistory"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <course-fee-payment-history></course-fee-payment-history>
                  </div>
                </div>
              </div>
              <!--payment history modal end-->
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <pagination
          :data="joinedStudents"
          @pagination-change-page="getJoined"
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
      joinedStudents: {},
      course_list: {},
      batches_list: {},

      joined_id: "",

      record: false,

      from_date: "",
      to_date: "",
      course_name: "",
      batch_time: "",


loading:false,
    };
  },

  created() {
    this.getJoined();
    this.getCoursesForFilter();
    this.getBatchesForFilter();

    bus.$on("AfterActionJoined", () => {
      this.getJoined();
    });
  },
  methods: {
    addFeePayment(joined) {
      // this.joined_id=joined.enquired_id;
      bus.$emit("joined_details", joined);
    },

    paymentHistory(joined) {
      bus.$emit("joined_details_for_payment_history", joined);
    },

    getJoined(page = 1) {
this.loading = true //the loading begin
      axios
        .get("admin/getJoinedStudents?page=" + page, {
          params: {
            from_date: this.from_date,
            to_date: this.to_date,
            course_name: this.course_name,
            batch_time: this.batch_time,
          },
        })
        .then((response) => {
          this.joinedStudents = response.data;
          if (this.joinedStudents.data.length == 0) {
            this.record = true;
          } else {
            this.record = false;
          }
        }).finally(() => (this.loading = false)) ;// set loading to false when request finish;;
    },

    courseCompleted(joined) {
      Swal.fire({
        title: "Are you sure?",
        text: "Mark as Course Completed !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.post("admin/course-completed", joined).then((response) => {
            if (response.data == "success") {
              Toast.fire({
                icon: "success",
                title: " completed successfully",
              });
            }

            if (response.data == "existingUser") {
              Toast.fire({
                icon: "error",
                title: "Already Completed",
              });
            }
          });
        }
      });
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
    from_date: function () {
      this.getJoined();
    },
    to_date: function () {
      this.getJoined();
    },
    course_name: function () {
      this.getJoined();
    },
    batch_time: function () {
      this.getJoined();
    },
  },
};
</script>

<style scoped>
</style>

