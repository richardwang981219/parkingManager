@extends('layouts.app')
@section('content')
<div class="mainBody" >

    <!-- <img style="width: 100%; filter: blur(4px);" src="/assets/img/backgrounds/backgrounds.jpg"></img> -->



    <video autoplay="autoplay" loop = "loop" muted = "muted" >
        <source src="/assets/img/city.mp4" type="video/mp4">    
    </video>
    <div id = "videotext">
        <div>
            <div style="text-align: center;">Multiply</div>
            <div style="text-align: center;">your parking income</div>
        </div>
    </div>
    
    
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>

        $(document).ready(function() {

            $("#transferbtn").on("click",function() {z
                history.pushState(null, null, '/dashboard');
            });
        });
                
        </script>


@endsection