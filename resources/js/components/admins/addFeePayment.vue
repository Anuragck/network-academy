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
        @click.prevent="clear_reciept()"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div style="display: none" id="pdfGenerate">
      <!--**********************************-->
      <div class="p-5">
        <div id="canvas_div_pdf">
          <div class="container">
            <div class="row">
              <img
                src="/images/logo-final.png"
                class="mx-auto d-block"
                alt="Cinque Terre"
                style="width: 25%"
              />
              <div class="col-md-12 mt-4">
                <div class="row">
                  <!-- <div class="col-md-12 "> -->
                  <div class="col-auto">
                    <h6>Student Id: {{ forRecieptData.student_id }}</h6>
                    <h6>Student Name : {{ joined_student_name }}</h6>
                  </div>

                  <div class="col-auto ml-auto">
                    <h6>Reciept No: {{ forRecieptData.id }}</h6>
                    <h6>Date : {{ forRecieptData.paid_date | myDate }}</h6>
                  </div>
                  <!-- </div> -->
                </div>
                <br />
                <div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>
                          <h6>Description</h6>
                        </th>
                        <th>
                          <h6>Amount</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="col-md-9">Total Course Fee</td>
                        <td class="col-md-3">
                          <i class="fas fa-rupee-sign" area-hidden="true"></i>
                          {{ totalFee }}
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-9">Balance To Pay</td>
                        <td class="col-md-3">
                          <i class="fas fa-rupee-sign" area-hidden="true"></i>
                          {{ forRecieptData.last_transaction_balance }}
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-9">Amount Paid</td>
                        <td class="col-md-3">
                          <i class="fas fa-rupee-sign" area-hidden="true"></i>
                          {{ forRecieptData.paid_amount }}
                        </td>
                      </tr>
                      <tr>
                        <td class="col-md-9 font-weight-bold">
                          Balance If Any
                        </td>
                        <td class="col-md-3 font-weight-bold text-danger">
                          <i class="fas fa-rupee-sign" area-hidden="true"></i>
                          {{
                            forRecieptData.last_transaction_balance -
                            forRecieptData.paid_amount
                          }}
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div>
                  <div class="col-md-12">
                    <p class="float-right pt-3"><b>Signature</b></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center">
          <button
            @click.prevent="clickPdf()"
            class="btn btn-dark rounded-pill btn-sm"
          >
            Download Reciept <i class="fas fa-download fa-fw"></i>
          </button>

          <button
            @click.prevent="clear_reciept()"
            class="btn btn-dark rounded-pill btn-sm"
          >
            Clear Reciept <i class="fas fa-times fa-fw"></i>
          </button>
        </div>
        <!-- <fee-reciept-pdf></fee-reciept-pdf>-->
        <!--**********************************-->
      </div>
    </div>

    <div id="payFee">
      <div class="modal-body">
        <div class="" v-if="feePayment.last_trans_balance != 0">
          <div class="row">
            <div class="col">
              <p class="">
                Total Course Fee :<span> {{ totalFee }}</span>
              </p>
            </div>
            <div class="col">
              <p class="">
                Balance To Pay :<span>
                  {{ feePayment.last_trans_balance }}</span
                >
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
                <small class="text-danger" v-if="errors.payAmount">
                  {{ errors.payAmount[0] }}
                </small>
<small class="text-danger" v-if="feePayment.last_trans_balance < feePayment.payAmount">
                   Fee Amount Exceeded !
                </small>
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

 <div class="" v-else>
<h1>dddddd</h1>
 </div>
      </div>
    </div>

    <div class="modal-footer">
      <button
        type="button"
        class="btn btn-dark btn-sm rounded-pill"
        data-dismiss="modal"
        @click.prevent="clear_reciept()"
      >
        Close
      </button>
    </div>
  </div>
</template>

<script>
import html2pdf from "html2pdf.js";
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

      errors: {},
    };
  },

  methods: {
    clickPdf() {
      var element = document.getElementById("canvas_div_pdf");

      var opt = {
        margin: 1,
        filename: "reciept.pdf",
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
      };

      var result = html2pdf().from(element).set(opt).save();
      // html2pdf(element, opt);

      this.clear_reciept();
    },
    addPayment() {
      axios
        .post("/admin/addPaymentEntry/" + this.student_id, this.feePayment)
        .then((res) => {
          console.log("success");
          if (res.data.id) {
            this.forRecieptData = res.data;

            document.getElementById("pdfGenerate").style.display = "block";
            document.getElementById("payFee").style.display = "none";

            Toast.fire({
              icon: "success",
              title: "Payment Added",
            });
          }

          if (res.data == "fee_exceed") {
            Toast.fire({
              icon: "danger",
              title: "Fee Amount Exceeded !",
            });
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          console.log("errors");
        });
    },

    clear_payment_field() {
      this.feePayment.payAmount = "";
    },

    clear_reciept() {
      this.clear_payment_field();
      document.getElementById("payFee").style.display = "block";
      document.getElementById("pdfGenerate").style.display = "none";

      this.$refs.add_payment_entry_close.click();
      bus.$emit("AfterActionJoined");
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

    // bus.$on("clearReciept", () => {
    //     this.clear_payment_field();
    //   document.getElementById("payFee").style.display = "block";
    //   document.getElementById("pdfGenerate").style.display = "none";

    //     this.$refs.add_payment_entry_close.click();
    //     bus.$emit("AfterActionJoined");

    // });
  },
};
</script>
