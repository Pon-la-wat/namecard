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
        outline: 1px solid white;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
    <div class="container pt-4">
        <a href="{{ route('home') }}" class="text-dark"><i class="fas fa-chevron-left"></i> Edit profile</a>
        <br>
        <div class="row text-center my-4">
            <div class="col justify-content-center">
                <div class="avatar2">
                    <form enctype="multipart/form-data" id="form-upload">
                        @csrf
                        <img src="{{ asset('imgs/profiles/'.(isset($user->avatar) ? $user->avatar : 'avatar.jpg')) }}" alt="..." class="avatar-img rounded-circle">
                        <div class="upload-img text-center" onclick="upload_image()">
                            <i class="fa-solid fa-camera"></i>
                            <input type="file" class="file-image" id="file-image" name="avatar" accept="image/jpeg, image/png, image/jpg" style="display: none">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <form action="{{ route('settings.store') }}" method="POST">
            @csrf
            <h4 class="text-center my-4">Biometric</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="employee">Employee ID</label>
                        <input type="number" class="form-control" name="username" id="username" readonly required>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group mb-4">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="position">Position</label>
                        <select class="form-control" name="position" id="position" required>
                            <option disabled selected value="">Please select position</option>
                            <option value="programmer">Programmer</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" name="dept_id" id="department" required>
                            <option disabled selected value="">Please select department</option>
                            <option value="1">IT</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mb-4">
                        <label for="company">Company</label>
                        <select class="form-control" name="company" id="company" required>
                            <option disabled selected value="">Please select company</option>
                            <option value="a1a">Alliance One Apparel (Vietnam)</option>
                            <option value="trax apparel">Trax Apparel (Cambodia)</option>
                            <option value="trax intertrade">Trax Intertrade (Roiet)</option>
                        </select>
                    </div>
                </div>
            </div>
            <h4 class="text-center my-4">Contact</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone" minlength="10" maxlength="10" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="skype">Skype</label>
                        <input type="text" class="form-control" name="skype" id="skype">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="line">Line</label>
                        <input type="text" class="form-control" name="line" id="line">
                    </div>
                </div>
            </div>
            <br>
            <button class="btn btn-success btn-block">Save</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var user = {!! json_encode($user) !!};
        document.getElementById('username').value = user.username;
        document.getElementById('fullname').value = user.fullname_en;
        document.getElementById('position').value = user.position;
        document.getElementById('department').value = user.dept_id;
        document.getElementById('company').value = user.company;
        document.getElementById('email').value = user.email;
        document.getElementById('phone').value = user.phone;
        document.getElementById('skype').value = user.skype;
        document.getElementById('line').value = user.line;

        const upload_image = function(){
            const input = document.querySelector(".file-image");
            const forms = document.getElementById('form-upload');
            input.click();

            $(document).ready(function(){
                $('#file-image').change(function(e){
                    e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    const formData = new FormData(forms);
                    let route = "{{ route('settings.upload', ['username' => ":username"]) }}";
                    route = route.replace(':username', user.username);
                    $.ajax({
                        type: 'POST',
                        url: route,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            console.log(response);
                            if (response == 'S') {
                                alert('Upload Success')
                            }else{
                                alert('Upload Failed')
                            }
                        }
                    });
                });
            });
        }
    </script>
@endsection