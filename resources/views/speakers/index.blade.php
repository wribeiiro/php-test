@extends('layout.app')
@section('content')
<div class="row form-group justify-content-center d-flex mt-5">
    <div class="col-12">
        <h2>List of speakers</h2>
        <hr>
    </div>

    <div class="col-12 mt-4">
        <div class="modal fade in" id="modalSpeakers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h5 class="modal-title">Speakers</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class='form-group'>
                            <label for='name'>Name: </label>
                            <input type='text' class='form-control' id='name'>
                        </div>
                    </div>

                    <input type="hidden" id="id" value="">

                    <div class="modal-footer text-xs-center" style="background-color:#f5f5f5;">
                        <button type="button" class="btn btn-purple" id="saveSpeaker">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-purple" type="button" id="addSpeaker"> <i class="fa fa-plus"></i> Add Speaker</button>
        </div>

        <table class="table table-striped table-sm" id="tableSpeakers" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@section('custom-script')
<script src="{{asset('assets/js/pages/speakers.js')}}"></script>
<script> datatableSpeakers() </script>
@endsection
@endsection
