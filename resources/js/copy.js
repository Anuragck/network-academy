

require('./bootstrap');

window.Vue = require('vue').default;
window.bus = new Vue();
export const bus = new Vue();





Vue.use(VueRouter)

// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.Swal=Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  })
window.Toast=Toast;


import moment from 'moment';
//for show date in correct format on vue component
Vue.filter('myDate',function(dateFormatted){
    return moment(dateFormatted).format("DD - MM - YYYY");
})

// // Basic Use - Covers most scenarios
// import { VueEditor } from "vue2-editor";
// Vue.use(VueEditor);
import Vue2Editor from "vue2-editor";

Vue.use(Vue2Editor);

// image uploader

// import ImageUploader from 'vue-image-upload-resize'
// Vue.use(ImageUploader);
//vue js social sharing
import VueSocialSharing from 'vue-social-sharing'

Vue.use(VueSocialSharing);



//  vue pagination
Vue.component('pagination', require('laravel-vue-pagination'));


// vue-router
import Vue from 'vue'
import VueRouter from 'vue-router'

const routes = [


    { path: '/admin/dashboard', component: require('./components/admins/dashboard.vue').default },
    { path: '/courses-table', component: require('./components/admins/coursesTable.vue').default },
    { path: '/categories-table', component: require('./components/admins/categoriesTable.vue').default },
    { path: '/batches-table', component: require('./components/admins/batchesTable.vue').default },

    { path: '/enquiry-table', component: require('./components/admins/enquiriesTable.vue').default },
    { path: '/joined-students', component: require('./components/admins/joinedStudents.vue').default },
    { path: '/dropped-list', component: require('./components/admins/droppedList.vue').default },
    { path: '/testimonial-table', component: require('./components/admins/testimonialsTable.vue').default },


//   { path: '/enquiry-test', component: require('./components/enquiryTest.vue').default },



  ]


  const router = new VueRouter({
    mode: 'history',
    routes,
    // short for `routes: routes`
  })





Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('fee-reciept-pdf', require('./components/admins/feeRecieptPdf.vue').default);


Vue.component('navigation-page', require('./components/admins/navigation.vue').default);
Vue.component('courses-page', require('./components/admins/courses.vue').default);

Vue.component('categories-page', require('./components/admins/categories.vue').default );
Vue.component('batches-page', require('./components/admins/batches.vue').default);





Vue.component('user-index-courses', require('./components/users/indexCoursePage.vue').default);
Vue.component('user-index-categories', require('./components/users/indexCategoryPage.vue').default);
Vue.component('user-index-testimonials', require('./components/users/indexTestimonials.vue').default);

Vue.component('user-main-courses', require('./components/users/mainCoursePage.vue').default);
Vue.component('user-single-courses', require('./components/users/singleCoursePage.vue').default);

Vue.component('enquiry-form', require('./components/users/enquiry.vue').default);
Vue.component('follow-up-history', require('./components/admins/followUpHistory.vue').default);
Vue.component('add-call-entry', require('./components/admins/addCallEntry.vue').default);
Vue.component('add-conversion-status', require('./components/admins/addConversionStatus.vue').default);
Vue.component('add-new-lead', require('./components/admins/addNewLead.vue').default);

Vue.component('add-fee-payment', require('./components/admins/addFeePayment.vue').default );
Vue.component('course-fee-payment-history', require('./components/admins/courseFeePaymentHistory.vue').default );


Vue.component('the-loading', require('./components/admins/loading.vue').default );

Vue.component('certificate-landing-page', require('./components/users/certificateLandingPage.vue').default);


Vue.component('search-courses', require('./components/users/search.vue').default);
Vue.component('add-testimonial', require('./components/admins/addTestimonial.vue').default );


const app = new Vue({
    el: '#app',
    router
});


