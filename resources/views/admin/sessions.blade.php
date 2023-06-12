@extends('admin.admin-layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/admin/sessions.css')}}">
@endsection

@section('content')
<div class="sessions-section container">
    <div class="row align-items-center mb-4">
        <div class="col-9">
            <span class="title col-6 d-flex align-items-center">sessions</span>
        </div>
        <div class="col-3 pt-3">
            <input type="date" class="form-control filtering-sessions" placeholder="Filter using session date" name="number" id="">
            <div class="filter-result-sessions text-muted pt-1">numeber of result <span class="number-of-result"></span></div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th scope="col">Employee ID</th>
                    <th scope="col">Client ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody class="sessions-table-body">

            <tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/admin/sessions.js')}}"></script>
@endsection