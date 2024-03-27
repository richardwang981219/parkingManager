
@extends('layouts.contentNavbarLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
  
  <!-- / Content -->
  
    <!-- vehicles -->
    <div class="card">
            <div class ="card-header d-flex ">
                <div style="font-size:30px;color:red">Log</div>
            </div>
            <div class="card-body" style="font-size:15px">
                <hr class="mt-0">
                <div class="row" id="card-form">

                    <div class="row">
                            <div class="col-sm-12">
                            <table class="dt-advanced-search table table-bordered dtr-column data-table dataTable no-footer" id="transfer-table" aria-describedby="DataTables_Table_2_info"  style="width: 1396px;" role="grid">
                                <thead>
                                    <tr>
                                      <td>No</td>
                                        <td>User</td>
                                        <td>Vehicles</td>
                                        <td>Time</td>
                                        <td>From Percent</td>
                                        <td>To Percent</td>
                                        <td>Position</td>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($parkings as $parking)
                                        <tr>
                                            <td>{{$parking->id}}</td>
                                            <td>{{$parking->user->name}}</td>
                                            <td>{{$parking->vehicle->CarModel}}</td>
                                            <td>{{$parking->time}}</td>
                                            <td>{{$parking->from}}</td>
                                            <td>{{$parking->to}}</td>
                                            <td>{{$parking->position}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>


                </div>


            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection