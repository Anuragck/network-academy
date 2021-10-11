<template>
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
                <h6>Student Id: {{ reciept.student_id }}</h6>
                <h6>Student Name : {{ paid_student_name }}</h6>
              </div>

              <div class="col-auto ml-auto">
                <h6>Reciept No: {{ reciept.id }}</h6>
                <h6>Date : {{ reciept.paid_date | myDate }}</h6>
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
                      {{ total_fee }}
                    </td>
                  </tr>
                  <tr>
                    <td class="col-md-9">Balance To Pay</td>
                    <td class="col-md-3">
                      <i class="fas fa-rupee-sign" area-hidden="true"></i>
                      {{ reciept.last_transaction_balance }}
                    </td>
                  </tr>
                  <tr>
                    <td class="col-md-9">Amount Paid</td>
                    <td class="col-md-3">
                      <i class="fas fa-rupee-sign" area-hidden="true"></i>
                      {{ reciept.paid_amount }}
                    </td>
                  </tr>
                  <tr>
                    <td class="col-md-9 font-weight-bold">Balance If Any</td>
                    <td class="col-md-3 font-weight-bold text-danger">
                      <i class="fas fa-rupee-sign" area-hidden="true"></i>
                      {{
                        reciept.last_transaction_balance - reciept.paid_amount
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
  </div>
</template>
<script>
import html2pdf from "html2pdf.js";
export default {
  data() {
    return {
      reciept: {},
      total_fee: "",

      paid_student_name: "",
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

      bus.$emit("clearReciept");
    },

        clear_reciept(){
       bus.$emit("clearReciept");
        }
  },

  created() {
    bus.$on(
      "paid_data_reciept",
      (forRecieptData, totalFee, joined_student_name) => {
        this.reciept = forRecieptData;
        this.paid_student_name = joined_student_name;
        this.total_fee = totalFee;
      }
    );
  },
};
</script>
