
@extends('layouts.contentNavbarLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content -->
  
  <!-- / Content -->
  
    <!-- vehicles -->
    <div class="card">
            <div class ="card-header d-flex ">
                <div style="font-size:30px;color:red">Electricity</div>
            </div>
            <div class="card-body" style="font-size:15px">
                <hr class="mt-0">
                <div class="row" id="card-form">

                    <div class="row">
                    <canvas id="doughnutChart" width="400" height="400"></canvas>
                        </div>

                </div>


            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
        var ctx = document.getElementById('doughnutChart').getContext('2d');
        var totalAmount =  `{{$elecs->current}}`;
        var currentAmount = `{{$elecs->total}}`;
        var remainingAmount = totalAmount - currentAmount;

        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Current Amount', 'Remaining Amount'],
                datasets: [{
                    data: [currentAmount, remainingAmount],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: false,
                legend: {
                    display: true,
                    position: 'bottom'
                },
                plugins: {
                    beforeDraw: function(chart) {
                        var width = chart.chart.width,
                            height = chart.chart.height,
                            ctx = chart.chart.ctx;

                        ctx.restore();
                        var fontSize = (height / 114).toFixed(2);
                        ctx.font = fontSize + "em sans-serif";
                        ctx.textBaseline = "middle";

                        var text = totalAmount,
                            textX = Math.round((width - ctx.measureText(text).width) / 2),
                            textY = height / 2;

                        ctx.fillText(text, textX, textY);
                        ctx.save();
                    }
                }
            }
        });
    </script>
@endsection