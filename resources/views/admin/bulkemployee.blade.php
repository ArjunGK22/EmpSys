@extends('layouts.master')

@section('content')

<h1>Import Employees</h1>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/adminDashboard" class="bread-link">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page" class="bread-link">Import Employee</li>
    </ol>
</nav>
<hr>
<x-flash />

<form action="importUsers" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card p-3 shadow">
        <div class="d-flex gap-5">
            <label for="upload_file text-nowrap">Upload Excel</label>
            <input type="file" class="form-control" name="upload_file" id="upload_file">
            <button type="submit" class="btn btn-dark">Upload</button>
        </div>
    </div>

</form>

<x-error prop='upload_file' />


@endsection