@extends('sessions_employee.session_layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/sessions_employee/export_data.css')}}">
@endsection

@section('content')
<div class="export-data">
    <div class="export-data-content">
        <div class="title fw-bold">Export Data</div>
        <div class="">
            <div class="pt-4">
                <div class="export-section pb-3 mb-3">
                    <div class="export-section-title">Client</div>
                    <div class="d-flex export-section-options">
                        <div class="option-item" id='singleClient'>
                            <i class="bi bi-person"></i>
                            <div class="option-item-text">single client</div>
                        </div>
                        <div class="option-item disable-option" id='allClients'>
                            <i class="bi bi-person-fill"></i>
                            <div class="option-item-text">All Clients</div>
                        </div>
                    </div>
                </div>

                <div class="export-section pb-3 mb-3">
                    <div class="export-section-title">Sessions</div>
                    <div class="d-flex export-section-options">
                        <div class="option-item disable-option" id="singleSession">
                            <i class="bi bi-clipboard2-data"></i>
                            <div class="option-item-text">single session</div>
                        </div>
                        <div class="option-item disable-option" id="allSessions">
                            <i class="bi bi-clipboard2-data-fill"></i>
                            <div class="option-item-text">All sessions</div>
                        </div>
                    </div>
                </div>

                <div class="export-section pb-3 mb-3">
                    <div class="export-section-title">Appointment</div>
                    <div class="d-flex export-section-options">
                        <div class="option-item disable-option" id="singleAppointment">
                            <i class="bi bi-calendar3"></i>
                            <div class="option-item-text">single appointments</div>
                        </div>
                        <div class="option-item disable-option" id="allAppointments">
                            <i class="bi bi-calendar3"></i>
                            <div class="option-item-text">all appointments</div>
                        </div>
                    </div>
                </div>

                <div class="export-section border-0 pb-3 mb-3">
                    <div class="export-section-title">Phone numbers</div>
                    <div class="d-flex export-section-options">
                        <div class="option-item disable-option" id="singlePhoneNumber">
                            <i class="bi bi-123"></i>
                            <div class="option-item-text">Single Numbers</div>
                        </div>
                        <div class="option-item disable-option" id="allPhoneNumbers">
                            <i class="bi bi-123"></i>
                            <div class="option-item-text">All Numbers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="export-data-info">
            <i class="bi bi-x close-export-info"></i>

            <div class="single-client">
                <h4 class="border-bottom mb-3 pb-1">Get Single Client</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/employee/export/client')}}" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control shadow-lg" placeholder="Client ID" name="clientId" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" name="file_type" type="radio" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" name="file_type" type="radio" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="export">
                    </div>
                </form>
            </div>

            <div class="all-client">
                <h4 class="border-bottom mb-3 pb-1">Get All Clients</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/all-clients')}}" method="get">
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>

            </div>

            <div class="single-session">
                <h4 class="border-bottom mb-3 pb-1">Session</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/session')}}" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control shadow-lg" placeholder="Session Id" name="sessionId" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>
            </div>

            <div class="all-sessions">
                <h4 class="border-bottom mb-3 pb-1">All Sessions</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/all-sessions')}}" method="get">
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>
            </div>

            <div class="single-appointment">
                <h4 class="border-bottom mb-3 pb-1">Single Appointment</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/appointment')}}" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control shadow-lg" placeholder="Session Id" name="appointmentId" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>
            </div>

            <div class="all-appointments">
                <h4 class="border-bottom mb-3 pb-1">Appointments</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/all-appointments')}}" method="get">
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>
            </div>

            <div class="single-phone-number">
                <h4 class="border-bottom mb-3 pb-1">Single Phone</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/phone')}}" method="get">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control shadow-lg" placeholder="Phone Number" name="phoneNumber" aria-describedby="basic-addon1">
                    </div>
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>
            </div>

            <div class="all-phone-numbers">
                <h4 class="border-bottom mb-3 pb-1">All Phone Numbers</h4>
                <form action="{{url('http://31.9.57.141/laravel/call-center/public/session/export/all-phones')}}" method="get">
                    <div class="d-flex p-0 m-0">
                        <div class="form-check w-100 me-2 px-0">
                            <div class="dropdown w-100 h-100">
                                <button class="btn btn-dark dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown">
                                    Files type
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="pdf" id="pdf">
                                            <label class="form-check-label" for="pdf">
                                                Pdf
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="excel" id="excel">
                                            <label class="form-check-label" for="excel">
                                                Excel
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="word" id="word">
                                            <label class="form-check-label" for="word">
                                                Word
                                            </label>
                                        </div>
                                    </li>
                                    <li class="px-3 py-2 d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="json" id="json">
                                            <label class="form-check-label" for="json">
                                                Json
                                            </label>
                                        </div>
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="checkbox" value="xml" id="xml">
                                            <label class="form-check-label" for="xml">
                                                Xml
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-success">export</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection

@section('script')
    <script src="{{asset('js/sessions_employee/export_data.js')}}"></script>
@endsection
