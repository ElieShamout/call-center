@extends('sessions_employee.session_layout')

@section('style')
    <link rel="stylesheet" href="{{asset('css/sessions_employee/phone-numbers.css')}}">
@endsection

@section('content')
<div class="phones-number">
    <div class="content">
        <div class="phones-number-title text-dark fw-bold pb-4">phone numbers</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">More</th>
                </tr>
            </thead>
            <tbody>
                @foreach($numbers as $number)
                <tr>
                    <td>{{$number->phone}}</td>
                    <td>{{$number->status}}</td>
                    <td><button class="btn btn-warning text-light" disabled>Undo</button></td>
                </tr>
                @endforeach
            <tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
    <script src="{{asset('js/sessions_employee/phone-numbers.js')}}"></script>
@endsection