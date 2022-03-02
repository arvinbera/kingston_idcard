@extends('layouts.idcard')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" id="search" onkeyup="search()" autocomplete="off" />
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom"></div>

    <div class="container-fluid" id="search_result_bind">
    </div>

    <div class="container_id" id="idcard_details_bind">
    </div>
</main>
@endsection