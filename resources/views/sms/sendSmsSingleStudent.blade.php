@extends('layout.app')
@section('title', 'SMS Management')
@section('content')
    <div class="page-header card">
        <div class="card-block">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa-chevron-left"></i></li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-times close-card"></i></li>
                    </ul>
                </div>
            </div>
            <h5 class="m-b-10">Send SMS Class Wise Students</h5>
            <hr>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Student Code</label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" name="name" id="name" placeholder="Text Input Stdent Code" required>
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Message/SMS</label>
                <div class="col-sm-10">
                    <textarea  class="form-control" rows="5" id="comment" placeholder="Please send your message." required></textarea>
                    <span class="messages"></span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary m-b-0">Send SMS</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection

