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
      <a href="{{ route('register') }}">
      <button class="mt-12 text-white text-xl px-14 py-4 rounded btn-brown transition">
        Get Started Now
      </button>
  </a>
    </div>
  </div>
  <div class="min-h-screen flex flex-col items-center justify-center p-4" style="background: linear-gradient(to bottom, rgba(58,26,10,0.5), rgba(58,26,10,1));">
    <h1 class=" text-white mt-10 text-4xl tracking-wide font-semibold -mb-8 "> We provide comfort,</h1>
    <h1 class=" text-white mt-10 text-4xl tracking-wide font-semibold mb-8"> So you can provide the brilliance.</h1>
    <img alt="Illustration of books stacked in a bookshelf" class="custom-image" src="C:\Users\Rita Andrew\Downloads\StudyBites\BoostersBG5.jpg" style="width: 750px; height: 450px; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);">
  </div> 
  
  <div class="bg-[#3c1807] flex flex-col items-center py-16 px-4">
  <h1 class="text-white text-5xl font-semibold -mt-4 mb-20">
    Even more of
    <span class="studybites-font">
      StudyBites
    </span>
  </h1>
  <div class="flex flex-col sm:flex-row gap-16 max-w-5xl w-full justify-center">
    <!-- MindBoosters Card -->
    <div class="w-60 h-80 rounded-md flex flex-col items-center text-white p-12 shadow-lg" style="background-image: url('/assets/images/MindBoosters.jpg'); background-size: cover; background-position: center;">
      <button class="bg-[#2a0e03] rounded-sm px-8 py-2 mt-auto hover:bg-[#3c1807] transition-colors card-button">
        Click Here
      </button>
    </div>
    <!-- MotoBoosters Card -->
    <div class="w-60 h-80 rounded-md flex flex-col items-center text-white p-12 shadow-lg" style="background-image: url('/assets/images/SkillBoosters.jpg'); background-size: cover; background-position: center;">
      <button class="bg-[#2a0e03] rounded-sm px-8 py-2 mt-auto hover:bg-[#3c1807] transition-colors card-button">
        Click Here
      </button>
    </div>
    <!-- SkillBoosters Card -->
    <div class="w-60 h-80 rounded-md flex flex-col items-center text-white p-12 shadow-lg" style="background-image: url('/assets/images/MotoBoosters.jpg'); background-size: cover; background-position: center;">
      <button class="bg-[#2a0e03] rounded-sm px-8 py-2 mt-auto hover:bg-[#3c1807] transition-colors card-button">
        Click Here
      </button>
    </div>
  </div>
</div>

 <div class="relative w-full h-32 bg-[rgba(58,26,10,0.7)] flex items-center px-6">
  <h1 class="text-white font-bold text-3xl ml-16 leading-none select-none">Join us now</h1>
  <a href="{{ route('register') }}" class="ml-auto mr-4 bg-white text-black rounded-md px-6 py-3 text-base font-medium leading-none">
    <button type="button">
      Create an account
    </button>
  </a>
  <a href="{{ route('register') }}" class="bg-[#3c1807] text-white rounded-md mr-16 px-6 py-3 text-base font-medium leading-none">
    <button type="button">
      Sign in
    </button>
</a>
</div>
</body>
</html>