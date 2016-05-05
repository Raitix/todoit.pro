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

</head>
<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <p>
                            <div id="nestable-menu">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTodoModal">Add To Do</button>
                            </div>

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

                        <!-- BEGIN status todo -->

                        <div class="col-md-12 panel-group">

                                @for ($i = 0; $i < count($todos); $i++)

                                    <div class="panel panel-success" id="panel-{{ $todos[$i]->id }}">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <i class="fa @if ($i === 0) fa-minus-square-o @else fa-plus-square-o @endif fa-fw"></i>
                                                <i class="panel-handle fa fa-arrows fa-fw"></i>
                                                {{ $todos[$i]->title }}
                                                <a data-toggle="collapse" href="#collapse-{{ $todos[$i]->id }}">
                                                    <i class="fa @if ($i === 0) fa-eye-slash @else fa-eye @endif fa-fw pull-right"></i>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse-{{ $todos[$i]->id }}" class="panel-collapse collapse @if ($i === 0) in @endif">
                                            <div class="panel-body">{!! $todos[$i]->text !!}</div>
                                        </div>
                                    </div>

                                @endfor

                        </div>

                        <!-- END status todo -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/bower_components/jquery/dist/jquery.min.js"></script>    
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
                $(this).closest(".panel").find("i.fa-eye-slash").removeClass("fa-eye-slash").addClass("fa-eye");
                $(this).closest(".panel").find("i.fa-minus-square-o").removeClass("fa-minus-square-o").addClass("fa-plus-square-o");
            });

            $(".panel-collapse").on("shown.bs.collapse", function(){
               $(this).closest(".panel").find("i.fa-eye").removeClass("fa-eye").addClass("fa-eye-slash");
               $(this).closest(".panel").find("i.fa-plus-square-o").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
            });

            // END accordion

        });
    </script>

</body>
</html>