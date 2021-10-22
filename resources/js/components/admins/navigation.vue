<template>
  <div>
    <ul class="list-unstyled components text-secondary">
      <li>
        <router-link to="/admin/dashboard"
          ><i class="fas fa-user-graduate"></i> Dashboard
        </router-link>
      </li>
      <!-- <li>
        <router-link to="forms.html"
          ><i class="fas fa-users"></i> All Registered Users</router-link
        >
      </li> -->
      <li>
        <router-link to="/enquiry-table"
          ><i class="fas fa-table"></i> Enquiry List</router-link
        >
      </li>
 <li>
        <router-link to="/joined-students"
          ><i class="fas fa-table"></i> Joined Students List</router-link
        >
      </li>
 <li>
        <router-link to="/dropped-list"
          ><i class="fas fa-table"></i> Dropped List</router-link
        >
      </li>
      <!-- <li>
        <router-link to="charts.html"
          ><i class="fas fa-user-graduate"></i>Admitted Students</router-link
        >
      </li>
      <li>
        <router-link to="charts.html"
          ><i class="fas fa-user-graduate"></i>Attendance</router-link
        >
      </li>
      <li>
        <router-link to="/enquiry-test"
          ><i class="fas fa-user-graduate"></i>Follow Ups</router-link
        >
      </li> -->
 <li>
        <router-link to="/categories-table"
          ><i class="fas fa-home"></i> Category Add</router-link
        >
      </li>
      <li>
        <router-link to="/courses-table"
          ><i class="fas fa-home"></i> Courses Add</router-link
        >
      </li>

      <li>
        <router-link to="/batches-table"
          ><i class="fas fa-home"></i> Batches Add</router-link
        >
      </li>


      <li>
        <router-link to="/testimonial-table"
          ><i class="fas fa-user-graduate"></i>Testimonials Add</router-link
        >
      </li>

    </ul>
  </div>
</template>

<script>
export default {
  methods: {},
};
</script>

<style scoped>
</style>
