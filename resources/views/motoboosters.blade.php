<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>StudyBites</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/icons/Favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Tilt+Warp&family=Ultra&display=swap" rel="stylesheet">
   
   <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .studybites-font {
            font-family: "Ultra", serif;
            font-weight: 400;
            font-style: normal;
        }   
        .tilt-warp-heading {
            font-family: "Tilt Warp", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
            font-variation-settings: "XROT" 0, "YROT" 0;
        }
        .video-card {
        width: calc(360px * 1.7 * 0.9); /* 10% narrower */
        max-width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 1rem 0;
      }
      .video-image {
        height: calc(180px * 1.2);
        object-fit: cover;
        border-radius: 0.75rem;
        width: 90%;
        margin: 0 auto;
        display: block;
      }
      .video-text {
        width: 90%;
        margin: 0 auto;
        text-align: left;
      }
      .grid {
        gap: 2rem; /* more space between rows/columns */
      }
    </style>
</head>
<body class="bg-[#110500] text-white">
  <div class="bg-gradient-to-b from-[#441906] to-[#110500] bg-cover bg-center h-screen" >
    <header class="flex items-center justify-between px-6 py-6 bg-[#3B1504] fixed top-0 w-full z-10">
        <div class="text-base text-lg studybites-font">StudyBites</div>
        <div class="flex items-center space-x-8">
            <nav class="hidden md:flex space-x-8 text-lg font-normal">
              <a class="hover:underline" href="{{ route('mindboosters') }}">MindBoosters</a>
              <a class="hover:underline" href="{{ route('skillboosters') }}">SkillBoosters</a>
              <p class="underline underline-offset-4 decoration-white font-bold">MotoBoosters</p>
            </nav>
            <a href="{{ route('register') }}" class="hidden md:block border border-white text-white text-lg rounded px-6 py-2 hover:bg-white hover:text-black transition">
            <button>Get Started</button>      
            </a>
          </div>
    </header>
      <main class=" flex flex-col md:flex-row items-start gap-32 pl-2 pr-6 py-20 pt-48 max-w-6xl mx-auto ">
        <img
              alt="Stack of open books with brown pages and covers"
              class="w-[650px] h-[400px] rounded-md object-cover flex-shrink-0 -ml-16 shadow-2xl"
              src="{{ asset('assets/images/motoboosters/MotoBoostersMain.jfif') }}"
          />
          <div class="max-w-xl text-white flex flex-col justify-start"> 
              <h1 class="text-7xl tilt-warp-heading leading-tight mb-6">MotoBoosters</h1>
              <p class="text-lg font-thin tracking-wider leading-relaxed max-w-xl -mt-7 text-[#f5f5dc]">
                  <br/>
                  Welcome to MotoBoosters,<br/>
                  Your curated collection of the most inspirational speeches and talks out there  <br/>
                  All made specifically to boost students' motivation. <br/>
                  Whether you're looking for just an extra push, you need to completely start fresh, <br/>
                  You will find the perfect booster for you.
              </p>      
          </div>
      </main>
    </div> 
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 justify-center mb-8">
      
        <div class="rounded-xl overflow-hidden video-card mx-auto">
          <div class="relative">
            <img alt="Open book with a sticky note on a round black table with a brown bag and a cup in the background" class="video-image" src="{{ asset('assets/images/motoboosters/Pic8.jfif') }}"
            />
            <a aria-label="Play video How to get your brain to focus" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-3 hover:bg-opacity-90 transition" href="https://youtu.be/Hu4Yvq-g7_Y?si=7NCunVsdOOdG9eJi" target="_blank" rel="noopener noreferrer">
              <i aria-hidden="true" class="fas fa-play text-[#33140a] text-xl"></i>
            </a>
          </div>
          <div class="video-text mt-2 text-white text-base font-semibold leading-tight">
            How to get your brain to focus
          </div>
          <div class="video-text text-[#c9bfb7] text-sm mt-1 font-normal">
            Chris Bailey - Tedx
          </div>
        </div>
  
        <!-- Repeat for other cards -->
        <div class="rounded-xl overflow-hidden video-card mx-auto">
          <div class="relative">
            <img alt="Open book with a sticky note on a round black table with a brown bag and a cup in the background" class="video-image" src="{{ asset('assets/images/motoboosters/Pic9.jfif') }}" />
            <a aria-label="Play video Make learning addictive" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-3 hover:bg-opacity-90 transition" href="https://youtu.be/P6FORpg0KVo?si=KHjVY8RCoc_13-GR" target="_blank" rel="noopener noreferrer">
              <i aria-hidden="true" class="fas fa-play text-[#33140a] text-xl"></i>
            </a>
          </div>
          <div class="video-text mt-2 text-white text-base font-semibold leading-tight">
            Make learning addictive
          </div>
          <div class="video-text text-[#c9bfb7] text-sm mt-1 font-normal">
            Duolingo's Luis Von Ahn - Tedx
          </div>
        </div>
  
        <div class="rounded-xl overflow-hidden video-card mx-auto">
          <div class="relative">
            <img alt="Open book with a sticky note on a round black table with a brown bag and a cup in the background" class="video-image" src="{{ asset('assets/images/motoboosters/Pic10.jfif') }}" />
            <a aria-label="Play video How to get your brain to focus" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-3 hover:bg-opacity-90 transition" href="https://youtu.be/OlNhAs5VN3A?si=QMGOWgLD1GxhAzUH" target="_blank" rel="noopener noreferrer">
              <i aria-hidden="true" class="fas fa-play text-[#33140a] text-xl"></i>
            </a>
          </div>
          <div class="video-text mt-2 text-white text-base font-semibold leading-tight">
            Study like a beast
          </div>
          <div class="video-text text-[#c9bfb7] text-sm mt-1 font-normal">
            Motivation2STudy
          </div>
        </div>
  
        <div class="rounded-xl overflow-hidden video-card mx-auto">
          <div class="relative">
            <img alt="Open book with a sticky note on a round black table with a brown bag and a cup in the background" class="video-image" src="{{ asset('assets/images/motoboosters/Pic11.jfif') }}" />
            <a aria-label="Play video How to get your brain to focus" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-3 hover:bg-opacity-90 transition" href="https://youtu.be/V04ojClenZU?si=zW1IzDvU8xy3cuxU" target="_blank" rel="noopener noreferrer">
              <i aria-hidden="true" class="fas fa-play text-[#33140a] text-xl"></i>
            </a>
          </div>
          <div class="video-text mt-2 text-white text-base font-semibold leading-tight">
            Kill your laziness
          </div>
          <div class="video-text text-[#c9bfb7] text-sm mt-1 font-normal">
            Ben Lionell Scott
          </div>
        </div>
  
        <div class="rounded-xl overflow-hidden video-card mx-auto">
          <div class="relative">
            <img alt="Open book with a sticky note on a round black table with a brown bag and a cup in the background" class="video-image" src="{{ asset('assets/images/motoboosters/Pic12.jfif') }}" />
            <a aria-label="Play video How to get your brain to focus" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-3 hover:bg-opacity-90 transition" href="https://youtu.be/H5ExSyGTgt4?si=qnI5-GQsg7NfBuuS" target="_blank" rel="noopener noreferrer">
              <i aria-hidden="true" class="fas fa-play text-[#33140a] text-xl"></i>
            </a>
          </div>
          <div class="video-text mt-2 text-white text-base font-semibold leading-tight">
            Nothing changes if nothing changes
          </div>
          <div class="video-text text-[#c9bfb7] text-sm mt-1 font-normal">
            The Strength M
          </div>
        </div>
  
        <div class="rounded-xl overflow-hidden video-card mx-auto">
          <div class="relative">
            <img alt="Open book with a sticky note on a round black table with a brown bag and a cup in the background" class="video-image" src="{{ asset('assets/images/motoboosters/Pic14.jfif') }}" />
            <a aria-label="Play video How to get your brain to focus" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white bg-opacity-70 rounded-full p-3 hover:bg-opacity-90 transition" href="https://youtu.be/f3q2rDU7F2A?si=KsA8zL0m2Fn1GcNF" target="_blank" rel="noopener noreferrer">
              <i aria-hidden="true" class="fas fa-play text-[#33140a] text-xl"></i>
            </a>
          </div>
          <div class="video-text mt-2 text-white text-base font-semibold leading-tight">
            If you're ambitious but lazy, watch this...
          </div>
          <div class="video-text text-[#c9bfb7] text-sm mt-1 font-normal">
            Natalie Dawson
          </div>
       
</body>
</html>