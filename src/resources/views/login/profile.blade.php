@extends('layouts.app')
@section('content')
<link rel="icon" href="{{asset('/ui/images/Yotrip_new2.png')}}" type="image/x-icon" />
<style>
    input[type="file"] {
        font-size: 0.3rem;
        opacity: 0;
        position: absolute;
        top: 1.3rem;
        z-index: 10000;
        right: -4.1rem;
    }

    .camera {
        position: absolute;
        color: black;
        top: 8rem;
        right: 8rem;
        font-size: 2rem;
    }

    .list {
        position: absolute;

        left: 50%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        display: flex;
    }

    .list li {
        list-style: none;
    }

    .list li a {
        position: relative;
        width: 50px;
        height: 50px;
        display: block;
        text-align: center;
        margin: 0 10px;
        border-radius: 50%;
        padding: 6px;
        box-sizing: border-box;
        text-decoration: none;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
        background: linear-gradient(0deg, #ddd, #fff);
        transition: .5s;
    }

    .list li a:hover {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        text-decoration: none;
    }

    .list li a .fa {
        widht: 100%;
        height: 100%;
        display: block;
        background: linear-gradient(0deg, #fff, #ddd);
        border-radius: 50%;
        line-height: calc(60px - 12px);
        font-size: 24px;
        color: #262626;
        transition: .5s;
    }
</style>
<div class="hero-wrap-2 ftco-degree-bg" data-stellar-background-ratio="0.5" style="    width: 100%;
    height: 100px;
    position: inherit;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: top center;
">
    <div class="overlay"></div>
</div>
<div class="profile" style="margin: 10px auto;
    padding-bottom: 10px;">
    <div class="container">
        <div class="main-body">
            <div id="info" class="row gutters-sm">
                <div class="col-md-3" style="box-shadow: 0 0 10px 4px #f2e9e9;margin-bottom: 0rem !important;">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if($user->social_type == 'google' || $user->social_type == 'Facebook')
                                <img src="{{$user->photo}}" alt="Admin" class="rounded-circle" width="150px" height="150px">
                                @else
                                <img src="{{$user['photo']}}" alt="Admin" class="rounded-circle" width="150px" height="150px">
                                @endif
                                <div class="mt-3">
                                    <h4>{{$user['name']}}</h4>
                                    <p class="text-muted font-size-sm">{{$user['address']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card mb-3 pt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-9 text-secondary">
                                    {{$user['name']}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-9 text-secondary">
                                    {{$user['email']}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-9 text-secondary">
                                    {{$user['phone']}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-9 text-secondary">
                                    {{$user['address']}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-9 text-secondary">
                                    @if($user['gender'] == "1")
                                    Male
                                    @else
                                    Female
                                    @endif
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-orange py-3 px-4" id="edit-user">Edit</button>
                            </div>
                            <div class="col-6">
                                <div class="date">Join: <?= date_format($user['created_at'], 'F d Y'); ?></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    @php
                    $count = App\User::where('referral_code', Auth::user()->received_code)->get()->count();

                    $total = $count * 10;
                    @endphp
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-3 my-3">
                            <button type="button" class="btn btn-orange px-3 py-2">
                                <i class="fa fa-star"></i> {{$total}} điểm
                            </button>
                        </div>
                        <div class="col-lg-12 col-md-12 col-3 my-3">
                            <button type="button" class="btn btn-orange px-3 py-2">
                                @if($user['status'] == 'active')
                                Verified
                                @else
                                Unconfirmed
                                @endif
                            </button>
                        </div>
                        <div class="col-lg-12 col-md-12 col-6 my-3">
                            <button type="button" class="btn btn-orange px-3 py-2">{{$count}} - Subscribers</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Show edit user when click button edit -->
            <form action="{{route('editUser',$user->id)}}" id="frm" method="post">
                @csrf
                @method('PATCH')
                <div id="edit-info" class="row gutters-sm1" style="display: none;">

                    <div class="col-md-4" style="box-shadow: 0 0 10px 4px #f2e9e9;padding-bottom: 50px;">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($user->social_type == 'google' || $user->social_type == 'Facebook')
                                    <img id="output" src="{{$user->photo}}" alt="Admin" class="rounded-circle" width="150px" height="150px">
                                    @else
                                    <img id="output" src="{{$user['photo']}}" alt="Admin" class="rounded-circle" width="150px" height="150px">
                                    @endif
                                    <div class="camera">
                                        <i class="icon-camera"></i>
                                        <input type="file" name="photo" id="photo" onchange="loadFile(event)" accept="image/*">
                                    </div>
                                    <div class="mt-3">
                                        <h4>{{$user['name']}}</h4>

                                        <p class="text-muted font-size-sm">{{$user['address']}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <ul class="list">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}" required="">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$user['email']}}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{$user['phone']}}" required="" placeholder="{{$user['phone']}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="address" id="address" value="{{$user['address']}}" required="" placeholder="{{$user['address']}}">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <!-- <input type="text" class="form-control" name="gender" id="address"
                                            value="{{$user['gender']}}" required="" placeholder="{{$user['gender']}}"> -->

                                        <input class="form-check-input" type="radio" name="gender" value="1" @if(old('gender',$user['gender'])=="1" ) checked @endif>

                                        <label for="vehicle1">Male</label><br>


                                        <input class="form-check-input" type="radio" name="gender" value="2" @if(old('gender',$user['gender'])=="2" ) checked @endif>
                                        <label for="vehicle1">Female</label>


                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" id="sendcontact" class="btn btn-orange py-3 px-4" id="edit-user">Submit</button>
                        </div>
                    </div>




                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
@include('partials.footer')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    //Ajax Contact
    $(document).ready(function() {
        $(document).on('submit', '#frm', function(e) {
            e.preventDefault();

            // var name = $('#name').val();
            // var email = $('#email').val();
            // var phone = $('#phone').val();
            // var address = $('#address').val();
            // var photo = $('#photo').val();
            if (name != null && phone != null && address != null) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: $('#frm').attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        swal({
                            title: "Notification",
                            text: "Update Success",
                            icon: 'success',
                            button: 'OK',
                        })
                    },
                    error: function(response) {
                        swal({

                            title: "Notification",
                            text: "Update Error",
                            icon: 'error',
                            button: 'OK',
                        })
                        console.log(JSON.stringify(response));
                    }
                })
            } else {
                swal({
                    title: "Notification",
                    text: "The field must have a value",
                    icon: 'error',
                    button: 'OK',
                })
            }
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    $btneditUser = document.getElementById('edit-user');
    $infoEditUser = document.getElementsByClassName('gutters-sm1');
    $btneditUser.addEventListener('click', function() {
        $info = document.getElementById('info').setAttribute('style', 'display:none');

        $editInfo = document.getElementById('edit-info').setAttribute('style', 'display:flex');

    });
</script>
<script src="{{asset('/ui/js/detailSlide.js')}}"></script>
<script>
    $('.card').removeClass();
</script>
@endsection