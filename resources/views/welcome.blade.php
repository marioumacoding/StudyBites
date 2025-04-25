<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>StudyBites</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/Favicon.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ultra&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
    }
    .studybites-font {
      font-family: "Ultra", serif;
      font-weight: 400;
      font-style: normal;
    }
    .btn-brown {
      background-color: #372709;
    }
    .btn-brown:hover {
      background-color: #1f1201;
    }
    .background-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      object-fit: cover;
      pointer-events: none;
      user-select: none;
    }
    .navbar {
        padding-top: 30px;
    }
  </style>
</head>
<body>
  <img alt="StudyBites Background" class="background-image" src="{{ asset('assets/images/IndexBG1.jpg') }}"/>
  <div class="relative w-full min-h-screen bg-transparent">
    <nav class="absolute top-0 left-0 w-full flex items-center justify-between px-8 py-6 text-white navbar">
      <div class="text-lg studybites-font whitespace-nowrap">
        StudyBites
      </div>
      <div class="hidden md:flex space-x-4 ml-auto mr-12">
        <button class="text-white text-lg font-normal px-4 py-2 rounded hover:text-black transition bg-transparent">
          StudyBites Preview
        </button>
        <button class="text-white text-lg font-normal px-4 py-2 rounded hover:text-black transition bg-transparent">
          Additional Services
        </button>
      </div>
      <a href="{{ route('login') }}">
      <button class="hidden md:block border border-white text-white text-lg rounded px-6 py-2 hover:bg-white hover:text-black transition">
        Sign in
      </button>
    </a>

    </nav>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-center text-white px-4 navbar">
      <h1 class="text-[6rem] md:text-[7rem] font-normal studybites-font leading-none">
        StudyBites
      </h1>
      <p class="mt-10 text-3xl tracking-widest font-normal max-w-[900px] mx-auto">
        where productivity is just one click away
      </p>
      <button class="mt-12 text-white text-xl px-14 py-4 rounded btn-brown transition">
        Get Started Now
      </button>
    </div>
  </div>
</body>
</html>
