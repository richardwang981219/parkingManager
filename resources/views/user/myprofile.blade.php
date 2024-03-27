<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Website Layout Example</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  
  @include('layouts/sections/styles')
    @include('layouts/sections/scripts')


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
<style>
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f9fafb;
        margin: 0;
        padding: 0;
    } */
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
        background-color: white;
        border-radius: 10px;
        margin: 50px;
    }
    #activities * {
        margin: 10px;
    }
    #settings{
        flex-basis: 50%;
        display: flex;
        flex-direction: column;
        background-color: white;
        margin: 50px;
        border-radius: 10px;
    }
    @media screen and (max-width: 750px){
        
        #body{
            flex-direction: column;
            margin: 0;
        }
        footer{
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            /* bottom: 0; */
            width: 100%;
        }
    }
    @media screen and (max-device-width: 750px){
    
        #body{
            flex-direction: column;
            margin: 0;
        }
        footer{
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            /* bottom: 0; */
            width: 100%;
        }
    }

</style>
</head>
<body>

<div class="header">
    <div style = "width:25%">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/assets/img/logo.png"></img>
        </a>
    </div>

    <div style = "width:50%">
        <h1>My Profile</h1>
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
            <div><h2>My Activities</h2></div>

            <div>
                <a href="#" style="text-decoration: none; color: black;">65 recharges made</a>
            </div>

             <div>
                <a href="#" style="text-decoration: none; color: black;">2045KWh energy provided</a>
            </div>
            <div>

            </div>
            <!-- Content for My Activities section -->
        </div>

        <div id="settings">
            <div class="container pb-3"><h2>Settings</h2></div>

            <div class = "container pb-3">
                <h3>My Payment methods</h3>
                <div class="container mt-1">

                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>
                        <label class="form-check-label" for="radio1">Paypal</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                        <label class="form-check-label" for="radio2">Payneer</label>
                    </div> 



                </div>
                
            </div>
            <div class="container pb-3">
                <h3 >Vehicles settings</h3>
            </div>
             <div class="container pb-5">
                <h3>My recharges</h3>
                <div class="d-flex row pl-3">
                    <h5 id = "progress-label">Charging...</h5>
                    <progress id="progressBar" value="0" max="100" class="progress-bar progress-bar-striped progress-bar-animated">7%</progress>

                </div>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-end" style="margin-right:80px">              
        <div id="DeleteDiv" style = ""> <button class="btn btn-primary my-2 waves-effect waves-light mx-2" data-bs-toggle="modal" id="btn-pay" disabled> Pay </button></div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Pay</h4>
            <button type="button" class="close btn-modal-close" data-dismiss="modal" >&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            Are you sure you want to pay?
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="btn-pay-ok">OK</button>
            <button type="button" class="btn btn-danger btn-modal-close" data-dismiss="modal" id="">Close</button>
            </div>
            
        </div>
        </div>
    </div>

    <div class="toast" data-autohide="false">
            <div class="toast-header">
            <strong class="mr-auto text-primary">Thanks you!!!</strong>
            <!-- <small class="text-muted">5 mins ago</small> -->
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
            Success!!!
            </div>
        </div>
    </div>

    <footer>
        &copy; 2024 My Website. All Rights Reserved.
    </footer>
<script>
    // Get the progress bar element
    const progressBar = document.getElementById('progressBar');
    
    let value = 0;
    
    // Function to increment the value of the progress bar
    function incrementProgress() {
        if (value < 100) {
            value += 10;
            progressBar.value = value;
            $("#progressBar").text(value);

            if(value == 100) {
                $("#progress-label").text("Done!!!");
                $("#btn-pay").prop('disabled',false);
            }
        }
        else {
            clearInterval(interval);
        }
        
    }
    
    // Update the progress bar every second
    var interval = setInterval(incrementProgress, 1000);

    $("#btn-pay").click(function() {
        alert();
        $("#myModal").show();


    })
    $(".btn-modal-close").click(function() {
        $("#myModal").hide();
    });

    $("#btn-pay-ok").click(function() {
        $("#myModal").hide();
        let position = localStorage.getItem('position');
        localStorage.clear();

        $.ajax({
            type : "get",
            url : "{{url('/deleteLog')}}",
            data : {
                _token : "{{csrf_token()}}",
                position : position,
            },
            success : function(res){
                alert('Success!!!');
                window.location.href="/";
            },
            error: function(err) {
                console.error(err);
            }
        });
        
        $('.toast').toast('show');


    })


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>