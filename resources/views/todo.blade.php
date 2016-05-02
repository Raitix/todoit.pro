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
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="public/css/style.css" /> -->

</head>
<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <p>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTodoModal">Add To Do</button>

                            <!-- Modal -->
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
                            <!-- /.modal -->

                        </p>

                        <div class="panel-group" id="accordion">

                            @for ($i = 0; $i < count($todos); $i++)

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                            @if ($i === 1)

                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $todos[$i]->id }}">{{ $todos[$i]->title }}</a>

                                            @else

                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $todos[$i]->id }}">{{ $todos[$i]->title }}</a>

                                            @endif

                                        </h4>
                                    </div>
                                        <div id="collapse-{{ $todos[$i]->id }}" class="panel-collapse collapse @if ($i === 0) in @endif">
                                        <div class="panel-body">{{ $todos[$i]->text }}</div>
                                    </div>
                                </div>

                            @endfor

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>