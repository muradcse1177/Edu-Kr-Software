<?php
date_default_timezone_set("Asia/Dhaka") ;
$today = date("Y-m-d");

include 'include/db_conn.php';
$sql = "SELECT * FROM web_calender";
$result = $conn->query($sql);

$arr_data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $arr_data[] = array(
            'title' => $row["title"],
            'start' => $row["startdate"],
            'end' => $row["enddate"],
//            'rendering' => 'background'
        );
    }
}

$json = json_encode($arr_data);
$json = str_replace("\"","'", $json);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='fullcalendar/lib/moment.min.js'></script>
<script src='fullcalendar/lib/jquery.min.js'></script>
<script src='fullcalendar/fullcalendar.min.js'></script>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
        defaultDate: '<?php echo $today ; ?>',
        weekNumbers: true,
        navLinks: true, // can click day/week names to navigate views
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: <?php echo $json; ?>
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>

  <div id='calendar'></div>

</body>
</html>
