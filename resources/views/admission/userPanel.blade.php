@extends('layout.app')
@section('title', 'Admission User Panel')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center><h4 class="m-b-10">Applicant Panel</h4></center><hr>
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
                    @if(isset($data['successMessege']))
                        <center><h4 style="color:green;">{{ $data['successMessege'] }}</h4></center><hr>
                    @endif
                    <div class="row" id="divPdf">
                        <div class="col-sm-6">
                            <button  id="pdfMakeId" name="pdfMakeId" value="1002" class="form-control form-bg-primary"><a href="{{ route('pdfApplicantProfile',['download'=>'pdf']) }}">Download Your Profile</a></button>
                        </div> <div class="col-sm-6">
                            <button  id="pdfMakeId" name="pdfMakeId" value="1002" class="form-control form-bg-primary"><a href="{{ route('pdfAdmitCard',['download'=>'pdf']) }}">Download Admit Card</a></button>
                        </div>
                    </div><hr>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('footer')
    @parent
    <script type="text/javascript">

    </script>
@endsection

