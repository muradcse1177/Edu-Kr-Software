<html>
<head>
    <title>@yield('title') | School Management</title>
    @section('header')
        @include('layout.header')
    @show
</head>
<body>
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            {{--Top Menu Bar--}}
            @section('topbar')
                @include('layout.topbar')
            @show
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    {{--- Left Navigation Bar--}}
                    @section('sidebar')
                        @include('layout.sidebar')
                    @show
                    {{--Main Content--}}
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector">  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('footer')
        @include('layout.footer')
    @show

    {{--To extend footer use this in the last of content page
    @section('footer')
        @parent
        <script src="adminerf/files/assets/pages/wysiwyg-editor/js/tinymce.min.js"></script>
        <script src="adminerf/files/assets/pages/wysiwyg-editor/wysiwyg-editor.js"></script>
    @endsection
    --}}

</body>
</html>