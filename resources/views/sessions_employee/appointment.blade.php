@extends('sessions_employee.session_layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/sessions_employee/appointment.css')}}">
@endsection

@section('content')
<div class="appointment-calendar">
    <div class="appointment-content">
        <div class="appointment-title text-dark fw-bold mb-4">appointment</div>
        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th scope="col">Date</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{$appointment->appointment_date}}</td>
                    <td>{{$appointment->note}}</td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</div>
@endsection


@section('script')
<script src="{{asset('js/sessions_employee/appointment.js')}}"></script>
@endsection