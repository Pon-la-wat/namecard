@extends('layouts.app')
@section('navbar')
    @extends('layouts.navbar')
@endsection
@section('content')
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
        width: 190px;
        height: 190px;
        position: relative;
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
        padding: 30px;
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

    .setting, .view {
        position: relative;
    }

    .setting > a {
        position: absolute;
        right: 0%;
        margin-top: 31px;
        cursor: pointer;
        z-index: 1;
    }

    .view > a {
        position: absolute;
        right: 35px;
        margin-top: 31px;
        cursor: pointer;
        z-index: 1;
    }

    .col {
        padding: 0px;
    }

    .hero-image {
        background-image: url("imgs/cover2.jpg");
        background-color: #cccccc;
        height: 300px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        z-index: -1;
    }

    .hero-text {
        text-align: center;
        position: absolute;
        top: 25%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
    }

    .save {
        font-size: 12px;
        font-weight: 500;
        color: #36383D;
    }

    .group-save {
        width: 50px;
        margin: auto;
    }

    #qrcode {
        border: 2px solid #36383D;
    }
</style>
<div class="container">
    {{-- <div class="view">
        <a href="{{ route('settings.index') }}" style="font-size: 20px"><i class="fas fa-eye text-black-50"></i></a>
    </div> --}}
    <div class="setting">
        <a href="{{ route('settings.index') }}" style="font-size: 20px"><i class="fas fa-cog text-black-50"></i></a>
    </div>

    {{-- <div class="row justify-content-center mb-3">
        <div class="col-md-12 text-center"></div>
            <div class="txt-head text-center">Profile</div><br>
            <div class="txt-company my-2">Trax Intertrade Group</div>
        </div>
    </div> --}}
    
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

            <span class="avatar avatar-sm justify-content-center">
                <img src="{{ asset('imgs/profiles/'.(isset($user->avatar) ? $user->avatar : 'avatar.jpg')) }}" alt="..." class="avatar-img rounded-circle">
            </span>

            <div class="box">
                <div class="content">
                    <div class="section1">
                        @php
                            $ex_fullname = explode(" ", $user->fullname_en);
                        @endphp
                        <h3>{{ ucfirst($ex_fullname[0]).' '.ucfirst($ex_fullname[1]) }}</h3>
                        <span>{{ $user->department->dept_name_en.' ( '. ucfirst($user->position).' )' }}</span>
                    </div>
                    <div class="section2 pt-4">
                        @php
                            $qrcode = base64_encode(QrCode::format('png')->backgroundColor(255, 255, 255)->margin(4)->size(170)->generate(url()->current().'/namecards/'.$user->username));
                        @endphp
                        <img src="data:image/png;base64, {!! $qrcode !!}" class="mb-3" id="qrcode">
                        <br>
                        <div class="group-save">
                            <a href="data:image/png;base64, {!! $qrcode !!}" class="save" download="qrcode.png">
                                <i class="fa-solid fa-arrow-down" style="font-size: 20px"></i><br>
                                <p class="mt-1 mb-0">Save</p>
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
    const formattedPhoneNumber = formatPhoneNumberWithTimezone(phone, 'Asia/Bangkok');
    document.getElementById('phone').innerText = formattedPhoneNumber;
</script>
@endsection


