<template>
  <div>
    <!-- category modal -->
    <div class="modal-header">
      <h5 class="modal-title"></h5>
      <button
        type="button"
        ref="cancel_category_btn"
        class="close"
        data-dismiss="modal"
        aria-label="Close"
@click="clear_form_field()"
      >
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <!-- content  -->

      <div class="row">
        <div class="col-md-12">
          <div class="registration-form-admin">
            <form
              class="form-horizontal"
              method="POST"
              enctype="multipart/form-data"
              @submit.prevent="addCategory()"
            >
              <div class="card-body">
                <h4 class="card-title text-center">
                  <b>{{ title }} </b>
                </h4>

                <div class="row">
                  <div class="col">
                   <div class="form-group">

<label for="course-category-name" class="text-muted font-weight-bold">Enter Course Category Name</label>
                                <input id="category_name" type="text" placeholder="Enter Course Category Name" class="form-control item shadow-sm" name="category_name"  v-model="category.category_name" required autocomplete="username" autofocus>

                              <small class="text-danger" v-if="errors.category_name">
                    {{ errors.category_name[0] }}</small>
                            </div>

                   <div class="form-group ">

<label for="course-category-img" class="text-muted font-weight-bold">Course Category Image</label>
                    <input
                      type="file"
                      class="form-control shadow-sm pb-3"
                      id="category_image"
                      name="category_image"
                      placeholder="category_image"
                      ref="category_image"
                      accept="image/*"

                      @change="categoryImage($event)"
                    style=" border-radius: 25px 25px 25px 25px; width:100% ;"/>


                  <small class="text-danger" v-if="errors.category_image">
                    {{ errors.category_image[0] }}</small
                  >
                </div>

                    <div class="border-top text-center">
                      <div class="card-body text-end">
                       <button
                      type="submit"
                      class="btn btn btn-sm-block btn-dark rounded-pill shadow"
                      name="arrivalsave"
                      :disabled="isloading"
                    >
                      Save
                    </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- content  ends -->
    </div>

    <div class="modal-footer"></div>

    <!-- category modal ends  -->
  </div>
</template>

<script>
export default {
  props: ["edit"],
  data() {
    return {
      title: "Add Category",
      isloading: false,
      category: {
        category_name: "",

        category_image: "",
      },

      errors: {},
    };
  },
  mounted() {},
  created() {

    if (this.edit) {
      var vm = this;
      vm.title = "Edit Category";
      bus.$on("edit-category", function (category) {
        vm.clear_form_field();
        vm.category.id = category.id;
        vm.category.category_name = category.category_name;
      });
    }
  },

  methods: {
    addCategory() {
      this.isloading = true;
      let upload = new FormData();
      if (this.edit) {
        upload.append("id", this.category.id);
      }

      upload.append("category_name", this.category.category_name);

      upload.append("category_image", this.category.category_image);

      axios
        .post("/admin/add-category", upload)
        .then((res) => {
          console.log("succss");
          this.clear_form_field();

          this.$refs.cancel_category_btn.click();
          this.$refs.category_image.value = "";

          bus.$emit("category-added");
            Toast.fire({
            icon: 'success',
            title: 'Category Added successfully'
            })
          this.isloading = false;
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          this.isloading = false;
          console.log("errors");
        });
    },

    categoryImage(e) {
      this.category.category_image = e.target.files[0];
    },
    clear_form_field() {
      for (let data in this.category) {
        this.category[data] = "";
      }

      for (let er in this.errors) {
        this.errors[er] = "";
      }
    },
  },
};
</script>
