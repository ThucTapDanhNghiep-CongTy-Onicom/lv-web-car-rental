@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="table-rep-plugin">
                    <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                        <table id="tech-companies-1" class="table  table-striped">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>Company</th>
                                    <th data-priority="1">Car Name</th>
                                    <th data-priority="3">Color</th>
                                    <th data-priority="1">Pick up location</th>
                                    <th data-priority="1">Drop off location</th>
                                    <th data-priority="3">Start day</th>
                                    <th data-priority="3">End date</th>
                                    <th data-priority="6">Total</th>

                                    <th data-priority="6">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($historys as $history)
                                @if(Auth::user()->id == $history->user_id)
                                @php
                                $cars = DB::table('cars')->get();
                                @endphp
                                @foreach($cars as $car)
                                @if($history->booking->car_id == $car->id)
                                <tr style="text-align: center;">


                                    <td>Google Inc.</td>
                                    <td>{{$car->name}}</td>
                                    <td>{{$car->color}}</td>
                                    <td>{{$history->booking->address}}</td>
                                    <td>{{$history->booking->address_off}}</td>
                                    @php
                                    $date = $history->booking->date_start;
                                    $date_start = date('d/m/Y', strtotime($date));

                                    $date1 = $history->booking->date_end;
                                    $date_end = date('d/m/Y', strtotime($date1));
                                    @endphp
                                    <td>{{$date_start}}</td>
                                    <td>{{$date_end}}</td>
                                    <td>{{$history->booking->total_amount}}</td>
                                    <td>
                                        @if($history->booking->status=='trading')
                                        <span class="badge bg-warning">{{$history->booking->status}}</span>
                                        @elseif($history->status=='active')
                                        <span class="badge bg-success">{{$history->booking->status}}</span>
                                        @else
                                        <span class="bg-rounded"
                                            style="background: #f25858;border-radius: 4px;font-size: 75%;padding: .25em .4em;font-weight: 500;color: #fff;">{{$booking->status}}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->


<!-- end main content-->

<!-- Footer -->
@include('partials.footer')

@endsection