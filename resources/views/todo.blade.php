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
                            <div id="nestable-menu">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTodoModal">Add To Do</button>
                                <button type="button" class="btn btn-default" data-action="expand-all">Expand All</button>
                                <button type="button" class="btn btn-default" data-action="collapse-all">Collapse All</button>
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

                        <div class="col-md-3 panel-group" id="accor-nest-1">
                            <div class="col-md-12 listNode dd-list">

                                @for ($i = 0; $i < count($todos); $i++)

                                    <div class="col-md-12 itemNode dd-item" data-id="{{ $todos[$i]->id }}">
                                        <!-- To Do: here to echo sb_admin2 style -->
                                        <!-- To Do: check for id and data-id usage -->
                                        <div class="panel panel-success" id="panel-{{ $todos[$i]->id }}" data-id="{{ $todos[$i]->id }}">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <i class="fa @if ($i === 0) fa-minus-square-o @else fa-plus-square-o @endif fa-fw"></i>
                                                    <i class="panel-handle fa fa-arrows fa-fw"></i>
                                                    {{ $todos[$i]->title }}
                                                    <a data-toggle="collapse" data-parent="#accor-nest-1" href="#collapse-{{ $todos[$i]->id }}">
                                                        <i class="fa @if ($i === 0) fa-eye-slash @else fa-eye @endif fa-fw pull-right"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-{{ $todos[$i]->id }}" class="panel-collapse collapse @if ($i === 0) in @endif">
                                                <div class="panel-body">{!! $todos[$i]->text !!}</div>
                                            </div>
                                        </div>
                                    </div>

                                @endfor

                            </div>
                        </div>

                        <!-- END status todo -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="panel-group" id="nestable1">

            <div class="listNode dd-list">
                <div class="itemNode dd-item" data-id="42">
                    <div class="panel-handle">Test join</div>
                </div>
            </div>

        </div>

        <div class="panel-group" id="nestable2">
            <div class="listNode dd-list">
                <div class="itemNode dd-item" data-id="413">
                    <div class="panel-handle">Item 13</div>
                </div>
                <div class="itemNode dd-item" data-id="414">
                    <div class="panel-handle">Item 14</div>
                </div>
                <div class="itemNode dd-item" data-id="415">
                    <div class="panel-handle">Item 15</div>
                    <div class="listNode dd-list">
                        <div class="itemNode dd-item" data-id="416"><div class="panel-handle">Item 16</div></div>
                        <div class="itemNode dd-item" data-id="417"><div class="panel-handle">Item 17</div></div>
                        <div class="itemNode dd-item" data-id="418"><div class="panel-handle">Item 18</div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-group" id="nestable3">
            <div class="listNode dd-list">
                <div class="itemNode dd-item" data-id="419">
                    <div class="panel-handle">To Do 1</div>
                </div>
                <div class="itemNode dd-item" data-id="420">
                    <div class="panel-handle">To Do 2</div>
                    <div class="listNode dd-list">
                        <div class="itemNode dd-item" data-id="421"><div class="panel-handle">To Do 3</div></div>
                        <div class="itemNode dd-item" data-id="422">
                            <div class="panel-handle">To Do 5</div>
                            <div class="listNode dd-list">
                                <div class="itemNode dd-item" data-id="423"><div class="panel-handle">To Do 8</div></div>
                            </div>
                        <div class="itemNode dd-item" data-id="424"><div class="panel-handle">To Do 10</div></div>
                    </div>
                </div>
            </div>
        </div>






    <p><strong>Serialised Output (per list)</strong></p>

    <textarea id="nestable1-output"></textarea>
    <textarea id="nestable2-output"></textarea>
    <textarea id="nestable3-output"></textarea>
    <textarea id="accor-nest-1-output"></textarea>

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
                $(this).closest(".panel").find("i.fa-minus-square-o").removeClass("fa-minus-square-o").addClass("fa-plus-square-o");
            });

            $(".panel-collapse").on("shown.bs.collapse", function(){
               $(this).closest(".panel").find("i.fa-eye").removeClass("fa-eye").addClass("fa-eye-slash");
               $(this).closest(".panel").find("i.fa-plus-square-o").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
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
            $('#nestable1').nestable({
                group: 1
            }).on('change', updateOutput);

            // activate Nestable for list 2
            $('#nestable2').nestable({
                group: 1
            }).on('change', updateOutput);

            // activate Nestable for list 3
            $('#nestable3').nestable({
                group: 1
            }).on('change', updateOutput);

            // activate Nestable for list 3
            $('#accor-nest-1').nestable({
                group: 1
            }).on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestable1').data('output', $('#nestable1-output')));
            updateOutput($('#nestable2').data('output', $('#nestable2-output')));
            updateOutput($('#nestable3').data('output', $('#nestable3-output')));
            updateOutput($('#accor-nest-1').data('output', $('#accor-nest-1-output')));

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

            // END nestable

        });
    </script>

</body>
</html>