@extends('admin.admin-layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/admin/numbers.css')}}">
@endsection

@section('content')
<div class="numbers-section container">
    <div class="row align-items-center mb-4">
        <div class="col-9">
            <span class="title col-6 d-flex align-items-center">numbers</span>
        </div>
        <div class="col-3 pt-3">
            <input type="text" class="form-control filtering-numbers" maxlength="8" placeholder="Filter using phone number" name="number" id="">
            <div class="filter-result-numbers text-muted pt-1">numeber of result <span class="number-of-result"></span></div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th scope="col">Employee</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">More</th>
                </tr>
            </thead>
            <tbody class="numbers-table-body">

            <tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/admin/numbers.js')}}"></script>

@endsection