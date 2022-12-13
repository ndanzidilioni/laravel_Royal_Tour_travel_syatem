@extends('layouts.MainLayOutNav')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                @include('notifications._message')
                <h2>Overview Income
                    <br/>
                    <small><a href="{!! url('/system/rental/income') !!}"></a></small>
                </h2>
                <br/>

                <table class="table table-responsive">
                    <tr>
                        <th>Income ID</th>
                        <th>Reservation ID</th>
                        <th>Date and Time</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th></th>
                    </tr>

                    <!-- $diff = $Reservation->start_date->diffInDays($Reservation->end_date, false); ?>

                    <!--variable to collect expenses-->

                    <?php $total = 0; $num = 1 ?>
                    @foreach($Reservations as $Reservation)
                        <tr>
                            <td>{!! $num !!}</td>
                            <td>{!! $Reservation->id !!}</td>
                            <td>{!! $Reservation->end_date!!}</td>

                            <td> Rental Income </td>
                            <td>{!! $Reservation->start_date->diffInDays($Reservation->end_date, false)*1200 !!}</td>

                            <td>
                                <a href="{!! url('/system/rental/reservation/'.$Reservation->id.'/edit') !!}"
                                   class="btn btn-default">
                                    View Income
                                </a>
                            </td>



                            <?php $total = $total + ($Reservation->start_date->diffInDays($Reservation->end_date, false)*1200 ) ; ?>

                            <?php $total = $total + ($Reservation->payment); ?>

                            <?php $num = $num + 1; ?>

                        </tr>
                    @endforeach
                    <tr style="font-weight: bolder">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td>{!! $total !!}</td>
                    </tr>
                </table>

            </div>
            <div class="col-md-12"></div>
        </div>
    </div>
@endsection