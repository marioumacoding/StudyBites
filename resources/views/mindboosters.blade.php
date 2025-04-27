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
                <p class="underline underline-offset-4 decoration-white font-bold">MindBoosters</p>
                <a class="hover:underline" href="{{ route('skillboosters') }}">SkillBoosters</a>
                <a class="hover:underline" href="{{ route('motoboosters') }}">MotoBoosters</a>
            </nav>
            <a href= "{{ route('register')}}">
            <button class="hidden md:block border border-white text-white text-lg rounded px-6 py-2 hover:bg-white hover:text-black transition">Get Started</button>      
    </a> 
          </div>
    </header>
      <main class=" flex flex-col md:flex-row items-start gap-32 pl-2 pr-6 py-20 pt-48 max-w-6xl mx-auto ">
        <img
              alt="Stack of open books with brown pages and covers"
              class="w-[650px] h-[400px] rounded-md object-cover flex-shrink-0 -ml-16 shadow-2xl"
              src="{{ asset('assets/images/mindboosters/MindBoostersMain.jfif') }}"
          />
          <div class="max-w-xl text-white flex flex-col justify-start">
              <h1 class="text-7xl tilt-warp-heading leading-tight mb-6">MindBoosters</h1>
              <p class="text-lg font-thin tracking-wider leading-relaxed max-w-xl -mt-7 text-[#f5f5dc]">
                  <br/>
                  Your curated collection of the latest, science-backed articles designed to help you  <br/>
                  study smarter not harder. <br/>
                  Whether you're looking to improve focus, boost memory, or optimize your learning habits, <br/>
                  We've gathered the best insights to help you reach your full potential — efficiently and effectively.
              </p>      
          </div>
      </main>
    </div> 
    <body class="bg-[#2e1e14] p-8">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row md:space-x-8 space-y-8 md:space-y-0 mb-16">
          <div class="md:w-1/2 flex flex-col space-y-6">
            <article class="space-y-2">
              <img
                alt="Two pears on white table casting shadows"
                class="rounded-md w-full object-cover"
                style="height: 200px;" 
                src="{{ asset('assets/images/mindboosters/Pic5.jfif') }}"
                width="400"
              />
              <h2 class="text-white font-extrabold text-xl">
                <a href="https://www.monash.edu/student-academic-success/study-better/organise-your-time-and-tasks/manage-your-time" class="hover:underline">Time management essentials</a>
              </h2>
              <p class="text-white text-sm">Monah University</p>
            </article>
            <article class="space-y-2">
              <img
                alt="Multiple mushrooms on white background casting shadows"
                class="rounded-md w-full object-cover"
                style="height: 200px;" 
                src="{{ asset('assets/images/mindboosters/Pic6.jfif') }}"
                width="400"
              />
              <h2 class="text-white font-extrabold text-xl">
                <a href="https://kidshealth.org/en/teens/test-terror.html" class="hover:underline">Tips to study for tests</a>
              </h2>
              <p class="text-white text-sm">Collem O'shella</p>
            </article>
          </div>
          <div class="md:w-1/2 flex flex-col justify-between">
            <article class="space-y-2 h-full">
              <img
                alt="Stacked pears with one cut in half on white background"
                class="rounded-md w-full object-cover"
                src="{{ asset('assets/images/mindboosters/Pic7.jpg') }}"
                width="400"
                style="height: 490px;" 
              />
              <h2 class="text-white font-extrabold text-xl mt-2">
                <a href="https://www.usa.edu/blog/study-techniques/" class="hover:underline">How to study effectively</a>
              </h2>
              <p class="text-white text-sm">University of Saint Augestine - USA</p>
            </article>
          </div>
        </div>
   </body>
</html>