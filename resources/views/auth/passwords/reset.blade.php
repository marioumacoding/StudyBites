<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create New Password</title>
  <link rel="icon" type="image/x-icon" href="C:\Users\Rita Andrew\Downloads\StudyBites\Favicon.png">
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
  <script>
    function validateForm(event) {
      const passwordInput = document.getElementById('new-password');
      const confirmInput = document.getElementById('confirm-password');
      const passwordError = document.getElementById('passwordError');

      // Clear previous error message
      passwordError.classList.add('hidden');

      // Check if the passwords match
      if (passwordInput.value !== confirmInput.value) {
        event.preventDefault(); // Prevent form submission
        passwordError.classList.remove('hidden'); // Show error message
        confirmInput.focus(); // Focus on the confirm password field
      }
    }
  </script>
</head>
<body class="bg-[#3B1B00] min-h-screen flex items-center justify-center p-4">
  <div class="absolute top-6 left-6">
    <button
      aria-label="Go back"
      class="w-14 h-14 border border-white rounded-full flex items-center justify-center text-white text-3xl"
    >
    <a href="{{ route('login') }}">
      <i class="fas fa-arrow-left"></i>
    </a>
    </button>
  </div>

  <form method="POST" action="{{ route('password.update') }}"
    class="bg-[#FCF7ED] rounded-xl p-8 w-full max-w-sm"
    aria-label="Create New Password Form"
    onsubmit="validateForm(event)">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">

  <h1 class="text-[#3B1B00] font-semibold text-2xl mb-6 text-center">Create New Password</h1>

  <!-- Email Field -->
  <label for="email" class="block text-sm font-semibold text-[#3B1B00] mb-1">E-Mail Address</label>
  <input
    id="email"
    name="email"
    type="email"
    class="w-full rounded border border-gray-200 text-base px-3 py-2 mb-4 placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#3B1B00]"
    value="{{ $email ?? old('email') }}"
    required
    autocomplete="email"
    autofocus
  />

  @error('email')
    <span class="invalid-feedback text-red-600 text-xs mb-2">
      <strong>{{ $message }}</strong>
    </span>
  @enderror

  <!-- New Password Field -->
  <label for="new-password" class="block text-sm font-semibold text-[#3B1B00] mb-1">New Password</label>
  <input
    id="new-password"
    name="password"
    type="password"
    placeholder="at least 8 characters"
    class="w-full rounded border border-gray-200 text-base px-3 py-2 mb-4 placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#3B1B00]"
    required
    minlength="8"
  />

  @error('password')
    <span class="invalid-feedback text-red-600 text-xs mb-2">
      <strong>{{ $message }}</strong>
    </span>
  @enderror

  <!-- Confirm Password Field -->
  <label for="confirm-password" class="block text-sm font-semibold text-[#3B1B00] mb-1">Confirm Password</label>
  <input
    id="confirm-password"
    name="password_confirmation"
    type="password"
    placeholder="retype your password"
    class="w-full rounded border border-gray-200 text-base px-3 py-2 mb-2 placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-[#3B1B00]"
    required
    minlength="8"
  />

  <!-- Password Error Message -->
  <p id="passwordError" class="text-red-600 text-xs mt-0.5 hidden">Passwords do not match.</p>

  <div class="flex justify-center">
    <button
      type="submit"
      class="bg-[#3B1B00] text-white text-lg py-3 rounded-lg px-14"
    >
      Reset Password
    </button>
  </div>
</form>

</body>
</html>