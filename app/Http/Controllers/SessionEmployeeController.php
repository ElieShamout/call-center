<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use App\Models\EmployeeNumbers;
use App\Models\PhoneNumbers;
use App\Models\SessionInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

    /**
     * This controller is used to set up functions to handle session data, appointments, and session data
     */

class SessionEmployeeController extends Controller
{

    // return view new_session
    public function index()
    {
        return view('sessions_employee.new_session');
    }

    // save new session
    public function save_session_info(Request $request)
    {
        $client = DB::table('client')->insert([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'id_number' => $request->id_number,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'street' => $request->street,
            'work' => $request->work,
        ]);

        $client_id = Client::where('id_number', '=', $request->id_number)->get()->first();

        $session = DB::table('session_info')->insert([
            'employee_id' => Auth::user()->id,
            'client_id' => $client_id->id,
            'appointment_id' => '00',
            'appointment_date' => Carbon::parse($request->appointment_date)->format('Y-m-d H:i:s'),
            'note' => $request->note,
        ]);


        if ($session && $client) {
            $number = PhoneNumbers::where('phone', '=', $request->phone)->update(['status' => 'processed']);

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'insert session info successfully'
            ], 200);
        }
    }

    // return session info
    public function get_session_info(Request $request)
    {
        $session = SessionInfo::where('id', '=', $request->id)->where('employee_id', '=', Auth::user()->id)->get()[0];

        $client = Client::where('id', '=', $session->client_id)->get()[0];

        return response()->json([
            'client' => $client,
            'session' => $session,
        ]);
    }

    // Bring all special appointments associated with the current employee
    public function appointment(Request $request)
    {
        
        $appointments = SessionInfo::where('employee_id', '=', Auth::user()->id)->select('appointment_date', 'note')->orderBy('appointment_date')->get();

        return view('sessions_employee.appointment', compact('appointments'));
    }

    // Bring all phone numbers associated with the current employee
    public function phone_numbers(Request $request)
    {
        $numbers = EmployeeNumbers::where('employee_id', '=', Auth::user()->id)->get();
        return view('sessions_employee.phone-numbers', compact('numbers'));
    }

    // Bring all sessions associated with the current employee
    public function sessions(Request $request)
    {



        return view('sessions_employee.emp_sessions');
    }

    public function get_sessions(Request $request){
        $full_name=explode(' ',$request->keyword);

        $full_name[0] = $full_name[0] ?? '';
        $full_name[1] = $full_name[1] ?? '';
        $full_name[2] = $full_name[2] ?? '';

        $sessions = DB::table('employee')
            ->where('employee.id', '=', Auth::user()->id)
            ->where('client.first_name', 'LIKE','%'.$full_name[0].'%')
            ->where('client.middle_name', 'LIKE','%'.$full_name[1].'%')
            ->where('client.last_name', 'LIKE','%'.$full_name[2].'%')
            ->join('session_info',  'employee.id', '=', 'session_info.employee_id')
            ->join('client', 'client.id', '=', 'session_info.client_id')
            ->select('employee.*', 'session_info.id as session_id', 'session_info.*', 'client.*')
            ->get()->all();

            return $sessions;
    }

}
