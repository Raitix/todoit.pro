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

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/public/css/nestable.css" />

    <!-- Custom Fonts -->
    <link href="/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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

                                <div class="panel panel-default" id="panel-{{ $todos[$i]->id }}" >
                                    <div class="panel-heading">
                                        <h4 class="panel-title">

                                            {{ $todos[$i]->title }}

                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $todos[$i]->id }}">
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


                        <!-- BEGIN status todo -->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-plus-square-o fa-fw"></i>
                                    To Do text
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-x1"><i class="fa fa-eye-slash fa-fw pull-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapse-x1" class="panel-collapse collapse ">
                                <div class="panel-body">adsgas d</div>
                            </div>
                        </div>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-minus-square-o fa-fw"></i>
                                    To Do text
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse-x2"><i class="fa fa-eye fa-fw pull-right"></i></a>
                                </h4>
                            </div>
                            <div id="collapse-x2" class="panel-collapse collapse ">
                                <div class="panel-body">adsgas d</div>
                            </div>
                        </div>
                        <!-- END status todo -->
                        


                            
                    </div>
                </div>
            </div>
        </div>
    </div>

    <menu id="nestable-menu">
        <button type="button" data-action="expand-all">Expand All</button>
        <button type="button" data-action="collapse-all">Collapse All</button>
    </menu>

    <div class="cf nestable-lists">

        <div class="dd" id="nestable">
            <ol class="dd-list">
                <li class="dd-item" data-id="1">
                    <div class="dd-handle">Item 1</div>
                </li>
                <li class="dd-item" data-id="2">
                    <div class="dd-handle">Item 2</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                        <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                        <li class="dd-item" data-id="5">
                            <div class="dd-handle">Item 5</div>
                            <ol class="dd-list">
                                <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                            </ol>
                        </li>
                        <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                        <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                    </ol>
                </li>
                <li class="dd-item" data-id="11">
                    <div class="dd-handle">Item 11</div>
                </li>
                <li class="dd-item" data-id="12">
                    <div class="dd-handle">Item 12</div>
                </li>
            </ol>
        </div>

        <div class="dd" id="nestable2">
            <ol class="dd-list">
                <li class="dd-item" data-id="13">
                    <div class="dd-handle">Item 13</div>
                </li>
                <li class="dd-item" data-id="14">
                    <div class="dd-handle">Item 14</div>
                </li>
                <li class="dd-item" data-id="15">
                    <div class="dd-handle">Item 15</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="16"><div class="dd-handle">Item 16</div></li>
                        <li class="dd-item" data-id="17"><div class="dd-handle">Item 17</div></li>
                        <li class="dd-item" data-id="18"><div class="dd-handle">Item 18</div></li>
                    </ol>
                </li>
            </ol>
        </div>

    </div>





    <p><strong>Serialised Output (per list)</strong></p>

    <textarea id="nestable-output"></textarea>
    <textarea id="nestable2-output"></textarea>



    <script src="/bower_components/jquery/dist/jquery.min.js"></script>    
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/public/js/jquery.nestable.js"></script>

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
            });

            $(".panel-collapse").on("shown.bs.collapse", function(){
               $(this).closest(".panel").find("i.fa-eye").removeClass("fa-eye").addClass("fa-eye-slash");
            });

            // END accordion


            // BEGIN nestable

            var updateOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            // activate Nestable for list 1
            $('#nestable').nestable({
                group: 1
            })
            .on('change', updateOutput);
            // activate Nestable for list 2
            $('#nestable2').nestable({
                group: 1
            })
            .on('change', updateOutput);
            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            updateOutput($('#nestable2').data('output', $('#nestable2-output')));
            $('#nestable-menu').on('click', function(e)
            {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });
            $('#nestable3').nestable();

            // END nestable

        });
    </script>

</body>
</html>