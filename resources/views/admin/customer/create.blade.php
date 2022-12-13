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
                <div class="panel panel-filled activer-border">
                    <div class="panel-body">
                        <h3 class="m-b-none">
                            Add
                            <span class="slight slight-align">
                                <br/>
                               <i  class="fa fa-home  text-warning"> </i>
                                Add New Customer
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/create">Add</a>
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
                                View All Customers
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/view">View</a>
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
                               <i  class="fa fa-home  text-warning"> </i>
                                Edit Customer Details
                                <br/>
                             <a  class="btn btn-default" href="/system/customer/view">Edit</a>
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
                               <i  class="fa fa-home  text-warning"> </i>
                                View Package Details
                                <br/>
                              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal1">
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
            <div class="col-md-12">
               <div class="panel panel-filled">
                   <div class="panel-body">
                       <h3>Add Customer</h3>
                       @include('notifications._message')
                       {!! Form::open(['action' => 'Customer\CustomerController@store','id'=>'Form']) !!}
                       @include('admin.customer.partials._formPartial',['btn' => 'Add Customer','advance_payment'=>'1'])
                       {!! Form::close() !!}
                   </div>
               </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
@endsection
@section('modals')
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title">Package Details</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                        <tr>
                            <th>#No</th>
                            <th>Code</th>
                            <th>Package</th>
                            <th>Country</th>
                            <th>Days</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <?php $count=1; ?>
                        <tbody>
                        @foreach($packagesAll as $package)
                            <tr>
                                <td><?php echo $count; $count++ ?></td>
                                <td>{!! $package->code !!}</td>
                                <td>{!! $package->name !!}</td>
                                <td>{!! $package->country !!}</td>
                                <td>{!! $package->days !!}</td>
                                <td>{!! $package->price !!}</td>
                                <td> <a href="/system/package" type="button" class="btn btn-default">
                                        View
                                    </a></td>
                            </tr>
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



    <script type="text/javascript">
        $('#Form').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                fname: {
                    validators: {
                        notEmpty: {
                            message: 'Name should not be empty'
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The  name can consist of alphabetical characters and spaces only'
                        },
                        stringLength: {
                            message: 'Number of characters must between 3 and 20',
                            min:3,
                            max:20
                        }
                    }
                },
                sname: {
                    validators: {
                        notEmpty: {
                            message: 'Name should not be empty'
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The name can consist of alphabetical characters and spaces only'
                        },
                        stringLength: {
                            message: 'Number of characters must between 3 and 20',
                            min:3,
                            max:20
                        }
                    }
                },
                lname: {
                    validators: {
                        notEmpty: {
                            message: 'Name should not be empty'
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The name can consist of alphabetical characters and spaces only'
                        },
                        stringLength: {
                            message: 'Number of characters must between 3 and 20',
                            min:3,
                            max:20
                        }
                    }
                },
                otherName: {
                    validators: {
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The name can consist of alphabetical characters and spaces only'
                        },
                        stringLength: {
                            message: 'Number of characters must between 3 and 20',
                            min:3,
                            max:20
                        }
                    }
                },
                otherName: {
                    validators: {
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The name can consist of alphabetical characters and spaces only'
                        },
                        stringLength: {
                            message: 'Number of characters must between 3 and 20',
                            min:3,
                            max:20
                        }
                    }
                },
                dob: {
                    validators: {
                        notEmpty: {
                            message: 'Date Of Birth should not be empty'
                        }
                    }
                },
                number: {
                    validators: {
                        notEmpty: {
                            message: 'Contact should not be empty'
                        },
                        numeric:{
                            message:'Contact Number cannot be Alphabetic'
                        }
                        ,
                        stringLength: {
                            max:10,
                            min:10,
                            message: "Invalid Number"
                        }
                    }
                },
                nic:{
                    validators: {
                        notEmpty: {
                            message: 'NIC cannot be empty !'
                        },regexp: {
                            regexp: /^[0-9]{9}[vVxX]$/,
                            message: 'NIC is in wrong format'
                        }
                    }
                },
                passport:{
                    validators: {
                        notEmpty: {
                            message: 'Passport id cannot be empty !'
                        }
                    }
                },
                address:{
                    validators: {
                        notEmpty: {
                            message: 'Address cannot be empty !'
                        },
                        stringLength: {
                            message: 'Number of characters must between 5 and 100',
                            min:5,
                            max:100
                        }
                    }
                },
                payment:{
                    validators: {
                        notEmpty: {
                            message: 'Payment cannot be empty !'
                        },
                        numeric:{
                            message: 'Payment cannot be Only numeric !'
                        }
                    }
                }




            }
        });
    </script>

    <!-- tour load jquery -->
    <script type="text/javascript">

        $(document).on('change', '#loyalty', function () {
            var tourID = $('.package_selector').find(':selected').val();
            var packageID = $('#tour').find(':selected').val();
            var url = '/api/secured/package/'+ packageID;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (data) {
                    var dicount;
                    var lType=$('#loyalty').find(':selected').val();
                    if(lType ==1){
                        dicount=data-(data*0);
                    }
                    if(lType ==2){
                        dicount=data-(data*(25/100));
                    }
                    if(lType ==3){
                        dicount=data-(data*(15/100));
                    }
                    if(lType ==4){
                        dicount=data-(data*(5/100));
                    }
                    $('#payment').val(dicount);
                }
            });
        });
    </script>
@endsection