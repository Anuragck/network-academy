<template>
  <div class="container-fluid">
    <section class="single-page-header-certificate">
      <div class="container-fluid px-5">
        <div class="row">
          <div class="col-md-12">
            <p>Course Certificate</p>
            <h5>{{ students_details.get_course_names.course_name }}</h5>
          </div>
        </div>
      </div>
    </section>



    <div class="row px-5 mb-5 pb-5">
      <div class="col-md-6">
        <div class="card mb-3 border-0 shadow-sm">
          <div class="row no-gutters">
            <div class="col-md-4 text-center">
              <img
                src="/images/certificate-section/verified.png"
                class="img-fluid pt-5"
                alt="..."
                width="100px"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body" style="background: #7fc24149">
                <h5 class="card-title">
                  Completed By {{ students_details.student_name }}
                </h5>
                <p class="card-text text-justify">
                  {{ students_details.student_name }} 's account is verified.
                  Network Academy certifies their successful completion of
                  {{ students_details.get_course_names.course_name }} course.
                </p>
                <p class="card-text">
                  <small class="text-muted">{{
                    certificate_details.course_completed_date | myDate
                  }}</small>
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="card border-0">
          <div class="card-body">
            <h5>{{ students_details.get_course_names.course_name }}</h5>
            <p class="text-justify">
              {{ students_details.get_course_names.small_description }}
            </p>
            <button
              class="btn btn-dark rounded-pill float-right"
              type="button"
              data-toggle="modal"
              data-target="#enquire_single_Modal"
            >
              Enroll Now <i class="fas fa-angle-double-right fa-fw"></i>
            </button>
          </div>
        </div>

        <div class="card mt-2 border-0">
          <div class="card-body">
            <h6>Course Description</h6>
            <p
              class="text-justify"
              v-html="students_details.get_course_names.course_description"
            >
              {{ students_details.get_course_names.course_description }}
            </p>
 <a v-if="students_details.get_course_names.course_syllabus != null"
                    class="btn btn-dark rounded-pill float-right mt-3"
                    :href="'/uploads/course_syllabus/' + students_details.get_course_names.course_syllabus" download="download"
                  >
                    Syllabus <i class="fas fa-download fa-fw"></i
                  ></a>
            <!--<button class="btn btn-dark rounded-pill float-right mt-3">Download Syllabus</button>-->
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <img
          :src="
            '/uploads/completion_certificates/' +
            students_details.student_name+'-'+certificate_details.certificate_id +
            '.png'
          "
          class="img-fluid"
          alt="Responsive image"
          width=""
        />
      </div>
    </div>
    <div
      class="modal fade"
      id="enquire_single_Modal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel4"
      aria-hidden="true"
    >
      <div
        class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-lg"
        role="document"
      >
        <div class="modal-content">
          <enquiry-form> </enquiry-form>
        </div>
      </div>
    </div>

    <!--**************ENQUIRE-NOW-MODAL END)*****************************************************************-->
  </div>
</template>
<script>
export default {
  props: ["certificate_details", "students_details"],
  data() {
    return {};
  },

  created() {
    console.log(this.students_details);
  },

  methods: {},
};
</script>
