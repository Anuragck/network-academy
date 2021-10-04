<template>
  <div>
    <div class="modal-header">
      <h5 class="modal-title" id="addCallEntry">
        {{ enquirer_name }}
      </h5>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
        ref="add_call_entry_close"
        @click.prevent="clear_form_field()"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="container">
        <form method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="call-entry-date" class="text-muted font-weight-bold"
                  >Date
                </label>

                <input
                  type="date"
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="call-entry-date"
                  aria-describedby="emailHelp"
                  placeholder="call-entry-date"
                  name="theDate"
                  v-model="callEntry.theDate"
                />
              </div>
 <small class="text-danger" v-if="errors.theDate">
                  {{ errors.theDate[0] }}</small>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="call-entry-time" class="text-muted font-weight-bold"
                  >Select Time
                </label>
                <div class="row">
                  <div class="col">
                    <select
                      class="
                        form-control
                        rounded-pill
                        shadow-sm
                        enqry-input-border
                      "
                      id="call-entry-time"
                      name="timeHour"
                      v-model="callEntry.timeHour"
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
                  </div>
                  <div class="col">
                    <select
                      class="
                        form-control
                        rounded-pill
                        shadow-sm
                        enqry-input-border
                      "
                      id="call-entry-time-minute"
                      name="timeMin"
                      v-model="callEntry.timeMin"
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
                      class="
                        form-control
                        rounded-pill
                        shadow-sm
                        enqry-input-border
                      "
                      id="call-entry-time-ampm"
                      name="timeAmPm"
                      v-model="callEntry.timeAmPm"
                    >
                      <option value="" class="pb-3">AM/PM</option>
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
                  </div>
                </div>
<span class="ml-2"><small class="text-danger" v-if="errors.timeHour">
                  {{ errors.timeHour[0] }}</small></span>
<span class="ml-2"><small class="text-danger" v-if="errors.timeMin">
                  {{ errors.timeMin[0] }}</small></span>
<span class="ml-2"><small class="text-danger" v-if="errors.timeAmPm">
                  {{ errors.timeAmPm[0] }}</small></span>
              </div>
            </div>
            <!--colend-->

          </div>
          <!--row end-->

          <div class="row pt-1">
            <div class="col">
              <div class="form-group">
                <label for="call-satus" class="text-muted font-weight-bold"
                  >Select Call Status
                </label>

                <select
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="call-satus"
                  name="callStatus"
                  v-model="callEntry.callStatus"
                >
                  <option value="" class="pb-3">Choose call status</option>
                  <option value="Connected">Connected</option>
                  <option value="Not Answered">Not Answered</option>
                  <option value="Call Waiting">Call Waiting</option>
                  <option value="Out Of Coverage">Out Of Coverage</option>
                  <option value="Rejected">Rejected</option>
                </select>
                <small class="text-danger" v-if="errors.callStatus">
                  {{ errors.callStatus[0] }}</small>
              </div>
            </div>
            <!--col end-->

            <div class="col" v-if="callEntry.callStatus == 'Connected'">
              <div class="form-group">
                <label for="call-priority" class="text-muted font-weight-bold"
                  >Select Priority
                </label>

                <select
                  class="form-control rounded-pill shadow-sm enqry-input-border"
                  id="call-priority"
                  name="leadPriority"
                  v-model="callEntry.leadPriority"
                >
                  <option value="" class="pb-3">Selcet Priority</option>
                  <option value="High">High Priority</option>
                  <option value="Medium">Medium Priority</option>
                  <option value="Low">Low Priority</option>
                </select>
               <small class="text-danger" v-if="errors.leadPriority">
                  {{ errors.leadPriority[0] }}</small>
              </div>
            </div>
            <!--col end-->
          </div>
          <!--row end-->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="enquirremarks" class="text-muted font-weight-bold"
                  >Remarks <small class="text-muted">( Optional )</small></label
                >
                <textarea
                  name="remarks"
                  rows="3"
                  placeholder="add remarks here"
                  class="form-control shadow enqry-input-border"
                  style="border-radius: 1.1rem"
                  v-model="callEntry.remarks"
                ></textarea>
              </div>
            </div>
            <!--col end-->
          </div>
          <!--row end3-->
          <div class="text-center pt-3 pb-2">
            <button
              @click.prevent="saveCallEntry()"
              type="submit"
              class="btn btn btn-outline-dark rounded-pill shadow"
            >
              Save <i class="fas fa-angle-double-right fa-fw"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <button
        type="button"
        class="btn btn-dark btn-sm rounded-pill"
        data-dismiss="modal"
        @click.prevent="clear_form_field()"
      >
        Close
      </button>
    </div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  data() {
    return {
      errors: {},

      enqId: "",
      enquirer_name: "",
      //   theDate: moment().format("YYYY-MM-DD"),
      //   unixDate: moment().unix(),

      callEntry: {
        theDate: moment().format("YYYY-MM-DD"),
        timeHour: "",
        timeMin: "",
        timeAmPm: "",
        callStatus: "",
        leadPriority: "",
        remarks: "",
      },
    };
  },
  methods: {
    saveCallEntry() {
      axios
        .post("/admin/addCallEntries/" + this.enqId, this.callEntry)
        .then((res) => {
          if (res.data == "success") {
            this.$refs.add_call_entry_close.click();
            bus.$emit("AfterAction");
            this.clear_form_field();

            Toast.fire({
              icon: "success",
              title: "Added successfully",
            });

          }
        }) .catch((error) => {
          this.errors = error.response.data.errors;
          console.log("errors");
        });
    },

    clear_form_field() {
      this.callEntry.timeHour = "";
      this.callEntry.timeMin = "";
      this.callEntry.timeAmPm = "";
      this.callEntry.callStatus = "";
      this.callEntry.leadPriority = "";
      this.callEntry.remarks = "";
      //   for (let er in this.errors) {
      //     this.errors[er] = "";
      //   }

 this.errors={};
    },
  },
  mounted() {
    bus.$on("enq_id", (enquiry) => {
      this.enqId = enquiry.id;
      this.enquirer_name = enquiry.enquirer_name;
    });
  },
};
</script>

