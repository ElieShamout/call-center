@extends('sessions_employee.session_layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/sessions_employee/emp_sessions.css')}}">
@endsection

@section('content')
<div class="employee-sessions m-auto">
    <div class="employee-sessions-box">
        <div class="content">
            <div class="employee-sessions-title text-dark fw-bold">phone numbers</div>

            <div class="search-nav mt-4 pb-2 mb-3 d-flex aligin-items-center justify-content-between">
                <div class="search-form">
                    <h6 class='fw-bold text-dark'>Search by client name</h6>
                    <div class="">
                        <input type="text" class="form-control search_text" id="search_text" id='search_text' placeholder="search by name">
                    </div>
                </div>
                <div class="result_number">
                    <div class='result_number_word'>Number of result</div>
                    <div class='result_number_num'>120&nbsp;</div>
                </div>
            </div>

            <div class="result-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">More</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="session-info-view p-5">
            <i class="session-close-view-btn bi bi-x"></i>
            <div class="session-info">
                <h4 class='session-info-title'>session info</h4>
                <div class="row session-info-content p-3 d-flex">
                    <div class="col-5 basic-info me-4">
                        <h5 class="border-bottom fw-bold">Basic</h5>
                        <ul class="list-unstyled ps-3">
                            <li class='mb-2'>
                                <span class="fw-bold">First Name:</span> <span class='first_name_view'></span>
                            </li>
                            <li class='mb-2'>
                                <span class="fw-bold">Middle Name:</span> <span class='middle_name_view'></span>
                            </li>
                            <li class='mb-2'>
                                <span class="fw-bold">Last Name:</span> <span class='last_name_view'></span>
                            </li>
                            <li class='mb-2'>
                                <span class="fw-bold">Work:</span> <span class='work_view'></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 contact-info me-4">
                        <h5 class="border-bottom fw-bold">Contact</h5>
                        <ul class="list-unstyled ps-3">
                            <li class='mb-2'>
                                <span class="fw-bold">Email:</span> <span class='email_view'></span>
                            </li>
                            <li class='mb-2'>
                                <span class="fw-bold">Phone:</span> <span class='phone_view'></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row session-info-content p-3 d-flex">
                    <div class="col-5 address-info me-4">
                        <h5 class="border-bottom fw-bold">Address</h5>
                        <ul class="list-unstyled ps-3">
                            <li class='mb-2'>
                                <span class="fw-bold">City:</span> <span class='city_view'></span>
                            </li>
                            <li class='mb-2'>
                                <span class="fw-bold">Street:</span> <span class='street_view'></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 basic-info me-4">
                        <h5 class="border-bottom fw-bold">Appointment</h5>
                        <ul class="list-unstyled ps-3">
                            <li class='mb-2'>
                                <span class="fw-bold">Date:</span> <span class='appointment_date_view'></span>
                            </li>
                            <!-- <li class='mb-2'>
                            <span class="fw-bold">Status:</span> <span class='appointment_date_view'></span>
                        </li> -->
                        </ul>
                    </div>
                </div>

                <div class="row session-info-content p-3 d-flex">
                    <div class="col-12 basic-info me-4">
                        <h5 class="border-bottom fw-bold">Note</h5>
                        <ul class="list-unstyled ps-3">
                            <li class='mb-2'>
                                <span class='note_view'></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="{{asset('js/sessions_employee/emp_sessions.js')}}"></script>
@endsection