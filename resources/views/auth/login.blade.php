@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/Favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<a href="{{ url('/') }}"
class="absolute top-6 left-6 w-12 h-12 border border-white rounded-full flex items-center justify-center text-white text-2xl"
aria-label="Go back">
<body class="bg-[#351803] flex items-center justify-center min-h-screen p-4">
    <i class="fas fa-arrow-left"></i>
  </a>

  <form class="bg-[#F7F3E9] rounded-xl p-8 max-w-sm w-full text-[#351803] font-sans" aria-label="Sign In Form" method="POST" action="{{ route('login') }}">
    @csrf

    <h2 class="text-center font-semibold text-2xl mb-6">Sign In</h2>

    <div class="form-group row">
      <label for="email" class="block text-base mb-1">Email</label>
      <div class="col-md-6">
        <input id="email" type="email" class="w-full rounded-md border border-gray-300 px-3 py-3 mb-4 text-base placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#351803]" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <div class="form-group row">
      <label for="password" class="block text-base mb-1">Password</label>
      <div class="col-md-6">
        <input id="password" type="password" class="w-full rounded-md border border-gray-300 px-3 py-3 mb-2 text-base placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#351803]" name="password" required autocomplete="current-password">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>

    <p class="text-sm mb-4 text-center">
      Forgot password - <a href="{{ route('password.request') }}" class="underline">Reset here</a>
    </p>

    <button type="submit" class="bg-[#351803] text-white w-full rounded-md py-3 mb-4 text-base">
      Sign in
    </button>

    <p class="text-sm text-center">
      Don’t have an account yet? - <a href="{{ route('register') }}" class="underline">Register now</a>
    </p>
  </form>
</body>
</html>
@endsection
