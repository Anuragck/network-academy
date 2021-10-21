
<template>
  <div>


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
          data-target=""
        >
          Add Placements <i class="fas fa-plus-circle fa-fw"></i>
        </button>
        <span class="h5 font-weight-bold">Placements Details List</span>
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
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr
              >
                <th scope="row">{{ ' 1 '}}</th>
                <td>{{ 'name' }}</td>
                <td>{{ 'designation' }}</td>
               <td>{{ 'description' }}</td>

                <td class="text-center">
                  <button
                    type="button"
                    class="btn btn-sm btn-dark rounded-pill"
                    data-toggle="modal"
                    data-target="#"
                    name=""
                    title="Edit"
                  >
                    <i class="fas fa-edit fa-fw"></i>
                  </button>

                  <button
                    type="button"
                    class="btn btn-sm btn-outline-danger rounded-pill ml-2"
                    data-toggle="modal"
                    name=""
                    title="Delete"
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

      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,

    };
  },
  created() {

  },

  methods: {


  },
};
</script>

<style>
</style>
