<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    public function get_employees(Request $request)
    {

        if (isset($request->employee_name) && $request->employee_name!=''){
            
                    $full_name = explode(' ', $request->employee_name);
            
                    $full_name[0] = $full_name[0] ?? '';
                    $full_name[1] = $full_name[1] ?? '';
                    $full_name[2] = $full_name[2] ?? '';
            
                    $employees = DB::table('employee')
                        ->where('first_name', 'LIKE', $full_name[0] . '%')
                        ->where('middle_name', 'LIKE', $full_name[1] . '%')
                        ->where('last_name', 'LIKE', $full_name[2] . '%')
                        ->get()->all();
            
                    return $employees;

        }else{
            $employees=Employee::get();

            return $employees;

        }
    }
}
