
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Shoptech</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<h2>ShopTech-Live with 4.0</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
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
			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Hello, Friend!</h1>
				<p>Enter your information to Sign up or Sign in here</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your account or Sign up here</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<script>
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');

  signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });
</script>