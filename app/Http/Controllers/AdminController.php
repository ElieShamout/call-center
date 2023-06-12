<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.start');
    } 

    public function sessions_view(){
        return view('admin.sessions');
    } 

    public function appointments_view(){
        return view('admin.appointments');
    } 

    public function numbers_view(){
        return view('admin.numbers');
    } 

    public function clients_view(){
        return view('admin.clients');
    } 

    public function employees_view(){
        return view('admin.employees');
    } 

}
