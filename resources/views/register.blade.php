
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Shoptech</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>

<h2>ShopTech-Live with 4.0</h2>
<div class="container" id="container">
	<div class="form-container sign-in-container">
    <form method="POST" action ="{{ route('user.register') }}">
      @csrf
			<h1>Create Account</h1>
			<input type="email" name="email" value="{{ old('email') }}" class="" placeholder="Email" required/>
			<input type="text" name="name" value="{{ old('name') }}" class="" placeholder="Name" required />
			<input type="text" name="phone" value="{{ old('phone') }}" class="" placeholder="Phone" required />
			<input type="text" name="address" value="{{ old('address') }}" class="" placeholder="Address" required />
			<input type="password" name="password" class="" placeholder="Input Password" required />
      <input id="password-confirm" type="password" name="password_confirmation" placeholder="Input Password Again" required autocomplete="new-password">
      @foreach ($errors->all() as $error)
                <li class="errors">{{ $error }}</li>
      @endforeach
      @if(!empty($success))
          <p class="success"> {{ $success }}</p>
        @endif
			<a href="{{ route('user.login')}}">Do you already have an account? Log In</a>
			<button type="submit">Register</button>
		</form>
	</div>
</div>