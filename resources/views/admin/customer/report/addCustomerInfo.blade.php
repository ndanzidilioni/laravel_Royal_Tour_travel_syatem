@extends('layouts.app)
@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-default" href="/">Home</a>
            <a class="btn btn-default" href="/system/customer">Customer</a>
            <a class="btn btn-default" href="/system/customer/create">Add Customer</a>
            <a style="background-color: aliceblue;" class="btn btn-default" href="/system/customer/view">View</a>
        </div>
    </div>

    <br />
    <table class="table table-responsive">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Other Name</th>
            <th>Age</th>
            <th>Date Of Birth</th>
            <th>Mobile</th>
            <th>NIC</th>
            <th>Passport</th>
            <th>Address </th>
            <th>Alternative Address </th>
            <th>Loyalty</th>
            <th> </th>
        </tr>
        <?php $count=1; ?>
        @foreach($customers as $customer)
            <tr>
                <td><?php echo $count; $count++ ?></td>
                <td>{!! $customer->fname.' '.$customer->sname.' '.$customer->lname  !!}</td>
                <td>{!! $customer->otherName !!}</td>
                <td>{!! $customer->age !!}</td>
                <td>{!! $customer->dob !!}</td>
                <td>{!! $customer->number !!}</td>
                <td>{!! $customer->nic !!}</td>
                <td>{!! $customer->passport !!}</td>
                <td>{!! $customer->address1 !!}</td>
                <td>{!! $customer->address2 !!}</td>
                <td><?php echo \App\Models\Loyalty\Loyalty::find($customer->loyalty_id)->type ?></td>
                <td>
                    <a href="{!! url('/system/customer/'.$customer->id.'/edit') !!}" class="btn btn-default">
                        edit
                    </a>
                    <a href="{!! url('/system/customer/'.$customer->id.'/terminate') !!}" class="btn btn-default">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection