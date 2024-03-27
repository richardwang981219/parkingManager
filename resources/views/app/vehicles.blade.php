
@extends('layouts.contentNavbarLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
  
  <!-- / Content -->
  
    <!-- vehicles -->
    <div class="card">
            <div class ="card-header d-flex ">
                <div style="font-size:30px;color:red">Vehicles</div>
            </div>

            <div class="card-body" style="font-size:15px">
                <hr class="mt-0">
                <div class="row" id="card-form">

                    <div class="row">
                            <div class="col-sm-8">
                                <table class="dt-advanced-search table table-bordered dtr-column data-table dataTable no-footer" id="vehicle-table" aria-describedby="DataTables_Table_2_info"  style="width: 1396px;" role="grid">
                                    <thead>
                                        <tr>
                                            <td>CarModel</td>
                                            <td>Capacity</td>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($vehicles as $vehicle)
                                            <tr>
                                                <td>{{$vehicle['CarModel']}}</td>
                                                <td>{{$vehicle['Capacity']}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-sm-4 my-5 ">

                                    <div class="form-floating form-floating-outline  my-1 col-md-10">
                                            <input id = "carmodel" type="text" class="form-control dt-input" placeholder="CarModel">
                                            <label>CarModel</label>
                                    </div>
                                    <div class="form-floating form-floating-outline  my-1 col-md-10">
                                            <input id = "capacity" type="text" class="form-control dt-input" placeholder="Capacity">
                                            <label>Capacity</label>
                                    </div>
                                                        
                    <div class="row ">
                        <div class ="card-header d-flex justify-content-start">
                            <button class="btn btn-info mx-2" id = "btnedit"> Save </button>
                            <button class="btn btn-success" id = "btndel"> Delete </button>
                        </div>
                    </div>

                            </div>
                        </div>

                </div>


            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>

    var n_col;
    $("#btnedit").click(function() {

        let id = $(n_col).index() + 1;


        // alert(id);
        let model = $("#carmodel").val();
        let capacity = $("#capacity").val();

        $(n_col).children().eq(0).text("model");
        $(n_col).children().eq(1).text("capacity");

        alert(model);
        $.ajax({
            type:"post",
            url : "{{url('/savemodel')}}",
            data : {
                _token : "{{csrf_token()}}",
                id : 1,
                model : model,
                capacity : capacity
            },
            success : function(res) {
                alert(res['success']);
            },
            error : function(res) {
                console.error(err);
            }
        })
        // alert();
    });



    $("#btndel").click(function() {


        
        $("#carmodel").val('');
        $("#capacity").val('');

        let model = $(n_col).children().eq(0).text();
        if (model.length == 0) return ;

        $(n_col).remove();
        // alert(model);

        $.ajax({
            type : "post",
            url : "{{url('/deletemodel')}}",
            data : {
                _token : "{{csrf_token()}}",
                model : model
            },
            success : function(res) {
                alert(res['success']);
            },
            error : function(err) {
                console.error(err);
            }
        })
        // alert();
    });

    $("#vehicle-table tbody").on('click', 'tr', function() {
        $("#vehicle-table tbody tr").css("background-color","white");
        $(this).css("background-color","#555555");
        $("#carmodel").val($(this).children().eq(0).text());
        $("#capacity").val($(this).children().eq(1).text());
        n_col = this;
        // alert($(this).children().eq(1).text());
        
    });


</script>
@endsection