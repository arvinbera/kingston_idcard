@extends('layouts.idcard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <form method="post" action="{{ url('/upload_single') }}" class="m-3 p-3 border border-dark">
        {{ csrf_field() }}
        <h3 class="my-3">Upload Student Information</h3>
        <hr />
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif

        <div class="form-group my-3 col-lg-6">
            <label>College Name</label>
            <select class="form-control" name="college_name">
                <option value="Kingston Polytechnic College">
                    Kingston Polytechnic College
                </option>
                <option value="Kingston Law College">
                    Kingston Law College
                </option>
                <option value="Kingston School of Management & Science">
                    Kingston School of Management & Science
                </option>
                <option value="Kingston College of Science">
                    Kingston College of Science
                </option>
                <option value="Kingston Teachers' Training College">
                    Kingston Teachers' Training College
                </option>
                <option value="Kingston Model School">
                    Kingston Model School
                </option>
            </select>
        </div>
        <div class="form-group my-3 col-lg-5">
            <label>College ID</label>
            <input type="text" class="form-control" required name="college_id" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Student Name</label>
            <input type="text" class="form-control" required name="student_name" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Session</label>
            <input type="text" class="form-control" required name="student_session" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Blood Group</label>
            <input type="text" class="form-control" required name="student_blood_group" />
        </div>
        <div class="form-group my-3 col-lg-6">
            <label>Mobile</label>
            <input type="text" class="form-control" required name="student_mobile" />
        </div>

        <button type="submit" class="btn btn-primary my-3" style="margin-left: 15px">
            Upload Single Data
        </button>
        <div style="clear: both"></div>
    </form>
</main>
@endsection