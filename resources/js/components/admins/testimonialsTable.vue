
<template>
  <div>
    <!--Testimonial  Modal -->
    <div
      class="modal fade"
      id="addTestimonialModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <add-testimonial></add-testimonial>
        </div>
      </div>
    </div>
    <!--add-modal end-->

    <!--Testimonial edit  Modal -->
    <div
      class="modal fade"
      id="editTestimonialModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <add-testimonial :edit="true"></add-testimonial>
        </div>
      </div>
    </div>
    <!--edit-modal end-->

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
          ata-toggle="modal"
          data-target="#addTestimonialModal"
        >
          Add Testimonial <i class="fas fa-plus-circle fa-fw"></i>
        </button>
        <span class="h5 font-weight-bold">Testimonials List</span>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sl.No</th>
                <th scope="col">Name</th>
                <th scope="col">Designation</th>
                <th scope="col">Description</th>
            <th scope="col">Section</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(testmonial, index) in testimonialsList.data"
                :key="testmonial.id"
              >
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ testmonial.name }}</td>
                <td>{{ testmonial.designation }}</td>
                <!-- <td>{{ testmonial.description }}</td> -->
                <td v-if="testmonial.description.length < 50">
                  {{ testmonial.description }}
                </td>
                <td v-if="testmonial.description.length >= 50">
                  {{ testmonial.description.substring(0, 50) + ".." }}
                </td>
<td class="" v-if="testmonial.section_bit == '1'"><span class="badge badge-pill badge-primary">Testimonial</span></td>
<td class="" v-if="testmonial.section_bit == '2'"><span class="badge badge-pill badge-success">Placements</span></td>
                <td class="text-center">
                  <button
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill"
                    data-toggle="modal"
                    data-target="#editTestimonialModal"
                    name=""
                    title="Edit"
                    @click="editTestimonial(testmonial)"
                  >
                    <i class="fas fa-edit fa-fw"></i>
                  </button>

                  <button
                    type="button"
                    class="btn btn-sm btn-outline-danger rounded-pill ml-2"
                    data-toggle="modal"
                    name=""
                    title="Delete"
                    @click="deleteTestimonial(testmonial)"
                  >
                    <i class="fas fa-trash-alt fa-fw"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer">
        <pagination
          :data="testimonialsList"
          @pagination-change-page="getTestimonials"
          align="center"
        >
        </pagination>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,

      testimonialsList: {},
      loading: false,
    };
  },
  created() {
    this.getTestimonials();

    var _this = this;
    bus.$on("testimonial-added", function () {
      _this.getTestimonials();
    });
  },

  methods: {
    getTestimonials(page = 1) {
      this.loading = true; //the loading begin
      axios
        .get("/admin/get-testimonials?page=" + page)
        .then((response) => {
          this.testimonialsList = response.data;
        })
        .finally(() => (this.loading = false)); // set loading to false when request finish;
    },

    editTestimonial(testmonial) {
      bus.$emit("edit-testimonial", testmonial);
    },

    deleteTestimonial(testmonial) {
      Swal.fire({
        title: "Are you sure?",
        // text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post("/admin/delete-testimonials", testmonial)
            .then((response) => {
              if (response.data == "success") {
                this.getTestimonials();
                Toast.fire({
                  icon: "error",
                  title: "Record Deleted successfully",
                });
              }
            });
        }
      });
    },
    clear_form_field() {},
  },
};
</script>

<style>
</style>
