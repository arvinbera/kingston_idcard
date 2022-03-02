@extends('layouts.idcard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <form method="post" enctype="multipart/form-data" action="{{ url('/upload_bulk') }}" class="form-group m-3 p-3 border border-dark">
        {{ csrf_field() }}
        <h3 class="my-3">Upload Student Information</h3>
        <p>Supported formats are - .csv, .xls, .xlsx... Plase download this <a target="_blank" href="files/students.xlsx" style="border-bottom: 1px solid blue; padding: 4px;">demo file</a> for reference...</p>
        <hr />
        @if(Session::has('success_message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success_message') }}</p>
        @endif

        <div class="form-group my-3 col-lg-6">
            <input type="file" class="form-control my-3" accept=".csv, .xls, .xlsx" name="file" />
        </div>
        <button type="submit" class="btn btn-primary my-3" style="margin-left: 15px">
            Upload Bulk Data
        </button>
        <div style="clear: both"></div>
    </form>
</main>
@endsection