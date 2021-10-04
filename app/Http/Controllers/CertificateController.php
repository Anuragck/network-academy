<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use PhpParser\Node\Expr\New_;

class CertificateController extends Controller
{
    public function generateCertificate(Request $request)
    {


        if ($request->enquired_id) {

            $certificate= Certificate::where ('student_id','=',$request->enquired_id)->first();


            if ($certificate) {
                return 'existingUser';
            } else
                $certificate = new Certificate;
                $certificate->student_id = $request->enquired_id;



            // alphanumeric random string generator
            $length = 10;
            $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';

            $certificate_id = substr(str_shuffle($str), 0, $length);



            // certificate image code
            header('Content-type: image/jpeg');
            $font = realpath('./uploads/certificate_templates/arial.ttf');
            $image = imagecreatefromjpeg("./uploads/certificate_templates/format.jpg");
            $color = imagecolorallocate($image, 255, 0, 0);
            $date = date('d F, Y');
            $name = $request->student_name;
            $path = "./uploads/completion_certificates/$name-$certificate_id.jpg";
            imagettftext($image, 18, 0, 880, 188, $color, $font, $date);

            imagettftext($image, 48, 0, 120, 520, $color, $font, $name);
            imagejpeg($image, $path);
            // imagejpeg($image);


            $certificate->certificate_id = $certificate_id;
            $certificate->certificate_path = $path;
            $certificate->save();
            imagedestroy($image);


            return 'success';
        }
    }





public function publicLink(){
return view('users.certificateLanding');
}
}
