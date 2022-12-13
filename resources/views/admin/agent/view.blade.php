@extends('layouts.MainLayOutNav')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="pull-right text-right" style="line-height: 14px">
                    <small>Lotus Tour Management<br>Agent<br> <span class="c-white">v.1.0</span></small>
                </div>
                <div class="header-icon">
                    <i class="page-header-icon fa fa-user "></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Agent Management System</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Agent
                        <span class="slight slight-align ">
                               <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Agent Home
                               <br/>
                              <a class="btn btn-default" href="/system/agent">Agent</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Add
                        <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Add Agent
                                <br/>
                             <a  class="btn btn-default" href="/system/agent/create">Add</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled active-border">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        View
                        <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                View All Agent
                                <br/>
                             <a  class="btn btn-default" href="/system/agent/view">View</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-filled">

                <div class="panel-body">

                    <h3>Agent </h3>

                    <p>
                        Find or Search all Agents !
                    </p>

                    <div id="ajax-search">
                        {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search ']) !!}

                        <br/>
                        <br/>

                        <table class="ajax-table hidden table table-responsive">
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Profile Card</th>
                            </tr>
                        </table>
                    </div>

                    <table class="table table-bordered table-responsive ajax-table">
                        <thead>
                        <tr>
                            <th>#No</th>
                            <th>Registered No</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <?php $count=1; ?>
                        <tbody>
                        @foreach($agent as $agentAll)
                            <tr>
                                <td><?php echo $count; $count++ ?></td>
                                <td>{!! $agentAll->registered !!}</td>
                                <td>{!! $agentAll->name !!}</td>
                                <td>{!! $agentAll->number !!}</td>
                                <td>{!! $agentAll->email !!}</td>
                                <td>
                                    <a href="/system/agent/{!! $agentAll->id !!}" type="button" class="btn btn-default">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection
@section('styles')
    <style rel="stylesheet">
        .slight-align{
            text-align: center;
        }
        .active-border{
            border:solid 1px white;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        var url = '';
        var typingTimer;                //timer identifier
        var doneTypingInterval = 250;  //time in ms (5 seconds)
        $(document).on('keyup', '#search', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
            var value = $('#search').val();

            if (value == "" || value == " ") {
                //refill
                url="/api/secured/agent/refill";
            } else {
                url='/api/secured/agent/name/'+value;
            }

            function doneTyping() {
                $(".ajax-table tbody tr").remove();

                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "json",
                    success: function (data) {
                        var No=1;
                        for (i = 0; i < data.length; i++) {
                            $('.ajax-table')
                                    .append(
                                            '<tr>' +
                                            '<td>'+No+'</td>'+
                                            '<td>' + data[i].registered + '</td>' +
                                            '<td>' + data[i].name + '</td>' +
                                            '<td>'+data[i].number+'</td>'+
                                            '<td>' +data[i].email+'</td>'+
                                            '<td>' + '<a class="btn btn-default" href="/system/agent/'+ data[i].id+'">View</a>' + '</td>' +
                                            '<tr/>'
                                    );
                            No++;
                        }
                    }
                });
            }

        });
    </script>
@endsection