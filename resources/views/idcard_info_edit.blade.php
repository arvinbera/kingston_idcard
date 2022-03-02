@extends('layouts.idcard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <form method="post" action="{{ url('/idcard_info_update') }}" class="m-3 p-3 border border-dark">
        {{ csrf_field() }}
        <h3 class="my-3">Edit Student Information</h3>
        <hr />
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif

        <input type="hidden" class="form-control" required name="id" value="{{$student->id}}" />
        <div class="form-group my-3 col-lg-6">
            <label>College Name</label>
            <input type="text" class="form-control" required name="college_name" value="{{$student->college_name}}" readonly />
        </div>
        <div class="form-group my-3 col-lg-5">
            <label>College ID</label>
            <input type="text" class="form-control" required name="college_id" value="{{$student->college_id}}" readonly />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Student Name</label>
            <input type="text" class="form-control" required name="student_name" value="{{$student->student_name}}" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Session</label>
            <input type="text" class="form-control" required name="student_session" value="{{$student->student_session}}" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Blood Group</label>
            <input type="text" class="form-control" required name="student_blood_group" value="{{$student->student_blood_group}}" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Mobile</label>
            <input type="text" class="form-control" required name="student_mobile" value="{{$student->student_mobile}}" />
        </div>

        <button type="submit" class="btn btn-primary my-3" style="margin-left: 15px">
            Edit Data
        </button>
        <div style="clear: both"></div>
    </form>
</main>
@endsection