<?php

namespace App\Http\Controllers;

use App\Models\EmployeeNumbers;
use App\Models\PhoneNumbers as ModelsPhoneNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * This controller is used to set up functions to handle phone numbers
 */

class PhoneNumbers extends Controller
{
    // generate phone numbers for database
    public function generate_phone_numbers_for_database()
    {
        set_time_limit(10000);

        $arr = [5, 6, 9];

        for ($i = 0; $i < 823544; $i++) {
            $number = $arr[rand(0, 2)] . substr(str_shuffle("0123456789"), 0, 7);
            if (!empty(ModelsPhoneNumbers::where('phone', '=', $number)->get()->first())) {
                $x = 0;
            } else {
                echo $number . '<br>';
                $obj = new ModelsPhoneNumbers;
                $obj->phone = $number;
                $obj->save();
            }
        }
    }

    // get random phone number from database where his status is idle and his employee_id equal to employee id or null
    public function get_random_number()
    {
        $number = ModelsPhoneNumbers::where('status', '=', 'idle')->select('phone')->get()->first();

        if (empty($number)) {
            return response()->json([
                'message' => 'There is no number at the moment.',
                'code' => 200
            ]);
        } else {
            DB::table('phone_numbers')->where('phone', '=', $number->phone)->update([
                'status' => 'in process'
            ]);
            return $number->phone;
        }
    }

    // set status of number
    public function set_status_number(Request $request)
    {
        $number = ModelsPhoneNumbers::where('phone', '=', $request->phone)->update(['status' => $request->status]);

        if (empty($number)) {
            return 'faield';
        } else {
            return 'success';
        }
    }

    // change phone number status to busy
    public function idle(Request $request)
    {
        $number = ModelsPhoneNumbers::where('phone', '=', $request->phone)->update(['status' => 'idle']);

        if (empty($number)) {
            return 'faield';
        } else {
            return 'success';
        }
    }

    // change phone number status to busy
    public function in_process(Request $request)
    {
        $number = ModelsPhoneNumbers::where('phone', '=', $request->phone)->update(['status' => 'in process']);

        if (empty($number)) {
            return 'faield';
        } else {
            return 'success';
        }
    }

    // get status of number
    public function get_status_number(Request $request)
    {
        $number = ModelsPhoneNumbers::where('phone', '=', $request->phone)->get()->first();

        if(!empty($number)){
            return $number->status;
        }else{
            $number = ModelsPhoneNumbers::where('phone', '=', $request->phone)->update(['status' => 'in process']);
            return;
        }
    }



}
