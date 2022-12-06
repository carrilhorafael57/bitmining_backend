<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite('resources/css/app.css')

    </head>
    <body class="bg-gray-300">
      <div class="mb-96">
        <nav class="relative w-full flex flex-wrap items-center justify-between py-3 bg-gray-100 text-gray-500 hover:text-gray-700 focus:text-gray-700 shadow-lg">
          <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
            <div class="container-fluid">
              <div class="sm:flex sm:items-center sm:justify-between">
                <a href="/" class="flex items-center mb-4 sm:mb-0">
                    <img src="https://www.svgrepo.com/show/275512/pickaxe.svg" class="mr-3 h-8" alt="Pickaxe Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-red">BitMining</span>
                </a>
            </div>
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
          <p class="content-center w-2/4 mx-auto m-24 place-items-center">
            Miner inventory: This is where all your miners will show up!
          </p>

          <img class="w-2/4 h-60 content-center mx-auto py-5" src="miners-inventory.png" alt="miners inventory">
            
          {{-- <img class="w-full aspect-square" src=""/> --}}
        </div>
        <div class="columns-2 gap-10 m-10 bg-white">
          <p class="content-center w-2/4 mx-auto m-24 place-items-center">
            Player Ores inventory: This is where you can see the ores that you received playing!
          </p>

          <img class="w-2/4 h-60 content-center mx-auto py-5" src="inventory.png" alt="player inventory">
          {{-- <img class="w-full aspect-square" src=""/> --}}
        </div>

        <div class="columns-2 gap-10 m-10 bg-white">
          <p class="content-center w-2/4 mx-auto m-24 place-items-center">
            Miner Statistics: This is where you can see the miners statistics!
          </p>

          <img class="w-2/4 h-60 content-center mx-auto py-5" src="miner-stats.png" alt="miners stats">
          {{-- <img class="w-full aspect-square" src=""/> --}}
        </div>
      </div>
    </body>
    
    <footer class="fixed bottom-0 left-0 w-full p-4 bg-white rounded-lg shadow md:px-6 md:py-8 dark:bg-gray-900">
  
      <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
      <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="/" class="hover:underline">Bitmining™</a>. All Rights Reserved.
      </span>
    </footer>

</html>
