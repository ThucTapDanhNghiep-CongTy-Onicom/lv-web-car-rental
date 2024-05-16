@extends('layouts.app')
@section('content')

<!-- Registration Full start -->
<section class="hero-wrap hero-wrap-3 js-fullheight" style="background-image: url('/ui/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <h1 class="mb-3 bread">Become a driver partner</h1>
                <p style="font-size: 1.4rem;">Complete the form</p>
            </div>
        </div>
    </div>
</section>
<section class="registration-full hero-wrap-2 p-4">
    <div class="container">
        <form action="{{route('partner.postDataApplication')}}" method="post">
            @csrf
            <div class="information write-box">
                <div class="condition">
                    <h4 class="border-bt">Information</h4>
                    <label for="">Gender *</label>
                    <div class="d-flex">
                        <label class="gender-regis">Male
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="gender-regis">Female
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="gender-regis">Other
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label">First name *</label>

                                <input type="text" name="firstname" class="@error('firstname') is-invalid @enderror form-control" placeholder="Your first name" value="<?= $regis['firstname'] ? $regis['firstname'] : null ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label">Last name *</label>
                                <input type="text" name="lastname" class="@error('lastname') is-invalid @enderror form-control" placeholder="Your last name" value="<?= $regis['lastname'] ? $regis['lastname'] : null ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label">Phone number *</label>
                                <input type="text" name="phone" class="@error('phone') is-invalid @enderror form-control" placeholder="Your phone number" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label">Email address *</label>
                                <input type="text" name="email" class="@error('email') is-invalid @enderror form-control" placeholder="Your e-mail address" value="<?= $regis['email'] ? $regis['email'] : null ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label">Password *</label>
                                <input type="password" name="password" class="@error('password') is-invalid @enderror form-control" placeholder="Your password" value="{{ old('password') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="label">Date of birth *</label>
                                <input type="date" name="birth" class="@error('birth') is-invalid @enderror form-control" value="{{ old('birth') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mailing write-box">
                <div class="condition">
                    <h4 class="border-bt">Mailing address</h4>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="" class="label">ADDRESS *</label>
                                <input type="text" name="address" class="@error('address') is-invalid @enderror form-control" placeholder="Your address" value="{{ old('address') }}">
                            </div>
                        </div>
                        <div class="col-5 col-sm-5 col-lg-2">
                            <div class="form-group">
                                <label for="" class="label">POSTCODE *</label>
                                <input type="text" name="postcode" class="form-control" placeholder="Your postcode" value="{{ old('postcode') }}">
                            </div>
                        </div>
                        <div class="col-7 col-sm-7 col-lg-4">
                            <div class="form-group">
                                <label for="" class="label">CITY *</label>
                                <input type="text" name="city" class="@error('city') is-invalid @enderror form-control" placeholder="Your town" value="{{ old('city') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="truck-transport write-box">
                <div class="condition">
                    <h4 class="border-bt">Truck transports</h4>
                    <div class="row flex-center-right mt-3">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="form-group print-content">
                                <div class="row flex-center">
                                    <div class="col-8">Do you have a 1-car transporter?</div>
                                    <div class="col-4 text-right">
                                        <label class="switch">
                                            <input type="checkbox" name="have">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="form-group print-content bg-content">
                                In addition to driving vehicles, you will be able to use your 1-car transporter to transport vehicles that can't be driven
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company write-box">
                <div class="condition">
                    <h4 class="border-bt">Company</h4>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="form-group print-content bg-content">
                                You can still apply to become a driver with us even if you're not yet self-employed
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="form-group">
                                <label for="" class="label">TYPE OF STATUS *</label>
                                <select name="company" id="" class="form-control" value="{{ old('company') }}">
                                    <option value="">Choose your situation</option>
                                    <option value="not">Not self-employed yet</option>
                                    <option value="self">Self-employed (includes non VAT registered company)</option>
                                    <option value="companys">Company</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accept-condition text-center">
                Yotrip reserves the right to decline any application where the information submitted is incomplete
                <br>
                <input type="checkbox" name="accept"> I accept the <a class="@error('accept') is-invalid @enderror">Terms and Conditions of use</a>
            </div>
            <div class="button-regis text-center">
                <input type="submit" value="Submit my application">
            </div>
        </form>
    </div>
</section>
<!-- Registration Full end -->
<style>
    .accept-condition .is-invalid {
        border-bottom: 1px solid red;
    }

    /* Hide the browser's default radio button */
    .gender-regis {
        display: block;
        position: relative;
        padding-left: 22px;
        margin-right: 10px;
        cursor: pointer;
        font-size: 15px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .gender-regis input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom radio button */
    .checkmark {
        position: absolute;
        top: 3px;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #eee;
        border-radius: 50%;
    }

    /* On mouse-over, add a grey background color */
    .gender-regis:hover input~.checkmark {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .gender-regis input:checked~.checkmark {
        background-color: #E85626;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .gender-regis input:checked~.checkmark:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .gender-regis .checkmark:after {
        top: 5px;
        left: 5px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>

<!-- Total Start -->
@include('partials.total')
<!-- Total Start -->

<!-- Footer -->
@include('partials.footer')

@endsection