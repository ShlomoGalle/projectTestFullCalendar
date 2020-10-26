<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Utilisation de FullCalendar</title>

        <style>   body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
</style>

        <link  rel='stylesheet' href='node_modules/fullcalendar/main.css'/>
        <script src='node_modules/fullcalendar/main.js'></script>
        <script src='node_modules/fullcalendar/locales/fr.js'></script>

        <script>
          
          let evenement = [
        {
          title: 'All Day Event',
          start: '2020-10-02'
        },
        {
        groupId: 999,
          title: 'Repeating Event',
          start: '2020-10-09T16:00:00'
        }
      ]
      

                document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                   locale: 'fr',
                    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay',
                    },
                    navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      eventClick: function(arg) {
        if (confirm('Are you sure you want to delete this event?')) {
          arg.event.remove()
        }
      },      
      editable: true,
      dayMaxEvents: true,
      events: evenement,
      nowIndicator : true,
      eventDrop: (infos) => {
        console.log(infos.event.start)
      },
      //                   if(!confirm("Etes vous sûr.e de vouloir déplacer cet évènement")){
      //                       infos.revert();
      //                   }
      //               },
      eventResize: (infos) => {
                        console.log(infos.event.end)
                    }
        });
        calendar.render();
      });
        </script>

    </head>
    <body>
        <div id="calendar"></div>

    </body>
</html>