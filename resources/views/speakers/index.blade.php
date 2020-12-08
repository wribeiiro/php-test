@extends('layout.app')
@section('content')
<div class="row form-group justify-content-center d-flex mt-5">

    <div class="col-12">
        <h2>List of speakers</h2>
        <hr>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
                <tr class="d-flex">
                    <th class="text-right" width="5%">Id</th>
                    <th width="70%">Name</th>
                    <th class="text-center" width="25%">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 10; $i++)
                        <tr class="d-flex">
                            <td class="text-right" width="5%">{{$i}}</td>
                            <td width="70%">Test speaker - {{$i}}</td>
                            <td class="text-center" width="25%">Edit / Delete</td>
                        </tr>
                    @endfor
                </tbody>
        </table>
    </div>
</div>
@endsection
