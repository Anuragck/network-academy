<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\JoinedStudent;
use PhpParser\Node\Expr\New_;

class CertificateController extends Controller
{
    public function generateCertificate(Request $request)
    {




        if ($request->enquired_id) {

            $certificate = Certificate::where('student_id', '=', $request->enquired_id)->first();


            if ($certificate) {
                return 'existing-user';
            } else
                $certificate = new Certificate;
            $certificate->student_id = $request->enquired_id;




            // alphanumeric random string generator

            do {
                $length = 8;
                $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

                $certificate_id = substr(str_shuffle($str), 0, $length);

                $found = Certificate::where('certificate_id', $certificate_id)->exists();
            } while ($found);




            // certificate image code
            header('Content-type: image/jpeg');
            $name_font = realpath('./uploads/certificate_templates/name.ttf');
            $common_font = realpath('./uploads/certificate_templates/name.ttf');
            $image = imagecreatefromjpeg("./uploads/certificate_templates/Certificate.jpg");


            $color = imagecolorallocate($image, 255, 0, 0);


            
            $date = date('d F, Y');
            $name = $request->student_name;
            $course_name = $request->get_course_names['course_name'];
            $student_id = $request->id;
            $course_code = $request->get_course_names['course_code'];
            $certificate_id = $course_code . '-' . $student_id . '-' . $certificate_id;

            $path = "./uploads/completion_certificates/$certificate_id.jpg";
            $url = "http://network-academy.test/verify-certificate?certificate_id=$certificate_id";



            // imagettftext(image , size , angle , X , Y , colour , font-file , text)

            // date 
            imagettftext($image, 18, 0, 58, 167, $color, $common_font, $date);
            // name
            imagettftext($image, 48, 0, 253, 224, $color, $name_font, $name);
            // course name
            imagettftext($image, 48, 0, 254, 300, $color, $common_font, $course_name);

            // certificate number
            imagettftext($image, 48, 0, 880, 880, $color, $common_font, $certificate_id);
            // certificate URL
            imagettftext($image, 18, 0, 474, 395, $color, $common_font, $url);

            $certificate->certificate_id = $certificate_id;

            $certificate->certificate_path = $url;
            $certificate->course_id = $request->get_course_names['id'];;
            $certificate->save();
            imagejpeg($image, $path);
            // imagejpeg($image);
            imagedestroy($image);


            return 'success';
        }
    }





    public function verifyCertificate(Request $request)
    {
        if ($request->certificate_id) {


            $certificate_details = Certificate::where('certificate_id', '=', $request->certificate_id)->first();

            if ($certificate_details) {


                $students_details = JoinedStudent::with(['getCourseNames'  => function ($query) {
                    $query->select('id', 'course_name', 'course_code', 'small_description', 'course_description', 'course_syllabus');
                }, 'getCourseBatches'])->where('enquired_id', '=', $certificate_details->student_id)->first();


                return view('users.certificateLanding', compact('students_details', 'certificate_details'));
            } else {

                return redirect()->back()->with('error', 'Invalid certificate number!');
            }
        }
    }
}
