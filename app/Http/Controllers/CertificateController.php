<?php

namespace App\Http\Controllers;

use App\Mail\CertificateGenerated;
use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Models\JoinedStudent;
use PhpParser\Node\Expr\New_;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
            $common_font = realpath('./uploads/certificate_templates/Montserrat-Regular.ttf');
            $course_name_font = realpath('./uploads/certificate_templates/Montserrat-SemiBold.ttf');

            $certificate_url_font=realpath('./uploads/certificate_templates/Roboto-Regular.ttf');
            $image = imagecreatefrompng("./uploads/certificate_templates/Certificate.png");


            $name_color = imagecolorallocate($image, 25, 23, 116);
            $common_color = imagecolorallocate($image, 74, 70, 70);
            $date_color = imagecolorallocate($image, 255, 255, 255);

            $date=Carbon::parse($request->completedDate)->format('d F Y');

            $name = $request->student_name;
            $course_name = $request->course_name;
            // $course_code = $request->get_course_names['course_code'];
            $certificate_id =  $certificate_id;

            $path = "./uploads/completion_certificates/$name-$certificate_id.png";
            $url = "http://network-academy.test/verify-certificate?certificate_id=$certificate_id";

            // THE IMAGE SIZE
            $width = imagesx($image);
            $height = imagesy($image);



            // THE TEXT SIZE
            $text_size = imagettfbbox(130, 0, $name_font, $name);
            $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
            $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

            $x = $text_width / 2;
            // CENTERING THE TEXT BLOCK
            // $centerX = CEIL(($width - $text_width)/2);
            $centerX = 2024 - $x;
            $centerX = $centerX < 0 ? 0 : $centerX;
            // $centerY = CEIL(($height - $text_height) / 2);
            $centerY = 1400;
            $centerY = $centerY < 0 ? 0 : $centerY;
            imagettftext($image, 130, 0, $centerX, $centerY, $name_color, $name_font, $name);


            // imagettftext(image , size , angle , X , Y , colour , font-file , text)

            // date
            imagettftext($image, 25, 0, 308, 928,  $date_color, $common_font, $date);
            // // name
            // imagettftext($image, 100, 0, 1954, 1410, $name_color, $name_font, $name);
            // course name
            // THE TEXT SIZE
            $course_text_size = imagettfbbox(55, 0, $course_name_font, $course_name);
            $course_text_width = max([$course_text_size[2], $course_text_size[4]]) - min([$course_text_size[0], $course_text_size[6]]);
            $course_text_height = max([$course_text_size[5], $course_text_size[7]]) - min([$course_text_size[1], $course_text_size[3]]);

            $course_x = $course_text_width / 2;
            // CENTERING THE TEXT BLOCK
            // $centerX = CEIL(($width - $text_width)/2);
            $centerX = 2024 - $course_x;
            $centerX = $centerX < 0 ? 0 : $centerX;

            imagettftext($image, 55, 0, $centerX, 1770, $common_color, $course_name_font, $course_name);

            // // certificate number
            // imagettftext($image, 55, 0, 880, 880, $common_color, $common_font, $certificate_id);
            // certificate URL
            imagettftext($image, 19, 0, 2590, 2292, $common_color, $certificate_url_font, $url);

            $certificate->certificate_id = $certificate_id;

            $certificate->certificate_path = $url;
            $certificate->course_id = $request->course_id;
            $certificate->course_completed_date=$request->completedDate;
            $certificate->save();
            imagepng($image, $path);
            // imagepng($image);
            imagedestroy($image);



            // send mail

            $certificate_details=[


                'name'=> $name,
                'link'=> $url,
                'message'=>'Happy Learning' ,


            ];

            Mail::to('anuragck2@gmail.com')->send(new CertificateGenerated($certificate_details));



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
