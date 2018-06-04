<div class="col-sm-12 col-xl-3 m-b-30">
    <select id="acaSession" name="acaSession" class="form-control" required>
        <option value="">Select Session</option>
    </select>
</div>
<div class="col-sm-12 col-xl-3 m-b-30">
    <select id="medium" name="medium" class="form-control" required>
        <option value="">Medium</option>
    </select>
</div>
<div class="col-sm-12 col-xl-3 m-b-30">
    <select id="version" name="version" class="form-control" required>
        <option value="">Version</option>
    </select>
</div>
<div class="col-sm-12 col-xl-3 m-b-30">
    <select id="shift" name="shift" class="form-control" required>
        <option value="">Shift</option>
    </select>
</div>
<div class="col-sm-12 col-xl-3 m-b-30">
    <select id="class" name="class" class="form-control" required>
        <option value="">Class</option>
    </select>
</div>
<div id="idsection" class="col-sm-12 col-xl-3 m-b-30">
    <select id="section" name="section" class="form-control" required>
        <option value="">Section</option>
    </select>
</div>
<div id="divGroup" class="col-sm-12 col-xl-3 m-b-30 " style="display: block;">
    <select id="group" name="group" class="form-control" >
        <option value="">Group</option>
    </select>
</div>
{{--<div class="col-sm-12 col-xl-3 m-b-30">--}}
    {{--<select id="studentType" name="studentType" class="form-control" >--}}
        {{--<option value="">Select Student Type</option>--}}
    {{--</select>--}}
{{--</div>--}}

@section('footer')
    @parent
    <script>
        loadAcademicSession();
        loadStudentType();
    </script>
@endsection