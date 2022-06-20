
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Reset Password | Shoptech</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<h2>ShopTech-Live with 4.0</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="POST" action ="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">
			<h1>Reset Password</h1>
			<input type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autocomplete="email"/>
			<input type="password" name="password" class="" placeholder="Input Password" required />
			<input type="password" name="password_confirmation" class="" placeholder="Input Password Again" required />
      @error('errorlogin')
        <p class="errors">
            {{ $message }}
        </p>
      @enderror
			<a href="{{ route('user.login') }}">Back to Login</a>
			<button type="submit">Send Password Reset Link</button>
		</form>
	</div>

</div>
