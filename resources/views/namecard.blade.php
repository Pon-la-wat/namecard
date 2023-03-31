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
        width: 52px;
        height: 52px;
        padding: 15px;
        border-radius: 50%;
        /* background-color: #04AA6D; */
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col text-center tab">
            <div class="hero-image">
                <div class="hero-text">
                    <div class="txt-head text-center">Profile</div><br>
                    <div class="txt-company my-2">Trax Intertrade Group</div>
                </div>
            </div>

            <div class="avatar avatar-sm justify-content-center">
                <img src="{{ asset('imgs/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
            </div>

            <div class="box">
                <div class="content">
                    <div class="section1">
                        <h3>Firstname Lastname</h3>
                        <span>Department</span>
                    </div>
                    <div class="section2 pt-4">
                        <div class="d1 mt-3">
                            <button class="btn btn-block btn-warning btn-contact">TAP TO ADD TO YOUR CONTACTS</button>
                        </div>
                        <div class="d2 mt-3">
                            <a href="tel:+66986032690" class="btn-circle btn btn-secondary">
                                <i class="fa-solid fa-phone fa-rotate-270"></i>
                            </a>
                            {{-- <button class="btn-circle btn btn-secondary">
                                <i class="fa-solid fa-phone fa-rotate-270"></i>
                            </button> --}}
                            <a href="#" class="btn-circle btn btn-secondary">
                                <i class="fa-solid fa-comment"></i>
                            </a>
                            {{-- <button class="btn-circle btn btn-secondary">
                                <i class="fa-solid fa-comment"></i>
                            </button> --}}
                            <a href="mailto:pollawat.chim@gmail.com" class="btn-circle btn btn-secondary">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                            {{-- <button class="btn-circle btn btn-secondary">
                                <i class="fa-solid fa-envelope"></i>
                            </button> --}}
                        </div>
                    </div>
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
@endsection


