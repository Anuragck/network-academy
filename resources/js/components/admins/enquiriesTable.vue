<template>
  <div>
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
          data-target="#addNewLead"
        >
          Add Lead <i class="fas fa-plus-circle fa-fw"></i>
        </button>
        <span class="h5 font-weight-bold">Enquiry List</span>
        <div class="pr-3 mb-0">
          <router-link to="/joined-students"
            ><span style="font-weight: bold" class="px-2 badge badge-success"
              ><small class="font-weight-bold">Joined List</small></span
            ></router-link
          >
          <router-link to="/dropped-list"
            ><span style="" class="px-2 badge badge-danger"
              ><small class="font-weight-bold">Dropped List</small></span
            ></router-link
          >
        </div>
      </div>

      <div class="ml-auto pr-3 mb-0">
        <span style="background-color: #00800046" class="px-2"
          ><small>High Priority</small></span
        >
        <span style="background-color: #fcf75e65" class="px-2"
          ><small> Medium Priority</small></span
        >
        <span style="background-color: #ed1c233a" class="px-2"
          ><small>Low Priority</small></span
        >
      </div>

      <div class="row mr-auto pl-3">
        <div class="col-6 mr-auto">
          <div class="form-group">
            <label for="Coursename" class="text-muted font-weight-bold"
              >Priority Wise</label
            >
            <select
              class="form-control item shadow-sm rounded-pill"
              name="filter-priority"
              v-model="filter.priority"
            >
              <option value="" class="pb-3">All</option>
              <option value="1">High Priority</option>
              <option value="2">Medium Priority</option>
              <option value="3">Low Priority</option>
            </select>
          </div>
        </div>

        <div class="col-6 mr-auto">
          <div class="form-group">
            <label for="Coursename" class="text-muted font-weight-bold"
              >Source Wise</label
            >
            <select
              class="form-control item shadow-sm rounded-pill"
              name="filter-source"
              v-model="filter.source"
            >
              <option value="">All</option>
              <option value="Website">Website</option>
              <option value="Direct Call">Direct Call</option>
              <option value="Facebook">Facebook</option>
              <option value="Reference">Reference</option>
            </select>
          </div>
        </div>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Source</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Enquired Course</th>
                <th scope="col">Enquired Batch</th>

                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>


            <tbody>
              <tr
                v-for="(enquiry, index) in enquiry_list.data"
                :key="enquiry.id"
                :class="'color' + enquiry.priority_status"
              >
                <th scope="row">{{ index + 1 }}</th>

                <td :class="enquiry.source_of_lead">
                  <strong>{{ enquiry.source_of_lead }}</strong>
                </td>

                <td>{{ enquiry.enquirer_name }}</td>
                <td>{{ enquiry.enquirer_email }}</td>
                <td>{{ enquiry.enquirer_mobile }}</td>
                <td>{{ enquiry.get_course_name.course_name }}</td>
                <td>
                  {{ enquiry.get_course_batch.batch_starting_date | myDate }} /
                  {{ enquiry.get_course_batch.batch_time }}
                </td>

                <td class="text-center">
                  <button
                    @click="viewCallHistory(enquiry)"
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill mt-1 ml-2"
                    data-toggle="modal"
                    data-target="#viewDetails-enquiry"
                    name=""
                    title="view details"
                  >
                    <i class="far fa-eye"></i>
                  </button>

                  <button
                    @click="addCallEntry(enquiry)"
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill ml-2 mt-1"
                    data-toggle="modal"
                    data-target="#addCallEntry"
                    name=""
                    title="Add call entry"
                  >
                    <i class="fas fa-phone fa-fw"></i>
                  </button>

                  <button
                    @click="addConversionStatus(enquiry)"
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill ml-2 mt-1"
                    data-toggle="modal"
                    data-target="#addConvertionStatus"
                    name=""
                    title="Add Convertion Status"
                  >
                    <i class="fas fa-exchange-alt fa-fw"></i>
                  </button>
                </td>
              </tr>

<tr v-if="records">

<span>No records found !</span>

</tr>


              <!-- View Details Modal -->
              <div
                class="modal fade"
                id="viewDetails-enquiry"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <follow-up-history></follow-up-history>
                  </div>
                </div>
              </div>
              <!--view details modal end-->

              <!--call entry add modal start-->
              <div
                class="modal fade"
                id="addCallEntry"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <add-call-entry></add-call-entry>
                  </div>
                </div>
              </div>
              <!--call entry add modal end-->

              <!--convertion status add modal start-->
              <div
                class="modal fade"
                id="addConvertionStatus"
                data-backdrop="static"
                data-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <add-conversion-status></add-conversion-status>
                  </div>
                </div>
              </div>
              <!--convertion status add modal end-->

              <!-- </tr>-->
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <pagination
          :data="enquiry_list"
          @pagination-change-page="getEnquiry"
          align="center"
          :limit="5"
        >
        </pagination>
      </div>
    </div>

    <!--new lead add modal start-->
    <div
      class="modal fade"
      id="addNewLead"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <add-new-lead></add-new-lead>
        </div>
      </div>
    </div>
    <!--new lead status add modal end-->
    <!-- course table end -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      enquiry_list: {},

      enqName: "",
      enqId: "",

      filter: {
        source: "",
        priority: "",
      },
      records:false,
loading:false,
    };
  },

  mounted() {
    this.getEnquiry();
    bus.$on("AfterAction", () => {
      this.getEnquiry();
    });
  },
  methods: {
    viewCallHistory(enquiry) {
      this.enqName = enquiry.enquirer_name;
      this.enqId = enquiry.id;
      bus.$emit("enq_id", enquiry);
    },

    addCallEntry(enquiry) {
      this.enqId = enquiry.id;
      bus.$emit("enq_id", enquiry);
    },

    addConversionStatus(enquiry) {
      this.enqId = enquiry.id;
      bus.$emit("enq_id", enquiry);
    },

    getEnquiry(page = 1) {
 this.loading = true //the loading begin
      axios
        .get("/admin/get-enquiries?page=" + page, {
          params: {
            source: this.filter.source,
            priority: this.filter.priority,
          },
        })
        .then((response) => {
          this.enquiry_list = response.data;


if(this.enquiry_list.data.length == 0){

this.records=true;

}else{
  this.records=false;
}


        })
        .finally(() => (this.loading = false)) ;// set loading to false when request finish;
    },
  },

  watch: {
    "filter.source": function () {
      this.getEnquiry();
    },
    "filter.priority": function () {
      this.getEnquiry();
    },
  },
};
</script>

<style scoped>



.color3 {
  background-color: #ed1c233a;
}
.color2 {
  background-color: #fcf75e65;
}
.color1 {
  background-color: #00800046;
}

.Website {
  color: #cc0099;
}

.Facebook {
  color: #4267b2;
}

.Direct {
  color: #008000;
}

.Reference {
  color: #ff6600;
}
</style>

