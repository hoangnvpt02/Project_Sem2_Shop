
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shoptech</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<h2>ShopTech-Live with 4.0</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="POST" action="{{ route('password.update') }}">
      @csrf
      <input type="hidden" name="user_type" value="{{ $user_type }}" required>
      <input type="hidden" name="token" value="{{ $token }}">
			<h1>Reset Password</h1>
			<input type="email" name="email" class="" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email"/>
			<input type="password" name="password" class="" placeholder="Input Password" required autocomplete="new-password" />
            <input id="password-confirm" type="password" placeholder="Input Password Again" name="password_confirmation" required autocomplete="new-password">
            @error('email')
            <p class="errors">
            {{ $message }}
            </p>
            @enderror
            @error('password')
            <p class="errors">
            {{ $message }}
            </p>
            @enderror
			<a href="{{ route('user.register') }}">You do not have an account? Register!</a>
			<button type="submit">Reset Password</button>
		</form>
	</div>

</div>







