<?php

namespace App\Http\Controllers;

use App\Models\EmployeeNumbers;
use App\Models\PhoneNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeePhoneNumbersController extends Controller
{
    public function add_new_number(Request $request)
    {

        $employee_number = new EmployeeNumbers();
        $employee_number->employee_id = Auth::user()->id;
        $employee_number->phone_number = $request->phone;
        $employee_number->status = $request->status;
        $employee_number->save();

        if ($employee_number) {
            return response()->json([
                'message' => 'The number has been added successfully.',
                'code' => 200
            ]);
        }else{
            return response()->json([
                'message' => 'The number has not been added.',
                'code' => 500
            ]);
        }
    }

    // change phone number status to reject
    public function reject(Request $request)
    {

        $number = EmployeeNumbers::where('phone', '=', $request->phone)->update(['status' => 'reject']);

        if (empty($number) && $number == 0) {
            return 'faield';
        } else {

            return $number;
        }
    }

    // change phone number status to busy
    public function busy(Request $request)
    {
        $number = EmployeeNumbers::where('phone', '=', $request->phone)->update(['status' => 'busy']);

        if (empty($number)) {
            return 'faield';
        } else {
            return 'success';
        }
    }

    // change phone number status to busy
    public function idle(Request $request)
    {
        $number = EmployeeNumbers::where('phone', '=', $request->phone)->update(['status' => 'idle']);

        if (empty($number)) {
            return 'faield';
        } else {
            return 'success';
        }
    }

    // change phone number status to 'out of service'
    public function out_of_service(Request $request)
    {
        $number = EmployeeNumbers::where('phone', '=', $request->phone)->update(['status' => 'out of service']);

        if (empty($number)) {
            return 'faield';
        } else {
            return 'success';
        }
    }

    public function get_employee_numbers(){
        $numbers=EmployeeNumbers::where('employee_id','=',Auth::user()->id)->get();
        return $numbers;
    }

    public function get_numbers(Request $request){
        if (isset($request->phone) && strlen($request->phone)>0){
            $numbers=EmployeeNumbers::where('phone_number','LIKE',$request->phone.'%')->get()->all();
            return $numbers;
        }else{
            $numbers=EmployeeNumbers::get();
            return $numbers;
        }

    }

}
