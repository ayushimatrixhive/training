@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  onchange="validateName();" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                                <span class="error" id = "nameError"></span>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror"  onchange="validateName();" name="lname" value="{{ old('lname') }}"  autocomplete="lname" autofocus>
                                <span class="error" id = "lnameError"></span>
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" onchange="getAge();" value="{{ old('dob') }}"  autocomplete="dob" autofocus>
                                <span class="error" id = "dobError"></span>
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}"  autocomplete="age" autofocus>
                                <span class="error" id = "ageError"></span>
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}"  autocomplete="gender" autofocus> -->
                            <span class="form-check form-check-inline" >
                                <input class="form-check-input" type="radio" name="gender" value="male">
                                <label class="form-check-label" for="male">Male</label>
                                </span>
                            <span class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" value="female">
                                <label class="form-check-label" for="female">Female</label>
                            </span>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function validateName() {
      var name = document.getElementById('name').value;
      var nameRegex =  /^[0-9a-zA-Z\s]*$/;
      if (name.length === 0 ) {
        document.getElementById('nameError').innerHTML = "";
      } else if(!nameRegex.test(name)){ 
        document.getElementById('nameError').innerHTML = "<br>Please provide valid name";
      } else {
        document.getElementById('nameError').innerHTML = "";
      }
    }

    var lname = document.getElementById('lname').value;
      var lnameRegex =  /^[0-9a-zA-Z\s]*$/;
      if (lname.length === 0 ) {
        document.getElementById('lnameError').innerHTML = "";
      } else if(!lnameRegex.test(lname)){ 
        document.getElementById('lnameError').innerHTML = "<br>Please provide valid lname";
      } else {
        document.getElementById('lnameError').innerHTML = "";
      }

function getAge() {  
          var dobValue = document.getElementById('dob').value;
          if (dobValue === "") {
            document.getElementById('dobError').innerHTML = "<br>Please Select DOB";
          } else {
              //Create Today Date
              var today = new Date();
              //change string to date
              var birthDate = new Date(dobValue);
              var age = today.getFullYear() - birthDate.getFullYear();
              //calculate month difference from current date in time
              var m = today.getMonth() - birthDate.getMonth();
              if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                  age--;
              }
              if (age > 18) {
                document.getElementById('dobError').innerHTML = "";
                document.getElementById('ageError').innerHTML = "";
                //display the calculated age
                document.getElementById('age').value=  age;
              } else {
                document.getElementById('dobError').innerHTML = "<br>Please! Select Valid DOB";
                document.getElementById('ageError').innerHTML = "<br>Sorry! you are not eligible. Your age is " + age;
              }
          }
        }
    </script>
@endsection
