@extends('admin.admin-layout')

@section('style')
<link rel="stylesheet" href="{{asset('css/admin/clients.css')}}">
@endsection

@section('content')
<div class="clients-section container">
    <div class="row align-items-center mb-4">
        <div class="col-9">
            <span class="title col-6 d-flex align-items-center">clients</span>
        </div>
        <div class="col-3 pt-3">
            <input type="text" class="form-control filtering-client" placeholder="Filter using client name" name="keyword" id="">
            <div class="filter-result-client text-muted pt-1">numeber of result <span class="number-of-result"></span></div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th scope="col">Full Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Streen</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Work</th>
                    <th scope="col">ID Number</th>
                    <th scope="col">More</th>
                </tr>
            </thead>
            <tbody class="clients-table-body">

            <tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/admin/clients.js')}}"></script>
@endsection