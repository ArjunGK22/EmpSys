@extends('layouts.master')

@section('content')

<h1>Viewing Employees</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/adminDashboard" class="bread-link">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page" class="bread-link">View Employee</li>
    </ol>
</nav>
<hr>
<x-flash />

<div class="mb-4"><a href="/exportUsers"><button class="btn btn-warning text-white">Export Excel</button></a>
</div>
<table class="table table-bordered" id="emp-table" class="mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DOB</th>
            <th>EMAIL</th>
            <th>CONTACT</th>
            <th>DEPARTMENT</th>
            <th>POSITION</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($employees as $emp)
        <tr>
            <td>{{ $emp['id'] }}</td>
            <td>{{ $emp['first_name'] ." ". $emp['last_name'] }}</td>
            <td>{{ $emp['date_of_birth'] }}</td>
            <td>{{ $emp['email'] }}</td>
            <td>{{ $emp['phone_number'] }}</td>
            <td>{{ $emp['department'] }}</td>
            <td>{{ $emp['position'] }}</td>
            <td>

                <div class="d-flex gap-2">
                    <a class="nav-link" href={{ "update/". $emp['id'] }}>
                        <button type="button" class="btn bg-info bg-gradient" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Employee"><i class="bi bi-pencil-square"></i></button></a>


                    <a class="nav-link" href={{ "delete_employee/". $emp['id'] }}><button type="button" class="btn bg-danger bg-gradient" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Employee"><i class="bi bi-archive-fill"></i></button></a>

                    <a class="nav-link" target="_blank" href={{ "pdf/". $emp['id'] }}><button type="button" class="btn bg-success bg-gradient" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download Bio-Data"><i class="bi bi-download"></i></button></a>

                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection