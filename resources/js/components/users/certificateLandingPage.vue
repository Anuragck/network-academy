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

<!-- <ShareNetwork
    network="facebook"
    :url="certificate_details.certificate_path"
    title="title test"
    description="test description"
    quote="test"
    hashtags="vuejs,vite"
  >
    Share on Facebook
</ShareNetwork> -->

    <div class="row px-5 mb-5 pb-5">
      <div class="col-md-6">
        <div class="card mb-3 border-0 shadow-sm">
          <div class="row no-gutters">
            <div class="col-md-4 text-center">
              <img
                src="/images/certificate-section/verified.png"
                class="img-fluid pt-5 pb-2"
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
<div class="pt-4 float-right">
<a class="btn btn-sm btn-dark float-right rounded-pill" :href=" '/uploads/completion_certificates/' +
            students_details.student_name+'-'+certificate_details.certificate_id +
            '.png'" :download=" students_details.student_name+'-'+certificate_details.certificate_id">Download <i class="fas fa-cloud-download-alt fa-fw"></i></a>
<div class="div pt-5">
<h6 class="text-muted">Share your achievement on social media. </h6>



  <ShareNetwork
    v-for="network in networks"
    :network="network.network"
    :key="network.network"
    :style="{color: network.color}"
    :url="certificate_details.certificate_path"
     :title="sharing.title"
    :description="sharing.description"
    :quote="sharing.quote"
    :hashtags="sharing.hashtags"
    :twitterUser="sharing.twitterUser"

  >
    <i :class="network.icon"></i>
    <span>{{ network.name }}</span>
  </ShareNetwork>
</div>
</div>

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
    return {

 sharing: {

        title: 'sharing title here.',
        description: 'sharing description here.',
        quote: 'sharing quote here',
        hashtags: 'vuejs,vite,javascript',
        twitterUser: 'youyuxi'
      },
  networks: [
        { network: 'email', name: 'Email', icon: 'far fah fa-lg fa-envelope ml-3', color: '#FF5647', },
        { network: 'facebook', name: 'Facebook', icon: 'fab fah fa-lg fa-facebook-f ml-3', color: '#3b5998'},
        { network: 'linkedin', name: 'LinkedIn', icon: 'fab fah fa-lg fa-linkedin ml-3', color: '#094b6b' },

        { network: 'pinterest', name: 'Pinterest', icon: 'fab fah fa-lg fa-pinterest ml-3', color: '#E60023' },
        { network: 'telegram', name: 'Telegram', icon: 'fab fah fa-lg fa-telegram-plane ml-3', color: '#0088cc' },
        { network: 'twitter', name: 'Twitter', icon: 'fab fah fa-lg fa-twitter ml-3', color: '#1DA1F2' },

        { network: 'whatsapp', name: 'Whatsapp', icon: 'fab fah fa-lg fa-whatsapp ml-3', color: '#25D366' },


      ]
    };
  },

  created() {
    // console.log(this.students_details);
  },

  methods: {},


};

</script>
