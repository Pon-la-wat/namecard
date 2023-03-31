@extends('layouts.app')
@section('content')
<style>
    .avatar2 {
        position: relative; 
        left: 50%;
        width: 190px;
        transform: translateX(-50%);
    }

    .avatar-img {
        width: 190px;
        height: 190px;
        position: relative;
        top: -31%;
    }
    
    .upload-img {
        position: absolute;
        bottom: 0%;
        right: 8%;
        width: 35px;
        height: 35px;
        padding: 5px;
        border-radius: 50%;
        color: white;
        cursor: pointer;
        display: inline-block;
        background-color: black;
    }
</style>
    <div class="container pt-4">
        <a href="{{ route('home') }}" class="text-dark"><i class="fas fa-chevron-left"></i> Edit profile</a>
        <br>
        <div class="row text-center my-4">
            <div class="col justify-content-center">
                <div class="avatar2">
                    <img src="{{ asset('imgs/avatar.png') }}" alt="..." class="avatar-img rounded-circle">
                    <div class="upload-img text-center">
                        <i class="fa-solid fa-camera"></i>
                        <input type="file" class="file-image" id="file-image" name="file-image" accept="image/jpeg, image/png, image/jpg" style="opacity: 0">
                    </div>
                </div>
            </div>
        </div>
        <form>
            <h4 class="text-center">Biometric</h4>
            <div class="form-group">
                <label for="employee">Employee</label>
                <input type="number" class="form-control" id="employee" placeholder="employee" required>
            </div>
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" placeholder="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" placeholder="lastname" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" id="department" required>
                    <option disabled value="">Please select department</option>
                    <option value="IT" selected>IT</option>
                </select>
            </div>
            <div class="form-group mb-4">
                <label for="company">Company</label>
                <select class="form-control" id="company" required>
                    <option disabled value="">Please select company</option>
                    <option value="" selected>Alliance One Apparel (Vietnam)</option>
                    <option value="">Trax Apparel (Cambodia)</option>
                    <option value="">Trax Intertrade (Roiet)</option>
                </select>
            </div>
            <h4 class="text-center">Contact</h4>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="phone" id="phone" minlength="10" maxlength="10" placeholder="Phone number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="firstname.last@email.co.th" required>
            </div>
            <div class="form-group">
                <label for="skype">Skype</label>
                <input type="text" class="form-control" name="skype" id="skype" placeholder="skype id" required>
            </div>
            <div class="form-group">
                <label for="line">Line</label>
                <input type="text" class="form-control" name="line" id="line" placeholder="line id" required>
            </div>
            <button class="btn btn-success btn-block">Save</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const input = document.querySelector(".file-image");
        let imagesArray = [];
        
        input.addEventListener("change", function() {
            alert('OK');
            console.log('ok');
        });
    </script>
@endsection