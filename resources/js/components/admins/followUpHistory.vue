<template>


  <div class="">

  <div class="modal-header" >
                      <h5 class="modal-title" id="staticBackdropLabel">
                        {{ enqName }}
                        <!-- {{ enquiry.enquirer_name }}-->
                      </h5>
                      <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        @click.prevent="clear_history_modal()"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">
<!--loading preloader start-->
<the-loading v-if="loading"></the-loading>
<!--loading preloader end-->

    <div v-for="history in followUpHistory" :key="history.id" v-else>
      <div class="row">
        <div class="col">
          <p class="">
            Education :<span> {{ history.enquirer_education  }}</span>
          </p>

          <p class="">
            Enquired Course :<span>
              {{ history.get_course_name.course_name }}</span
            >
          </p>
        </div>

        <div class="col">
          <p class="">
            Location/District :<span> {{ history.enquirer_district }}</span>
          </p>

          <p class="">
            Enquired Batch :<span>
            {{     history.get_course_batch.batch_starting_date |myDate }} - {{     history.get_course_batch.batch_time }}
            </span>
          </p>
        </div>
      </div>

 <div class="row" v-if="history.referee_details">
          <div class="col">
              <div class="offer-content">
                <h6 class="text-muted">Referee Details :</h6>
                <span
                  ><p class="text-justify">
                    {{ history.referee_details }}
                  </p></span
                >
            </div>
          </div>
        </div>





      <hr />
      <h6 class="pb-4">Follow-Up History <span v-if="followUpCount != 0"> <span class="badge badge-pill badge-follow-up shadow float-right "><span class="mt-2"> {{ followUpCount }} {{ ' Followups' }}</span></span> </span></h6>

      <div
        class="container"
        v-for="(followUp, index ) in history.get_follow_up"
        :key="followUp.id"
      >


        <div class="row mt-3 " >
          <div class="col" >

            <div class="follow-up-call offer-default rounded" :class="'historyColor'+index">
<div v-if="index == 0"><span class="badge badge-success float-right">Recent</span></div>
              <div class="badge badge-follow-up shadow">

                <i class="far fa-calendar-alt fa-fw"></i>
                {{ followUp.call_date | myDate }}
              </div>
              <div class="badge badge-follow-up shadow">
                <i class="far fa-clock fa-fw"></i> {{ followUp.call_time }}
              </div>

              <div class="offer-content p-4" >
                <h6 class="text-muted">
                  Call Status :<span> {{ followUp.call_status }}</span>
                </h6>
                <h6 class="text-muted">Remarks :</h6>
                <span
                  ><p class="text-justify">
                    {{ followUp.remarks }}
                  </p></span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<div v-if="follow_up_details == false">
<div class=" text-center">
<span> No History Found</span>
</div>

</div>



  </div>

 <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-dark btn-sm rounded-pill"
                        data-dismiss="modal"
                        @click.prevent="clear_history_modal()"
                      >
                        Close
                      </button>
                    </div>
  </div>


</template>
<script>
// import moment from "moment";
export default {
  data() {
    return {
      enqId: "",
      followUpHistory: {},
      follow_up_details:true,
enqName:'',

followUpCount:'',
loading:false,

    };
  },
  methods: {

clear_history_modal(){
 this.followUpHistory={};
 this.follow_up_details=true;
},
    getFollowUpHistory() {
 this.loading = true //the loading begin
      axios
        .get("/admin/get-follow-up-history", {
          params: {
            enqId: this.enqId,
          },
        })
        .then((response) => {

          this.followUpHistory = response.data;
this.followUpCount=this.followUpHistory[0].get_follow_up.length;
          if( this.followUpHistory[0].get_follow_up.length == 0){

            this.follow_up_details=false;

          }else{
this.follow_up_details=true;
          }


        }).finally(() => (this.loading = false)) ;// set loading to false when request finish;;
    },
  },
created() {
    bus.$on("enq_id", (enquiry) => {
      this.enqId = enquiry.id;
this.enqName = enquiry.enquirer_name;
      this.getFollowUpHistory();

    });
  },
};
</script>

<style scoped>
.historyColor0{



background-color: rgba(112, 252, 19, 0.247);



}


</style>




st
