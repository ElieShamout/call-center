@extends('admin.admin-layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/admin/appointment.css')}}">
@endsection


@section('content')
<div class="appointment-section container">
    <div class="row">
        <h1 class="title">appointments</h1>
    </div>
    <div class="row">

        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th scope="col">Date</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>2</td>
                    <td>2</td>
                </tr>
            <tbody>
        </table>
    </div>
</div>
@endsection
