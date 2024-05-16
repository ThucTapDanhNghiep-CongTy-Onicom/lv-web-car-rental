@extends('layouts.app')
@section('content')
<style>
 .form-controlss {

    width: 34%;
    height: calc(1.5em + 0.75rem + 4px);
    padding: 0.375rem 0.75rem;
    font-size: 16px;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;

    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;

    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;

}
</style>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

<link href="{{asset('/backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('/backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
<section id="promotion" class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="border-bt" style="text-align: center;">INVITE FRIENDS</h2>


            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-8">
                <br>
                <h4>
                   Share the referral code with your friends so that both of you can get a discount of VND 50,000 for the first trip
                </h4>
                <br>
                <h4>
Referral code</h4>
                <!-- The text field -->
                @foreach($refect as $ref)
                @php
                    
                @endphp
                @if(Auth::user()->id == $ref->id)
                <input class="form-controlss" type="text"  value="<?php echo $ref->received_code  ?>" id="inputText" readonly>
                @endif
                @endforeach

                <!-- The button used to copy the text -->
                <button id="copyText" class="btn btn-orange py-2 mr-1" style="font-size: 15px;">Copy</button>
                <br>
                <br>
                <div class="button-list btn-social-icon">
                    <button type="button" class="btn btn-facebook" style="    border: 1px solid grey;">
                        <i class="fab fa-facebook"></i>
                    </button>

                    <button type="button" class="btn btn-twitter ms-1" style="    border: 1px solid grey;">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-linkedin  ms-1" style="    border: 1px solid grey;">
                        <i class="fab fa-linkedin"></i>
                    </button>

                   
                    <button type="button" class="btn btn-googleplus  ms-1" style="    border: 1px solid grey;">
                        <i class="fab fa-google-plus"></i>
                    </button>

                    <button type="button" class="btn btn-instagram ms-1" style="    border: 1px solid grey;">
                        <i class="fab fa-instagram"></i>
                    </button>

                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="refect-img">
                    <img src="/ui/images/sharecode.cbaa11bf.png" alt="sharecode" style="max-width: 85%;height: auto;">
                </div>
            </div>
        </div>

    </div>
</section>

<script>
/* return content of input field to variable text */
var text = document.getElementById("inputText");

/* return button to variable btn */
var btn = document.getElementById("copyText");

/* call function on button click */
btn.onclick = function() {
  text.select();
  navigator.clipboard.writeText("/ui/register/ref/" + text.value);    
  document.execCommand("copy");
}
	
</script>
<!-- Footer -->
@include('partials.footer')

@endsection