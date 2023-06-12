<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Exports\ExportEmployee;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


/**
 * This controller is used to set up functions to export data to multiple files
 */

class GeneratFiles extends Controller
{
    // get sxport_data interface
    public function index()
    {
        return view('sessions_employee.export_data');
    }

    public function client(Request $request)
    {

        if ($request->file_type == 'pdf') {
            $client = Client::get()->first();

            $data = [
                'full_name' => $client->first_name . ' ' . $client->middle_name . ' ' . $client->last_name,
                'email' => $client->email,
                'work' => $client->work,
                'phone' => $client->phone,
                'city' => $client->city,
                'street' => $client->street,
            ];

            $pdf = PDF::loadView('export-data-templates.cleint', $data);
            return $pdf->download('client-pdf.pdf');
        }else if ($request->file_type=='excel'){
            return Excel::download(new ExportEmployee, 'client.xlsx');
        }
    }

    public function all_clients(Request $request)
    {
    }

    public function session(Request $request)
    {
    }

    public function all_sessions(Request $request)
    {
    }

    public function appointment(Request $request)
    {
    }

    public function all_appointments(Request $request)
    {
    }

    public function phone(Request $request)
    {
    }

    public function all_phones(Request $request)
    {
    }
}
