@extends('layouts.app')
@section('content')
<script src="{{ asset('js/qrcode.min.js') }}"></script>
<style>
    * {
        font-family: 'Montserrat';
        font-style: normal;
    }

    .txt-head {
        font-weight: 500;
        font-size: 32px;
        line-height: 39px;
        /* color: #36383D; */
        color: #36383D;
        text-shadow: 0 0 5px white;
    }

    .txt-company {
        font-weight: 500;
        font-size: 24px;
        line-height: 29px;
        /* color: #36383D; */
        color: #36383D;
        text-shadow: 0 0 5px white;
    }

    .avatar {
        position: relative;
        top: -30%;
        z-index: 1;
    }

    .avatar-img {
        position: relative;
        height: 190px;
        width: 190px;
    }

    .tab {
        position: relative;
        width: 100%;
    }

    .box {
        position: absolute;
        top: 50%;
        left: 0px;
        width: 100%;
        min-height: 80vh;
        border-radius: 30px 30px 0 0;
        background: #F5F5F5;
        box-shadow: 0px 2px 14px rgba(0, 0, 0, 0.2);
        /* z-index: -1; */
    }

    .content {
        position: relative;
        margin-top: 120px;
    }
    
    .contact {
        text-align: center;
        padding: 18px 30px 30px 30px;
        margin: auto;
        max-width: 450px;
    }

    .contact > p {
        text-align: left;
        font-size: 16px;
    }

    .address {
        width: 100%;
    }

    .col {
        padding: 0px;
    }

    .hero-image {
        background-image: url("../imgs/cover2.jpg");
        background-color: #cccccc;
        height: 300px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        z-index: -1;
    }

    .hero-text {
        position: absolute;
        text-align: center;
        top: 25%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
    }

    .section1 > h3 {
        font-size: 31px;
    }

    .btn-contact {
        background: linear-gradient(90deg, #FF7A00 0%, #FFA000 61.46%, #FFB800 100%);
        box-shadow: 0px 0px 10px -1px rgba(0, 0, 0, 0.25);
        border-radius: 22px;
        max-width: 390px;
        font-size: 13px;
        margin: 0 auto;
        padding: 10px;
        width: 85%;
        color: #FFFFFF;
        
    }

    .btn-circle {
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 25px 10px;
        width: 53px;
        height: 53px;
        padding: 15px;
        border-radius: 50%;
        /* background-color: #04AA6D; */
    }

    .btn-home {
        font-size: 18px;
        background: linear-gradient(90deg, #FF7A00 0%, #FFA000 61.46%, #FFB800 100%);
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center tab">
            <div class="hero-image">
                <div class="hero-text">
                    @php
                        if($user->company == 'a1a'){
                            $company = 'Alliance One Apparel (Vietnam)';
                            $address = 'B1, B2, B5-B12 Giao Long Industrial Park, An Phuoc Commune, Chau Thanh District, Ben Tre Province, Vietnam';
                        }else if ($user->company == 'trax apparel') {
                            $company = 'Trax Apparel (Cambodia)';
                            $address = 'No. 1, Russian Federation Boulevard, Sangkat Tuk Thla Khan Sen Sok Phnom Penh 12102 Cambodia';
                        }else{
                            $company = 'Trax Intertrade (Roiet)';
                            $address = '61 Moo 5 Tumbon Junghan Ampur Jungharn Roi-et 45270 Thailand';
                        }
                    @endphp
                    <div class="txt-head text-center">Profile</div><br>
                    <div class="txt-company my-2">{{ $company }}</div>
                </div>
            </div>

            <div class="avatar avatar-sm justify-content-center">
                <img src="{{ asset('imgs/profiles/'.(isset($user->avatar) ? $user->avatar : 'avatar.jpg')) }}" alt="..." class="avatar-img rounded-circle">
            </div>

            <div class="box">
                <div class="content">
                    <div class="section1">
                        @php
                            $ex_fullname = explode(" ", $user->fullname_en != null ? $user->fullname_en : $user->fullname);
                        @endphp
                        <h3>{{ ucfirst($ex_fullname[0]).' '.ucfirst($ex_fullname[1]) }}</h3>
                        <span>{{ $user->department->dept_name_en.(isset($user->position) ? ' ( '. ucfirst($user->position).' )' : null) }}</span>
                    </div>
                    <div class="section2 pt-4">
                        <div class="d1 mt-3">
                            <button class="btn btn-block btn-warning btn-contact">TAP TO ADD TO YOUR CONTACTS</button>
                        </div>
                        <div class="d2 mt-3">
                            <a href="tel:{{ $user->phone == null ? '-' : $user->phone }}" class="btn-circle btn btn-secondary {{ (isset($user->phone) ? '' : 'disabled') }}">
                                <i class="fa-solid fa-phone fa-rotate-270"></i>
                            </a>
                            <a href="#" class="btn-circle btn btn-secondary disabled">
                                <i class="fa-solid fa-comment"></i>
                            </a>
                            <a href="mailto:{{ $user->email == null ? '-' : $user->email }}" class="btn-circle btn btn-secondary {{ (isset($user->email) ? '' : 'disabled') }}">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                    <div class="section3">
                        <div class="contact">
                            <p>
                                <b>Phone: </b><span id="phone">{{ $user->phone == null ? '-' : $user->phone }}</span><br>
                                <b>Email: </b><span>{{ $user->email == null ? '-' : $user->email }}</span><br>
                                <b>Line ID: </b><span>{{ $user->line == null ? '-' : $user->line }}</span><br>
                                <b>Skype ID: </b><span>{{ $user->skype == null ? '-' : $user->skype }}</span>
                            </p>
                            <p class="address">
                                <b>{{ $company }}</b><br>
                                <span>{{ $address }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container" style="position: fixed; bottom: 10px;">
                    <div style="position: sticky; bottom: 0; text-align: right;">
                        <a href="{{ route('home') }}" class="btn-circle btn btn-home text-white m-0">
                            <i class="fa-solid fa-home"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function formatPhoneNumberWithTimezone(phoneNumber, timezone) {
        phoneNumber = phoneNumber.replace(/\D/g, '');
        return phoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
    }

    const phone = document.getElementById('phone').innerText;
    if(phone != null)
        document.getElementById('phone').innerText = formatPhoneNumberWithTimezone(phone, 'Asia/Bangkok');
</script>
@endsection


