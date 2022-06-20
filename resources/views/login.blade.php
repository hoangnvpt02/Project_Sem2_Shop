
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Shoptech</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<h2>ShopTech-Live with 4.0</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form method="POST" action ="{{ route('user.login') }}">
      @csrf
			<h1>Sign in</h1>
			<input type="email" name="email" class="" placeholder="Email" required autocomplete="email"/>
			<input type="password" name="password" class="" placeholder="Password" required />
      @error('errorlogin')
        <p class="errors">
            {{ $message }}
        </p>
      @enderror
			<a href="{{ route('password.request') }}">Forgot your password?</a>
			<a href="{{ route('user.register') }}">You do not have an account? Register!</a>
			<button type="submit">Log In</button>
		</form>
	</div>

</div>
