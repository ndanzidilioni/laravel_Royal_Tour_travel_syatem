@extends('layouts.MainLayOutNav')
@section('styles')
    {!! Html::style('customer/css/home.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="view-header">
                <div class="pull-right text-right" style="line-height: 14px">
                    <small>Lotus Tour Management<br>Customer<br> <span class="c-white">v.1.0</span></small>
                </div>
                <div class="header-icon">
                    <i class="page-header-icon fa fa-user "></i>
                </div>
                <div class="header-title">
                    <h3 class="m-b-xs">Customer Management System</h3>
                </div>
            </div>
            <hr>
        </div>
    </div>


    <div class="row">

            <div class="col-lg-2 col-xs-6">
                <div class="panel panel-filled activer-border">
                    <div class="panel-body">
                        <h3 class="m-b-none">
                            Customer</h3>
                            <span class="slight slight-align ">
                               <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Customer Home
                               <br/>
                              <a class="btn btn-default" href="/system/customer">Customer</a>
                           </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 class="m-b-none">
                            View</h3>
                            <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                View All Customers
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/view">View</a>
                           </span>

                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-xs-6">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 class="m-b-none">
                            Add</h3>
                                  <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Add Tour Customer
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/create">Add</a>
                           </span>

                    </div>
                </div>
            </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Add</h3>
                    <span class="slight slight-align">
                                    <br/>
                                   <i  class="fa fa-home  text-warning"> </i>
                                    Add Ticket Customer
                                    <br/>
                                 <a  class="btn btn-default" href="/system/ticket/create">Add</a>
                               </span>

                </div>
            </div>
        </div>


            <div class="col-lg-2 col-xs-6">
                <div class="panel panel-filled">
                    <div class="panel-body">
                        <h3 class="m-b-none">
                            Add</h3>
                                      <span class="slight slight-align">
                                    <br/>
                                   <i  class="fa fa-home  text-warning"> </i>
                                    Add Rental Customer
                                    <br/>
                                 <a  class="btn btn-default" href="/system/rental/reservation/create">Add</a>
                               </span>

                    </div>
                </div>
            </div>


    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> Tour Customer</a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">Ticket</a>
                    </li>
                    <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false">Rental</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body">
                            <p>Add Customer to Tour</p>
                            <a  class="btn btn-default" href="/system/customer/create">Add</a>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body">
                            <p>Ticket Order</p>
                            <a  class="btn btn-default" href="/system/ticket/create">Add</a>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body">
                            <p>Add Customer to Rental</p>
                            <a  class="btn btn-default" href="/system/rental/reservation/create">Add</a>
                        </div>

                    </div>



                </div>
            <!-- /Search And table end --->

            </div>
        </div>
    </div>

    <div class="row">
        <!-- Search and Table come here --->
        <div class="col-md-12 ">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <br/>
                <div id="ajax-search">
                    {!! Form::text('search', null, ['class' => 'form-control', 'id' => 'search', 'placeholder' => 'Search Tour Customer']) !!}
                </div>
                <br/><br/>
                <table class="table table-bordered table-responsive ajax-table">
                    <thead>
                    <tr>
                        <th>#No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>NIC</th>
                        <th>Tour</th>
                        <th>Ticket</th>
                        <th>Rental</th>
                    </tr>
                    </thead>
                    <?php $count=1; ?>
                    @foreach($Customers as $customer)
                        <tr>
                            <td><?php echo $count; $count++ ?></td>
                            <td>{!! $customer->fname.' '.$customer->lname  !!}</td>
                            <td>{!! $customer->number !!}</td>
                            <td>{!! $customer->nic !!}</td>
                            <td style="text-align: center">
                                <?php
                                    if($customer->tour){
                                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                    }else{
                                        echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                    }
                                ?>
                            </td>
                            <td style="text-align: center">
                                <?php
                                if($customer->ticketing){
                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                }else{
                                    echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                }
                                ?>
                            </td>
                            <td style="text-align: center">
                                <?php
                                    if($customer->rental){
                                        echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                    }else{
                                        echo '<i class="fa fa-times" aria-hidden="true"></i>';
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="{!! url('/system/customer/'.$customer->id.'/view') !!}" class="btn btn-default">
                                    View
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tbody>

                    </tbody>
                </table>
            </div>
          </div>
         </div>
        </div>

    <br/>
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
                url="/api/secured/customer/refill";
            } else {
                url='/api/secured/customer/name/'+value;
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
                            //intial values
                            var tour='<i class="fa fa-times" aria-hidden="true"></i>';
                            var ticketing='<i class="fa fa-times" aria-hidden="true"></i>';
                            var rental='<i class="fa fa-times" aria-hidden="true"></i>';

                            if(data[i].tour){
                                tour='<i class="fa fa-check" aria-hidden="true"></i>';
                            }
                            if(data[i].ticketing){
                                ticketing='<i class="fa fa-check" aria-hidden="true"></i>';
                            }
                            if(data[i].rental){
                                rental='<i class="fa fa-check" aria-hidden="true"></i>';
                            }

                            $('.ajax-table')
                                    .append(
                                            '<tr>' +
                                            '<td>'+No+'</td>'+
                                            '<td>' + data[i].fname+' '+data[i].sname+' '+data[i].lname+ '</td>' +
                                            '<td>' + data[i].number + '</td>' +
                                            '<td>'+data[i].nic+'</td>'+
                                            '<td>' +tour+'</td>'+
                                            '<td>' +ticketing+'</td>'+
                                            '<td>' +rental+'</td>'+
                                            '<td><a href="/system/customer/'+data[i].id+'/view" class="btn btn-default">View</a> </td>'+
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