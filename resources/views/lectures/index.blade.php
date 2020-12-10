@extends('layout.app')
@section('content')
<div class="row form-group justify-content-center d-flex mt-5">
    <div class="col-12">
        <h2>List of lectures</h2>
        <hr>
    </div>

    <div class="col-12 mt-4">
        <div class="modal fade in" id="modalLectures" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h5 class="modal-title">Lectures</h5>
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
                            <label for='date'>Date: </label>
                            <div class="input-group date datepicker">
                                <input type='text' class='form-control' id='date' placeholder="99/99/9999">
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label for='event'>Event: </label>
                            <select class="form-control" name="event" id="event">
                                <option selected disabled><-- SELECT --></option>
                                <option value="">Event 1</option>
                            </select>
                        </div>

                        <div class='form-group'>
                            <label for='startTime'>Start time: </label>
                            <input type='time' class='form-control' id='startTime'>
                        </div>

                        <div class='form-group'>
                            <label for='endTime'>End time: </label>
                            <input type='time' class='form-control' id='endTime'>
                        </div>

                        <div class='form-group'>
                            <label for='Description'>Description: </label>
                            <textarea class='form-control' id='description'></textarea>
                        </div>

                        <div class='form-group'>
                            <label for='speaker'>Speaker: </label>
                            <select class="form-control" name="speaker" id="speaker">
                                <option selected disabled><-- SELECT --></option>
                                <option value="">Speaker 1</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" id="id" value="">

                    <div class="modal-footer text-xs-center" style="background-color:#f5f5f5;">
                        <button type="button" class="btn btn-purple" id="saveLecture">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-purple" type="button" id="addLecture"> <i class="fa fa-plus"></i> Add Lecture</button>
        </div>

        <table class="table table-striped table-sm" id="tableLectures" style="width: 100%">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Start time</th>
                    <th>End time</th>
                    <th>Description</th>
                    <th>Speaker</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@section('custom-script')
<script src="{{asset('assets/js/pages/lectures.js')}}"></script>
<script> datatableLectures() </script>
@endsection
@endsection
