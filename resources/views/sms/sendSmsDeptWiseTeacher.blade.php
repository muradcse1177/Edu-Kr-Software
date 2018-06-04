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
            <h5 class="m-b-10">Send SMS Department Wise Employee</h5>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <select name="select" class="form-control ">
                        <option value="opt1">Select Depertment</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                    </select>
                </div>
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <select name="select" class="form-control ">
                        <option value="opt1">Select Shift</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <select name="select" class="form-control ">
                        <option value="opt1">Select Version</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                    </select>
                </div>
                <div class="col-sm-12 col-xl-3 m-b-30">
                    <select name="select" class="form-control ">
                        <option value="opt1">Select Medium</option>
                        <option value="opt2">Type 2</option>
                        <option value="opt3">Type 3</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10">
                    <textarea  class="form-control " rows="5" id="comment" placeholder="Please write your message for all students." required></textarea>
                    <span class="messages"></span>
                </div>
            </div>
            <button class="btn btn-primary btn-square">Send SMS</button>
        </div>
    </div>
@endsection
@section('footer')
    @parent
@endsection

