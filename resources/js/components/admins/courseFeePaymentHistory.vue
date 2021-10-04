<template>
  <div>
    <div class="modal-header">
      <h6 class="modal-title" id="paymentHistory">
        {{ joined_student_name }} {{ " - Payment History" }}
      </h6>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>


<!--loading preloader start-->
<the-loading v-if="loading"></the-loading>
<!--loading preloader end-->
    <div class="modal-body" v-else>
      <div
        class="qa-message-list "
        id="wallmessages"
        v-for="history in paymentHistory"
        :key="history.id"
      >
        <div
          class="message-item shadow-sm"
          id="m16"
          v-for="fee in history.get_payment_histories"
          :key="fee.id"
        >
          <div class="message-inner">
            <div class="message-head clearfix">
              <div class="user-detail">
                <h5 class="handle">{{ "Reciept No: " }} {{ fee.id }}</h5>
                <div class="post-meta">
                  <div class="asker-meta">
                    <span class="qa-message-what"></span>
                    <span class="qa-message-when">
                      <span class="qa-message-when-data font-weight-bold text-muted">
                        {{ "Payment Date : " }}
                        {{ fee.paid_date | myDate }}</span
                      >
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="qa-message-content ">
              {{ "Paid Amount : " }} {{ fee.paid_amount }}{{ "/-" }}
            </div>
            <div class="qa-message-content">
              Balance If Any :<span>
                {{ fee.last_transaction_balance - fee.paid_amount }}
                {{ "/-" }}</span
              >
            </div>
          </div>
        </div>
      </div>


    </div>

    <div class="modal-footer">
      <button
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
import moment from "moment";
export default {
  data() {
    return {
      student_id: "",
      joined_student_name: "",

      paymentHistory: {},

loading:false,
    };
  },

  methods: {
    getPaymentHistory() {
      axios
        .get("/admin/get-payment-history", {
          params: {
            st_id: this.student_id,
          },
        })
        .then((response) => {
          this.paymentHistory = response.data;

        }).finally(() => (this.loading = false)) ;// set loading to false when request finish;;
    },
  },

  created() {
    bus.$on("joined_details_for_payment_history", (joined) => {
this.loading = true //the loading begin
      this.student_id = joined.enquired_id;
      this.joined_student_name = joined.student_name;

      this.getPaymentHistory();

    });
  },
};
</script>
<style scoped>
.message-item {
  margin-bottom: 25px;
  margin-left: 40px;
  position: relative;
}
.message-item .message-inner {
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 3px;
  padding: 10px;
  position: relative;
}
.message-item .message-inner:before {
  border-right: 10px solid #ddd;
  border-style: solid;
  border-width: 10px;
  color: rgba(0, 0, 0, 0);
  content: "";
  display: block;
  height: 0;
  position: absolute;
  left: -20px;
  top: 6px;
  width: 0;
}
.message-item .message-inner:after {
  border-right: 10px solid #fff;
  border-style: solid;
  border-width: 10px;
  color: rgba(0, 0, 0, 0);
  content: "";
  display: block;
  height: 0;
  position: absolute;
  left: -18px;
  top: 6px;
  width: 0;
}
.message-item:before {
  background: #fff;
  border-radius: 2px;
  bottom: -30px;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
  content: "";
  height: 100%;
  left: -30px;
  position: absolute;
  width: 3px;
}
.message-item:after {
  background: #fff;
  border: 2px solid #ccc;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  content: "";
  height: 15px;
  left: -36px;
  position: absolute;
  top: 10px;
  width: 15px;
}

.message-item .message-head {
  border-bottom: 1px solid #eee;
  margin-bottom: 8px;
  padding-bottom: 8px;
}
.message-item .message-head .avatar {
  margin-right: 20px;
}
.message-item .message-head .user-detail {
  overflow: hidden;
}
.message-item .message-head .user-detail h5 {
  font-size: 16px;
  font-weight: bold;
  margin: 0;
}





</style>
