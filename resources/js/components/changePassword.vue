<template>
<div class="container">

<!-- Modal -->
<div class="modal fade" id="passwordChangeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



<div class="modal-body">
<div class="col-md-12">
            <div class="">
                <div class="card-body">

                  <form method="POST" enctype="multipart/form-data" @submit.prevent="changePassword">

                    <div class="form-group">
                      <label for="current_password"><strong>Current Password:</strong></label>
                      <input type="password" class="form-control" v-model="form.currentPassword" name="currentPassword" >
                    <small class="text-danger" v-if="errors.currentPassword">{{ errors.currentPassword[0] }}</small>
                    </div>
                    <!-- End Current Password Input -->
                    <div class="form-group">
                      <label for="new_password"><strong>New Password:</strong></label>
                      <input type="password" class="form-control" v-model="form.password" name="password" >
                    <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                    </div>
                    <!-- End New Password Input -->
                    <div class="form-group">
                      <label for="new_password_confirmation"><strong>Confirm New Password:</strong></label>
                      <input type="password" class="form-control" v-model="form.password_confirmation " name="password_confirmation" >
 <small class="text-danger" v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</small>

                    </div>
<div class="pt-3 pb-3 text-center">
<button class="btn btn-success rounded-pill btn-dark" type="submit">Change Password</button>
        </div>            <!-- End New Confirm Password Input -->
  <div class="modal-footer pt-3">

<button type="button" class="btn btn-outline-dark  rounded-pill " data-dismiss="modal" @click="closeModal">Close</button>
        </div>

                  </form>
                </div>
            </div>
        </div>
    </div>

    </div>
  </div>
</div>

</div>

</template>

<script>
export default {
  data() {
    return {
      errors: [],
      form: {
        currentPassword: "",
        password: "",
        password_confirmation: "",
      },
    };
  },

  methods: {
    //for clear error data after return to the page
    clear_error_data() {
      for (let er in this.errors) {
        this.errors[er] = null;
      }
    },
    clearModalData() {
      this.form = {};
      $("#changePasswordModal").hide();
      $(".modal-backdrop").hide();
    },

    changePassword() {
      var _this = this;

      axios
        .post("/updatePassword", this.form)
        .then(function (res) {
          if (res.data == "changed") {
            _this.clearModalData();
            Swal.fire(
              "Password Changed!",
              "Your Password Has Been Changed Successfully",
              "success"
            );
            _this.errors = [];
          }

          if (res.data == "notChanged") {
            _this.clearModalData();
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Password not changed!",
            });
          }

          if (res.data == "mismatch") {
            // _this.clearModalData();
            Swal.fire({
              icon: "warning",
              title: "Oops...",
              text: "Your Current Password is Wrong!",
            });
          }

          if (res.data == "doNotSamePw") {
            // _this.clearModalData();
            Swal.fire({
              icon: "warning",
              title: "Oops...",
              text: "Your current password cannot be same with the new password!",
            });
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    closeModal() {
      this.errors = [];
      this.form = {};
      $("#changePasswordModal").hide();
    },
  },

  created() {},
};
</script>
