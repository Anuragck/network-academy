<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseBatchController;
use App\Http\Controllers\CourseEnquiryController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardCountController;
use App\Http\Controllers\DroppedListController;
use App\Http\Controllers\EnrolledEnquiryController;
use App\Http\Controllers\FeePaymentController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\JoinedStudentsController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\preventBackHistory;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [UserPagesController::class, 'index']);
Route::get('/about', [UserPagesController::class, 'about']);
Route::get('/courses/{category}', [UserPagesController::class, 'course']);
Route::get('/gallery', [UserPagesController::class, 'gallery']);
Route::get('/placements', [UserPagesController::class, 'placements']);
Route::get('/contact', [UserPagesController::class, 'contact']);

Route::get('/terms', [UserPagesController::class, 'terms']);
Route::get('/privacy-policy', [UserPagesController::class, 'privacy']);

Route::get('/site-map', [UserPagesController::class, 'sitemap']);

Route::get('/verify-certificate-page', [UserPagesController::class, 'verifyCertificatePage']);
Route::get('/verify-certificate', [CertificateController::class, 'verifyCertificate']);




Route::get('/courseView/{id}', [UserPagesController::class, 'courseMain']);

Route::get('/index-page-courses', [CourseController::class, 'getIndexPageCourses']);
Route::get('/main-page-courses', [CourseController::class, 'getMainPageCourses']);
Route::get('/get-index-category', [CourseCategoryController::class, 'getIndexCategory']);



Route::post('/add-enquiry', [CourseEnquiryController::class, 'addEnquiry']);
Route::get('/get-enquiry-courses', [CourseEnquiryController::class, 'getEnquiryCourses']);
Route::get('/get-enquiry-batches', [CourseEnquiryController::class, 'getEnquiryBatches']);










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//admin routes

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'preventBackHistory']], function () {

    Route::get('dashboard', [AdminPagesController::class, 'dashboard'])->name('admin.dashboard');


    Route::post('/add-course', [CourseController::class, 'addCourse']);
    Route::get('/get-courses', [CourseController::class, 'getCourses']);
    Route::get('/categories', [CourseController::class, 'Categories']);

    Route::post('/add-category', [CourseCategoryController::class, 'addCategory']);
    Route::get('/get-category', [CourseCategoryController::class, 'getCategory']);
    Route::get('/get-course-table-categories', [CourseCategoryController::class, 'getCategory']);


    Route::post('/add-batch', [CourseBatchController::class, 'addBatch']);
    Route::get('/get-batches', [CourseBatchController::class, 'getBatches']);
    Route::get('/get-batch-courses', [CourseBatchController::class, 'getBatchCourses']);

    Route::get('/get-enquiries', [CourseEnquiryController::class, 'getEnquiry']);

    Route::post('/change-add-to-home-status', [CourseController::class, 'changeHomeStatus']);

    Route::post('/addCallEntries/{id}', [FollowUpController::class, 'addCall']);

    Route::get('/get-follow-up-history', [FollowUpController::class, 'getHistory']);


    Route::get('/get-enquiry-courses-add-new-lead', [CourseEnquiryController::class, 'getEnquiryCoursesForNewLead']);
    Route::get('/get-enquiry-batches-add-new-lead', [CourseEnquiryController::class, 'getEnquiryBatchesForNewLead']);

    Route::post('/add-new-lead', [CourseEnquiryController::class, 'addNewLead']);


    Route::post('add-conversion-status/{id}', [FollowUpController::class, 'addConversion']);
    Route::get('getJoinedStudents', [JoinedStudentsController::class, 'joinedStudents']);

    Route::get('/get-filter-courses', [JoinedStudentsController::class, 'filterCourses']);
    Route::get('/get-filter-batches', [JoinedStudentsController::class, 'filterBatches']);


    Route::post('/addPaymentEntry/{id}', [FeePaymentController::class, 'addPayment']);
    Route::get('/get-payment-history', [FeePaymentController::class, 'getPaymentHistory']);


    Route::get('/dropped-list', [DroppedListController::class, 'getDropped']);

    Route::post('/course-completed', [CertificateController::class, 'generateCertificate']);

    Route::get('/getCounts', [AdminDashboardCountController::class, 'getCountData']);



    Route::post('/add-testimonials', [TestimonialsController::class, 'addTestimonial']);
    Route::get('/get-testimonials', [TestimonialsController::class, 'getTestmonial']);

    Route::post('/delete-testimonials', [TestimonialsController::class, 'deleteTestimonial']);

});

// user routes


Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'preventBackHistory']], function () {

    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
});






// Route::get('create-pdf-file', [PdfController::class, 'PdfGen']);

// Route::get('feeRecip', [PdfController::class, 'feeReciept']);

Route::get('{path}', [AdminPagesController::class, 'dashboard'])->where('path', '.*')->middleware('isAdmin');
