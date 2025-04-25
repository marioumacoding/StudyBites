<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create Account</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/Favicon.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-[#3B1E05] min-h-screen flex items-center justify-center p-6">
  <div class="absolute top-8 left-8">
    <a href="{{ url('/') }}" class="w-14 h-14 border border-white rounded-full flex items-center justify-center">
      <i class="fas fa-arrow-left text-white text-2xl"></i>
    </a>
  </div>

  <form
    id="createAccountForm"
    class="bg-[#F9F5EB] rounded-xl p-10 w-full max-w-sm space-y-3"
    action="{{ route('register') }}" 
    method="POST"
    aria-label="Create Your Account Form"
    novalidate
  >
    @csrf
    <h2 class="text-[#3B1E05] font-semibold text-center mb-4 text-xl">
      Create Your Account
    </h2>

    <!-- First Name -->
    <label for="firstName" class="block text-[#3B1E05] text-sm mb-0.5 font-normal">First Name</label>
    <input
      id="firstName"
      name="first_name"
      type="text"
      placeholder="e.g Rita"
      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B1E05]"
      value="{{ old('first_name') }}"
      required
    />

    <!-- Last Name -->
    <label for="lastName" class="block text-[#3B1E05] text-sm mb-0.5 font-normal">Last Name</label>
    <input
      id="lastName"
      name="last_name"
      type="text"
      placeholder="e.g Halim"
      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B1E05]"
      value="{{ old('last_name') }}"
      required
    />

    <!-- Email -->
    <label for="email" class="block text-[#3B1E05] text-sm mb-0.5 font-normal">Email</label>
    <input
      id="email"
      name="email"
      type="email"
      placeholder="e.g. user@example.com"
      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B1E05]"
      value="{{ old('email') }}"
      required
    />

    <!-- Password -->
    <label for="password" class="block text-[#3B1E05] text-sm mb-0.5 font-normal">Password</label>
    <input
      id="password"
      name="password"
      type="password"
      placeholder="at least 8 characters"
      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B1E05]"
      required
      minlength="8"
    />

    <!-- Confirm Password -->
    <label for="confirmPassword" class="block text-[#3B1E05] text-sm mb-0.5 font-normal">Confirm Password</label>
    <input
      id="confirmPassword"
      name="password_confirmation"
      type="password"
      placeholder="Retype Password"
      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-400 focus:outline-none focus:ring-2 focus:ring-[#3B1E05]"
      required
      minlength="8"
    />
    <p id="passwordError" class="text-red-600 text-xs mt-1 hidden">Passwords do not match.</p>

    <!-- Submit Button -->
    <button
      type="submit"
      class="w-full bg-[#3B1E05] text-[#F9F5EB] text-sm py-2 rounded-md mt-4"
    >
      Register
    </button>

    <p class="text-[#3B1E05] text-center text-sm font-normal mt-2">
      Already have an account? <a href="{{ route('login') }}" class="underline">Sign in</a>
    </p>
  </form>

  <script>
    const form = document.getElementById('createAccountForm');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const passwordError = document.getElementById('passwordError');

    form.addEventListener('submit', (e) => {
      passwordError.classList.add('hidden');

      // Check built-in HTML5 validation first
      if (!form.checkValidity()) {
        e.preventDefault();
        form.reportValidity();
        return;
      }

      // Then check if passwords match
      if (passwordInput.value !== confirmPasswordInput.value) {
        e.preventDefault();
        passwordError.classList.remove('hidden');
        confirmPasswordInput.focus();
      }
    });
  </script>
</body>
</html>
