<template>
  <div>
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">
        <b>{{ title }} </b>
      </h5>
      <button
        type="button"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
        ref="close_testimonial_modal"
        @click="clear_form_field()"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- content  -->

      <div class="row">
        <div class="col-md-12">
          <div class="">
            <form
              class="form-horizontal"
              method="POST"
              enctype="multipart/form-data"
              @submit.prevent="addTestimonial()"
            >
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label
                        for="course-starting-date"
                        class="text-muted font-weight-bold"
                        >Select Section</label
                      >

                      <select
                        class="form-control rounded-pill shadow-sm"
                        id="Section"
                        name="section"
                        v-model="testimonials.section"
                      >
                        <option value="" disabled selected>
                          Select Section
                        </option>
                        <option value="placements">Placements</option>
                        <option value="testimonial">Testimonials</option>
                      </select>

                      <small
                        class="text-danger"
                        v-if="errors.testimonial_name"
                        >{{ errors.testimonial_name[0] }}</small
                      >
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label
                        for="course-starting-date"
                        class="text-muted font-weight-bold"
                        >Enter Testimonial Name</label
                      >

                      <input
                        type="text"
                        class="form-control item shadow-sm rounded-pill"
                        id="testimonial_name"
                        name="testimonial_name"
                        placeholder="Enter name here "
                        v-model="testimonials.testimonial_name"
                      />

                      <small
                        class="text-danger"
                        v-if="errors.testimonial_name"
                        >{{ errors.testimonial_name[0] }}</small
                      >
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label
                        for="course-starting-date"
                        class="text-muted font-weight-bold"
                        >Enter Designation</label
                      >

                      <input
                        type="text"
                        class="form-control item shadow-sm rounded-pill"
                        id="designation"
                        name="designation"
                        placeholder="Enter designation here "
                        v-model="testimonials.designation"
                      />

                      <small class="text-danger" v-if="errors.designation">{{
                        errors.designation[0]
                      }}</small>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label
                        for="course-category-img"
                        class="text-muted font-weight-bold"
                        >Course Image</label
                      >
                      <input
                        type="file"
                        class="form-control shadow-sm pb-3"
                        id="testimonial_image"
                        name="testimonial_image"
                        ref="testimonial_image"
                        accept="image/*"
                        @change="testimonialImage($event)"
                        style="border-radius: 25px 25px 25px 25px; width: 100%"
                      />

                      <small
                        class="text-danger"
                        v-if="errors.testimonial_image"
                        >{{ errors.testimonial_image[0] }}</small
                      >
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label
                        for="Coursename"
                        class="text-muted font-weight-bold"
                        >Description<small class="text-muted ml-2"
                          >300 to 350 characters (Recommended)</small
                        >
                      </label>
                      <textarea
                        class="form-control form-height item shadow-sm"
                        rows="3"
                        name="description"
                        placeholder="Enter description here"
                        style="border-radius: 20px"
                        v-model="testimonials.description"
                        @keyup="charCount()"
                      ></textarea
                      ><span class="float-right text-danger"
                        >{{ totalcharacter }} characters</span
                      >

                      <small class="text-danger" v-if="errors.description">{{
                        errors.description[0]
                      }}</small>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <div class="card-body text-end">
                    <button
                      type="submit"
                      class="btn btn btn-dark rounded-pill shadow mt-2"
                      name=""
                    >
                      Add Testimonials
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button
        type="button"
        class="btn btn-sm btn-dark rounded-pill"
        data-dismiss="modal"
        @click="clear_form_field()"
      >
        Close
      </button>
    </div>
  </div>
</template>
<script>
export default {
  props: ["edit"],
  data() {
    return {
      totalcharacter: 0,
      title: "Add Testimonial",
      testimonials: {
        section: "",
        testimonial_name: "",
        testimonial_image: "",
        designation: "",
        description: "",
      },
      errors: {},
      loading: false,
    };
  },
  created() {
    if (this.edit) {
      var _this = this;
      _this.title = "Edit Testimonial";
      bus.$on("edit-testimonial", function (testmonial) {
        _this.clear_form_field();
        _this.testimonials.id = testmonial.id;
        if (testmonial.section_bit == "1") {
          _this.testimonials.section = "testimonial";
        }
        if (testmonial.section_bit == "2") {
          _this.testimonials.section = "placements";
        }
_this.totalcharacter=testmonial.description.length;
        _this.testimonials.testimonial_name = testmonial.name;
        _this.testimonials.designation = testmonial.designation;
        _this.testimonials.description = testmonial.description;
      });
    }
  },

  methods: {
    charCount: function () {
      this.totalcharacter = this.testimonials.description.length;
    },
    testimonialImage(e) {
      this.testimonials.testimonial_image = e.target.files[0];
    },

    addTestimonial() {
      let upload = new FormData();

      if (this.edit) {
        upload.append("id", this.testimonials.id);
      }
      upload.append("section", this.testimonials.section);
      upload.append("testimonial_name", this.testimonials.testimonial_name);

      upload.append("testimonial_image", this.testimonials.testimonial_image);
      upload.append("designation", this.testimonials.designation);
      upload.append("description", this.testimonials.description);

      axios
        .post("/admin/add-testimonials", upload)
        .then((response) => {
          if (response.data == "success") {
            this.$refs.close_testimonial_modal.click();
            bus.$emit("testimonial-added");
            Toast.fire({
              icon: "success",
              title: "Testimonial Added successfully",
            });
            this.clear_form_field();
          }
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },

    clear_form_field() {
      for (let data in this.testimonials) {
        this.testimonials[data] = "";
      }

      for (let er in this.errors) {
        this.errors[er] = "";
      }
this.totalcharacter=0;
      this.$refs.testimonial_image.value = "";
    },
  },
};
</script>

