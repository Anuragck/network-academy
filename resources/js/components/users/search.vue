<template>
  <div class="home-search-bar">
    <div class="input-group w-100 mt-2">
      <!-- <div class="search-wrapper panel-heading col-sm-12"> -->
        <input
          class="form-control py-2 rounded-pill mr-1"
          type="text"
          v-model="searchQuery"
          placeholder="Search for courses"
        />
 <span class="input-group-append serach-icon-home">
                                <button class="btn rounded-pill border-0 ml-n5" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
      <!-- </div> -->
    </div>

  <div class="dropdown" v-if="searchQuery != ''">
      <div
        id="myDropdown"
        class="dropdown-content max-height-search bg-light"
      >
        <div v-for="item in resultQuery" :key="item.id">
          <a
            v-bind:href="'/courseView/' + item.id"
            target="_blank"
            class="dropdown-item text-dark"
            >{{ item.course_name }}</a
          >

        </div>
      </div>
    </div>

<div class="dropdown" v-if="resultQuery.length == '0' && searchQuery != ''">
      <div
        id="myDropdown"
        class="dropdown-content max-height-search bg-light"
      >
  <a

            class="dropdown-item text-dark"
            >No Results Found</a
          >
<!-- <span class="pl-3">No Results Found</span> -->
      </div>
    </div>

  </div>
</template>
<script>
export default {
  data() {
    return {
      searchQuery: "",
      resources: [],
    };
  },
  methods: {
    getEnquiryCourses() {
      axios
        .get("/get-enquiry-courses")
        .then((response) => {
          this.resources = response.data;
        })
        .catch((err) => {
          console.log("enquiry form errs".err);
        });
    },
  },
  created() {
    this.getEnquiryCourses();
  },
  computed: {
    resultQuery() {
      if (this.searchQuery) {
        return this.resources.filter((item) => {
          return this.searchQuery
            .toLowerCase()
            .split(" ")
            .every((v) => item.course_name.toLowerCase().includes(v));
        });
      } else {
        return this.resources;
      }
    },
  },
};
</script>
<style scoped>
.max-height-search {
  max-height: 200px;
  overflow-y: scroll;
  position: absolute;
  z-index: 99;
border-radius:10px;
top: 10px;
width: 100%;

}
</style>
