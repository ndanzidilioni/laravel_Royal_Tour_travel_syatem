@extends('layouts.MainLayOutNav')
@section('content')
    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Customer
                        <span class="slight slight-align ">
                               <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Return Customer Home
                               <br/>
                              <a class="btn btn-default" href="/system/customer">Customer</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        New
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                New Tour
                                <br/>
                             <a class="btn btn-default"
                                href="/system/customer/new/tour/{!! $customersDetails->id !!}/create">Add</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        View
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Customer Details
                                <br/>
                             <a class="btn btn-default"
                                href="/system/customer/{!! $customersDetails->id !!}/view">View</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Edit
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Edit Customer Details
                                <br/>
                             <a class="btn btn-default"
                                href="/system/customer/{!! $customersDetails->id !!}/edit">Edit</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Packages
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                View Package Details
                                <br/>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#tourViewModel">
                                Packages
                            </button>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

    </div>
    <br/>

    <div class="row">
        <hr/>
        <div class="col-md-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h4>Customer <span class="fa fa-user"></span></h4>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                        <tr>
                            <td>Name :</td>
                            <td>{!! $customersDetails->fname !!} {!! $customersDetails->sname !!} {!! $customersDetails->lname !!}</td>
                        </tr>
                        <tr>
                            <td>NIC :</td>
                            <td>{!! $customersDetails->nic !!}</td>
                        </tr>
                        <tr>
                            <td>Passport :</td>
                            <td>{!! $customersDetails->passport !!}</td>
                        </tr>
                        <tr>
                            <td>Tours :</td>
                            <td>
                                <ul>
                                    @foreach( $customerTours as $tour)
                                        <li> {!! \App\Models\Tour\Tour::where('id',$tour->tour_id)->pluck('name')[0] !!}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    @include('notifications._message')
                    {!! Form::open(['method'=>'POST', 'action' => ['Customer\CustomerController@newTourCreate', $id], 'id'=>'agentForm']) !!}
                    @include('admin.customer.another_tour.form.another_tour_formPartial',['btn' => 'Add Agent'])
                    {!! Form::close() !!}
                </div>
                <div>
                </div>

            </div>


            @endsection
            @section('modals')<div class="modal fade" id="tourViewModel" tabindex="-1" role="dialog" aria-hidden="true"
                                   style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title">Customer Tours</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Arrival</th>
                                    <th>Departure</th>
                                    <th>Days</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <?php $count = 1; ?>
                                <tbody>
                                @foreach( $customerTours as $tour)
                                    <tr>
                                        <td> {!! $count !!}</td>
                                        <td> {!! \App\Models\Tour\Tour::where('id',$tour->tour_id)->pluck('name')[0] !!}</td>
                                        <td> {!! \App\Models\Tour\Tour::where('id',$tour->tour_id)->pluck('arrival')[0] !!}</td>
                                        <td> {!! \App\Models\Tour\Tour::where('id',$tour->tour_id)->pluck('departure')[0] !!}</td>
                                        <?php
                                        $package_id=\App\Models\Tour\Tour::where('id',$tour->tour_id)->pluck('package_id')[0];
                                        $days=\App\Models\Package\Package::where('id',$package_id)->pluck('days')[0];
                                        $price=\App\Models\Package\Package::where('id',$package_id)->pluck('price')[0];
                                        ?>
                                        <td> {!! $days !!}</td>
                                        <td> {!! $price !!}</td>
                                    </tr>
                                    <?php $count++ ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @section('js')
            <!-- tour load jquery -->
                <script type="text/javascript">
                    $(document).on('change', '.package_selector', function () {
                        var packageID = $(this).find(':selected').val();
                        var loopdata = "";
                        var url = '/api/secured/customer/tours/' + packageID;

                        $.ajax({
                            type: "GET",
                            url: url,
                            dataType: "json",
                            success: function (data) {
                                for (i = 0; i < data.length; i++) {
                                    loopdata += '<option value="' + data[i].id + '">' + data[i].departure + '</option>';
                                }
                                $('#tourDate').html(loopdata);
                            }
                        });
                    });
                </script>
@endsection