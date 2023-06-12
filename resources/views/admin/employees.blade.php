@extends('admin.admin-layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/admin/employees.css')}}">
@endsection

@section('content')
<div class="employees-section container">
    <div class="row align-items-center mb-4">
        <div class="col-9">
            <span class="title col-6 d-flex align-items-center">employees</span>
        </div>
        <div class="col-3 pt-3">
            <input type="text" class="form-control filtering-employees" placeholder="Filter using employee name" name="number" id="">
            <div class="filter-result-employees text-muted pt-1">numeber of result <span class="number-of-result"></span></div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th scope="col">Full Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">ID Number</th>
                </tr>
            </thead>
            <tbody class="employees-table-body">

            <tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/admin/employees.js')}}"></script>
@endsection