<!DOCTYPE html>
<html>
<head>
    <title> Gantt Chart</title>

    <!-- demo stylesheet -->
  <style type="text/css">
    p, body, td { font-family: Tahoma, Arial, Helvetica, sans-serif; font-size: 10pt; }
    body { padding: 0px; margin: 0px; background-color: #ffffff; }
    a { color: #1155a3; }
    .space { margin: 10px 0px 10px 0px; }
    .header { background: #003267; background: linear-gradient(to right, #011329 0%,#00639e 44%,#011329 100%); padding:20px 10px; color: white; box-shadow: 0px 0px 10px 5px rgba(0,0,0,0.75); }
    .header a { color: white; }
    .header h1 a { text-decoration: none; }
    .header h1 { padding: 0px; margin: 0px; }
    .main { padding: 10px; margin-top: 10px; }
  </style>

    <!-- helper libraries -->
    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>

    <!-- daypilot libraries -->
    <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

</head>
<body>

<!-- <div class="header">
  <h1><a href='https://code.daypilot.org/93862/html5-gantt-chart'>HTML5 Gantt Chart (JavaScript/PHP)</a></h1>
  <div><a href="https://javascript.daypilot.org/">DayPilot for JavaScript</a> - HTML5 Calendar/Scheduling Components for JavaScript/Angular/React</div>
</div> -->

<div class="main">
  <div id="dp"></div>
</div>

<script>

  var dp = new DayPilot.Gantt("dp");
  dp.startDate = new DayPilot.Date("2019-10-01");
  dp.days = 30;

  dp.linkBottomMargin = 5;

  dp.rowCreateHandling = 'Enabled';

  dp.columns = [
    { title: "Name", property: "text", width: 100},
    { title: "Duration", width: 100}
  ];

  dp.onBeforeRowHeaderRender = function(args) {
    args.row.columns[1].html = args.task.duration().toString("d") + " days";
    args.row.areas = [
      {
        right: 3,
        top: 3,
        width: 16,
        height: 16,
        style: "cursor: pointer; box-sizing: border-box; background: white; border: 1px solid #ccc; background-repeat: no-repeat; background-position: center center; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAABASURBVChTYxg4wAjE0kC8AoiFQAJYwFcgjocwGRiMgPgdEP9HwyBFDkCMAtAVY1UEAzDFeBXBAEgxQUWUAgYGAEurD5Y3/iOAAAAAAElFTkSuQmCC);",
        action: "ContextMenu",
        menu: taskMenu,
        v: "Hover"
      }
    ];
  };

  dp.contextMenuLink = new DayPilot.Menu([
    {
      text: "Delete",
      onclick: function() {
        var link = this.source;
        $.post("backend_link_delete.php", {
            id: link.id()
          },
          function(data) {
            loadLinks();
          });
      }
    }
  ]);

  dp.onRowCreate = function(args) {
    $.post("backend_create.php", {
        name: args.text,
        start: dp.startDate.toString(),
        end: dp.startDate.addDays(1).toString()
      },
      function(data) {
        loadTasks();
      });
  };

  dp.onTaskMove = function(args) {
    $.post("backend_move.php", {
        id: args.task.id(),
        start: args.newStart.toString(),
        end: args.newEnd.toString()
      },
      function(data) {
        dp.message("Updated");
      });
  };

  dp.onTaskResize = function(args) {
    $.post("backend_move.php", {
        id: args.task.id(),
        start: args.newStart.toString(),
        end: args.newEnd.toString()
      },
      function(data) {
        dp.message("Updated");
      });
  };


  dp.onRowMove = function(args) {
    $.post("backend_row_move.php", {
        source: args.source.id,
        target: args.target.id,
        position: args.position
      },
      function(data) {
        dp.message("Updated");
      });
  };

  dp.onLinkCreate = function(args) {
    $.post("backend_link_create.php", {
        from: args.from,
        to: args.to,
        type: args.type
      },
      function(data) {
        loadLinks();
      });
  };

  dp.onTaskClick = function(args) {
    var modal = new DayPilot.Modal();
    modal.closed = function() {
      loadTasks();
    };
    modal.showUrl("edit.php?id=" + args.task.id());
  };

  dp.init();

  loadTasks();
  loadLinks();

  function loadTasks() {
    $.post("backend_tasks.php", function(data) {
      dp.tasks.list = data;
      dp.update();
    });
  }

  function loadLinks() {
    $.post("backend_links.php", function(data) {
      dp.links.list = data;
      dp.update();
    });
  }

  var taskMenu = new DayPilot.Menu({
    items: [
      {
        text: "Delete",
        onclick: function() {
          var task = this.source;
          $.post("backend_task_delete.php", {
              id: task.id()
            },
            function(data) {
              loadTasks();
            });
        }
      }
    ]
  });
</script>

</body>
</html>

