<?php

namespace App\Http\Controllers;

use App\Models\CourseFeePayment;
use App\Models\JoinedStudent;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use PDF;
class FeePaymentController extends Controller
{
public function addPayment(Request $request){

    $request->validate([

        'payAmount'=>'required',

    ]);

    if($request->id){

            $stuentId=$request->id;
            $balanceAdd=JoinedStudent::where('enquired_id','=',$stuentId)->first();
            $checkBalance=$balanceAdd->joined_course_fee-$balanceAdd->course_fee_recieved;

            if($checkBalance < $request->payAmount){
                return "fee_exceed";
            }

            $feePayment=new CourseFeePayment();
            $feePayment->student_id=$request->id;
            $feePayment->paid_amount=$request->payAmount;
            $feePayment->paid_date=$request->paymentDate;
            $feePayment->last_transaction_balance=$request->last_trans_balance;


            $feePayment->save();

            // $stuentId=$request->id;

            // $balanceAdd=JoinedStudent::where('enquired_id','=',$stuentId)->first();


                $balanceAdd->course_fee_recieved= $balanceAdd->course_fee_recieved + $request->payAmount;

                $balanceAdd->save();






    }

        if($feePayment->save()){

            $forRecirpt=CourseFeePayment::where('student_id','=',$request->id)->orderBy('id', 'desc')->first();
           return $forRecirpt;

        }





}


public function getPaymentHistory(Request $request){

    //  $feePaymentHistory=CourseFeePayment::where('student_id','=',$request->st_id)->orderBy('id','DESC')->get();
    //     return $feePaymentHistory;

        $feePaymentHistory=JoinedStudent::with(['getPaymentHistories'  => function ($query) {
            $query->orderBy('id', 'DESC');
        } ])->where('enquired_id','=',$request->st_id)->get();

        return $feePaymentHistory;
}
}
