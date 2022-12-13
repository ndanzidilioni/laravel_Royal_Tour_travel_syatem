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
                               <i  class="fa fa-home  text-warning"> </i>
                                Return Customer Home
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
                        View
                        <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Customer Details
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/{!! $customer->id !!}/view">View</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-xs-6">
            <div class="panel panel-filled activer-border">
                <div class="panel-body">
                    <h3 class="m-b-none">
                        Edit
                        <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Edit Customer Details
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/{!! $customer->id !!}/edit">Edit</a>
                           </span>
                    </h3>
                </div>
            </div>
        </div>

    </div>



    <div class="row">
         <div class="col-md-6"></div>


            <div class="col-md-4">
                @include('notifications._message')
                <h4>Edit Customer
                    <br />
                    <small>Customer ID : {!! $customer->id !!}</small>
                </h4>
                <br/>

                {!! Form::model($customer, ['method' => 'PATCH', 'action' => ['Customer\CustomerController@update', $customer->id]]) !!}
                @include('admin.customer.partials._uneditableFormPartial', ['btn' => 'Update Customer','advance_payment'=>'0'])
                {!! Form::close() !!}

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