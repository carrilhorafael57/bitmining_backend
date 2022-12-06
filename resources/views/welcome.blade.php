<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')

    </head>
    <body class="bg-gray-300">
      <nav class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg">
        <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
          <div class="container-fluid">
            <a class="text-xl text-black text-red" href="#">BitMining</a>
          </div>

          <div>
            <a href='/play'>
              <button  type="button" class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Play
              </button>
            </a>
          </div>
        </div>
      </nav>

      <div class="columns-2 gap-10 m-10 bg-white">
        <p class="content-center w-2/4 mx-auto">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae cumque saepe itaque possimus, expedita maiores! Temporibus, cum molestiae perferendis deserunt explicabo aspernatur, exercitationem minima eum, inventore voluptas fugiat odio vero?
        </p>

        <p class="w-2/4 content-center mx-auto">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nemo fuga eligendi repudiandae inventore veritatis, fugit quaerat eos maxime repellendus. Vitae, rem eligendi? Necessitatibus itaque, natus totam quam delectus tempora?
        </p>
        {{-- <img class="w-full aspect-square" src=""/> --}}
      </div>
      <div class="columns-2 gap-10 m-10 bg-white">
        <p class="content-center w-2/4 mx-auto">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae cumque saepe itaque possimus, expedita maiores! Temporibus, cum molestiae perferendis deserunt explicabo aspernatur, exercitationem minima eum, inventore voluptas fugiat odio vero?
        </p>

        <p class="w-2/4 content-center mx-auto">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nemo fuga eligendi repudiandae inventore veritatis, fugit quaerat eos maxime repellendus. Vitae, rem eligendi? Necessitatibus itaque, natus totam quam delectus tempora?
        </p>
        {{-- <img class="w-full aspect-square" src=""/> --}}
      </div>

      <div class="columns-2 gap-10 m-10 bg-white">
        <p class="content-center w-2/4 mx-auto">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vitae cumque saepe itaque possimus, expedita maiores! Temporibus, cum molestiae perferendis deserunt explicabo aspernatur, exercitationem minima eum, inventore voluptas fugiat odio vero?
        </p>

        <p class="w-2/4 content-center mx-auto">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nemo fuga eligendi repudiandae inventore veritatis, fugit quaerat eos maxime repellendus. Vitae, rem eligendi? Necessitatibus itaque, natus totam quam delectus tempora?
        </p>
        {{-- <img class="w-full aspect-square" src=""/> --}}
      </div>
    </body>
    
    <footer class="absolute bottom-0 left-0 w-full p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
      <div class="sm:flex sm:items-center sm:justify-between">
          <a href="#" class="flex items-center mb-4 sm:mb-0">
              <img src="https://www.svgrepo.com/show/275512/pickaxe.svg" class="mr-3 h-8" alt="Pickaxe Logo" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">BitMining</span>
          </a>
          <ul class="flex flex-wrap items-center mb-6 text-sm text-gray-500 sm:mb-0 dark:text-gray-400">
              <li>
                  <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
              </li>
          </ul>
      </div>
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Bitmining™</a>. All Rights Reserved.
      </span>
    </footer>

</html>
