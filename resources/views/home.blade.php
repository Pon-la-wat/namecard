@extends('layouts.app')
@section('navbar')
    @extends('layouts.navbar')
@endsection
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

    .avatar-img {
        width: 190px;
        height: 190px;
        position: relative;
        top: -31%;
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
        z-index: -1;
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

    .setting {
        position: relative;
    }

    .setting > a {
        position: absolute;
        right: 0%;
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
</style>
<div class="container">
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
                    <div class="txt-head text-center">Profile</div><br>
                    <div class="txt-company my-2">Trax Intertrade Group</div>
                </div>
            </div>

            <span class="avatar avatar-sm justify-content-center">
                <img src="{{ asset('imgs/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
            </span>

            <div class="box">
                <div class="content">
                    <div class="section1">
                        <h3>Firstname Lastname</h3>
                        <span>Department</span>
                    </div>
                    <div class="section2 pt-4 pb-2">
                        <div id="qrcode"></div>
                    </div>
                    <div class="text-center">
                        <div class="contact">
                            <p>
                                <b>Tel: </b><span>905 845 0024</span><br>
                                <b>Email: </b><span>trax.inter@libgroup.co.th</span><br>
                                <b>Skype ID: </b><span>trax</span><br>
                                <b>Line ID: </b><span>trax</span>
                            </p>
                            <p class="address">
                                <span>137/47 Soi Ladprao 41, Ladprao Rd., Chandarakasem, Jatujak, Bangkok 10900</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var qr_number = '0123456';
    var qr_id = document.getElementById("qrcode");
    var qrcode = new QRCode(qr_id, {
        text: qr_number,
        width: 120,
        height: 120,
        colorDark : "#000000",  // สี qrcode ดำ
        colorLight : "#ffffff", // สีพื้นหลัง ขาว
        typeNumber : 4,  // จำนวนกำหนด byte ข้อมูลที่รองรับ 1 - 40
        correctLevel : QRCode.CorrectLevel.H
    });

    // append number qrcode
    // const qr_text = document.createElement('p');
    // qr_text.innerText = qr_number;
    // qr_id.appendChild(qr_text);
</script>
@endsection


