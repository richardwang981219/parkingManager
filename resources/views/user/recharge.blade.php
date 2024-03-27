<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Parking Manager</title>
<link rel = "icon" type = "image/png" href = "/assets/img/favicon.ico">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 0;
    }
    .header {
        background-color: #84a997;
        color: white;
        text-align: center;
        padding: 10px 0;
        display:flex;
    }
    nav {
        background-color: #444;
        color: white;
        padding: 10px;
    }
    section {
        padding: 20px;
    }
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: absolute;
        bottom: 0;
        width: 100%;
        /* height: 100; */
    }
    #body{
        display: flex;
        width: 100%;
        background-color: #b6c0cb;
        margin-top: 100px;
    }
    #activities{
        flex-basis: 50%;
        display: flex;
        flex-direction: column;

        /* align-items: center; */
        background-color: white;
        /* width: 550px; */
        /* top: 100px; */
        border-radius: 10px;
        margin: 50px;
        /* border: 20px; */
    }
    #activities * {
        margin: 10px;
    }
    #settings * {
        margin: 10px;
    }
    #settings{
        flex-basis: 50%;
        display: flex;
        flex-direction: column;
        background-color: white;
                /* width: 550px; */

        margin: 50px;
        border-radius: 10px;
    }
    .slider {
  width: 95%;
  margin: 50px auto;
}

.slider-bar {
  -webkit-appearance: none;
  width: 100%;
  height: 10px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
}

.slider-bar::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
    @media screen and (max-width: 750px){
        
        #body{
            flex-direction: column;
            margin: 0;
        }
        footer{
            /* bottom:auto; */
        }
        #settings{
            margin:0;
        }
        #activities *{
            margin-left:5px;
        }
        #activities {
            margin:0;
        }
    }
    @media screen and (max-device-width: 750px){
    
        #body{
            flex-direction: column;
            margin: 0;
        }
        footer{
            bottom:auto;
        }
        #settings{
            margin:0;
        }
        #activities{
            margin:0;
        }
    }

</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Trade Accounting</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('layouts/sections/styles')
    @include('layouts/sections/scripts')
</head>
<body>


<div class="header">
    <div style = "width:25%">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/assets/img/logo.png"></img>
        </a>
    </div>

    <div style = "width:50%">
        <h1>Start Charge</h1>
    </div>
    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse" style = "flex-grow:4">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
              <li>
                <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 me-2 pe-1">
                      <div class="avatar avatar-online">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="mb-0">{{Auth::user()->name}}</h6>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/">
                  <i class='mdi mdi-power me-1 mdi-20px'></i>
                  <span style="color:#544f5a; "class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
        </ul>
      </div>
<!-- 
    <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:#544f5a" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> -->
</div>


    <div id = "body" >
        <div id="activities">
            <div>
                
                <h2>Vehicle information</h2>
            </div>

            <div class="row" id="card-form">
                    <!-- <div class="row"> -->
         
                                <div class="form-group row">
                                    <label for="from-godown">Vehicle Model</label>
                                    <div class="col-md-11">
                                        <select id="vehicle" class="form-control dt-input col-md-9" onchange="vehiclechange()">
                                            <option></option>
                                            @foreach($vehicles as $vehicle)
                                                <option value="{{$vehicle['id']}}">{{$vehicle['CarModel']}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="from-godown">Vehicle Place</label>
                                    <div class="col-md-11">
                                        <select id="place" class="form-control dt-input col-md-9" onchange="placechange()">
                                            <option></option>
                                            
                                            @foreach($places as $place) 
                                                <option>{{$place['place']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                </div>


            
            <div>

            </div>
            <!-- Content for My Activities section -->
        </div>

        <div id="settings">
            <div><h2>Recharge preferences</h2></div>

            <div>
                <label style = "bottom:0; margin-top:0">Current battery level</label>
                <label id = "current" style="margin-top:0">0 %</label>
                <div class="slider">
                    <input id = "currentslide" type="range" min="0" max="100" value="0" class="slider-bar" oninput="currentchange()" >
                </div>
            
            </div>

             <div>
                <label style = "bottom:0; margin-top:0">Desired battery level</label>
                <label id = "desired" style="margin-top:0">0 %</label>
                <div class="slider">
                    <input id = "desiredslide" type="range" min="0" max="100" value="0" class="slider-bar" oninput="desiredchange()" >
                </div>
            </div>
            
            <!-- <div>
                <label style = "bottom:0; margin-top:0">Recharge ending datetime</label>
                <input type="text" class="form-control dt-input" placeholder="Series" readonly style="width:30%;  background-color:'#b6c0cb'">
            </div> -->
        </div>
    </div>

    <div class="d-flex justify-content-end" style="margin-right:80px">
                        
                            <div id="DeleteDiv" style = ""> <button class="btn btn-primary my-2 waves-effect waves-light mx-2" data-bs-toggle="modal" id="DeleteBtn"> Cancle </button></div>
                            <div id="OpenDiv"><button class="btn btn-danger my-2 waves-effect waves-light" data-bs-toggle="modal" id="btnstart"> Start Charge </button></div>
    </div>


<footer>
    &copy; 2024 My Website. All Rights Reserved.
</footer>

</body>

<script>


    var cur = 0,des = 0,vehicle = 0,place = "";
    function currentchange() {

        cur = $("#currentslide").val();
        $("#current").text(cur + "%");
    }

    function desiredchange() {
        // alert();
        des = $("#desiredslide").val();
        $("#desired").text(des + "%");
    }

    function vehiclechange() {

        vehicle = $("#vehicle").val();
        // alert(vehicle);

    }

    function placechange() {
        place = $("#place").val();

    }

    $(document).ready(function() {
        // alert();
        $("#btnstart").click(function() {

            let current = parseInt(cur);
            let desired = parseInt(des);

            if( des == 0 || vehicle === 0 || place === "" || current > desired) {
                alert('Please input correctly.');
                return ;
            }


            var capacity = @json($capacity);
            let val = capacity[vehicle];
            

            let value = parseInt(val);

            let tot = '{{$elec}}';
        
            let total = parseInt(tot);

            

            if(total < value) {
                alert('Less Electricity');
                return ;
            };
            total = total - value;
    
            $.ajax({
                type : "get",
                url : "{{url('/saveLog')}}",
                data : {
                    _token : "{{csrf_token()}}",
                    user : `{{Auth::user()->id}}`,
                    veh : vehicle,
                    position: place,
                    capacity : total,
                },
                success : function(res){
                    alert('Success!!!');
                    localStorage.setItem('position',place);
                    window.location.href="/myprofile";
                },
                error: function(err) {
                    console.error(err);
                }
            });



        });

    });
        



</script>
</html>