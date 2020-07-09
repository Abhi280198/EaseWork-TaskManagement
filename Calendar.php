<?php 
    include_once("DbConnection.php");

    $sqlQuery = "select Calendarid, CalendarTitle, CalendarStart, CalendarEnd from tblcalendar";

    $alldata = array(); 

    $result = mysqli_query($con, $sqlQuery);

    if(mysqli_num_rows($result)>0)
    {
        while($row=$result->fetch_array()){
          echo "<script>console.log('Debug Objects: " . $row["CalendarTitle"] . "' );</script>";
             $alldata[] = array(
              'id'   => $row["Calendarid"],
              'title'   => $row["CalendarTitle"],
              'start'   => $row["CalendarStart"],
              'end'   => $row["CalendarEnd"]
             );
        }
    } 

   
    mysqli_free_result($result);
    mysqli_close($con);
    $events= json_encode($alldata);
    echo "<script>console.log('Debug Objects: " . $events . "' );</script>";
    // $events = $req->fetch_all();
?>
<!DOCTYPE html>
<html>

  <head>
    <title>EaseWork- Daily Planner</title>
    <link rel="stylesheet" href="assets/vendor/fullcalendar/fullcalendar.min.css" />
    <!-- <link rel="stylesheet" href="assets/vendor/fullcalendar/bootstrap.css" /> -->
    <script src="assets/vendor/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui.min.js"></script>
    <script src="assets/vendor/moment.min.js"></script>
    <script src="assets/vendor/fullcalendar/fullcalendar.min.js"></script>
    <script>
        
      $(document).ready(function() 
      {
        
          var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: <?php echo $events;?>,

        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,



          select: function (start, end, allDay) {
            var check = $.fullCalendar.formatDate(start,'Y-MM-DD');
            var today = $.fullCalendar.formatDate(moment(),'Y-MM-DD');
            if(check < today){
              alert("You can't select previous date");
            }
            else{
              var title = prompt('Event Title:');
              if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'calendar_insert.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        alert("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
            }
         
        },

          editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'calendar_update.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                          console.log(">>>>>>>>>>>>>>>>>>",response);
                            alert("Updated Successfully");
                        }
                    });
                },


          eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "calendar_delete.php",
                    data: "id=" + event.id,
                    success: function (response) {
                      // console.log(">>>>>>>>>>>>>>>>>>",response);
                      console.log(">>>>>>>>>>>>>>>>>>",response,response > 0);
                        if(response > 0) {

                            $('#calendar').fullCalendar('removeEvents', event.id);
                            alert("Deleted Successfully");
                        }
                    }

                });
            }
        }




       });
      });

    </script>
  </head>

  <body>
      <br/>
      <h2 align="center"><a href="#">Daily Planner</a></h2>
      <br />
      <center>
        <div class="container" >
          <div id="calendar"></div>
        </div>
      </center>
  </body>
  
</html>
