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

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<h5 id="usercheck" style="color: red;" >
									**Name is missing
								</h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						 <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						 <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('UID') }}</label>
                            <div class="col-md-6">
                                <input id="uid" type="text" class="form-control @error('uid') is-invalid @enderror" name="uid" value="{{ old('uid') }}" required autocomplete="uid">

                                @error('uid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						
						 <!--<div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('User Role') }}</label>
                            <div class="col-md-6">
								<select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
									<option value="">--Choose role--</option>
									<option value="superadmin">Superadmin</option>
									<option value="employee">Employee</option>
									<option value="hr">HR</option>
									<option value="manager">Manager</option>
								</select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->
						

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<h5 id="passcheck" style="color: red;">
								**Please Fill the password
							  </h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script>
$(document).ready(function () { 
	//alert("Hello test user?");
	$('#usercheck').hide();    
	 $('#name').keyup(function () {
        validateUsername();
    });
	
	function validateUsername() {
      let usernameValue = $('#name').val();
      if (usernameValue.length == '') {
      $('#usercheck').show();
          usernameError = false;
          return false;
      } 
      else if((usernameValue.length < 3)|| 
				(usernameValue.length > 10)) {
				$('#usercheck').show();
				$('#usercheck').html
		("**length of username must be between 3 and 10");
          usernameError = false;
          return false;
      } 
      else {
          $('#usercheck').hide();
      }
    }
	
	  // Validate Email
		const email = 
        document.getElementById('email');
		email.addEventListener('blur', ()=>{
		let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
		let s = email.value;
		if(regex.test(s)){
          email.classList.remove(
                'is-invalid');
          emailError = true;
        }
        else{
            email.classList.add(
                  'is-invalid');
            emailError = false;
        }
		})
		
	   // Validate Password
		$('#passcheck').hide();
		let passwordError = true;
		$('#password').keyup(function () {
			validatePassword();
		});
		function validatePassword() {
			let passwrdValue = 
				$('#password').val();
			if (passwrdValue.length == '') {
				$('#passcheck').show();
				passwordError = false;
				return false;
			} 
			if ((passwrdValue.length < 3)|| 
				(passwrdValue.length > 10)) {
				$('#passcheck').show();
				$('#passcheck').html
				("**length of your password must be between 3 and 10");
				$('#passcheck').css("color", "red");
				passwordError = false;
				return false;
			} else {
				$('#passcheck').hide();
			}
		}
		
		// Validate Confirm Password
		$('#conpasscheck').hide();
		let confirmPasswordError = true;
		$('#password-confirm').keyup(function () {
			validateConfirmPasswrd();
		});
		function validateConfirmPasswrd() {
			let confirmPasswordValue = 
				$('#password-confirm').val();
			let passwrdValue = 
				$('#password').val();
			if (passwrdValue != confirmPasswordValue) {
				$('#conpasscheck').show();
				$('#conpasscheck').html(
					"**Password didn't Match");
				$('#conpasscheck').css(
					"color", "red");
				confirmPasswordError = false;
				return false;
			} else {
				$('#conpasscheck').hide();
			}
		}
});
</script>