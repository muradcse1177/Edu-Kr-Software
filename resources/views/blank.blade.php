@extends('layout.app')
@section('title', 'Blank Page')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Blank Page</h4>
                <span>Blank page text</span>
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
            <div class="card-block">
                <div class="sub-title">Solid Border Alert</div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-6">
                        <div class="alert alert-default background-default">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Default!</strong> Add Class <code> background-default</code>
                        </div>
                        <div class="alert alert-primary background-primary">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Primary!</strong> Add Class <code> background-primary</code>
                        </div>
                        <div class="alert alert-success background-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Success!</strong> Add Class <code> background-success</code>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-6">
                        <div class="alert alert-info background-info">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Info!</strong> Add Class <code> background-info</code>
                        </div>
                        <div class="alert alert-warning background-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Warning!</strong> Add Class <code> background-warning</code>
                        </div>
                        <div class="alert alert-danger background-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="icofont icofont-close-line-circled text-white"></i>
                            </button>
                            <strong>Danger!</strong> Add Class <code> background-danger</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection