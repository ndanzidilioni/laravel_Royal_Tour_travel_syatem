@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-default" href="/system">Home</a>
            <a style="background-color: aliceblue;" class="btn btn-default" href="/system/loyalty">Loyalty</a>
            <a class="btn btn-default" href="/system/loyalty/create">Add</a>
            <a class="btn btn-default" href="/system/loyalty/view">Edit</a>
            <a class="btn btn-default" href="/system/loyalty/view">View</a>
        </div>

        <div class="container">
            <table class="table table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th> </th>
                </tr>
                <?php $count=1; ?>
                @foreach($loyalties as $loyalty)
                    <tr>
                        <td><?php echo $count; $count++ ?></td>
                        <td>{!! $loyalty->type  !!}</td>
                        <td>{!! $loyalty->description !!}</td>
                        <td>{!! $loyalty->discount.'%' !!}</td>
                        <td>
                            <a href="{!! url('/system/loyalty/'.$loyalty->id.'/edit') !!}" class="btn btn-default">
                                Edit
                            </a>
                            <a href="{!! url('/system/loyalty/'.$loyalty->id.'/terminate') !!}" class="btn btn-default">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection