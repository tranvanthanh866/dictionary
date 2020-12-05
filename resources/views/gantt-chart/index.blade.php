<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">

    <style type="text/css">
    html, body{
    height:100%;
    padding:0px;
            margin:0px;
            overflow: hidden;
        }

    </style>
</head>
<body>
<div id="gantt_here" style='width:100%; height:100%;'></div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">


    gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
    gantt.config.order_branch = true;
    gantt.config.order_branch_free = true;
    gantt.init("gantt_here");

    gantt.load("gantt-data/data");

    var dp = new gantt.dataProcessor("/gantt-data");
    dp.init(gantt);
    dp.setTransactionMode({
        mode:"REST",
        payload:{
            "_token":$('meta[name="csrf-token"]').attr('content')
        }
    }, true);
</script>
</body>