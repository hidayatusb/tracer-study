<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
    
<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-primary lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-2">
        <div class="flex items-center mt-3">
            <img src="/images/logots.png" alt="" class="w-56 flex mx-auto">
            {{-- <svg class="w-12 h-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"/>
            </svg>

            <span class="mx-2 text-2xl font-semibold text-white">Dashboard</span> --}}
        </div>
    </div>

    <nav class="mt-10 px-5">
      
        @if (Auth::user()->role == 'alumni')
        <a href="/dashboard" class="flex {{ $title == 'Beranda' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/home.svg" class="w-6 h-6">

            <span class="mx-3">Beranda</span>
        </a>

        <a href="/profil" class="{{ $title == 'Profil' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }}  flex items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/profil.svg" class="w-6 h-6">

            <span class="mx-3">Profil Alumni</span>
        </a>

        <a href="/kuesioner" class="{{ Request::segment(1) === 'kuesioner' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} flex items-center p-4 rounded-lg mt-2 text-white hover:bg-active hover:bg-opacity-40 hover:text-gray-100 transition ease-in-out duration-500" >
            <img src="/images/icons/kuisioner.svg" class="w-6 h-6">

            <span class="mx-3">Kuesioner</span>
        </a>
        @elseif (Auth::user()->role == 'admin')
        <a href="/dashboard" class="flex {{ $title == 'Beranda' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/home.svg" class="w-6 h-6">

            <span class="mx-3">Beranda</span>
        </a>

        <a href="/data-alumni" class="flex {{ $title == 'Data Alumni' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/profil.svg" class="w-6 h-6">
            <span class="mx-3">Data Alumni</span>
        </a>

        <a href="/data-tracer" class="flex {{ $title == 'Data Tracer' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/tracer.svg" class="w-6 h-6">

            <span class="mx-3">Tracer Alumni</span>
        </a>

        <a href="/statistika" class="flex {{ $title == 'Statistika' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/tracer.svg" class="w-6 h-6">

            <span class="mx-3">Statistika</span>
        </a>

        <a href="/hasil-statistika" class="flex {{ $title == 'Hasil Statistika' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/tracer.svg" class="w-6 h-6">

            <span class="mx-3">Hasil Statistika</span>
        </a>

        <a href="/data-tracer" class="flex {{ $title == 'Pengguna Lulusan' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/tracer.svg" class="w-6 h-6">

            <span class="mx-3">Peng. Lulusan</span>
        </a>
        <a href="/data-tracer" class="flex {{ $title == 'Mitra Kerjasama' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/tracer.svg" class="w-6 h-6">

            <span class="mx-3">Mitra Kerjasama</span>
        </a>
        <a href="/pengumuman" class="flex {{ $title == 'Pengumuman' ? 'active' : 'hover:bg-active hover:bg-opacity-40' }} items-center p-4 rounded-lg mt-2 text-white  hover:text-gray-100 transition ease-in-out duration-500">
            <img src="/images/icons/pengumuman.svg" class="w-6 h-6 text-white">

            <span class="mx-3">Pengumuman</span>
        </a>
        @endif
           
           

      

       
    </nav>
</div>