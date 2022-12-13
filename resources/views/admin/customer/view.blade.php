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
                                Customer Home
                               <br/>
                              <a class="btn btn-default" href="/system/customer">Customer</a>
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
                               <i class="fa fa-home  text-warning"> </i>
                                New Tour
                                <br/>
                             <a class="btn btn-default" href="/system/customer/new/tour/{!! $customers->id  !!}/create">Add</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        View
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Customer  Details
                                <br/>
                             <a class="btn btn-default" href="/system/customer/{!! $customers->id !!}">View</a>
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
                                Edit Agent Details
                                <br/>
                             <a class="btn btn-default" href="/system/customer/{!! $customers->id !!}/edit">Edit</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Quick
                        <span class="slight slight-align">
                                <br/>
                               <i class="fa fa-home  text-warning"> </i>
                                Customer All Tours
                                <br/>
                              <button type="button" class="btn btn-default" data-toggle="modal"
                                      data-target="#tourViewModel">
                                Quick
                            </button>
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

                    <h4>Customer :</h4>
                    <p>Customer ID : {!! $customers->id !!}</p>
                    <table class="table table-bordered table-responsive ajax-table">
                        <?php $count = 1; ?>
                        <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{!! $customers->fname !!} {!! $customers->sname !!} {!! $customers->lname !!}</td>
                        </tr>
                        <tr>
                            <td>Other Name</td>
                            <td>{!! $customers->otherName !!}</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td>{!! $customers->age !!}</td>
                        </tr>
                        <tr>
                            <td>Date Of Birth</td>
                            <td>{!! $customers->dob !!}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{!! ($customers->gender) ? "Male" : "Female" !!}</td>
                        </tr>
                        <tr>
                            <td>Number</td>
                            <td>{!! $customers->number !!}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{!! $customers->address !!}</td>
                        </tr>
                        <tr>
                            <td>NIC</td>
                            <td>{!! $customers->nic !!}</td>
                        </tr>
                        <tr>
                            <td>Passport</td>
                            <td>{!! $customers->passport !!}</td>
                        </tr>
                        <tr>
                            <td>Loyalty</td>
                            <td>{!! App\Models\Loyalty\Loyalty::where('id',$customers->loyalty_id)->pluck('type')[0] !!} </td>
                        </tr>
                        <tr>
                            <td>Customer Allocation</td>
                            <td>
                                <ul>
                                    {!! ($customers->tour == 1)? "<li>Tour</li>" : "" !!}
                                    {!! ($customers->ticketing == 1)? "<li>Ticketing</li>" : "" !!}
                                    {!! ($customers->rental == 1)? "<li>Rental</li>" : "" !!}
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>
@endsection


@section('modals')
    <div class="modal fade" id="tourViewModel" tabindex="-1" role="dialog" aria-hidden="true"
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