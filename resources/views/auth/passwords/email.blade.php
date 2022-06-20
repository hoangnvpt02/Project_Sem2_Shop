
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
		<form method="POST" action="{{ route('password.email', ['user_type' => 'user']) }}">
      @csrf
      <input type="hidden" name="user_type" value="{{ $user_type }}" required>
			<h1>Reset Password</h1>
			<input type="email" name="email" class="" placeholder="Email" value="{{ $email ?? old('email') }}" required autocomplete="email"/>
            @error('email')
            <p class="errors">{{ $message }}</p>
            @enderror
            @if (session('status'))
            <p class="success">{{ session('status') }}</p>
            @endif
			<a href="{{ route('user.login') }}">Log in to your account!</a>
			<button type="submit">Send Password Reset Link</button>
		</form>
	</div>
</div>












