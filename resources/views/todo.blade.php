<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">

    <title>todoit.pro</title>

    <!-- Bootstrap Core CSS -->
    <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- sb_admin2 CSS -->
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>

    <!-- BEGIN Modal -->

    <div class="modal fade" id="addTodoModal" tabindex="-1" role="dialog" aria-labelledby="addTodoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="/create-todo">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="addTodoModal">Create new To Do</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea class="form-control" rows="3" name="text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- END modal -->

    <div class="row">
        <div class="col-md-12">

            <div class="wrapper">
                <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">todoit.pro</a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-user fa-fw"> </i>
                                <b>Anonymous User</b>
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="" data-toggle="modal" data-target="#addTodoModal"><i class="fa fa-plus fa-fw"></i> Add To Do</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-sign-in fa-fw"></i> Sign in</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-key fa-fw"></i> Register</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href=""><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="panel-body">

                <!-- BEGIN task list -->
 
                <div class="col-md-12 panel-group" id="panel-group-1">

                    <? $i = 0; ?>
                    @foreach ($todos as $todo)

                        <div class="panel {{ $todo->getStatusData()['panel-style'] }}" id="panel-{{ $todo->id }}">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#panel-group-1" href="#collapse-{{ $todo->id }}">
                                        <i class="fa @if ($i === 0) fa-chevron-up @else fa-chevron-down @endif fa-fw"></i>
                                        {{ $todo->title }}
                                    </a>
                                    <em class="taskParams pull-right">
                                        <i class="fa {{ $todo->getStatusData()['btn-icon'] }} fa-fw"></i>
                                        {{ $todo->getStatusData()['panel-title'] }}
                                    </em>
                                </h4>
                            </div>
                            <div id="collapse-{{ $todo->id }}" class="panel-collapse collapse @if ($i === 0) in @endif">
                                <div class="panel-body">{!! nl2br($todo->text) !!}</div>
                                <div class="panel-footer">

                                    @foreach ($todo->statuses as $statusBtn)
                                        @include('todo_button', $statusBtn)
                                    @endforeach

                                    <em class="taskParams pull-right">
                                        <span data-toggle="tooltip" data-placement="top" title="{{ date('F d, Y @ H:i:s', strtotime($todo->updated_at)) }}" class="taskTooltip">
                                            <i class="fa fa-clock-o fa-fw"></i>Updated:
                                            {{ date('F d, Y @ H:i:s', strtotime($todo->updated_at)) }}
                                        </span>
                                        <br>
                                        <span data-toggle="tooltip" data-placement="top" title="" class="taskTooltip">
                                            <i class="fa fa-clock-o fa-fw"></i>Created:
                                            {{ date('F d, Y @ H:i:s', strtotime($todo->created_at)) }}
                                        </span>
                                    </em>
                                </div>
                            </div>
                        </div>
                        <? $i++; ?>

                    @endforeach

                </div>

                <!-- END task list -->
                
            </div>
        </div>
    </div>

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>    
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="/dist/js/sb-admin-2.js"></script>

    <script>
        $(document).ready(function()
        {

            // BEGIN modal

            /* Example
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
            })
            */

            // END modal


            // BEGIN accordion

            $(".panel-collapse").on("hidden.bs.collapse", function(){
                $(this).closest(".panel").find("i.fa-chevron-up").removeClass("fa-chevron-up").addClass("fa-chevron-down");
                $(this).closest(".panel").find("i.fa-minus-square-o").removeClass("fa-minus-square-o").addClass("fa-plus-square-o");
            });

            $(".panel-collapse").on("shown.bs.collapse", function(){
               $(this).closest(".panel").find("i.fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-up");
               $(this).closest(".panel").find("i.fa-plus-square-o").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
            });

            // END accordion


            // BEGIN ajax rpcs

            $('.btnChangeStatus').on('click', function (){

                var changeToStatus = $(this).data('status');
                var changeId = $(this).data('id');

                $.ajax({
                    type : 'POST',
                    url : '/change-status',
                    dataType : 'json',
                    data : {
                        'id' : changeId,
                        'status' : changeToStatus
                    },
                    success : function(data) {
                        if (data == "ok") {
                            location.reload();
                        } else {
                            console.log("Error in data when doing /change-status rpc" + data);
                        }
                    },
                    error : function(err) {
                        console.log("Error when doing /change-status rpc" + err);
                    }
                });
                return false;

            });

            // END ajax rpcs

        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-18762627-16', 'auto');
        ga('require', 'linkid');
        ga('send', 'pageview');
    </script>

</body>
</html>