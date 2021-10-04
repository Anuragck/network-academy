<template>
  <div>
    <div class="modal-header">
      <h6 class="modal-title" id="addPaymentEntry">
        {{ joined_student_name }} {{ " - Add Payment" }}
      </h6>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
        ref="add_payment_entry_close"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div style="display: none" id="pdfGenerate">
      <fee-reciept-pdf></fee-reciept-pdf>
    </div>
    <div id="payFee">
      <div class="modal-body">
        <div class="row">
          <div class="col">
            <p class="">
              Total Course Fee :<span> {{ totalFee }}</span>
            </p>
          </div>
          <div class="col">
            <p class="">
              Balance To Pay :<span> {{ feePayment.last_trans_balance }}</span>
            </p>
          </div>
        </div>
        <hr />
        <div class="row px-3">
          <div class="col">
            <div class="form-group">
              <label for="enquirname" class="text-muted font-weight-bold"
                >Enter Amount To Pay</label
              >
              <input
                type="number"
                min="0"
                class="form-control rounded-pill shadow-sm enqry-input-border"
                id="payAmount"
                placeholder="Enter amount to pay"
                name="payAmount"
                v-model="feePayment.payAmount"
              />
              <small class="text-danger"> </small>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center pt-3 pb-3">
        <button
          @click.prevent="addPayment()"
          type="submit"
          class="btn btn-sm btn-outline-dark rounded-pill"
        >
          Add Payment <i class="fas fa-angle-double-right fa-fw"></i>
        </button>
      </div>
    </div>
    <!--v-if div-->
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
      totalFee: "",
      student_joined_course: "",

      forRecieptData: {},
      feePayment: {
        payAmount: "",
        paymentDate: moment().format("YYYY-MM-DD"),
        last_trans_balance: "",
      },
    };
  },

  methods: {
    addPayment() {
      axios
        .post("/admin/addPaymentEntry/" + this.student_id, this.feePayment)
        .then((res) => {
          console.log("success");
          if (res.data) {
            this.forRecieptData = res.data;

            bus.$emit(
              "paid_data_reciept",
              this.forRecieptData,
              this.totalFee,
              this.joined_student_name
            );

            document.getElementById("pdfGenerate").style.display = "block";
            document.getElementById("payFee").style.display = "none";
            // this.clear_payment_field();
            // this.$refs.add_payment_entry.click();
            // bus.$emit("AfterAction");
            Toast.fire({
              icon: "success",
              title: "Payment Added",
            });
            bus.$emit("AfterActionJoined");
          }
        });
      //  .catch((error) => {
      //   this.errors = error.response.data.errors;
      //   console.log("errors");
      // });
    },

    clear_payment_field() {
      this.feePayment.payAmount = "";
    },
  },

  created() {
    bus.$on("joined_details", (joined) => {
      this.student_id = joined.enquired_id;
      this.joined_student_name = joined.student_name;
      this.totalFee = joined.joined_course_fee;
      this.student_joined_course = joined.joined_course;
      this.feePayment.last_trans_balance =
        joined.joined_course_fee - joined.course_fee_recieved;
    });

    bus.$on("clearReciept", () => {
      document.getElementById("payFee").style.display = "block";
      document.getElementById("pdfGenerate").style.display = "none";
      this.$refs.add_payment_entry_close.click();
      this.clear_payment_field();
    });
  },
};
</script>
