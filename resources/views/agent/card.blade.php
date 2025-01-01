
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script>
  <style>
    .hide-scroll-bar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .hide-scroll-bar::-webkit-scrollbar {
      display: none;
    }
  </style>
</head>

<body class="flex">
<div class="">

    <!-- Card start -->
        <div class="max-w-sm mx-auto bg-white  rounded-lg overflow-hidden shadow-lg">
            <div class="border-y pb-2">
                <div class="text-center my-2">
                  
                        <img class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                         id="current-picture" src="{{ asset($agent->agent_picture) }}" alt="Agent's Picture" class="mt-2 w-32 h-32 object-cover">

                        <hr/>
                    <div class="">
                        <div class="py-2 flex gap-3 justify-center items-center">
                            <svg class="h-6 w-6 text-gray-600 dark:text-gray-400" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path class=""
                                    d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z" />
                            </svg>
                            <h3 class="font-bold text-2xl text-gray-800  mb-1"> {{$agent->agent_name}}</h3>
                            
                        </div>
                        <div class="py-2 flex gap-3 justify-center">
                            <svg class="h-6 w-6 text-gray-600 dark:text-gray-400" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1.52 1.52 0 011.61-.35 11.72 11.72 0 003.69.6 1.52 1.52 0 011.52 1.52v3.43A1.52 1.52 0 0120.61 22 17.68 17.68 0 014 4a1.52 1.52 0 011.52-1.52h3.43a1.52 1.52 0 011.52 1.52 11.72 11.72 0 00.6 3.69 1.52 1.52 0 01-.35 1.61l-2.2 2.2z"/>
                            </svg>
                            <h3 class="font-semibold text-xl text-gray-400  mb-1 "> {{$agent->agent_phone}}</h3>/
                            <h3 class="font-semibold text-xl text-gray-400  mb-1">  {{$agent->agent_e_phone}}</h3>
                            
                        </div>
                        <div class="py-2 flex gap-3 justify-center items-center">
                            <svg class="h-6 w-6 text-gray-600 dark:text-gray-400" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm-1.4 4.25l-6.6 5a1 1 0 01-1.2 0l-6.6-5a.5.5 0 01.3-.9H18.7a.5.5 0 01.3.9z"/>
                            </svg>
                            <h3 class="font-semibold text-xl text-gray-400  mb-1"> {{$agent->agent_email}}</h3>
                            
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="px-4 py-4">
                <div class="flex gap-2 items-center text-gray-800 dark:text-gray-300 mb-4">
                    
                    <div class="inline-flex text-gray-700 dark:text-gray-700 items-center">
                        <svg class="h-5 w-5 text-gray-400 dark:text-gray-600 mr-1" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path class=""
                                d="M5.64 16.36a9 9 0 1 1 12.72 0l-5.65 5.66a1 1 0 0 1-1.42 0l-5.65-5.66zm11.31-1.41a7 7 0 1 0-9.9 0L12 19.9l4.95-4.95zM12 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        </svg>
                        {{$agent->agent_address}}
                    </div>
                </div>
                <div class="flex">
                 
                </div>
            </div>
        </div>
    <!-- Card end -->

</div>
</body>

</html>