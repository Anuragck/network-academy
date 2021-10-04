<template>
  <div>

    <div
      class="modal fade category-modal-lg"
      tabindex="-1"
      data-backdrop="static"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <categories-page> </categories-page>
        </div>
      </div>
    </div>

    <!-- modal end -->

    <!-- course table  -->
<!--loading preloader start-->
<the-loading v-if="loading"></the-loading>
<!--loading preloader end-->

<div class="card mt-3 shadow " v-else>
  <div class="card-header">
<button type="button" class="btn btn btn-sm-block btn-dark rounded-pill float-right shadow" data-toggle="modal" data-target=".category-modal-lg">Add Category <i class="fas fa-plus-circle fa-fw"></i></button>
    <span class="h5 font-weight-bold">Course Category List</span>
  </div>
  <div class="card-body">
    <div class="table-responsive">
  <table class="table ">
    <thead>
      <tr>
        <th scope="col">Sl.No</th>
        <th scope="col">Course Category Name</th>
        <th scope="col">Actions</th>


      </tr>
    </thead>
    <tbody>
    <tr v-for="(category, index) in category_list" :key="category.id">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ category.category_name }}</td>

                <td>
                  <button
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill"
                    data-toggle="modal"
                    data-target=".category-edit-modal-lg"
                    name=""
                    @click="editCategory(category)"
                  >
                    Edit <i class="fas fa-edit fa-fw"></i>
                  </button>
                </td>


              </tr>


    </tbody>
  </table>
</div>
  </div>
  <div class="card-footer text-muted">

  </div>
</div>


<!-- course table end -->
    <!-- Edit category modal -->

    <div
      class="modal fade category-edit-modal-lg"
      tabindex="-1"
      data-backdrop="static"
      role="dialog"
      aria-labelledby="myLargeModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <categories-page :edit="true"> </categories-page>
        </div>
      </div>
    </div>

    <!-- modal end -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      category_list: {},

loading:false,
    };
  },
  created() {
    this.getCategory();
    var vm = this;
    bus.$on("category-added", function () {
      vm.getCategory();
    });
  },

  methods: {
    getCategory() {
 this.loading = true //the loading begin
      axios
        .get("/admin/get-category")
        .then((response) => {
          this.category_list = response.data;
        })
        .catch((err) => {
          console.log(err);
        }).finally(() => (this.loading = false)) ;// set loading to false when request finish;;
    },

    editCategory(category) {
      bus.$emit("edit-category", category);
    },
  },
};
</script>

<style>
</style>
