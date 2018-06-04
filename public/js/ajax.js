$(document).ready(function (){
    //ajax loader control
    $(document).ajaxStart(function(){
        $("select").prop("disabled", true);
        $("textarea").prop("disabled", true);
        $("input").prop("disabled", true);
        $("button").prop("disabled", true);
        $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function(){
        $("select").prop("disabled", false);
        $("textarea").prop("disabled", false);
        $("input").prop("disabled", false);
        $("button").prop("disabled", false);
        $("#wait").css("display", "none");
    });
    //ajax setup for csrf protection
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    data = "";
    //get upazilla list
    $("#districtpre").on("change", function(evt) {
        var selectedDistrict = $('#districtpre').find(":selected").val();
        $.ajax({
            url: '/api/listUpazilla',
            type: 'POST',
            data:{selectedDistrict: selectedDistrict},
            success: function (response) {
                data = response.data;
                $('#upazillapre').find('option').remove();
                $('#postofficepre').find('option').remove();
                $('#postofficepre').append($('<option>', {
                    value: "", text: "Post Office"
                }));
                if(data.length>0) {
                    $('#upazillapre').append($('<option>', {
                        value: "",
                        text: "Select Upazilla"
                    }));
                }
                else{
                    $('#upazillapre').append($('<option>', {
                        value: "",
                        text: "No Upazilla Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#upazillapre').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            }
        });
    });
    //get upazilla permanent list
    $("#districtper").on("change", function(evt) {
        var selectedDistrict = $('#districtper').find(":selected").val();
        $.ajax({
            url: '/api/listUpazilla',
            type: 'POST',
            data:{selectedDistrict: selectedDistrict},
            success: function (response) {
                data = response.data;
                $('#upazillaper').find('option').remove();
                $('#postofficeper').find('option').remove();
                $('#postofficeper').append($('<option>', {
                    value: "", text: "Post Office"
                }));
                if(data.length>0) {
                    $('#upazillaper').append($('<option>', {
                        value: "",
                        text: "Select Upazilla"
                    }));
                }
                else{
                    $('#upazillaper').append($('<option>', {
                        value: "",
                        text: "No Upazilla Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#upazillaper').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            }
        });
    });
    //get postoffice
    $("#upazillapre").on("change", function(evt) {
        var selectedUpazilla = $('#upazillapre').find(":selected").val();
        $.ajax({
            url: '/api/listPostoffice',
            type: 'POST',
            data:{selectedUpazilla: selectedUpazilla},
            success: function (response) {
                data = response.data;
                $('#postofficepre').find('option').remove();
                if(data.length>0) {
                    $('#postofficepre').append($('<option>', {
                        value: "",
                        text: "Select Post Office"
                    }));
                }
                else{
                    $('#postofficepre').append($('<option>', {
                        value: "",
                        text: "No Post Office Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#postofficepre').append($('<option>', {
                        value: data[i].id,
                        text: data[i].bn_name
                    }));
                }
            }
        });
    });
    //get postoffice
    $("#upazillaper").on("change", function(evt) {
        var selectedUpazilla = $('#upazillaper').find(":selected").val();
        $.ajax({
            url: '/api/listPostoffice',
            type: 'POST',
            data:{selectedUpazilla: selectedUpazilla},
            success: function (response) {
                data = response.data;
                $('#postofficeper').find('option').remove();
                if(data.length>0) {
                    $('#postofficeper').append($('<option>', {
                        value: "",
                        text: "Select Post Office"
                    }));
                }
                else{
                    $('#postofficeper').append($('<option>', {
                        value: "",
                        text: "No Post Office Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#postofficeper').append($('<option>', {
                        value: data[i].id,
                        text: data[i].bn_name
                    }));
                }
            }
        });
    });
    //get medium list
    $("#acaSession").on("change", function(evt) {
        //$("#wait").show();
        var selectedSession = $('#acaSession').find(":selected").val();
        $.ajax({
            url: '/api/listMedium',
            type: 'POST',
            data:{selectedSession: selectedSession},
            success: function (response) {
                data = response.data;
                $('#medium').find('option').remove();
                if(data.length>0) {
                    $('#medium').append($('<option>', {
                        value: "",
                        text: "Select Medium"
                    }));
                }
                else{
                    $('#medium').append($('<option>', {
                        value: "",
                        text: "No Medium Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#medium').append($('<option>', {
                        value: data[i].mediumName,
                        text: data[i].mediumName
                    }));
                    //$('table').append("<tr class='tr'> <td> "+data[i].name+"</td> <td> "+data[i].email+"</td> </tr>" );
                }

            }
        });
    });
    //get version list
    $("#medium").on("change", function(evt) {
        //$("#wait").show();
        var selectedSession = $('#acaSession').find(":selected").val();
        var selectedMedium = $('#medium').find(":selected").val();
        $.ajax({
            url: '/api/listVersion',
            type: 'POST',
            data:{selectedMedium: selectedMedium, selectedSession: selectedSession},
            success: function (response) {
                data = response.data;
                // $('.tr').remove();
                $('#version').find('option').remove();
                if(data.length>0) {
                    $('#version').append($('<option>', {
                        value: "",
                        text: "Select Version"
                    }));
                }
                else{
                    $('#version').append($('<option>', {
                        value: "",
                        text: "No Version Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#version').append($('<option>', {
                        value: data[i].versionName,
                        text: data[i].versionName
                    }));
                    //$('table').append("<tr class='tr'> <td> "+data[i].name+"</td> <td> "+data[i].email+"</td> </tr>" );
                }
                
            }
        });
    });
    //get shift list
    $("#version").on("change", function(evt) {
        //$("#wait").show();
        var selectedSession = $('#acaSession').find(":selected").val();
        var selectedMedium = $('#medium').find(":selected").val();
        var selectedVersion = $('#version').find(":selected").val();
        $.ajax({
            url: '/api/listShift',
            type: 'POST',
            data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion},
            success: function (response) {
                data = response.data;
                // $('.tr').remove();
                $('#shift').find('option').remove();
                if(data.length>0) {
                    $('#shift').append($('<option>', {
                        value: "",
                        text: "Select Shift"
                    }));
                }
                else{
                    $('#shift').append($('<option>', {
                        value: "",
                        text: "No shift Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#shift').append($('<option>', {
                        value: data[i].shiftName,
                        text: data[i].shiftName
                    }));
                }
                
            }
        });
    });
    //get class list
    $("#shift").on("change", function(evt) {
        //$("#wait").show();
        var selectedSession = $('#acaSession').find(":selected").val();
        var selectedMedium = $('#medium').find(":selected").val();
        var selectedVersion = $('#version').find(":selected").val();
        var selectedShift = $('#shift').find(":selected").val();
        $.ajax({
            url: '/api/listClass',
            type: 'POST',
            data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift},
            success: function (response) {
                data = response.data;
                // $('.tr').remove();
                $('#class').find('option').remove();
                if(data.length>0) {
                    $('#class').append($('<option>', {
                        value: "",
                        text: "Select Class"
                    }));
                }
                else{
                    $('#class').append($('<option>', {
                        value: "",
                        text: "No class Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#class').append($('<option>', {
                        value: data[i].classNum,
                        text: data[i].classNum
                    }));
                }
                
            }
        });
    });
    //get Section list
    $("#class").on("change", function(evt) {
        //$("#wait").show();
        var selectedSession = $('#acaSession').find(":selected").val();
        var selectedMedium = $('#medium').find(":selected").val();
        var selectedVersion = $('#version').find(":selected").val();
        var selectedShift = $('#shift').find(":selected").val();
        var selectedClass = $('#class').find(":selected").val();
        var needGrouping = false;
        if(selectedClass>=9) {
            $('#divGroup').show();
            needGrouping = true;
        }
        else $('#divGroup').hide();
        $.ajax({
            url: '/api/listSection',
            type: 'POST',
            data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift, selectedClass: selectedClass},
            success: function (response) {
                data = response.data;
                // $('.tr').remove();
                $('#section').find('option').remove();
                if(data.length>0) {
                    $('#section').append($('<option>', {
                        value: "",
                        text: "Select Section"
                    }));
                }
                else{
                    $('#section').append($('<option>', {
                        value: "",
                        text: "No Section Found"
                    }));
                }
                for (i = 0; i < data.length; i++) {
                    $('#section').append($('<option>', {
                        value: data[i].sectionName,
                        text: data[i].sectionName
                    }));
                }
                
            }
        });
        if(needGrouping){
            loadGroup();
        }

    });
    //get ClassId
    $("#section").on("change", function(evt) {
        //$("#wait").show();
        var selectedSession = $('#acaSession').find(":selected").val();
        var selectedMedium = $('#medium').find(":selected").val();
        var selectedVersion = $('#version').find(":selected").val();
        var selectedShift = $('#shift').find(":selected").val();
        var selectedClass = $('#class').find(":selected").val();
        var selectedSection = $('#section').find(":selected").val();
        $.ajax({
            url: '/api/findClassId',
            type: 'POST',
            data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion,
                selectedShift: selectedShift, selectedClass: selectedClass, selectedSection:selectedSection},
            success: function (response) {
                data = response.data;

                if($('#course').length > 0)
                    loadSubjectList();
            }
        });
    });

    $.makeTable = function (mydata) {
        var mytable = $('<table id="example" class="table table-bordered"  >');
        var tblHeader = "<thead><tr>";
        //var mydata = JSON.parse(mydata);
        for (var k in mydata[0]) {
            tblHeader += "<th style=\"vertical-align:top;\">" + k + "</th>";
        }
        tblHeader += "</tr></thead>";
        $(mytable).append(tblHeader);
        var tbody = "<tbody>";
        $.each(mydata, function (index, value) {
            tbody += "<tr>";
            $.each(value, function (key, val) {
                tbody += "<td>" + val + "</td>";
            });
            tbody += "</tr>";
        });
        tbody += "</tbody>";
        $(mytable).append(tbody);
        return (mytable);
    };

});//end of documnet ready

function loadGroup(){
    $.ajax({
        url: '/api/listGroup',
        type: 'POST',
        //data:{selectedSession: selectedSession,selectedMedium: selectedMedium,selectedVersion: selectedVersion, selectedShift: selectedShift, selectedClass: selectedClass},
        success: function (response) {
            data = response.data;
            $('#group').find('option').remove();
            if(data.length>0) {
                $('#group').append($('<option>', {
                    value: "",
                    text: "Select Group"
                }));
            }
            else{
                $('#group').append($('<option>', {
                    value: "",
                    text: "No Group Found"
                }));
            }
            for (i = 0; i < data.length; i++) {
                $('#group').append($('<option>', {
                    value: data[i].groupName,
                    text: data[i].groupName
                }));
            }
        }
    });
}

//get academic session list
function loadAcademicSession(){
    $.ajax({
        url: '/api/listSession',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for(i=0; i<data.length; i++){
                $('#acaSession').append($('<option>', {
                    value: data[i].sessionName,
                    text : data[i].sessionName
                }));
            }
        }
    });
}
//get bloodgroup list
function loadBloodGroup() {
    $.ajax({
        url: '/api/listBloodGroup',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#bloodgroup').append($('<option>', {
                    value: data[i].bloodGroup,
                    text: data[i].bloodGroup
                }));
            }
        }
    });
}
//get religions list
function loadReligion() {
    $.ajax({
        url: '/api/listReligion',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#religion').append($('<option>', {
                    value: data[i].religion,
                    text: data[i].religion
                }));
            }
        }
    });
}
//get genders list
function loadGender() {
    $.ajax({
        url: '/api/listGender',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#gender').append($('<option>', {
                    value: data[i].gender,
                    text: data[i].gender
                }));
            }
        }
    });
}
//get studentType list
function loadStudentType() {
    $.ajax({
        url: '/api/listStudentType',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#studentType').append($('<option>', {
                    value: data[i].studentType,
                    text: data[i].studentType
                }));
            }
        }
    });
}
//get nationality list
function loadCountry() {
    $.ajax({
        url: '/api/listCountry',
        type: 'POST',
        success: function (response) {
            data = response.data;
            // $('.tr').remove();
            //$('#acaSession').find('option').remove();
            for (i = 0; i < data.length; i++) {
                $('.nationality').append($('<option>', {
                    value: data[i].name,
                    text: data[i].name
                }));
            }
        }
    });
}
//get loadPhotoIdType list
function loadPhotoIdType() {
    $.ajax({
        url: '/api/listPhotoIdType',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('.photoIdType').append($('<option>', {
                    value: data[i].name,
                    text: data[i].name
                }));
            }
        }
    });
}
//get loadFnfType list
function loadFnfType() {
    $.ajax({
        url: '/api/listFnfType',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('.fnfType').append($('<option>', {
                    value: data[i].name,
                    text: data[i].name
                }));
            }
        }
    });
}
//get district list
function loadDistrict() {
    $.ajax({
        url: '/api/listDistrict',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#districtper').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
                $('#districtpre').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
        }
    });
}

//get Board list
function loadBoardNames() {
    $.ajax({
        url: '/api/listBoardNames',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#board').append($('<option>', {
                    value: data[i].name,
                    text: data[i].name
                }));
            }
        }
    });
}
//get SubjectList list
function loadSubjectList() {
    $.ajax({
        url: '/api/listSubjectNames',
        type: 'POST',
        success: function (response) {
            data = response.data;
            for (i = 0; i < data.length; i++) {
                $('#course').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
        }
    });
}
