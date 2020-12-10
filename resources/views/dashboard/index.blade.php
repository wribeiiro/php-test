@extends('layout.app')
@section('content')
<div class="row form-group justify-content-center d-flex mt-5">
    <div class="col-12 mt-4">
        <h2 class="text-center">Hello <span class="font-weight-bold">{{session('sessionUser')['username'] ?? ""}}</span>, welcome again!</h2>
        <hr>
    </div>
</div>
@endsection
