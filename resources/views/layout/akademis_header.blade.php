<nav id="header" class="bg-white w-full shadow px-2 py-1 ">
    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
        <div class="w-1/2 pl-2 md:pl-0 mb-3">
            <div class="flex justify-start items-center pointer" onclick="window.location = '/admin/dashboard'">
                <p class="text-blue-600 font-bold text-xl sm:text-2xl" id="bea">Bea</p>
                <p class="text-amber-300 font-bold text-2xl sm:text-3xl">Murid</p>
                <p class="text-slate-500 font-bold sm:text-3xl text-2xl ml-2">Akademis</p>
            </div>
        </div>
        @if(!isset($hideMenu))
        <div class="w-1/2 pr-0">
            <div class="flex relative inline-block float-right">
                <div class="relative text-sm">
                    <button id="userButton" class="flex items-center focus:outline-none mr-3">
                        <img class="w-8 h-8 rounded-full mr-4" src="http://i.pravatar.cc/300" alt="Avatar of User"> <span class="hidden md:inline-block">Hi, User </span>
                        <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                            <g>
                                <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                            </g>
                        </svg>
                    </button>
                    <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                        <ul class="list-reset">
                            <li><a href="{{route('akademis.dashboard', ['selectedMenu' => 0])}}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Dashboard</a></li>
                            <li><a href="{{route('akademis.mahasiswa', ['selectedMenu' => 1])}}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Mahasiswa</a></li>
                            <li><a href="{{route('akademis.beasiswa', ['selectedMenu' => 2])}}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Beasiswa</a></li>
                            <li><a href="{{route('akademis.admin', ['selectedMenu' => 3])}}" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Admin</a></li>
                            <li>
                                <hr class="border-t mx-2 border-gray-400">
                            </li>
                            <li><a href="#" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Logout</a></li>
                        </ul>
                    </div>
                </div>


                
                <div class="block lg:hidden pr-4">
                    <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
            <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{route('akademis.dashboard')}}" class="block py-1 md:py-3 pl-1 align-middle {{ $selectedMenu == 0 ? 'text-blue-600' : 'text-gray-500' }} no-underline border-b-2 border-white hover:border-blue-600">
                        <i class="fas fa-home fa-fw mr-3 {{$selectedMenu == 0 ? 'text-blue-500' : 'text-gray-500'}}"></i><span class="pb-1 md:pb-0 text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{route('akademis.mahasiswa')}}"  class="block py-1 md:py-3 pl-1 align-middle {{ $selectedMenu == 1 ? 'text-blue-600' : 'text-gray-500' }} no-underline border-b-2 border-white hover:border-blue-600">
                        <i class="fas fa-user-tie fa-fw mr-3 {{$selectedMenu == 1 ? 'text-blue-600' : 'text-gray-500'}}"></i><span class="pb-1 md:pb-0 text-sm">Mahasiswa</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{route('akademis.beasiswa')}}"  class="block py-1 md:py-3 pl-1 align-middle {{ $selectedMenu == 2 ? 'text-blue-600' : 'text-gray-500' }}no-underline border-b-2 border-white hover:border-blue-600">
                        <i class="fas fa-graduation-cap fa-fw mr-3 {{$selectedMenu == 2 ? 'text-blue-600' : 'text-gray-500'}}"></i><span class="pb-1 md:pb-0 text-sm">Beasiswa</span>
                    </a>
                </li>
                <li class="mr-6 my-2 md:my-0">
                    <a href="{{route('akademis.admin')}}"  class="block py-1 md:py-3 pl-1 align-middle {{ $selectedMenu == 3 ? 'text-blue-600' : 'text-gray-500' }} no-underline border-b-2 border-white hover:border-blue-600">
                        <i class="fas fa-user fa-fw mr-3 {{$selectedMenu == 3 ? 'text-blue-600' : 'text-gray-500'}}"></i><span class="pb-1 md:pb-0 text-sm">Admin</span>
                    </a>
                </li>
              
            </ul>
        </div>
        @endif
    </div>
</nav>
