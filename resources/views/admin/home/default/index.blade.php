<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>日历</title>
    <link href="{{ asset('hplus1') }}/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="{{ asset('hplus1') }}/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="{{ asset('hplus1') }}/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="{{ asset('hplus1') }}/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="{{ asset('hplus1') }}/css/plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet">

    <link href="{{ asset('hplus1') }}/css/animate.min.css" rel="stylesheet">
    <link href="{{ asset('hplus1') }}/css/style.min.css?v=4.0.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-sm-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>常用备忘录标签</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="calendar.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="calendar.html#">选项1</a>
                            </li>
                            <li><a href="calendar.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id='external-events'>
                        <p>可拖动的活动</p>
                        <div class='external-event navy-bg'>确定活动目标</div>
                        <div class='external-event navy-bg'>各部门职责及分工</div>
                        <div class='external-event navy-bg'>案例分享</div>
                        <div class='external-event navy-bg'>xxx</div>
                        <p class="m-t">
                            <input type='checkbox' id='drop-remove' class="i-checks" checked />
                            <label for='drop-remove'>移动后删除</label>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>日历备忘录 </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="calendar.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="calendar.html#">选项1</a>
                            </li>
                            <li><a href="calendar.html#">选项2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('hplus1') }}/js/jquery.min.js?v=2.1.4"></script>
<script src="{{ asset('hplus1') }}/js/bootstrap.min.js?v=3.3.5"></script>
<script src="{{ asset('hplus1') }}/js/content.min.js?v=1.0.0"></script>
<script src="{{ asset('hplus1') }}/js/jquery-ui.custom.min.js"></script>
<script src="{{ asset('hplus1') }}/js/plugins/iCheck/icheck.min.js"></script>
<script src="{{ asset('hplus1') }}/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        $(".i-checks").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green",
        });
        $("#external-events div.external-event").each(function() {
            var d = {
                title: $.trim($(this).text())
            };
            $(this).data("eventObject", d);
            $(this).draggable({
                zIndex: 999,
                revert: true,
                revertDuration: 0
            })
        });
        var b = new Date();
        var c = b.getDate();
        var a = b.getMonth();
        var e = b.getFullYear();
        $("#calendar").fullCalendar({
            header: {
                left: "prev,next",
                center: "title",
                right: "month,agendaWeek,agendaDay"
            },
            editable: true,
            droppable: true,
            drop: function(g, h) {
                var f = $(this).data("eventObject");
                var d = $.extend({}, f);
                d.start = g;
                d.allDay = h;
                $("#calendar").fullCalendar("renderEvent", d, true);
                if ($("#drop-remove").is(":checked")) {
                    $(this).remove()
                }
            },
            events: [{
                title: "日事件",
                start: new Date(e, a, 1)
            }, {
                title: "长事件",
                start: new Date(e, a, c - 5),
                end: new Date(e, a, c - 2),
            }, {
                id: 999,
                title: "重复事件",
                start: new Date(e, a, c - 3, 16, 0),
                allDay: false,
            }, {
                id: 999,
                title: "重复事件",
                start: new Date(e, a, c + 4, 16, 0),
                allDay: false
            }, {
                title: "会议",
                start: new Date(e, a, c, 10, 30),
                allDay: false
            }, {
                title: "午餐",
                start: new Date(e, a, c, 12, 0),
                end: new Date(e, a, c, 14, 0),
                allDay: false
            }, {
                title: "生日",
                start: new Date(e, a, c + 1, 19, 0),
                end: new Date(e, a, c + 1, 22, 30),
                allDay: false
            }, {
                title: "打开百度",
                start: new Date(e, a, 28),
                end: new Date(e, a, 29),
                url: "http://baidu.com/"
            }],
        })
    });
</script>
</body>

</html>