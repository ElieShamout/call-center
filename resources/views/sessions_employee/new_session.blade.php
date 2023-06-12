@extends('sessions_employee.session_layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/sessions_employee/new_session.css')}}">
@endsection

@section('content')
    <div class="d-block w-100">
        <div class="container d-flex py-5 mt-5 align-items-center content">
            <div class="internal-content">

                <div class="png px-5 py-4 mx-3 d-grid">
                    <div class="phone-number text-center px-0 mx-0 position-relative">
                        <span class='number-text'></span>
                        <div class="input-group enter-number-content">
                            <input type='number' class='form-control enter-number' min="0" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onKeyPress="if(this.value.length==8) return false;" maxlength="8" style="max-height:40px;" placeholder='write number here' id="exampleFormControlInput2">
                            <i class="bi bi-x clear-enter-number"></i>
                        </div>
                    </div>
                    <div class="status-btn justify-content-center">
                        <button class="btn reject-btn btn-danger text-light fw-bold ms-3">Reject</button>
                        <button class="btn busy-btn btn-warning text-light fw-bold ms-3">Busy</button>
                        <button class="btn out-of-service-btn btn-secondary text-light fw-bold ms-3">Out Of service</button>
                        <button class="btn btn-primary new-btn text-light fw-bold ms-3">New</button>
                        <button class="btn answered-btn text-light fw-bold ms-3">Answered</button>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="container session-form mb-4" id="sessionForm">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="text-center session-title">Session Form</h1>

                <!-- <div class="alert alert-dismissible fade show mt-5 status col-7 m-auto" role="alert">
                    <form>
                        <fieldset class="form-group">
                            <div class="row d-grid">
                                <div class="col-form-label col-sm-2 pt-0 fw-bold w-100">Customer Satisfaction</div>
                                <div class="row d-flex justify-content-center ms-4">
                                    <div class="form-check col-12">
                                        <input class="form-check-input acceptance-service" type="radio" name="customer_satisfaction" id="gridRadios1" value="option1">
                                        <label class="form-check-label text-success fw-bold" for="gridRadios1">
                                            Acceptance Service
                                        </label>
                                    </div>
                                    <div class="form-check col-12 mt-2">
                                        <input class="form-check-input reject-service" type="radio" name="customer_satisfaction" id="gridRadios2" value="option2">
                                        <label class="form-check-label text-danger fw-bold" for="gridRadios2">
                                            Reject Service
                                        </label>
                                    </div>
                                    <div class="form-check col-12 mt-2">
                                        <input class="form-check-input can-not-speack" type="radio" name="customer_satisfaction" id="gridRadios3" value="option3">
                                        <label class="form-check-label text-warning fw-bold" for="gridRadios3">
                                            He can't speak now
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div> -->

                <div class="form-field mt-4">
                    <div class="client-form-title mb-4">Client Information</div>
                    <div class="mb-5">
                        <h4 class="border-bottom mx-3">Basic</h4>
                        <div class="mt-3">
                            <div class="form-row row d-flex px-5">
                                <div class="form-group col-4 mb-2">
                                    <label for="first_name" class="text-muted">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="">
                                </div>
                                <div class="form-group col-4 mb-2">
                                    <label for="middle_name" class="text-muted">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" id="middle_name" value="">
                                </div>
                                <div class="form-group col-4 mb-2">
                                    <label for="last_name" class="text-muted">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="">
                                </div>
                                <div class="form-group col-4 mb-2">
                                    <label for="id_number" class="text-muted">ID Number</label>
                                    <input type="text" name="id_number" class="form-control" id="id_number" value="">
                                </div>
                                <div class="form-group col-4 mb-2">
                                    <label for="work" class="text-muted">Work</label>
                                    <input type="text" name="work" class="form-control" id="work" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="border-bottom mx-3">Address</h4>
                        <div class="mt-3">
                            <div class="form-row row px-5">
                                <div class="form-group col-4 mb-2">
                                    <label for="city" class="text-muted">City</label>
                                    <input type="text" name="city" class="form-control" id="city" value="">
                                </div>
                                <div class="form-group col-4 mb-2">
                                    <label for="street" class="text-muted">Street</label>
                                    <input type="text" name="street" class="form-control" id="street" value="">
                                </div>
                                <div class="form-group col-4 mb-2">
                                    <label for="zip" class="text-muted">Zip</label>
                                    <input type="text" name="zip" class="form-control" id="zip" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="border-bottom mx-3">Contact</h4>
                        <div class="mt-3">
                            <div class="form-row row px-5">
                                <div class="form-group col-4 mb-2">
                                    <label for="email" class="text-muted">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="border-bottom mx-3">Note</h4>
                        <div class="mb-3 px-5">
                            <textarea class="form-control" id="note" value=""></textarea>
                        </div>
                    </div>


                    <div class="mb-2">
                        <h4 class="border-bottom mx-3">Appiontment</h4>
                        <fieldset class="form-group px-5">
                            <div class="row d-flex justify-content-center px-2">
                                <div class="form-check col-5">
                                    <input class="form-check-input booking-apoointment" type="radio" name="AppointmentRadio" id="booking-apoointment" value="option1">
                                    <label class="form-check-label text-success fw-bold" for="booking-apoointment">
                                        Appointment Booking
                                    </label>
                                </div>
                                <div class="form-check col-5">
                                    <input class="form-check-input dont-booking-apoointment" type="radio" name="AppointmentRadio" id="dont-booking-apoointment" value="option1">
                                    <label class="form-check-label text-danger fw-bold" for="dont-booking-apoointment">
                                        Do not book an appointment
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="mt-2 appointment_date_container">
                            <div class="form-row row px-5">
                                <div class="form-group col-10 mb-2 m-auto">
                                    <label for="appointment_date" class="text-muted">Appointment Date</label>
                                    <input type="datetime-local" name="appointment_date" class="form-control" id="appointment_date" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-2 mt-3">
                        <div class="px-5 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success save_Session_info">Save</button>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <div class="alert message-alert-success alert-dismissible">
        <span class='success-message-text fw-bold text-dark'></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="alert message-alert-failed alert-dismissible">
        <span class='failed-message-text fw-bold text-light'></span>
        <button type="button" class="btn-close"></button>
    </div>
@endsection

@section('script')
<script src="{{asset('js/sessions_employee/new_session.js')}}"></script>
@endsection