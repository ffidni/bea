

<style>
    .sidebar-wrapper {
        position: fixed;
        top: 0;
        right: -100%; 
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: flex-start;
        z-index: 50; 
    }
    .sidebar-wrapper.sidebar-open .sidebar {
        transform: translateX(0);
    }
    .sidebar-wrapper.sidebar-open .sidebar-overlay {
        display: block;
    }
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
        z-index: 40; 
        display: none; 
    }

</style>

<script>
    $(document).ready(function() {
        $(window).scroll(function() {
            var header = $('header');
            var menus = $('.menu');
            var loginButton = $('#login-btn');
            var bea = $('#bea');
            var selectedMenu = "{{$selectedMenu}}"

            header.toggleClass('bg-blue-600', $(this).scrollTop() > 0);
            bea.toggleClass('text-blue-600', $(this).scrollTop() <= 0)
                .toggleClass('text-blue-100', $(this).scrollTop() > 0);
            menus.map((idx, menu) => {
                menu = $(menu);
                console.log(menu.data('id'), selectedMenu);
                if (menu.data('id') === parseInt(selectedMenu)) {
                  menu.toggleClass('text-white hover:text-white text-gray-600 bg-blue-600', $(this).scrollTop() <= 0)
                .toggleClass('text-black hover:text-black bg-white', $(this).scrollTop() > 0);
                  return;
                }
                menu.toggleClass('text-white hover:text-slate-300', $(this).scrollTop() > 0); 
            });
            loginButton.toggleClass('bg-transparent', $(this).scrollTop() > 0); 
            loginButton.toggleClass('hover:bg-blue-700', $(this).scrollTop() > 0); 
        });

      $('.fa-bars').click(function() {
            $('.sidebar-wrapper').toggleClass('sidebar-open');
        });

        $('.sidebar button, .sidebar-overlay').click(function() {
            $('.sidebar-wrapper').removeClass('sidebar-open');
        });

        $(document).mouseup(function(e) {
            var sidebar = $('.sidebar');
            if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0) {
                sidebar.removeClass('open');
            }
        });
    });
</script>

<header class="flex justify-between items-center  px-4 sm:px-8 py-3 sm:pt-5 sticky top-0 z-50 transition-colors">
    <div class="flex justify-start items-center pointer" onclick="window.location = '/'">
        <p class="text-blue-600 font-bold text-2xl" id="bea">Bea</p>
        <p class="text-amber-300 font-bold text-3xl">Murid</p>
    </div>
    <div class="gap-3 hidden sm:flex md:gap-10">
        <a data-id=0 href="{{ route('jenis_beasiswa.index') }}" class="font-medium sm:text-sm md:text-base menu
            @if($selectedMenu === 0) 
                text-white bg-blue-600  hover:text-white  rounded-full
            @endif
            py-3 px-3 cursor-pointer hover:text-black text-gray-600">
            Pilihan Beasiswa
        </a>
        <a data-id=1 href="{{ route('pendaftaran.index') }}" class="font-medium sm:text-sm md:text-base menu 
            @if($selectedMenu === 1) 
            text-white bg-blue-600  hover:text-white  rounded-full
            @endif
            py-3 px-3 cursor-pointer hover:text-black text-gray-600">
                Daftar Beasiswa
        </a>
        <a data-id=2 href="{{ route('mahasiswa.hasil_beasiswa') }}" class="font-medium sm:text-sm md:text-base menu 
            @if($selectedMenu === 2) 
            text-white bg-blue-600  hover:text-white  rounded-full
            @endif
            py-3 px-3 cursor-pointer hover:text-black text-gray-600">
                Hasil Beasiswa
        </a>
    </div>
    <div class="flex items-center gap-3">
        <a class="btn-primary px-5 py-2" id="login-btn" href="{{route('user.login')}}">Login</a>
        <i class="block fa fa-bars text-black text-lg sm:hidden pointer rounded bg-slate-100 px-3 py-1 border hover:bg-slate-200"></i>
    </div>
    <div class="sidebar-wrapper">
        <!-- Sidebar -->
        <div class="sidebar bg-blue-600 text-white w-3/6 fixed top-0 right-0 h-full overflow-y-auto transform translate-x-full transition-transform z-50">
            <button class="absolute top-5 right-5 text-white hover:text-gray-300 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
            <ul class="mt-12">
                <li onclick="window.location='{{ route('jenis_beasiswa.index') }}';" class="flex items-center py-3 px-6 hover:bg-blue-700 cursor-pointer">
                    <a href="#" class="font-medium">
                        <i class="fas fa-graduation-cap mr-2"></i>Jenis Beasiswa
                    </a>
                </li>
                <li onclick="window.location='{{ route('pendaftaran.index') }}';" class="flex items-center py-3 px-6 hover:bg-blue-700 cursor-pointer">
                    <a href="#" class="font-medium">
                        <i class="fas fa-file-alt mr-3"></i>Pendaftaran
                    </a>
                </li>
                <li onclick="window.location='{{ route('mahasiswa.hasil_beasiswa') }}';" class="flex items-center py-3 px-6 hover:bg-blue-700 cursor-pointer">
                    <a href="#" class="font-medium">
                        <i class="fas fa-award mr-3"></i>Hasil Beasiswa
                    </a>
                </li>
            </ul>
            
        </div>
        <!-- Overlay -->
        <div class="sidebar-overlay bg-black opacity-50 fixed top-0 left-0 w-full h-full z-40 hidden"></div>
    </div>
    
    
    
</header>



