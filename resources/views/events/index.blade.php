@extends('layout.app')
@section('content')
<div class="row form-group justify-content-center d-flex mt-5">
    <div class="col-12">
        <h2>List of events</h2>
        <hr>
    </div>

    <div class="col-12 mt-4">
        <div class="modal fade in" id="modalEvents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h5 class="modal-title">Events</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class='form-group'>
                            <label for='title'>Title: </label>
                            <input type='text' class='form-control' id='title'>
                        </div>

                        <div class='form-group'>
                            <label for='startDate'>Start date: </label>
                            <div class="input-group date datepicker">
                                <input type='text' class='form-control' id='startDate' placeholder="99/99/9999">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='endDate'>End date: </label>
                            <div class="input-group date datepicker">
                                <input type='text' class='form-control' id='endDate' placeholder="99/99/9999">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='description'>Description: </label>
                            <textarea class='form-control' id='description'> </textarea>
                        </div>
                    </div>

                    <input type="hidden" id="id" value="">

                    <div class="modal-footer text-xs-center" style="background-color:#f5f5f5;">
                        <button type="button" class="btn btn-purple" id="saveEvent">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-purple" type="button" id="addEvent"> <i class="fa fa-plus"></i> Add Event</button>
        </div>

        <table class="table table-striped table-sm" id="tableEvents" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@section('custom-script')
<script src="{{asset('assets/js/pages/events.js')}}"></script>
<script> datatableEvents() </script>
@endsection
@endsection
