<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reset Password</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/Favicon.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body class="bg-[#3B1A04] min-h-screen flex items-center justify-center p-6">
  <div class="absolute top-10 left-10">
      <button
      aria-label="Go back"
      class="w-14 h-14 border border-white rounded-full flex items-center justify-center text-white text-3xl"
      >
      <a href="{{ route('login') }}">
      <i class="fas fa-arrow-left"></i>
</a>
    </button>
  </div>

  <form method="POST" action="{{ route('password.email') }}" class="bg-[#F9F6ED] rounded-xl p-10 max-w-[400px] w-full" aria-label="Reset Password Form">
  @csrf

  <h2 class="text-[#3B1A04] font-semibold text-2xl mb-4 text-center">
    Reset Password
  </h2>
  <p class="text-[#3B1A04] text-base mb-6 text-center">
    Write the email linked to your account below
  </p>

 
  <label for="email" class="block text-[#3B1A04] text-base mb-2">Email</label>

  <input
    id="email"
    type="email"
    name="email"
    value="{{ old('email') }}"
    placeholder="e.g. user@example.com"
    class="w-full rounded-md border border-gray-200 px-4 py-3 text-base text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#3B1A04]"
    required
    autocomplete="email"
    autofocus
  />

  <!-- Error Handling -->
  @error('email')
    <span class="text-red-600 text-sm mt-2 block">
      <strong>{{ $message }}</strong>
    </span>
  @enderror

     <!-- Display success message -->
     @if (session('status'))
    <div class="text-green-600 text-sm mt-2 block">
      {{ session('status') }}
    </div>
  @endif

  <button type="submit" class="mt-8 w-full bg-[#3B1A04] text-[#F9F6ED] text-base py-3 rounded-md">
    Send reset link
  </button>



</form>

</body>
</html>