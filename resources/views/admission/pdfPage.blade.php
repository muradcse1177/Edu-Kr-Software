<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <div class="container">
            @foreach($applicantInfo as $applicant)

            @endforeach
            <center><h2>{{ Session::get('schoolName') }}</h2></center>
            <center><img height="75" width="75" src="{{ public_path().Session::get('logo') }}"></center>
            <table style="width:100%">
                <tr>
                    <td align="left" width="70%">
                        <h3>{{ $applicant['name'] }}</h3>
                        <h4>{{ "Registration No:". $applicant['registrationNo'] }}</h4>
                        <p>{{ "Mobile:".$applicant['mobile'] }}</p>
                        <p>{{ "Present Address:".$applicant['presentAdd'] }}</p>
                    </td>
                    <td align="right" width="30%"><img height="125" width="125" src="{{ public_path().$applicant['stdPhoto']}}"></td>
                </tr>
            </table>
            <table style="width:100%;">
                <tr style="background-color:green; ">
                    <td align="center" width="100%" style="line-height: 1px">
                        <h3>{{ 'Basic Info' }}</h3>
                    </td>
                </tr>
            </table>
            <table style="width:100%">
                <tr>
                    <td align="left" width="33%">
                        <p>{{ "Present Address:".$applicant['acaSession'] }}</p>
                        <p>{{ "Version:".$applicant['version'] }}</p>
                        <p>{{ "Gender:".$applicant['gender'] }}</p>
                        <p>{{ "Blood Group:".$applicant['bloodgroup'] }}</p>
                    </td>
                    <td align="left" width="33%">
                        <p>{{ "Medium:".$applicant['medium'] }}</p>
                        <p>{{ "Group:".$applicant['group'] }}</p>
                        <p>{{ "Birth Date:".$applicant['birthdate'] }}</p>
                        <p>{{ "Nationality:".$applicant['nationality'] }}</p>
                    </td>
                    <td align="left" width="33%">
                        <p>{{ "Shift:".$applicant['shift'] }}</p>
                        <p>{{ "Class:".$applicant['class'] }}</p>
                        <p>{{ "Religion:".$applicant['religion'] }}</p>
                        <p>{{ "Mobile No:".$applicant['mobile'] }}</p>
                    </td>
                </tr>
            </table>
            <table style="width:100%;">
                <tr style="background-color:green; ">
                    <td align="center" width="100%" style="line-height: 1px">
                        <h3>{{ 'Gurdian\'s Info' }}</h3>
                    </td>
                </tr>
            </table>
            <table style="width:100%">
                <tr>
                    <td align="left" width="33%">
                        <p>{{ "Name:".$applicant['gurName'] }}</p>
                        <p>{{ "Occupation:".$applicant['Occupation'] }}</p>
                    </td>
                    <td align="left" width="33%">
                        <p>{{ "Mobile:".$applicant['gurMobile'] }}</p>
                        <p>{{ "Yearly Income:".$applicant['YearlyIncome'] }}</p>
                    </td>
                    <td align="left" width="33%">
                        <p>{{ "Email:".$applicant['Email'] }}</p>
                        <p>{{ "Address:".$applicant['gurdianAddress'] }}</p>
                    </td>
                </tr>
            </table>
            <table style="width:100%;">
                <tr style="background-color:green;">
                    <td align="center" width="100%" style="line-height: 1px">
                        <h3>{{ 'Previous Study Info' }}</h3>
                    </td>
                </tr>
            </table>
            <table style="width:100%">
                <tr>
                    <td align="left" width="33%">
                        <p>{{ "Exam:".$applicant['exam'] }}</p>
                        <p>{{ "Reg No:".$applicant['regNo'] }}</p>
                        <p>{{ "Grade:".$applicant['resultGrade'] }}</p>
                        <p>{{ "Summary:".$applicant['resultSummary'] }}</p>
                    </td>
                    <td align="left" width="33%">
                        <p>{{ "Board:".$applicant['board'] }}</p>
                        <p>{{ "Institute Name:".$applicant['instituteName'] }}</p>
                        <p>{{ "GPA:".$applicant['resultGPA'] }}</p>
                    </td>
                    <td align="left" width="33%">
                        <p>{{ "Roll No:".$applicant['rollNo'] }}</p>
                        <p>{{ "Result Position:".$applicant['resultPosition'] }}</p>
                        <p>{{ "Institute Address:".$applicant['instituteAddress'] }}</p>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>